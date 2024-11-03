<?php
// Database connection details
// config.php
$host = 'localhost';
$db   = 'villareyes'; // Change to your database name
$user = 'root'; // Change to your MySQL username
$pass = ''; // Change to your MySQL password
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
    echo ""; // Success message
} catch (\PDOException $e) {
    // Handle connection error
    echo "Database connection failed: " . $e->getMessage();
    exit; // Stop further execution
}

// Further database operations can be performed here if connection is successful

