<?php
require_once(dirname(__DIR__, 3) . '/configuration/dbConnection.php');

session_start(); // Start the session

// Check if the user is logged in
if (!isset($_SESSION['user'])) {
    header('Location: /login'); // Redirect to the login page if not logged in
    exit();
}

// Fetch the number of inquiries for Amacan
$stmt = $pdo->prepare("SELECT COUNT(*) FROM inquiries WHERE room = 'Amacan' AND status = 'pending'");
$stmt->execute();
$amacanCount = $stmt->fetchColumn();

$stmt = $pdo->prepare("SELECT COUNT(*) FROM inquiries WHERE room = 'VR House'");
$stmt->execute();
$vrhouseCount = $stmt->fetchColumn();

$stmt = $pdo->prepare("SELECT COUNT(*) FROM inquiries WHERE room = 'Amacan & VR House'");
$stmt->execute();
$amacanvrhouseCount = $stmt->fetchColumn();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Villa Reyes Ressort</title>
    <link rel="shortcut icon" href="public\assets\images\logo\villaresortlogo.png" type="image/x-icon">

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
        }

        .card {
            transition: all 0.3s ease;
        }

        .card:hover {
            transform: scale(1.02);
        }
    </style>
</head>

<body>

    <div class="d-flex">
        <?php include 'app/views/admin/adminInclude/sidebar.php'; ?>

        <div class="container-fluid content">
            <?php include 'app/views/admin/adminInclude/header.php'; ?>

            <h2 class="my-5 fw-bold">Welcome, <?php echo htmlspecialchars($_SESSION['user']); ?>!</h2>

            <div class="w-100 row mt-5">
                <div class="col text-center py-5 bg-warning rounded-5 text-light shadow-lg mx-2 card">
                    <h3 class="fw-bold"><i class="bi bi-people-fill me-2"></i>Amacan Inquiries</h3>
                    <h2 class="fw-bold mt-3"><?php echo $amacanCount; ?></h2>
                </div>
                <div class="col text-center py-5 bg-success rounded-5 text-light shadow-lg mx-2 card">
                    <h3 class="fw-bold"><i class="bi bi-people-fill me-2"></i>VRHouse Inquiries</h3>
                    <h2 class="fw-bold mt-3"><?php echo $vrhouseCount; ?>
                        <h2>
                </div>

                <div class="col text-center py-5 bg-primary rounded-5 text-light shadow-lg mx-2 card">
                    <h3 class="fw-bold"><i class="bi bi-people-fill me-2"></i>22 Housrs Inquiries</h3>
                    <h2 class="fw-bold mt-3"><?php echo $amacanvrhouseCount; ?>
                        <h2>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>