<?php
require_once(dirname(__DIR__, 3) . '/configuration/dbConnection.php');

session_start(); // Start the session

// Check if the user is logged in
if (!isset($_SESSION['user'])) {
    header('Location: /login'); // Redirect to the login page if not logged in
    exit();
}

// Fetch all accepted inquiries 
$stmt = $pdo->prepare("SELECT * FROM users_account");
$stmt->execute();
$amacanvrInquiries = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Update Verification Status (when form is submitted)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $status = $_POST['status']; // The verification status from the form

    // Update the user verification status
    $sql = "UPDATE users_account SET verified = ? WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$status, $id]);

    // Redirect back to the ManageAccount page after the update
    header('Location: /ManageAccount');
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
                                <th>Email</th>
                                <th>Fullname</th>
                                <th>Username</th>
                                <th>Contact No.</th>
                                <th>Adress</th>
                                <th>Status</th>
                                <th>Created at</th>
                                <th>Upadate at</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-dark" style="font-size: 12px">
                            <?php foreach ($amacanvrInquiries as $inquiry): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($inquiry['id']); ?></td>
                                    <td><?php echo htmlspecialchars($inquiry['email']); ?></td>
                                    <td><?php echo htmlspecialchars($inquiry['name']); ?></td>
                                    <td><?php echo htmlspecialchars($inquiry['username']); ?></td>
                                    <td><?php echo htmlspecialchars($inquiry['phone']); ?></td>
                                    <td><?php echo htmlspecialchars($inquiry['street_address']); ?></td>
                                    <td>
                                        <?php
                                        // Check if the 'verified' field is 1 (verified) or 0 (unverified)
                                        echo $inquiry['verified'] == 1 ? 'Verified' : 'Unverified';
                                        ?>
                                    </td>

                                    <td><?php echo htmlspecialchars($inquiry['created_at']); ?></td>
                                    <td><?php echo htmlspecialchars($inquiry['updated_at']); ?></td>

                                    <td>
                                        <!-- Edit Button -->
                                        <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editVerificationModal" data-id="<?php echo htmlspecialchars($inquiry['id']); ?>" data-status="<?php echo htmlspecialchars($inquiry['verified']); ?>" style="font-size: 12px">
                                            Edit
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Editing Verification Status -->
    <div class="modal fade" id="editVerificationModal" tabindex="-1" aria-labelledby="editVerificationModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editVerificationModalLabel">Edit Verification Status</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/ManageAccount" method="POST" id="verificationForm">
                        <input type="hidden" name="id" id="userId">
                        <div class="mb-3">
                            <label for="status" class="form-label">Verification Status</label>
                            <select class="form-select" id="status" name="status">
                                <option value="1">Verified</option>
                                <option value="0">Unverified</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Confirm Update</button>
                        <a href="/ManageAccount" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Include jQuery and DataTables JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>

    <script>
        $('#editVerificationModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // The button that triggered the modal
            var userId = button.data('id'); // Extract the user ID
            var status = button.data('status'); // Extract the verification status
            
            // Set the values in the modal form
            var modal = $(this);
            modal.find('#userId').val(userId);
            modal.find('#status').val(status);
        });

        $(document).ready(function () {
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