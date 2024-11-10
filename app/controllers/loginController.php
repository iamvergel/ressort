<?php
session_start(); // Start the session

require_once('../models/loginModel.php');
require_once('../../configuration/dbConnection.php');

class LoginController {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo; // Assign PDO connection to class property
    }

    public function login() {
        // Handle only POST requests for AJAX login
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                // Get raw POST data (JSON)
                $inputData = json_decode(file_get_contents('php://input'), true);

                // Validate incoming data
                $username = isset($inputData['username']) ? trim($inputData['username']) : '';
                $password = isset($inputData['password']) ? $inputData['password'] : '';

                // Check if username and password are provided
                if (empty($username) || empty($password)) {
                    throw new Exception('Username and Password are required');
                }

                // Initialize the user model and validate credentials
                $userModel = new User($this->pdo);
                $user = $userModel->validate($username, $password);

                // Check if user exists and password matches
                if ($user) {
                    // Check if the user is verified
                    if ($user['verified'] == 0) {
                        // If not verified, send error message
                        http_response_code(403); // Forbidden
                        echo json_encode(['message' => 'Account not verified. Please check your email for the verification code.']);
                        exit();
                    }

                    // Regenerate session ID to prevent session fixation attacks
                    session_regenerate_id(true);

                    // Store user info in session
                    $_SESSION['user'] = $user['username'];
                    $_SESSION['email'] = $user['email'];

                    // Send JSON response for successful login
                    echo json_encode(['message' => 'Login successful']);
                    exit();
                } else {
                    // Authentication failed, send error message
                    http_response_code(401); // Unauthorized
                    echo json_encode(['message' => 'Invalid username or password']);
                    exit();
                }
            } catch (Exception $e) {
                http_response_code(500); // Internal Server Error
                echo json_encode(['message' => 'An error occurred: ' . $e->getMessage()]);
                exit();
            }
        } else {
            http_response_code(405); // Method Not Allowed
            echo json_encode(['message' => 'Method Not Allowed']);
            exit();
        }
    }
}

// Instantiate the LoginController and call the login method
$loginController = new LoginController($pdo);
$loginController->login();
