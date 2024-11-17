<?php
require_once(dirname(__DIR__, 3) . '/configuration/dbConnection.php');

session_start(); // Start the session

// Check if the user is logged in
if (!isset($_SESSION['user'])) {
    header('Location: /login'); // Redirect to the login page if not logged in
    exit();
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require (dirname(__DIR__, 2) . '/vendor/phpmailer/phpmailer/src/Exception.php');
require (dirname(__DIR__, 2) . '/vendor/phpmailer/phpmailer/src/PHPMailer.php');
require (dirname(__DIR__, 2) . '/vendor/phpmailer/phpmailer/src/SMTP.php');
// Fetch all accepted inquiries
$stmt = $pdo->prepare("SELECT * FROM accepted_inquiries WHERE status = 'accepted'");
$stmt->execute();
$amacanvrInquiries = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $action = $_POST['action'];

    if ($action === 'paid') {
        // Update the status to 'paid' in the database
        $sql = "UPDATE accepted_inquiries SET status = 'paid' WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);

        // Fetch the updated inquiry to get details for the email
        $stmt = $pdo->prepare("SELECT * FROM accepted_inquiries WHERE id = ?");
        $stmt->execute([$id]);
        $inquiry = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($inquiry) {
            // Send an email using PHPMailer
            try {
                // Setup PHPMailer
                $mail = new PHPMailer(true);
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';  // Set the SMTP server to send through
                $mail->SMTPAuth = true;
                $mail->Username = 'villareyesfamilyprivateresort@gmail.com';  // Your email
                $mail->Password = 'jyjkgvcolmlxaogk';  // Your email password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;

                // Recipients
                $mail->setFrom('villareyesfamilyprivateresort@gmail.com', "Villa Reyes Family Private Resort");
                $mail->addAddress($inquiry['email']);  // Recipient's email

                $name = $inquiry['full_name'];
                $room = $inquiry['room'];

                // Email content
                $mail->isHTML(true);  // Set email format to HTML
                $mail->Subject = 'Your Reservation at Villa Reyes Family Private Resort is Fully Paid!';
                $mail->Body = "
                    Dear $name, <br/><br/>
                    We are pleased to inform you that your reservation for the <strong>$room</strong> at Villa Reyes Family Private Resort has been successfully confirmed. Your payment has been fully processed and completed.<br/>
                    You can now check your account to verify the payment status.<br/><br/>
                    If you have any questions or require further assistance, feel free to contact us. We are looking forward to welcoming you to our resort and providing you with a memorable experience!<br/><br/>
                    Sincerely,<br/>
                    The Villa Reyes Family Private Resort Team
                ";

                $mail->AltBody = "Dear $name, Your reservation in $room is confirmed. Please check your account to verify that you are fully paid. Thank you for choosing Villa Reyes Family Private Resort.";

                // Send email
                $mail->send();
                echo 'Message has been sent';
            } catch (Exception $e) {
                error_log("Mailer Error: {$mail->ErrorInfo}");
            }
        }
    }

    // Redirect to the same page after processing
    header('Location: /AcceptedInquiries'); 
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Villa Reyes Resort</title>
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

    <!-- DataTable CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">

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
    </style>
</head>

<body>
    <?php include 'app/views/admin/adminInclude/header-top.php'; ?>
    <div class="d-flex">
        <?php include 'app/views/admin/adminInclude/sidebar.php'; ?>

        <div class="container-fluid" style="height: 100vh; overflow-y: scroll; scrollbar-width: none;">
            <?php include 'app/views/admin/adminInclude/header.php'; ?>
            <div class="content p-5">
                <h2 class="my-5 fw-bold"><i class="bi bi-people-fill me-2"></i>Accepted Inquiries</h2>

                <div class="table-responsive mt-5">
                    <table id="inquiriesTable" class="container table table-hover m-2 p-5">
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
                                <th>Payment Screenshot</th> <!-- New Column for Screenshot -->
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
                                    <td
                                        style="background-color: <?php echo $inquiry['status'] === 'paid' ? '#d4edda' : 'transparent'; ?>;">
                                        <?php echo htmlspecialchars($inquiry['status']); ?></td>
                                    <td><?php echo htmlspecialchars($inquiry['code']); ?></td>
                                    <!-- New Column for Payment Screenshot -->
                            <td>
                                            <?php if ($inquiry['payment_screenshot']): ?>
                                                <!-- Display the screenshot image and make it clickable -->
                                                <a href="/uploads/payment_screenshots/<?php echo htmlspecialchars($inquiry['payment_screenshot']); ?>"
                                                    target="_blank">
                                                    <img src="/uploads/payment_screenshots/<?php echo htmlspecialchars($inquiry['payment_screenshot']); ?>"
                                                        alt="Payment Screenshot"
                                                        style="width: 50px; height: 50px; object-fit: cover;">
                                                </a>
                                            <?php else: ?>
                                                <p>No screenshot</p>
                                            <?php endif; ?>
                                        </td>
                                    <td>
                                        <form action="/AcceptedInquiries" method="POST" style="display:inline;">
                                            <input type="hidden" name="id" value="<?php echo htmlspecialchars($inquiry['id']); ?>">
                                            <input type="hidden" name="action" value="paid">
                                            <button class="btn btn-success btn-sm" style="font-size: 12px" type="submit">
                                                Paid
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Include jQuery and DataTables JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#inquiriesTable').DataTable({
                "paging": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "lengthChange": true
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
