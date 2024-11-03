<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../app/vendor/phpmailer/phpmailer/src/Exception.php';
require '../app/vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../app/vendor/phpmailer/phpmailer/src/SMTP.php';

//Create an instance; passing `true` enables exceptions
if (isset($_POST["submit"])) {
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth = true;                                   //Enable SMTP authentication
        $mail->Username = 'villareyesfamilyprivateresort@gmail.com';                     //SMTP username
        $mail->Password = 'jyjkgvcolmlxaogk';                               //SMTP password
        $mail->SMTPSecure = "tls";
        $mail->Port = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('villareyesfamilyprivateresort@gmail.com', "pogi si gab");
        $mail->addAddress($email);     //Add a recipient

        //Attachments
        //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Your Reservation at Villa Reyes Family Private Resort is Confirmed!';
        $mail->Body = 'Deae $email, <br/> <br/>
        This email confirms your reservation at Villa Reyes Family Private Resort for [Dates of Stay]. We are so excited to welcome you to our beautiful resort!
 
Here are the details of your booking:
 
- Arrival Date: $arivaldate
- Session: $session
- Number of Guests: $numverofGuest
- Accommodation Type: $room
- Confirmation Number: $code
 
Next Steps:
 
- Payment: To secure your reservation, please make the full payment of [Amount] by [Date]. You can make payment through [Payment Methods: e.g., bank transfer, credit card, etc.]. [Provide any relevant payment instructions here, including account details.]
- Check-in: Check-in is at [Time] on your arrival date. Please arrive at the reception desk to complete the registration process.
- Contact Information: If you have any questions or need to reach us before your arrival, please feel free to contact us at [Phone Number] or [Email Address].
 
We look forward to welcoming you to Villa Reyes Family Private Resort and providing you with a memorable stay.
 
Sincerely,
 
The Team at Villa Reyes Family Private Resort';
        $mail->AltBody = 'joyce ann balik kana';

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}