<?php
require_once('../models/userModel.php');
require_once(dirname(__DIR__, 2) . '/configuration/dbConnection.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/phpmailer/phpmailer/src/Exception.php';
require '../vendor/phpmailer/phpmailer/src/PHPMailer.php';

class ResendVerificationController
{
    private $pdo;
    private $userModel;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
        $this->userModel = new User($this->pdo);
    }

    public function resendVerification()
    {
        // Ensure the correct response type is returned
        header('Content-Type: application/json');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                // Get raw POST data (JSON)
                $inputData = json_decode(file_get_contents('php://input'), true);
                error_log("Received data: " . print_r($inputData, true)); // Log the received input

                // Validate incoming data
                $email = isset($inputData['email']) ? trim($inputData['email']) : '';

                if (empty($email)) {
                    throw new Exception('Email is required.');
                }

                // Check if the email exists in the database
                $stmt = $this->pdo->prepare("SELECT * FROM users_account WHERE email = ?");
                $stmt->execute([$email]);
                $user = $stmt->fetch();

                if (!$user) {
                    throw new Exception('User not found.');
                }

                // Check if the user is already verified
                if ($user['verified'] == 1) {
                    throw new Exception('Account already verified.');
                }

                // Generate a new verification code
                $verificationCode = rand(100000, 999999);

                // Update the verification code in the database
                $stmt = $this->pdo->prepare('UPDATE users_account SET verification_code = ? WHERE email = ?');
                $stmt->execute([$verificationCode, $email]);

                if ($stmt->rowCount() === 0) {
                    throw new Exception('Failed to update the verification code in the database.');
                }

                // Send the new verification code via email
                $this->sendVerificationCodeEmail($email, $user['name'], $verificationCode);

                echo json_encode(['message' => 'Verification code has been resent. Please check your email.']);
                exit();
            } catch (Exception $e) {
                // Log the exception message
                error_log("Error occurred: " . $e->getMessage());

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
            $mail->Password = 'jyjkgvcolmlxaogk'; // Use environment variables in production!
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            // Recipients
            $mail->setFrom('villareyesfamilyprivateresort@gmail.com', 'Villa Reyes Resort');
            $mail->addAddress($email, $name);

            // Content
            $mail->isHTML(true);
            $mail->Subject = 'Your New Verification Code - Villa Reyes Resort';

            $mail->Body = "
            <html>
                <body>
                    <h3>Hello $name,</h3>
                    <p>Your new verification code is:</p>
                    <h2><strong>$verificationCode</strong></h2>
                    <p>Please enter this code on the website to complete your account verification.</p>
                </body>
            </html>";

            // Send email
            if (!$mail->send()) {
                error_log("Error sending email: {$mail->ErrorInfo}");
                throw new Exception("Failed to send the verification email: " . $mail->ErrorInfo);
            }
        } catch (Exception $e) {
            // Capture and log PHPMailer's internal error if any
            error_log("PHPMailer error: {$e->getMessage()}");
            throw new Exception("Failed to send the verification email.");
        }
    }
}

// Instantiate the ResendVerificationController and call the resendVerification method
$resendVerificationController = new ResendVerificationController($pdo);
$resendVerificationController->resendVerification();
