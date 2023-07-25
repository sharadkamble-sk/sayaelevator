<?php
session_start();

// Connect to the database
$servername = "localhost";
$username = "root";
$password = "Root@#12345";
$dbname = "testing";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve form data
$email = $_POST['email'];
$password = $_POST['password'];

// Prepare SQL statement
$query = "SELECT * FROM admin_login WHERE email=? AND password=?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "ss", $email, $password);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($result) == 1) {
    // Admin login successful
    $_SESSION['admin_logged_in'] = true;
    $_SESSION['email'] = $email;
    header("Location: admin_dashboard.php"); // Redirect to the admin dashboard
} else {
    // Invalid credentials
    $_SESSION['login_error'] = "Invalid email or password";
    header("Location: login.php"); // Redirect back to the login page
}

mysqli_stmt_close($stmt);
mysqli_close($conn);
?>
