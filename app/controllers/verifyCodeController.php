<?php
require_once('../models/userModel.php');
require_once(dirname(__DIR__, 2) . '/configuration/dbConnection.php');

class VerifyCodeController
{
    private $pdo;
    private $userModel;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
        $this->userModel = new User($this->pdo);
    }

    public function verifyCode()
    {
        header('Content-Type: application/json');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                // Get raw POST data (JSON)
                $inputData = json_decode(file_get_contents('php://input'), true);

                // Validate incoming data
                $email = isset($inputData['email']) ? trim($inputData['email']) : '';
                $inputCode = isset($inputData['verificationCode']) ? $inputData['verificationCode'] : '';

                if (empty($email) || empty($inputCode)) {
                    throw new Exception('Email and verification code are required.');
                }

                // Retrieve the stored verification code from the database
                $stmt = $this->pdo->prepare("SELECT verification_code, verified FROM users_account WHERE email = ?");
                $stmt->execute([$email]);
                $user = $stmt->fetch(PDO::FETCH_ASSOC);

                if (!$user) {
                    throw new Exception('User not found.');
                }

                if ($user['verified'] == 1) {
                    throw new Exception('Account is already verified.');
                }

                $storedCode = $user['verification_code'];

                // Check if the input verification code matches the stored code
                if ($inputCode === $storedCode) {
                    // Update the user's verification status
                    $stmt = $this->pdo->prepare("UPDATE users_account SET verified = 1 WHERE email = ?");
                    $stmt->execute([$email]);

                    echo json_encode(['success' => true, 'message' => 'Account verified successfully.']);
                } else {
                    // Invalid verification code
                    echo json_encode(['success' => false, 'message' => 'Invalid verification code.']);
                }
            } catch (Exception $e) {
                // Return error message if something goes wrong
                http_response_code(400); // Bad Request
                echo json_encode(['success' => false, 'message' => $e->getMessage()]);
            }
        } else {
            // If the method is not POST, return Method Not Allowed
            http_response_code(405); // Method Not Allowed
            echo json_encode(['success' => false, 'message' => 'Method Not Allowed']);
        }
    }
}

// Instantiate the VerifyCodeController and call the verifyCode method
$verifyCodeController = new VerifyCodeController($pdo);
$verifyCodeController->verifyCode();
