<?php
session_start();

if (isset($_SESSION['user'])) {
    header('Location: /dashboard');
    exit();
}

$alert = isset($_SESSION['alert']) ? $_SESSION['alert'] : '';
unset($_SESSION['alert']);
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
            z-index: -1;
        }
    </style>
</head>

<body>
    <?php include 'app/include/navigation.php'; ?>

    <div class="signin">
        <video autoplay muted loop id="background-video" class="z-1">
            <source src="public/assets/video/video4.mp4" type="video/mp4">
            <source src="your-video-url.ogv" type="video/ogg">
            <source src="your-video-url.webm" type="video/webm">
        </video>

        <div
            class="p-2 lg-p-5 d-flex justify-content-center position-absolute w-100 h-100 align-items-center bg-dark bg-opacity-75 z-2">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-6 col-xl-4 p-2 shadow-lg bg-light rounded-4 mt-5">
                        <img src="public/assets/images/logo/villaresortlogo.png" alt="logo" height="150px" class="m-4 ">
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

                            <div id="alertMessage" class="alert alert-danger p-2 mt-5 d-none" role="alert">
                            </div>

                            <div class="d-flex justify-content-between align-items-center px-3 mt-5">
                                <button type="submit" class="btn btn-primary fw-bold px-5">Login</button>
                                <a href="/signup">Signup</a>
                            </div>
                        </form>

                        <div class="alert alert-info p-3 mt-3 fs-6" role="alert">
                            <strong>Note:</strong> Please ensure that you already have an account before signing up. If
                            not, you can create a new account.
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal for Account Verification -->
        <div class="modal fade" id="verifyAccountModal" tabindex="-1" aria-labelledby="verifyAccountModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="verifyAccountModalLabel">Account Not Verified</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Your account has not been verified. Please check your email for the verification code.</p>
                        <p>Input Verification Code : </p>
                    </div>
                    <div class="modal-body">
                        <input type="email" class="form-control border border-dark" id="email" name="email" required>
                        <input type="text" id="verificationCode" class="form-control" placeholder="Enter 6-digit code"
                            required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" id="verifyBtn" class="btn btn-primary">Verify</button>
                        <button type="button" id="resendBtn" class="btn btn-link">Resend Verification Code</button>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script>
        document.getElementById('loginForm').addEventListener('submit', async function (event) {
            event.preventDefault();

            const username = document.getElementById('username').value;
            const password = document.getElementById('password').value;

            const alertMessageElement = document.getElementById('alertMessage');
            alertMessageElement.textContent = "Logging in...";

            try {
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

                const result = await response.json();

                if (response.ok) {
                    // Redirect to dashboard based on role
                    if (result.role === 'admin') {
                        window.location.href = '/dashboard';
                    } else {
                        window.location.href = '/dashboard';
                    }
                } else {
                    if (result.message === 'Account not verified. Please check your email for the verification code.') {
                        // Show the account verification modal if the account is not verified
                        const verifyAccountModal = new bootstrap.Modal(document.getElementById('verifyAccountModal'));
                        document.getElementById('email').value = result.email; // Set the email from the response
                        verifyAccountModal.show();
                    } else {
                        alertMessageElement.textContent = result.message || 'Username and password are incorrect';
                        alertMessageElement.classList.remove('d-none');
                    }
                }
            } catch (error) {
                alertMessageElement.textContent = "An error occurred. Please try again.";
                alertMessageElement.classList.remove('d-none');
                console.error("Login Error:", error);
            }
        });

        // Resend Verification Code functionality
        document.getElementById('resendBtn').addEventListener('click', async function () {
            const username = document.getElementById('username').value; // Get the username

            const modalAlertElement = document.getElementById('alertMessage');
            const verifyAccountModal = new bootstrap.Modal(document.getElementById('verifyAccountModal'));

            modalAlertElement.textContent = "Resending verification code...";
            modalAlertElement.classList.remove('d-none');

            try {
                const response = await fetch('/app/controllers/resendVerificationController.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        username: username
                    }),
                });

                const result = await response.json();

                if (response.ok) {
                    modalAlertElement.textContent = result.message || 'Verification code has been sent.';
                } else {
                    modalAlertElement.textContent = result.message || 'Failed to resend verification code.';
                }

                verifyAccountModal.show();
            } catch (error) {
                modalAlertElement.textContent = "An error occurred while resending the verification code.";
                console.error("Resend Verification Error:", error);
            }
        });


        document.getElementById('verifyBtn').addEventListener('click', async function () {
            const email = document.getElementById('email').value;
            const verificationCode = document.getElementById('verificationCode').value;

            const modalAlertElement = document.getElementById('alertMessage');
            const verifyAccountModal = new bootstrap.Modal(document.getElementById('verifyAccountModal'));

            try {
                const response = await fetch('/app/controllers/verifyCodeController.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        email: email,
                        verificationCode: verificationCode
                    }),
                });

                const result = await response.json();

                if (response.ok) {
                    if (result.success) {
                        modalAlertElement.textContent = result.message || 'Account successfully verified.';
                        modalAlertElement.classList.remove('d-none');

                        alert("Account successfully verified");
                        // Optionally close the modal after a successful verification
                        setTimeout(() => {
                            verifyAccountModal.hide();
                            window.location.href = '/signin'; // Redirect user
                        }, 500);
                    } else {
                        modalAlertElement.textContent = result.message || 'Verification failed.';
                        modalAlertElement.classList.remove('d-none');
                    }
                } else {
                    modalAlertElement.textContent = result.message || 'An error occurred during verification.';
                    modalAlertElement.classList.remove('d-none');
                }
            } catch (error) {
                console.error("Verification Error:", error);
                modalAlertElement.textContent = "An error occurred during verification.";
                modalAlertElement.classList.remove('d-none');
            }
        });

    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>