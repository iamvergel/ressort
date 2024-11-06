<?php
session_start();
require_once('../models/userModel.php');
require_once('../../configuration/dbConnection.php');

class SignupController {
    private $pdo;
    private $userModel;

    public function __construct($pdo) {
        $this->pdo = $pdo;
        $this->userModel = new User($this->pdo); // Assuming you have a User model
    }

    public function register() {
        // Ensure the correct response type is returned
        header('Content-Type: application/json');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                // Get raw POST data (JSON)
                $inputData = json_decode(file_get_contents('php://input'), true);

                // Validate incoming data
                $email = isset($inputData['email']) ? trim($inputData['email']) : '';
                $name = isset($inputData['name']) ? trim($inputData['name']) : '';
                $username = isset($inputData['username']) ? trim($inputData['username']) : '';
                $password = isset($inputData['password']) ? $inputData['password'] : '';
                $phone = isset($inputData['phone']) ? trim($inputData['phone']) : '';
                $address = isset($inputData['address']) ? trim($inputData['address']) : '';

                // Basic validation
                if (empty($email) || empty($name) || empty($username) || empty($password) || empty($phone) || empty($address)) {
                    throw new Exception('All fields are required.');
                }

                // Check if the username or email already exists
                $existingUser = $this->userModel->validateEmailAndUsername($email, $username);

                if ($existingUser) {
                    throw new Exception('Username or email is already taken.');
                }

                // Hash the password
                $passwordHash = password_hash($password, PASSWORD_BCRYPT);

                // Insert the user data into the database (using users_account table)
                $stmt = $this->pdo->prepare('INSERT INTO users_account (email, name, username, password_hash, phone, street_address) VALUES (?, ?, ?, ?, ?, ?)');
                $stmt->execute([$email, $name, $username, $passwordHash, $phone, $address]);

                // Return success message
                echo json_encode(['message' => 'Signup successful']);
                exit();

            } catch (Exception $e) {
                // Return error message if something goes wrong
                http_response_code(400); // Bad Request
                echo json_encode(['message' => $e->getMessage()]);
                exit();
            }
        } else {
            // If the method is not POST, return Method Not Allowed
            http_response_code(405); // Method Not Allowed
            echo json_encode(['message' => 'Method Not Allowed']);
            exit();
        }
    }
}

// Instantiate the SignupController and call the register method
$signupController = new SignupController($pdo);
$signupController->register();
