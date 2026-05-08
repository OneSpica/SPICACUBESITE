<?php
session_start();
// Database Connection
$host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "rubiks_cube";
$port = "3307";

$conn = new mysqli($host, $db_user, $db_pass, $db_name, $port);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $identifier = $conn->real_escape_string($_POST['identifier']);
    $password = $_POST['password'];

    // Check for either username or email
    $sql = "SELECT * FROM user WHERE username = ? OR email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $identifier, $identifier);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($user = $result->fetch_assoc()) {
        // Verify Password Hash
        if (password_verify($password, $user['password'])) {
            // Check if account is verified via OTP
            if ($user['verification_status'] == 0) {
                header("Location: verify.php?email=" . urlencode($user['email']));
                exit();
            }

            // Success! Set session variables
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['username'] = $user['username'];
            header("Location: dashboard.php");
            exit();
        }
    }

    // Fail: Redirect back with error
    header("Location: login.php?error=1");
    exit();
}
