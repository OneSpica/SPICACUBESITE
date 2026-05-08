<?php
session_start();

// 1. Clear all session variables
$_SESSION = array();

// 2. Destroy the session itself
session_destroy();

// 3. Redirect to the home page
header("Location: index.php");
exit();
?>
