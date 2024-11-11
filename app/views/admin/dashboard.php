<?php
require_once(dirname(__DIR__, 3) . '/configuration/dbConnection.php');

session_start(); // Start the session

// Check if the user is logged in
if (!isset($_SESSION['user'])) {
    header('Location: /signin'); // Redirect to the login page if not logged in
    exit();
}

// Fetch the number of inquiries for Amacan
$stmt = $pdo->prepare("SELECT COUNT(*) FROM accepted_inquiries WHERE room = 'Amacan' AND status = 'accepted'");
$stmt->execute();
$amacanCountaccepted = $stmt->fetchColumn();

$stmt = $pdo->prepare("SELECT COUNT(*) FROM accepted_inquiries WHERE room = 'VR House' AND status = 'accepted'");
$stmt->execute();
$vrhouseCountaccepted = $stmt->fetchColumn();

$stmt = $pdo->prepare("SELECT COUNT(*) FROM accepted_inquiries WHERE room = 'Amacan & VR House' AND status = 'accepted'");
$stmt->execute();
$amacanvrhouseCountaccepted = $stmt->fetchColumn();

// Fetch the number of inquiries for Amacan
$stmt = $pdo->prepare("SELECT COUNT(*) FROM accepted_inquiries WHERE room = 'Amacan' AND status = 'paid'");
$stmt->execute();
$amacanCountpaid = $stmt->fetchColumn();

$stmt = $pdo->prepare("SELECT COUNT(*) FROM accepted_inquiries WHERE room = 'VR House' AND status = 'paid'");
$stmt->execute();
$vrhouseCountpaid = $stmt->fetchColumn();

$stmt = $pdo->prepare("SELECT COUNT(*) FROM accepted_inquiries WHERE room = 'Amacan & VR House' AND status = 'paid'");
$stmt->execute();
$amacanvrhouseCountpaid = $stmt->fetchColumn();

// Fetch the number of inquiries for Amacan
$stmt = $pdo->prepare("SELECT COUNT(*) FROM inquiries WHERE room = 'Amacan' AND status = 'pending'");
$stmt->execute();
$amacanCount = $stmt->fetchColumn();

$stmt = $pdo->prepare("SELECT COUNT(*) FROM inquiries WHERE room = 'VR House' AND status = 'pending'");
$stmt->execute();
$vrhouseCount = $stmt->fetchColumn();

$stmt = $pdo->prepare("SELECT COUNT(*) FROM inquiries WHERE room = 'Amacan & VR House' AND status = 'pending'");
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
            scrollbar-width: thin;
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
    <?php include 'app/views/admin/adminInclude/header-top.php'; ?>
    <div class="d-flex">
        <?php include 'app/views/admin/adminInclude/sidebar.php'; ?>

        <div class="container-fluid" style="height: 100vh; overflow-y: scroll; scrollbar-width: none;">
            <?php include 'app/views/admin/adminInclude/header.php'; ?>

            <div class="container">
            <div class="row mt-5">
                <h2 class="fw-bold">Inquiries</h2>
                <div class="row">
                    <div class="col text-center py-5 mx-2">
                        <div class="card bg-white text-light shadow-lg rounded-3 p-2">
                            <div class="card-header bg-warning">
                                <h4 class="mb-0 fw-bold"><i class="bi bi-people-fill me-2"></i>Amacan Inquiries</h4>
                            </div>
                            <div class="card-body text-end text-warning">
                                <h2 class="card-text fw-bold mt-3"><?php echo $amacanCount; ?></h2>
                            </div>
                        </div>
                    </div>

                    <div class="col text-center py-5 mx-2">
                        <div class="card bg-light text-light shadow-lg rounded-3 p-2">
                            <div class="card-header bg-success">
                                <h4 class="mb-0 fw-bold"><i class="bi bi-people-fill me-2"></i>VR House Inquiries</h4>
                            </div>
                            <div class="card-body text-success text-end">
                                <h2 class="card-text fw-bold mt-3"><?php echo $vrhouseCount; ?></h2>
                            </div>
                        </div>
                    </div>

                    <div class="col text-center py-5 mx-2">
                        <div class="card bg-light text-light shadow-lg rounded-3 p-2">
                            <div class="card-header bg-primary">
                                <h4 class="mb-0 fw-bold"><i class="bi bi-people-fill me-2"></i>Amacan & VR Houses
                                    Inquiries</h4>
                            </div>
                            <div class="card-body text-primary text-end">
                                <h2 class="card-text fw-bold mt-3"><?php echo $amacanvrhouseCount; ?></h2>
                            </div>
                        </div>
                    </div>
                </div>

                <h2 class="fw-bold">Accepted Inquiries</h2>
                <div class="col text-center py-5 mx-2">
                        <div class="card bg-white text-light shadow-lg rounded-3 p-2">
                            <div class="card-header bg-warning">
                                <h4 class="mb-0 fw-bold"><i class="bi bi-people-fill me-2"></i>Amacan Inquiries</h4>
                            </div>
                            <div class="card-body text-end text-warning">
                                <h2 class="card-text fw-bold mt-3"><?php echo $amacanCountaccepted; ?></h2>
                            </div>
                        </div>
                    </div>

                    <div class="col text-center py-5 mx-2">
                        <div class="card bg-light text-light shadow-lg rounded-3 p-2">
                            <div class="card-header bg-success">
                                <h4 class="mb-0 fw-bold"><i class="bi bi-people-fill me-2"></i>VR House Inquiries</h4>
                            </div>
                            <div class="card-body text-success text-end">
                                <h2 class="card-text fw-bold mt-3"><?php echo $vrhouseCountaccepted; ?></h2>
                            </div>
                        </div>
                    </div>

                    <div class="col text-center py-5 mx-2">
                        <div class="card bg-light text-light shadow-lg rounded-3 p-2">
                            <div class="card-header bg-primary">
                                <h4 class="mb-0 fw-bold"><i class="bi bi-people-fill me-2"></i>Amacan & VR Houses
                                    Inquiries</h4>
                            </div>
                            <div class="card-body text-primary text-end">
                                <h2 class="card-text fw-bold mt-3"><?php echo $amacanvrhouseCountaccepted; ?></h2>
                            </div>
                        </div>
                    </div>
                </div>

                <h2 class="fw-bold">Paid</h2>
                <div class="row">
                    <div class="col text-center py-5 mx-2">
                        <div class="card bg-white text-light shadow-lg rounded-3 p-2">
                            <div class="card-header bg-warning">
                                <h4 class="mb-0 fw-bold"><i class="bi bi-people-fill me-2"></i>Amacan Inquiries</h4>
                            </div>
                            <div class="card-body text-end text-warning">
                                <h2 class="card-text fw-bold mt-3"><?php echo $amacanCountpaid; ?></h2>
                            </div>
                        </div>
                    </div>

                    <div class="col text-center py-5 mx-2">
                        <div class="card bg-light text-light shadow-lg rounded-3 p-2">
                            <div class="card-header bg-success">
                                <h4 class="mb-0 fw-bold"><i class="bi bi-people-fill me-2"></i>VR House Inquiries</h4>
                            </div>
                            <div class="card-body text-success text-end">
                                <h2 class="card-text fw-bold mt-3"><?php echo $vrhouseCountpaid; ?></h2>
                            </div>
                        </div>
                    </div>

                    <div class="col text-center py-5 mx-2">
                        <div class="card bg-light text-light shadow-lg rounded-3 p-2">
                            <div class="card-header bg-primary">
                                <h4 class="mb-0 fw-bold"><i class="bi bi-people-fill me-2"></i>Amacan & VR Houses
                                    Inquiries</h4>
                            </div>
                            <div class="card-body text-primary text-end">
                                <h2 class="card-text fw-bold mt-3"><?php echo $amacanvrhouseCountpaid; ?></h2>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col-12 text-center">
                        <h3 class="fw-bold">Inquiries Overview</h3>
                        <canvas id="inquiriesChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const ctx = document.getElementById('inquiriesChart').getContext('2d');
        const inquiriesChart = new Chart(ctx, {
            type: 'line', // Change to 'line'
            data: {
                labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4'], // Example labels for weeks
                datasets: [
                    {
                        label: 'Amacan Inquiries',
                        data: [<?php echo $amacanCount; ?>, 5, 8, 3], // Replace with actual data points
                        borderColor: 'rgba(255, 193, 7, 1)',
                        backgroundColor: 'rgba(255, 193, 7, 0.6)',
                        fill: false,
                        tension: 0.1
                    },
                    {
                        label: 'VR House Inquiries',
                        data: [<?php echo $vrhouseCount; ?>, 7, 6, 9], // Replace with actual data points
                        borderColor: 'rgba(40, 167, 69, 1)',
                        backgroundColor: 'rgba(40, 167, 69, 0.6)',
                        fill: false,
                        tension: 0.1
                    },
                    {
                        label: 'Amacan & VR House Inquiries',
                        data: [<?php echo $amacanvrhouseCount; ?>, 10, 12, 15], // Replace with actual data points
                        borderColor: 'rgba(0, 123, 255, 1)',
                        backgroundColor: 'rgba(0, 123, 255, 0.6)',
                        fill: false,
                        tension: 0.1
                    }
                ]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Number of Inquiries'
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Weeks'
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: true,
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function (tooltipItem) {
                                return `${tooltipItem.dataset.label}: ${tooltipItem.raw}`;
                            }
                        }
                    }
                }
            }
        });
    </script>

</body>

</html>