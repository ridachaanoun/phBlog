<?php
session_start();

// Destroy the session
session_destroy();

// Redirect the user to the login page
header("Location: ../../signup_login/log in/log-in.php");
exit;
?>
