<?php
session_start(); // Start the session

// Check if the user is logged in
if (!isset($_SESSION['user'])) {
    header('Location: /signin'); // Redirect to the login page if not logged in
    exit();
}
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


    <link rel="stylesheet" href="..\public\assets\css\room.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
</head>

<body>
    <!-- Navigation Bar -->
    <?php include 'app/views/user/include/header.php'; ?>

    <div class="room">
        <div class="header p-5 bg-dark">
            <div class="p-5 bg-dark">
            </div>
        </div>

        <div class="container amacan mt-5 p-5 bg-light rounded-4 shadow-lg">
            <div class="row">
                <div class="col-4 p-5 bg-light d-flex justify-content-center align-items-center rounded-4 shadow-lg">
                    <div class="amacanpicturecontainer">
                        <div class="amacanpicture rounded-3" onclick="window.location.href = '/Services'">
                        </div>
                        <button class="p-1 py-2 mt-5 border-0 text-uppercase fw-semibold" onclick="window.location.href = '/amacan'">Reserve now</button>
                    </div>
                </div>
                <div class="col-8 p-5 rounded-end description">
                    <h1 class="fw-bold text-uppercase">Amacan House</h1><br />

                    <div class="row">
                        <div class="col">
                            <h4 class="fw-bold text-uppercase">Weekdays</h4>
                            <p class="mt-3">Daytour <span class="fw-bold text-uppercase mx-2"> ₱8,000.00</span></p>
                            <p class="mt-3">Nighttour <span class="fw-bold text-uppercase mx-2">₱9,000.00</span></p>  
                        </div>
                        <div class="col">
                            <h4 class="fw-bold text-uppercase">Weekends</h4>
                            <p class="mt-3">Daytour <span class="fw-bold text-uppercase mx-2"> ₱9,000.00</span></p>
                            <p class="mt-3">Nighttour <span class="fw-bold text-uppercase mx-2">₱10,000.00</span></p>
                        </div>
                        <div class="col">
                        <h4 class="fw-bold text-uppercase">22 Hours</h4>
                        <small>(Amacan House & VR House)</small>
                        <p class="mt-3"><span class="fw-bold text-uppercase">₱1,000.00</span> perhead</p>
                        <p class="mt-1" style="font-size: 12px">(10 pax amacan house, 15 pax 2 houses will be given as accomodation)</p>
                        </div>
                    </div>

                    <p class="mt-4" style="font-size: 14px">Welcome to VRHouse, your ultimate virtual retreat nestled in the heart of digital nature. Perfectly designed to blend comfort and adventure, VRHouse is the ideal getaway for families, friends, or couples seeking an immersive escape into a serene digital landscape.</p>

                </div>
            </div>
        </div>

        <div class="container amacan mt-5 p-5 bg-light rounded-4 shadow-lg">
            <div class="row">
                <div class="col-4 p-5 bg-light d-flex justify-content-center align-items-center rounded-4 shadow-lg">
                    <div class="amacanpicturecontainer">
                        <div class="amacanpicture rounded-3" onclick="window.location.href = '/Services'">
                        </div>
                        <button class="p-1 py-2 mt-5 border-0 text-uppercase fw-semibold" onclick="window.location.href = '/vrhouse'">Reserve now</button>
                    </div>
                </div>
                <div class="col-8 p-5 rounded-end description">
                    <h1 class="fw-bold text-uppercase">VR House</h1><br />

                    <div class="row">
                        <div class="col">
                            <h4 class="fw-bold text-uppercase">Weekdays</h4>
                            <p class="mt-3">Daytour <span class="fw-bold text-uppercase mx-2"> ₱7,000.00</span></p>
                            <p class="mt-3">Nighttour <span class="fw-bold text-uppercase mx-2">₱8,000.00</span></p>  
                        </div>
                        <div class="col">
                            <h4 class="fw-bold text-uppercase">Weekends</h4>
                            <p class="mt-3">Daytour <span class="fw-bold text-uppercase mx-2"> ₱8,000.00</span></p>
                            <p class="mt-3">Nighttour <span class="fw-bold text-uppercase mx-2">₱9,000.00</span></p>
                        </div>
                        <div class="col">
                        <h4 class="fw-bold text-uppercase">22 Hours</h4>
                        <small>(Amacan House & VR House)</small>
                        <p class="mt-3"><span class="fw-bold text-uppercase">₱1,000.00</span> perhead</p>
                        <p class="mt-1" style="font-size: 12px">(10 pax amacan house, 15 pax 2 houses will be given as accomodation)</p>
                        </div>
                    </div>

                    <p class="mt-4" style="font-size: 14px">Welcome to Amacan House, your serene retreat nestled in the heart of nature. Perfectly situated
                        to provide a blend of comfort and adventure, Amacan House is the ideal getaway for families,
                        friends, or couples seeking a peaceful escape</p>

                </div>
            </div>
        </div>


        <!-- Contact -->
        <?php include 'app/views/contact.php'; ?>

        <?php include 'app/include/footer.php'; ?>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>
</body>

</html>