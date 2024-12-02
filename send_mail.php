<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'path/to/PHPMailer/src/Exception.php';
require 'path/to/PHPMailer/src/PHPMailer.php';
require 'path/to/PHPMailer/src/SMTP.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $message = htmlspecialchars($_POST['message']);

    $mail = new PHPMailer(true);
    try {
        // SMTP Configuration
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'your_email@gmail.com'; // Your Gmail address
        $mail->Password = 'your_password';       // Your Gmail password or App Password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Email Headers
        $mail->setFrom('your_email@gmail.com', 'Anonymous Reporter');
        $mail->addAddress('langamind@gmail.com');
        $mail->isHTML(true);
        $mail->Subject = 'Anonymous Whistleblow Report';
        $mail->Body = $message;

        $mail->send();
        echo 'Report sent successfully!';
    } catch (Exception $e) {
        echo "Failed to send the report. Error: {$mail->ErrorInfo}";
    }
}
?>

