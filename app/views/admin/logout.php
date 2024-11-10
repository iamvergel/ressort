<?php
session_start(); // Start the session

// Unset specific session variables
unset($_SESSION['user']);
unset($_SESSION['alert']);

// Destroy the session
session_destroy();

// Redirect to the login page
session_start();
header('Location: /');
exit();