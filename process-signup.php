<?php
require 'vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// 1. Database Connection
$host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "rubiks_cube";
$port = "3307";

$conn = new mysqli($host, $db_user, $db_pass, $db_name, $port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $conn->real_escape_string($_POST['username']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = $_POST['password'];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // 2. GENERATE OTP
    $otp = random_int(100000, 999999);

    // 3. INSERT (Make sure you added the 'otp' and 'is_verified' columns to your DB)
    $sql = "INSERT INTO user (username, email, password, otp, verification_status) VALUES (?, ?, ?, ?, 0)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $username, $email, $hashed_password, $otp);

    if ($stmt->execute()) {
        // 4. Send the OTP Email
        sendOTPEmail($email, $username, $otp);

        // 5. Redirect to Verification Page
        header("Location: verify.php?email=" . urlencode($email));
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
}

function sendOTPEmail($recipient_email, $recipient_name, $otp)
{
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // FIXED: Removed ://
        $mail->SMTPAuth = true;
        $mail->Username = 'cruzjeanmatthew@gmail.com';
        $mail->Password = 'qvwwgzasgxrnznhp'; // FIXED: Removed spaces and line break
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->SMTPOptions = array(
            'ssl' => array('verify_peer' => false, 'verify_peer_name' => false, 'allow_self_signed' => true)
        );

        $mail->setFrom('cruzjeanmatthew@gmail.com', 'Spica Cube');
        $mail->addAddress($recipient_email, $recipient_name);

        $mail->isHTML(true);
        $mail->Subject = 'Verify your Spica Cube Account';
        $mail->Body = "
            <div style='font-family: sans-serif; text-align: center;'>
                <h2>Hi $recipient_name!</h2>
                <p>Use the code below to verify your Spica Cube account:</p>
                <h1 style='color: #200D99; letter-spacing: 5px;'>$otp</h1>
            </div>";

        $mail->send();
    } catch (Exception $e) {
        error_log("Mail Error: {$mail->ErrorInfo}");
    }
}
