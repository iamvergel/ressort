<?php
require_once(__DIR__ . '/../models/loginModel.php');

class LoginController {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo; // Assign PDO connection to class property
    }

    public function login() {
        session_start(); // Start the session

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $userModel = new User($this->pdo);
            $user = $userModel->validate($username, $password);

            if ($user) {
                $_SESSION['user'] = $user['username']; // Store username in session
                header('Location: /dashboard'); // Redirect to the dashboard
                exit();
            } else {
                $_SESSION['alert'] = "Username and Password is not Correct"; // Set alert message
                header('Location: /admin'); // Redirect back to login
                exit();
            }
        }
    }
}
