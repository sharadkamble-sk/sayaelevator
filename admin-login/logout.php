<?php
session_start();

// Clear session data
$_SESSION = array();
session_destroy();

header("Location: login.php"); // Redirect to the login page
exit;
?>
