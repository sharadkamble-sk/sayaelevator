<?php
session_start();

// Unset and destroy the session
session_unset();
session_destroy();

// Redirect to the login page
header("Location: admin_login.php");
exit();
?>
