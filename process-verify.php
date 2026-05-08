<?php
// 1. Database Connection
$host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "rubiks_cube";
$port = "3307";

$conn = new mysqli($host, $db_user, $db_pass, $db_name, $port);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $otp = $_POST['otp'];

    // 2. Search for the user with this email and OTP
    $sql = "SELECT * FROM user WHERE email = ? AND otp = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $email, $otp);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // 3. MATCH FOUND: Update verification status
        $update_sql = "UPDATE user SET verification_status = 1, otp = NULL WHERE email = ?";
        $update_stmt = $conn->prepare($update_sql);
        $update_stmt->bind_param("s", $email);
        $update_stmt->execute();

        // Redirect to login or home with success
        header("Location: login.php");
        exit();
    } else {
        // 4. NO MATCH: Send back to verify page with an error
        header("Location: verify.php?email=" . urlencode($email) . "&error=1");
        exit();
    }
}
?>