<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include PHPMailer files
require 'path/to/PHPMailer/src/Exception.php';
require 'path/to/PHPMailer/src/PHPMailer.php';
require 'path/to/PHPMailer/src/SMTP.php';

// Form data
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

// PHPMailer configuration
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'soulsoundsp@gmail.com'; // Your Gmail address
    $mail->Password = 'N:32spf1::3574'; // Your Gmail password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    //Recipients
    $mail->setFrom($email, $name);
    $mail->addAddress('soulsoundsp@gmail.com'); // Your Gmail address

    //Content
    $mail->isHTML(false);
    $mail->Subject = 'New message from contact form';
    $mail->Body = "Name: $name\nEmail: $email\nMessage: $message";

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
