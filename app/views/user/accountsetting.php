<?php
session_start(); // Start the session

// Check if the user is logged in
if (!isset($_SESSION['user'])) {
    header('Location: /signin'); // Redirect to the login page if not logged in
    exit();
}

// Include your database connection file
require_once('configuration/dbConnection.php');

// Get the logged-in user's email
$userEmail = $_SESSION['email'];

// Query for "My Inquiries" (where email matches the session email)
$queryMyInquiries = "SELECT * FROM inquiries WHERE email = :email AND status = 'pending'";
$stmtMyInquiries = $pdo->prepare($queryMyInquiries);
$stmtMyInquiries->execute(['email' => $userEmail]);
$myInquiries = $stmtMyInquiries->fetchAll(PDO::FETCH_ASSOC);

// Query for "Accepted Inquiries"
$queryAcceptedInquiries = "SELECT * FROM accepted_inquiries WHERE email = :email AND status = 'accepted'";
$stmtAcceptedInquiries = $pdo->prepare($queryAcceptedInquiries);
$stmtAcceptedInquiries->execute(['email' => $userEmail]);
$acceptedInquiries = $stmtAcceptedInquiries->fetchAll(PDO::FETCH_ASSOC);

// Query for "Paid Inquiries"
$queryPaidInquiries = "SELECT * FROM accepted_inquiries WHERE email = :email AND status = 'paid'";
$stmtPaidInquiries = $pdo->prepare($queryPaidInquiries);
$stmtPaidInquiries->execute(['email' => $userEmail]);
$paidInquiries = $stmtPaidInquiries->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Villa Reyes Resort</title>
    <link rel="shortcut icon" href="public/assets/images/logo/villaresortlogo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="public/assets/css/main.css">

    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">

</head>

<body>
    <!-- Navigation Bar -->
    <?php include 'app/views/user/include/header.php'; ?>

    <main class="overflow-hidden">
        <div class="bg-dark p-5">
            <div class="container-fluid mt-5 bg-light rounded-4 shadow-lg p-4 lg-p-5">
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <p><strong>Name :</strong> <?php echo $_SESSION['name']; ?></p>
                        <p><strong>Email :</strong> <?php echo $_SESSION['email']; ?></p>
                        <p><strong>Username :</strong> <?php echo $_SESSION['user']; ?></p>
                    </div>
                    <div class="col-12 col-lg-6">
                        <p><strong>Phone :</strong> <?php echo $_SESSION['phone']; ?></p>
                        <p><strong>Address :</strong> <?php echo $_SESSION['street_address']; ?></p>
                        <p class="text-success fw-bold"><strong>Status :</strong>
                            <?php echo $_SESSION['verified'] == 1 ? 'Verified' : 'Unverified'; ?></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <!-- Buttons to Toggle Tables -->
            <div class="mt-5">
                <div class="row">
                    <div class="col-12 col-lg-4">
                        <button class="btn btn-primary w-100" id="myInquiriesBtn">My Inquiries</button>
                    </div>
                    <div class="col-12 col-lg-4">
                        <button class="btn btn-success w-100 my-3 my-lg-0" id="acceptedInquiriesBtn">Accepted Inquiries</button>
                    </div>
                    <div class="col-12 col-lg-4">
                        <button class="btn btn-info w-100" id="paidInquiriesBtn">Paid Inquiries</button>
                    </div>
                </div>
            </div>

            <!-- My Inquiries Table -->
            <div id="myInquiriesTable" class="mt-5" style="display:block;">
                <h4 class="my-5">My Inquiries</h4>
                <div class="table-responsive mt-5">
                    <table id="myInquiriesDataTable" class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Preferred Date</th>
                                <th>Details</th>
                                <th>Booking Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($myInquiries as $inquiry): ?>
                                <tr>
                                    <td><?php echo $inquiry['id']; ?></td>
                                    <td><?php echo $inquiry['email']; ?></td>
                                    <td><?php echo $inquiry['status']; ?></td>
                                    <td><?php echo $inquiry['preferred_date']; ?></td>
                                    <td class="w-25">
                                        <?php
                                        // Get the session and check if it's AM or PM
                                        $session = $inquiry['session'];
                                        $tour = ($session == 'AM') ? 'Day Tour' : ($session == 'PM' ? 'Night Tour' : 'Unknown Session');
                                        echo 'Room : ' . $inquiry['room'] . '<br />' .
                                            'Quantity : ' . $inquiry['quantity'] . ' People' . '<br />' .
                                            'Session : ' . $tour;
                                        ?>
                                    </td>
                                    <td><?php echo $inquiry['created_at']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Accepted Inquiries Table -->
            <div id="acceptedInquiriesTable" class="mt-5" style="display:none;">
                <h4 class="my-5">Accepted Inquiries</h4>
                <div class="table-responsive mt-5">
                    <table id="acceptedInquiriesDataTable" class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Preferred Date</th>
                                <th>Details</th>
                                <th>Code</th>
                                <th>Price</th>
                                <th>Booking Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($acceptedInquiries as $inquiry): ?>
                                <tr>
                                    <td><?php echo $inquiry['id']; ?></td>
                                    <td><?php echo $inquiry['email']; ?></td>
                                    <td><?php echo $inquiry['status']; ?></td>
                                    <td><?php echo $inquiry['preferred_date']; ?></td>
                                    <td class="w-25">
                                        <?php
                                        // Get the session and check if it's AM or PM
                                        $session = $inquiry['session'];
                                        $tour = ($session == 'AM') ? 'Day Tour' : ($session == 'PM' ? 'Night Tour' : 'Unknown Session');
                                        echo 'Room : ' . $inquiry['room'] . '<br />' .
                                            'Quantity : ' . $inquiry['quantity'] . ' People' . '<br />' .
                                            'Session : ' . $tour;
                                        ?>
                                    </td>
                                    <td><?php echo $inquiry['code']; ?></td>
                                    <td>₱<?php echo $inquiry['price']; ?></td>
                                    <td><?php echo $inquiry['created_at']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Paid Inquiries Table -->
            <div id="paidInquiriesTable" class="mt-5" style="display:none;">
                <h4 class="my-5">Paid Inquiries</h4>
                <div class="table-responsive mt-5">
                    <table id="paidInquiriesDataTable" class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Preferred Date</th>
                                <th>Details</th>
                                <th>Code</th>
                                <th>Price</th>
                                <th>Booking Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($paidInquiries as $inquiry): ?>
                                <tr>
                                    <td><?php echo $inquiry['id']; ?></td>
                                    <td><?php echo $inquiry['email']; ?></td>
                                    <td><?php echo $inquiry['status']; ?></td>
                                    <td><?php echo $inquiry['preferred_date']; ?></td>
                                    <td class="w-25">
                                        <?php
                                        // Get the session and check if it's AM or PM
                                        $session = $inquiry['session'];
                                        $tour = ($session == 'AM') ? 'Day Tour' : ($session == 'PM' ? 'Night Tour' : 'Unknown Session');
                                        echo 'Room : ' . $inquiry['room'] . '<br />' .
                                            'Quantity : ' . $inquiry['quantity'] . ' People' . '<br />' .
                                            'Session : ' . $tour;
                                        ?>
                                    </td>
                                    <td><?php echo $inquiry['code']; ?></td>
                                    <td>₱<?php echo $inquiry['price']; ?></td>
                                    <td><?php echo $inquiry['created_at']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </main>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- DataTables JS -->
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

    <script>
        AOS.init();

        // Toggle visibility based on button clicks
        document.getElementById('myInquiriesBtn').addEventListener('click', function () {
            document.getElementById('myInquiriesTable').style.display = 'block';
            document.getElementById('acceptedInquiriesTable').style.display = 'none';
            document.getElementById('paidInquiriesTable').style.display = 'none';
        });

        document.getElementById('acceptedInquiriesBtn').addEventListener('click', function () {
            document.getElementById('myInquiriesTable').style.display = 'none';
            document.getElementById('acceptedInquiriesTable').style.display = 'block';
            document.getElementById('paidInquiriesTable').style.display = 'none';
        });

        document.getElementById('paidInquiriesBtn').addEventListener('click', function () {
            document.getElementById('myInquiriesTable').style.display = 'none';
            document.getElementById('acceptedInquiriesTable').style.display = 'none';
            document.getElementById('paidInquiriesTable').style.display = 'block';
        });

        // Initialize DataTables
        $(document).ready(function () {
            $('#myInquiriesDataTable').DataTable();
            $('#acceptedInquiriesDataTable').DataTable();
            $('#paidInquiriesDataTable').DataTable();
        });
    </script>

</body>

</html>