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
    <title>Villa Reyes Ressort</title>
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
</head>

<body>
    <div class="container-fluid p-5 d-flex justify-content-center align-items-center">
        <div class="container p-5 shadow-lg">
            <h1 class="mt-5 mx-5 text-primary" style="font-weight: 900;"><i class="bi bi-person"></i>Login</h1>
            <form action="/app/views/admin/loginphp.php" method="POST" class="p-5">
                <!-- Ensure this points to your login processing script -->
                <div class="form-group mt-2">
                    <label for="username">Username:</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>
                <div class="form-group mt-2">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <?php if ($alert): ?>
                    <p class="text-danger"><?php echo $alert; ?></p>
                <?php endif; ?>
                <button type="submit" class="btn btn-primary fw-bold mt-3">Login</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>