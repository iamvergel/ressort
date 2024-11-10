<?php

// Include the controller and any necessary configuration
require_once(__DIR__ . '/../../controllers/loginController.php');
require_once(dirname(__DIR__, 3) . '/configuration/dbConnection.php');


// Initialize the controller with the PDO connection
$controller = new LoginController($pdo);
$controller->login(); // Process login if form is submitted

// Load the login view
require_once(__DIR__ . '/login.php');