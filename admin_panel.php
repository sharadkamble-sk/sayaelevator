<?php
session_start();

// Check if the user is authenticated as an admin
if (!isset($_SESSION['admin'])) {
    // Redirect to the login page if not authenticated
    header("Location: admin_login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Admin Panel</a>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="admin_logout.php">Logout</a>
            </li>
        </ul>
    </nav>
    <div class="container mt-5">
        <h1>Welcome to the Admin Panel</h1>
        <!-- Add your admin panel content here -->
    </div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
