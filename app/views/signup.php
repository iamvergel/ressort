<?php
session_start(); // Start the session

// Check if the user is already logged in
if (isset($_SESSION['user'])) {
    header('Location: /dashboard'); // Redirect to the dashboard if logged in
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - Villa Reyes Resort</title>
    <link rel="shortcut icon" href="/public/assets/images/logo/villaresortlogo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css">
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

        #background-video {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            /* Ensures the video covers the entire background */
            z-index: -1;
            /* Keeps the video behind the content */
        }
    </style>
</head>

<body>
    <?php include 'app/include/navigation.php'; ?>

    <div class="signup">
        <!-- Video background -->
        <video autoplay muted loop id="background-video" class="z-1">
            <source src="public/assets/video/video4.mp4" type="video/mp4">
            <!-- Add additional video formats for compatibility if needed -->
            <source src="your-video-url.ogv" type="video/ogg">
            <source src="your-video-url.webm" type="video/webm">
            Your browser does not support the video tag.
        </video>

        <!-- Content -->
        <div
            class="p-2 lg-p-5 d-flex justify-content-center position-absolute w-100 h-100 align-items-center bg-dark bg-opacity-75 z-2 overflow-hidden">
            <div class="container mt-5">
                <div class="row justify-content-center">
                    <button onclick="window.location.href = '/signin'">back</button>
                    <div class="col-12 col-lg-6 col-xl-10 p-2 shadow-lg bg-light rounded-4 my-5 d-flex justify-content-center">
                        <img src="public/assets/images/logo/villaresortlogo.jpg" alt="logo" height="150px" class="m-4 ">
                        <form id="signupForm" class="p-5 w-50">
                            <div class="form-group mt-2">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control border border-dark" id="email" name="email" required>
                            </div>
                            <div class="form-group mt-2">
                                <label for="name">Full Name:</label>
                                <input type="text" class="form-control border border-dark" id="name" name="name" required>
                            </div>
                            <div class="form-group mt-2">
                                <label for="username">Username:</label>
                                <input type="text" class="form-control border border-dark" id="username" name="username" required>
                            </div>
                            <div class="form-group mt-2">
                                <label for="password">Password:</label>
                                <input type="password" class="form-control border border-dark" id="password" name="password" required>
                            </div>
                            <div class="form-group mt-2">
                                <label for="phone">Telephone Number:</label>
                                <input type="tel" class="form-control border border-dark" id="phone" name="phone" required>
                            </div>
                            <div class="form-group mt-2">
                                <label for="address">Street Address:</label>
                                <textarea class="form-control border border-dark" id="address" name="address" rows="4" required></textarea>
                            </div>
                            <p id="alertMessage" class="text-danger"></p>
                            <button type="submit" class="btn btn-primary fw-bold mt-3">Sign Up</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('signupForm').addEventListener('submit', async function (event) {
            event.preventDefault(); // Prevent the default form submission

            const email = document.getElementById('email').value;
            const name = document.getElementById('name').value;
            const username = document.getElementById('username').value;
            const password = document.getElementById('password').value;
            const phone = document.getElementById('phone').value;
            const address = document.getElementById('address').value;

            const alertMessageElement = document.getElementById('alertMessage');
            alertMessageElement.textContent = "Signing up...";

            try {
                const response = await fetch('/app/controllers/signupController.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        email: email,
                        name: name,
                        username: username,
                        password: password,
                        phone: phone,
                        address: address
                    }),
                });

                const result = await response.text(); // Get the raw response text
                console.log(result);  // Log the raw result to see the actual response

                // Try to parse the response as JSON
                const jsonResult = JSON.parse(result);
                if (response.ok) {
                    alertMessageElement.textContent = 'Account created successfully!';
                    window.location.href = '/signin'; // Redirect to login
                } else {
                    alertMessageElement.textContent = jsonResult.message || 'An error occurred. Please try again.';
                }
            } catch (error) {
                alertMessageElement.textContent = "An error occurred. Please try again.";
                console.error("Signup Error:", error);
            }
        });

    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>