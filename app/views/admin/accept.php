<?php
require_once(dirname(__DIR__, 3) . '/configuration/dbConnection.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require '../../vendor/phpmailer/phpmailer/src/Exception.php';
require '../../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../../vendor/phpmailer/phpmailer/src/SMTP.php';

session_start();

// Check if user is authorized
if (!isset($_SESSION['user'])) {
    echo json_encode(['success' => false, 'message' => 'Unauthorized']);
    exit();
}

// Decode the incoming JSON data
$data = json_decode(file_get_contents("php://input"), true);
$id = $data['id'];

// Begin transaction
$pdo->beginTransaction();

try {
    // Fetch the inquiry details
    $stmt = $pdo->prepare("SELECT * FROM inquiries_amacan WHERE id = ?");
    $stmt->execute([$id]);
    $inquiry = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$inquiry) {
        throw new Exception("Inquiry not found");
    }

    // Check if the email already exists in accepted_inquiries
    $emailCheckStmt = $pdo->prepare("SELECT COUNT(*) FROM accepted_inquiries WHERE email = ?");
    $emailCheckStmt->execute([$inquiry['email']]);
    $emailExists = $emailCheckStmt->fetchColumn() > 0;

    if ($emailExists) {
        throw new Exception("Email already exists in accepted inquiries.");
    }

    // Insert into accepted_inquiries
    $insertStmt = $pdo->prepare("INSERT INTO accepted_inquiries (full_name, email, contact_number, room, quantity, amenities, preferred_date, session, amenities_quantity, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $insertStmt->execute([
        $inquiry['full_name'],
        $inquiry['email'],
        $inquiry['contact_number'],
        $inquiry['room'],
        $inquiry['quantity'],
        $inquiry['amenities'],
        $inquiry['preferred_date'],
        $inquiry['session'],
        $inquiry['amenities_quantity'],
        $inquiry['status']
    ]);

    // Update the original inquiry status to 'accepted'
    $updateStmt = $pdo->prepare("UPDATE inquiries_amacan SET status = 'accepted' WHERE id = ?");
    $updateStmt->execute([$id]);

    // Commit transaction
    $pdo->commit();
    echo json_encode(['success' => true]);

    // Setup PHPMailer
    $mail = new PHPMailer(true);
    try {
        // Server settings
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth = true;                                   //Enable SMTP authentication
        $mail->Username = 'villareyesfamilyprivateresort@gmail.com';                     //SMTP username
        $mail->Password = 'jyjkgvcolmlxaogk';                               //SMTP password
        $mail->SMTPSecure = "tls";
        $mail->Port = 587; 
        // Recipients
        $mail->setFrom('villareyesfamilyprivateresort@gmail.com', "Villa Reyes Family Private Resort");
        $mail->addAddress($inquiry['email']);

        $name = $inquiry['full_name'];
        $arrivalDate = $inquiry['preferred_date'];
        $session = $inquiry['session'];
        $numGuests = $inquiry['quantity']; 
        $code = uniqid('VRFPR'); 
        $room = $inquiry['room'];

        // Content
        $mail->isHTML(true);  // Set email format to HTML
        $mail->Subject = 'Your Reservation at Villa Reyes Family Private Resort is Confirmed!';
        $mail->Body = "
            Dear $name, <br/><br/>
            This email confirms your reservation at Villa Reyes Family Private Resort for <strong>$arrivalDate</strong>. 
            We are excited to welcome you to our beautiful resort!<br/><br/>
            
            <strong>Booking Details:</strong><br/>
            - Arrival Date: $arrivalDate<br/>
            - Session: $session<br/>
            - Number of Guests: $numGuests<br/>
            - Room Type: $room<br/>
            - Confirmation Number: $code<br/><br/>
            
            <strong>Next Steps:</strong><br/>
            - Payment: Please make the full payment by [Date]. You can pay through [Payment Methods].<br/>
            - Check-in: Check-in starts at [Time] on your arrival date.<br/>
            - Contact: If you have any questions, contact us at [Phone Number] or [Email Address].<br/><br/>
            
            We look forward to providing you with a memorable stay.<br/><br/>
            
            Sincerely,<br/>
            The Villa Reyes Family Private Resort Team
        ";

        $mail->AltBody = "Dear $email, your reservation at Villa Reyes Family Private Resort for $arrivalDate is confirmed. Please check the email for further details.";

        // Send email
        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        // Log error or handle it accordingly
        error_log("Mailer Error: {$mail->ErrorInfo}");
        echo json_encode(['success' => false, 'message' => 'Email could not be sent.']);
    }

} catch (Exception $e) {
    // Rollback transaction in case of error
    $pdo->rollBack();
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}
