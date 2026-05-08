<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

// Include the library (Choose the one that matches your install method)
require 'vendor/autoload.php'; // If using Composer


$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';         // Use 'smtp.gmail.com' for Gmail
    $mail->SMTPAuth = true;
    $mail->Username = 'your-email@gmail.com';   // Your email
    $mail->Password = 'your-app-password';      // NOT your regular password (see below)
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;                      // Use 587 for TLS

    // Recipients
    $mail->setFrom('your-email@gmail.com', 'Spica Cube');
    $mail->addAddress($user_email);               // The user who just signed up

    // Content
    $mail->isHTML(true);                          // Send as HTML
    $mail->Subject = 'Welcome to Spica Cube!';
    $mail->Body = "<h1>Welcome, $username!</h1><p>Ready to master OLL and PLL?</p>";

    $mail->send();
    echo 'Welcome email sent!';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>