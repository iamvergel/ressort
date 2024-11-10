<?php
require_once(dirname(__DIR__, 2) . '/configuration/dbConnection.php');

// Get the token from the URL
if (isset($_GET['token'])) {
    $token = $_GET['token'];

    // Check the database to see if the token exists and if it matches a user
    $stmt = $pdo->prepare("SELECT * FROM users_account WHERE token = ? AND confirmed = 0");
    $stmt->execute([$token]);
    $user = $stmt->fetch();

    if ($user) {
        // Token matches, mark the user as confirmed
        $stmt = $pdo->prepare("UPDATE users_account SET confirmed = 1, token = NULL WHERE id = ?");
        $stmt->execute([$user['id']]);

        echo 'Your email has been successfully confirmed! You can now <a href="/signin">log in</a>.';
    } else {
        echo 'Invalid or expired token!';
    }
} else {
    echo 'No token provided!';
}