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
            scrollbar-width: thin;
        }

        #background {
            background-image: url("https://github.com/Manjares360/villareyesimage/blob/main/ameneties/photo_2024-10-29_15-31-59.jpg?raw=true");
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            position: relative;
        }

        #background::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: #00000093;
            z-index: -1;
        }
    </style>
</head>

<body>
    <?php include 'app/include/navigation.php'; ?>

    <div class="signup">
        <!-- Content -->
        <div class="d-flex justify-content-center align-items-center position-absolute shadow-lg w-100 py-5 py-lg-0 align-items-center z-2"
            id="background">
            <div class="container mt-5">
                <div class="">
                    <div class="p-5 shadow-lg bg-light rounded-4 my-5">
                        <button onclick="window.location.href = '/signin'"
                            class="position-absolute px-3 rounded-5 border-0 btn btn-primary shadow"><i
                                class="bi bi-backspace-fill me-2"></i>Back</button>
                        <h2 class="text-center mb-4 fw-bold">Create Your Account</h2>
                        <div class="alert alert-info p-0" role="alert" style="font-size: 14px">
                            <img src="public/assets/images/logo/villaresortlogo.png" alt="logo" height="80px"
                                class="me-3">
                            <strong>Note:</strong> Please ensure you enter the correct credentials when signing up to
                            avoid any issues with your account creation.
                        </div>
                        <form id="signupForm" class="p-5 px-4">
                            <div class="row">
                                <div class="col-12 col-lg-6">
                                    <div class="form-group mt-2">
                                        <label for="name">Full Name:</label>
                                        <input type="text" class="form-control border border-dark" id="name" name="name"
                                            required>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label for="phone">Telephone Number:</label>
                                        <input type="tel" class="form-control border border-dark" id="phone"
                                            name="phone" required>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label for="address">Street Address:</label>
                                        <textarea class="form-control border border-dark" id="address" name="address"
                                            rows="4" required></textarea>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="form-group mt-2">
                                        <label for="email">Email:</label>
                                        <input type="email" class="form-control border border-dark" id="email"
                                            name="email" required>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label for="username">Username:</label>
                                        <input type="text" class="form-control border border-dark" id="username"
                                            name="username" required>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label for="password">Password:</label>
                                        <input type="password" class="form-control border border-dark" id="password"
                                            name="password" required>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label for="password2">Confirm Password:</label>
                                        <input type="password" class="form-control border border-dark" id="password2"
                                            name="password2" required>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="showPassword" class="form-check-label">
                                            <input type="checkbox" id="showPassword" class="form-check-input">
                                            Show Password
                                        </label>
                                    </div>
                                    <div class="form-group mt-2">
                                        <button type="submit" class="btn btn-primary w-100 fw-bold mt-3">Sign
                                            Up</button>
                                    </div>
                                    <div id="alertMessage" class="alert alert-danger p-2 mt-3 d-none" role="alert">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Verification Code Modal -->
    <div class="modal" id="verificationModal" tabindex="-1" aria-labelledby="verificationModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="verificationModalLabel">Enter Verification Code</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="text" id="verificationCode" class="form-control" placeholder="Enter 6-digit code"
                        required>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" id="verifyBtn" class="btn btn-primary">Verify</button>
                </div>
            </div>
        </div>
    </div>

    <div id="loader"
        class="d-none position-fixed top-0 left-0 w-100 h-100 bg-dark bg-opacity-50 d-flex justify-content-center align-items-center z-3">
        <div class="spinner-border text-light" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>


    <script>
        // Toggle password visibility
        document.getElementById('showPassword').addEventListener('change', function () {
            const passwordField = document.getElementById('password');
            const confirmPasswordField = document.getElementById('password2');
            if (this.checked) {
                passwordField.type = 'text';
                confirmPasswordField.type = 'text';
            } else {
                passwordField.type = 'password';
                confirmPasswordField.type = 'password';
            }
        });

        // Form validation
        // Form validation
        document.getElementById('signupForm').addEventListener('submit', async function (event) {
            event.preventDefault(); // Prevent the default form submission

            const email = document.getElementById('email').value;
            const name = document.getElementById('name').value;
            const username = document.getElementById('username').value;
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('password2').value;
            const phone = document.getElementById('phone').value;
            const address = document.getElementById('address').value;

            const alertMessageElement = document.getElementById('alertMessage');
            alertMessageElement.textContent = "Signing up...";

            // Initially hide the alert before setting a message
            alertMessageElement.classList.add('d-none'); // Hide the alert initially

            // Validate email to ensure it's a Gmail address
            const emailPattern = /^[a-zA-Z0-9._%+-]+@gmail\.com$/;
            if (!emailPattern.test(email)) {
                alertMessageElement.textContent = 'Please enter a valid Gmail address (e.g., example@gmail.com).';
                alertMessageElement.classList.remove('d-none'); // Show alert
                return;
            }

            // Check password validity (8 characters, 1 uppercase, 1 special character including _)
            const passwordPattern = /^(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*_-])[A-Za-z\d!@#$%^&*_-]{8,}$/;
            if (!passwordPattern.test(password)) {
                alertMessageElement.textContent = 'Password must be at least 8 characters long, contain at least one uppercase letter, and one special character (including _, !, @, #, $, etc.).';
                alertMessageElement.classList.remove('d-none'); // Show alert
                return;
            }

            // Check if passwords match
            if (password !== confirmPassword) {
                alertMessageElement.textContent = 'Passwords do not match.';
                alertMessageElement.classList.remove('d-none'); // Show alert
                return;
            }

            try {
                // Show the loader before sending the request
                document.getElementById('loader').classList.remove('d-none');

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
                    // Hide the loader after response and show verification modal
                    document.getElementById('loader').classList.add('d-none');

                    // Show the verification modal
                    const modal = new bootstrap.Modal(document.getElementById('verificationModal'));
                    modal.show();
                } else {
                    // Hide the loader and show error alert
                    document.getElementById('loader').classList.add('d-none');
                    alertMessageElement.textContent = jsonResult.message || 'An error occurred. Please try again.';
                    alertMessageElement.classList.remove('d-none'); // Show error alert
                }
            } catch (error) {
                // Hide the loader and show error alert
                document.getElementById('loader').classList.add('d-none');
                alertMessageElement.textContent = "An error occurred. Please try again.";
                alertMessageElement.classList.remove('d-none'); // Show error alert
                console.error("Signup Error:", error);
            }
        });


        document.getElementById('verifyBtn').addEventListener('click', async function () {
            const verificationCode = document.getElementById('verificationCode').value;
            const email = document.getElementById('email').value; // Ensure email is accessible on the page

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
                if (result.success) {
                    alert('Account verified successfully!');
                    window.location.href = '/signin'; // Redirect to login page
                } else {
                    alert(result.message); // Show error message
                }
            } catch (error) {
                alert('Verification failed. Please try again.');
            }
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>