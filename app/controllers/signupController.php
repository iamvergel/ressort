<?php
session_start(); // Start the session

require_once('../models/userModel.php');
require_once(dirname(__DIR__, 2) . '/configuration/dbConnection.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require '../vendor/phpmailer/phpmailer/src/Exception.php';
require '../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../vendor/phpmailer/phpmailer/src/SMTP.php';

class SignupController
{
    private $pdo;
    private $userModel;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
        $this->userModel = new User($this->pdo);
    }

    public function register()
    {
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

                // Generate a 6-digit verification code
                $verificationCode = rand(100000, 999999);

                // Insert the user data into the database (users_account table)
                $stmt = $this->pdo->prepare('INSERT INTO users_account (email, name, username, password_hash, phone, street_address, verified, verification_code) VALUES (?, ?, ?, ?, ?, ?, ?, ?)');
                $stmt->execute([$email, $name, $username, $passwordHash, $phone, $address, 0, $verificationCode]);

                // Send the verification code via email
                $this->sendVerificationCodeEmail($email, $name, $verificationCode);

                // Return success message
                echo json_encode(['message' => 'Signup successful. Please check your email for the verification code.']);
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

    private function sendVerificationCodeEmail($email, $name, $verificationCode)
    {
        // Set up PHPMailer to send the verification email
        $mail = new PHPMailer(true);
        try {
            // Server settings
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'villareyesfamilyprivateresort@gmail.com';
            $mail->Password = 'jyjkgvcolmlxaogk';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            // Recipients
            $mail->setFrom('villareyesfamilyprivateresort@gmail.com', 'Villa Reyes Resort');
            $mail->addAddress($email, $name);

            // Content
            $mail->isHTML(true);
            $mail->Subject = 'Your Verification Code - Villa Reyes Resort';

            $mail->Body = "
            <html>
                <body>
                    <h3>Hello $name,</h3>
                    <p>Thank you for signing up at Villa Reyes Resort. Your verification code is:</p>
                    <h2><strong>$verificationCode</strong></h2>
                    <p>Please enter this code on the website to complete your account verification.</p>
                    <p>If you did not sign up for this account, please ignore this email.</p>
                </body>
            </html>";

            // Send email
            $mail->send();
        } catch (Exception $e) {
            echo "Error sending email: {$mail->ErrorInfo}";
        }
    }
}

// Instantiate the SignupController and call the register method
$signupController = new SignupController($pdo);
$signupController->register();
