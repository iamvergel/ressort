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
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2 class="mt-5">Login</h2>
        <form action="/app/views/admin/loginphp.php" method="POST"> <!-- Ensure this points to your login processing script -->
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <?php if ($alert): ?>
                <p class="text-danger"><?php echo $alert; ?></p>
            <?php endif; ?>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
</body>
</html>
