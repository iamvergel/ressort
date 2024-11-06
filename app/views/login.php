<?php
session_start(); // Start the session

// Check if the user is already logged in
if (isset($_SESSION['user'])) {
    header('Location: /dashboard'); // Redirect to the dashboard if logged in
    exit();
}

// Handle alert message if set
$alert = isset($_SESSION['alert']) ? $_SESSION['alert'] : '';
unset($_SESSION['alert']); // Unset alert after using it
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Villa Reyes Resort</title>
    <link rel="shortcut icon" href="/public/assets/images/logo/villaresortlogo.png" type="image/x-icon">
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

    <div class="signin">
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
            class="p-2 lg-p-5 d-flex justify-content-center position-absolute w-100 h-100 align-items-center bg-dark bg-opacity-75 z-2">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-6 col-xl-4 p-2 shadow-lg bg-light rounded-4 mt-5">
                        <img src="public/assets/images/logo/villaresortlogo.jpg" alt="logo" height="150px" class="m-4 ">
                        <form id="loginForm" class="p-5 px-4">
                            <div class="form-group mt-0">
                                <label for="username">Username:</label>
                                <input type="text" class="form-control border border-dark" id="username" name="username"
                                    required>
                            </div>
                            <div class="form-group mt-2">
                                <label for="password">Password:</label>
                                <input type="password" class="form-control border border-dark" id="password"
                                    name="password" required>
                                <a href="/forgotpassword" class="text-primary float-end">Forgot Password?</a>
                            </div>
                            <p id="alertMessage" class="text-danger mt-5"></p> <!-- Display error message here -->

                            <div class="d-flex justify-content-between align-items-center px-3 mt-5">
                                <button type="submit" class="btn btn-primary fw-bold px-5">Login</button>
                                <a href="/signup">Signup</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        document.getElementById('loginForm').addEventListener('submit', async function (event) {
            event.preventDefault(); // Prevent the default form submission

            const username = document.getElementById('username').value;
            const password = document.getElementById('password').value;

            // Display loading message or clear previous alerts
            const alertMessageElement = document.getElementById('alertMessage');
            alertMessageElement.textContent = "Logging in...";

            try {
                // Send login data via Fetch API
                const response = await fetch('/app/controllers/loginController.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        username: username,
                        password: password
                    }),
                });

                const result = await response.json(); // Parse the JSON response

                if (response.ok) {
                    // Successful login
                    // Redirect based on user role
                    if (result.role === 'admin') {
                        window.location.href = '/dashboard';  // Admin dashboard
                    } else {
                        window.location.href = '/dashboard';   // Regular user dashboard
                    }
                } else {
                    // Login failed
                    alertMessageElement.textContent = result.message || 'Username and password are incorrect';
                }
            } catch (error) {
                alertMessageElement.textContent = "An error occurred. Please try again.";
                console.error("Login Error:", error);  // Log the error for debugging
            }
        });

    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>