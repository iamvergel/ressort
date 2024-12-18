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

// Fetch all accepredinquiries 
$stmt = $pdo->prepare("SELECT * FROM inquiries WHERE status = 'declined'"); //AND room = 'pending'
$stmt->execute();
$amacanvrInquiries = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $action = $_POST['action'];

    if ($action === 'retrieve') {

        $sql = "UPDATE inquiries SET status = 'pending' WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);
    }

    header('Location: /DeclinedInquiries'); // Change this to your desired redirect
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

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Bootstrap Icons CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css">

    <!-- Google Fonts Poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

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

        <div class="container-fluid" style="height: 100vh;">
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
                                    <td style="background-color: <?php echo $inquiry['status'] === 'paid' ? '#d4edda' : 'transparent'; ?>;">
                                        <?php echo htmlspecialchars($inquiry['status']); ?>
                                    </td>
                                    <td><?php echo htmlspecialchars($inquiry['code']); ?></td>
                                    <td>
                                        <form action="/DeclinedInquiries" method="POST" style="display:inline;">
                                            <input type="hidden" name="id" value="<?php echo htmlspecialchars($inquiry['id']); ?>">
                                            <input type="hidden" name="action" value="retrieve">
                                            <button class="btn btn-danger btn-sm" style="font-size: 12px" type="submit">Retrieve</button>
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

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- jQuery JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- DataTable JS -->
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

</body>

</html>
