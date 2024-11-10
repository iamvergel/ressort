<?php
require_once(dirname(__DIR__, 3) . '/configuration/dbConnection.php');

session_start(); // Start the session

// Check if the user is logged in
if (!isset($_SESSION['user'])) {
    header('Location: /login'); // Redirect to the login page if not logged in
    exit();
}

// Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require_once(dirname(__DIR__, 2) . '/vendor/phpmailer/phpmailer/src/Exception.php');
require_once(dirname(__DIR__, 2) . '/vendor/phpmailer/phpmailer/src/PHPMailer.php');
require_once(dirname(__DIR__, 2) . '/vendor/phpmailer/phpmailer/src/SMTP.php');

// Fetch all inquiries for Amacan
$stmt = $pdo->prepare("SELECT * FROM inquiries WHERE room = 'Amacan & VR House' AND status = 'pending'"); //AND room = 'pending'
$stmt->execute();
$amacanvrInquiries = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $action = $_POST['action'];

    if ($action === 'accept') {

        // Fetch inquiry details before updating status
        $inquiryStmt = $pdo->prepare("SELECT * FROM inquiries WHERE id = :id");
        $inquiryStmt->bindParam(':id', $id, PDO::PARAM_INT);
        $inquiryStmt->execute();
        $inquiry = $inquiryStmt->fetch(PDO::FETCH_ASSOC);

        // Update the inquiry status to 'accepted'
        $deleteStmt = $pdo->prepare("DELETE FROM inquiries WHERE id = :id");
        $deleteStmt->bindParam(':id', $id, PDO::PARAM_INT);
        $deleteStmt->execute();

        // Insert into accepted inquiries
        $insertStmt = $pdo->prepare("INSERT INTO accepted_inquiries (full_name, email, contact_number, room, quantity, preferred_date, session, status, price, code) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $code = uniqid('VRFPR'); // Generate a unique confirmation code
        $insertStmt->execute([
            $inquiry['full_name'],
            $inquiry['email'],
            $inquiry['contact_number'],
            $inquiry['room'],
            $inquiry['quantity'],
            $inquiry['preferred_date'],
            $inquiry['session'],
            'accepted', // status to insert
            $inquiry['price'],
            $code
        ]);

        // Initialize hours variable
        $hours = '';

        if ($inquiry['session'] === 'AM') {
            $hours = "8:00 AM to 6:00 PM";
        } elseif ($inquiry['session'] === 'PM') {
            $hours = "6:00 PM to 8:00 AM";
        } elseif ($inquiry['session'] === '22 Hours') {
            $hours = "8:00 AM to 4:00 AM";
        } else {
            $hours = "N/A"; // Default or error case
        }

        // Setup PHPMailer
        $mail = new PHPMailer(true);

        try {
            // Server settings
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'villareyesfamilyprivateresort@gmail.com'; // Use environment variable
            $mail->Password = 'jyjkgvcolmlxaogk'; // Use environment variable
            $mail->SMTPSecure = "tls";
            $mail->Port = 587;

            // Recipients
            $mail->setFrom('villareyesfamilyprivateresort@gmail.com', "Villa Reyes Family Private Resort");
            $mail->addAddress($inquiry['email']);

            // Content
            $mail->isHTML(true);
            $mail->Subject = 'Your Reservation at Villa Reyes Family Private Resort is Confirmed!';
            $mail->Body = "
            Dear {$inquiry['full_name']}, <br/><br/>
            This email confirms your reservation at Villa Reyes Family Private Resort for <strong>{$inquiry['preferred_date']}</strong>. 
            We are excited to welcome you to our beautiful resort!<br/><br/>
            
            <strong>Booking Details:</strong><br/>
            - Arrival Date: {$inquiry['preferred_date']}<br/>
            - Session: {$hours}<br/>
            - Number of Guests: {$inquiry['quantity']}<br/>
            - Room Type: {$inquiry['room']}<br/>

            - Confirmation Code: <strong>{$code}</strong><br/><br/>

            - Price : ₱<strong>{$inquiry['price']}</strong><br/><br/>
            
            <strong>Next Steps:</strong><br/>
            -Please make the down payment via GCash to [GCash Account Number] and send a screenshot <br/>    of the transaction to our Messenger for confirmation by [Date]
            - Payment: Please make the full payment by [Date]. You can pay through [Payment Methods].<br/>
            - Check-in: Check-in starts at [Time] on your arrival date.<br/>
            - Contact: If you have any questions, contact us at [Phone Number] or [Email Address].<br/><br/>
            
            We look forward to providing you with a memorable stay.<br/><br/>
            Sincerely,<br/>
            The Villa Reyes Family Private Resort Team
        ";

            $mail->AltBody = "Dear {$inquiry['full_name']}, your reservation is confirmed. Please check your email for further details.";

            $mail->send();
        } catch (Exception $e) {
            // Log the error or display a message
            error_log("Mail error: {$mail->ErrorInfo}");
        }
    } elseif ($action === 'decline') {
        // Logic to decline the inquiry
        // Example: update the database to mark the inquiry as declined
        $sql = "UPDATE inquiries SET status = 'declined' WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);
        // Redirect or provide feedback
    }
    // Redirect after processing
    header('Location: /adminInquiries/AmacananVrhouse'); // Change this to your desired redirect
    exit;
}
?>      

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Villa Reyes Ressort</title>
    <link rel="shortcut icon" href="\public\assets\images\logo\villaresortlogo.png" type="image/x-icon">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", system-ui;
        }

        body {
            font-family: Arial, sans-serif;
            overflow-x: hidden;
        }

        .amacan {
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .amacan:hover {
            background-color: #ebb105;
        }

        table {
            margin-top: 5rem;
        }
    </style>
</head>

<body>
    <?php include 'app/views/admin/adminInclude/sidebar.php'; ?>
    <div class="content">
        <?php include 'app/views/admin/adminInclude/header.php'; ?>
        <h2 class="my-5 fw-bold"><i class="bi bi-people-fill me-2"></i>Inquiries</h2>

        <div class="row w-100 my-5">
            <button class="col btn btn-warning p-3 mx-2 border-0 rounded-2 shadow-lg text-light fs-2 fw-bold amacan"
                onclick="window.location.href = '/adminInquiries/Amacan'"><i
                    class="bi bi-house-fill me-2"></i>Amacan</button>
            <button class="col btn btn-success p-3 mx-2 border-0 rounded-2 shadow-lg text-light fs-2 fw-bold vrhouse"
                onclick="window.location.href = '/adminInquiries/Vrhouse'"><i class="bi bi-house-door-fill me-2"></i>VR
                House</button>
            <button class="col btn btn-primary p-3 mx-2 border-0 rounded-2 shadow-lg text-light fs-2 fw-bold 22hrs"
                onclick="window.location.href = '/adminInquiries/AmacananVrhouse'"><i
                    class="bi bi-houses-fill me-2"></i>Amacan & VR House</button>
        </div>

        <h1 class="fw-bold"><i class="bi bi-houses-fill me-2"></i>Amacan & VR House</h1>
        <div class="table-responsive">
            <table class="container table table-hover border border-secondary">
                <thead class="table-warning text-dark" style="font-size: 12px">
                    <tr>
                        <th>ID</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Contact Number</th>
                        <th>Room</th>
                        <th>Quantity</th>
                        <th>Preferred Date</th>
                        <th>Session</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Code</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="text-dark" style="font-size: 12px">
                    <?php foreach ($amacanvrInquiries as $inquiry): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($inquiry['id']); ?></td>
                            <td><?php echo htmlspecialchars($inquiry['full_name']); ?></td>
                            <td><?php echo htmlspecialchars($inquiry['email']); ?></td>
                            <td><?php echo htmlspecialchars($inquiry['contact_number']); ?></td>
                            <td><?php echo htmlspecialchars($inquiry['room']); ?></td>
                            <td><?php echo htmlspecialchars($inquiry['quantity']); ?></td>
                            <td><?php echo htmlspecialchars($inquiry['preferred_date']); ?></td>
                            <td><?php echo htmlspecialchars($inquiry['session']); ?></td>
                            <td><?php echo htmlspecialchars($inquiry['price']); ?></td>
                            <td><?php echo htmlspecialchars($inquiry['status']); ?></td>
                            <td><?php echo htmlspecialchars($inquiry['code']); ?></td>
                            <td>
                                <form action="/adminInquiries/AmacananVrhouse" method="POST" style="display:inline;">
                                    <input type="hidden" name="id" value="<?php echo htmlspecialchars($inquiry['id']); ?>">
                                    <input type="hidden" name="action" value="accept">
                                    <button class="btn btn-success btn-sm" style="font-size: 12px" type="submit">
                                        Accept
                                    </button>
                                </form>
                                <form action="/adminInquiries/AmacananVrhouse" method="POST" style="display:inline;">
                                    <input type="hidden" name="id" value="<?php echo htmlspecialchars($inquiry['id']); ?>">
                                    <input type="hidden" name="action" value="decline">
                                    <button class="btn btn-danger btn-sm" style="font-size: 12px" type="submit">
                                        Decline
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>