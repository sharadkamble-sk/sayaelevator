

<?php
session_start();

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form data
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Admin credentials (replace with your own)
    $adminEmail = 'admin@gmail.com';
    $adminPassword = '123';

    // Check if the email and password match the admin credentials
    if ($email === $adminEmail && $password === $adminPassword) {
        // Authentication successful, create a session and redirect to the admin panel
        $_SESSION['admin'] = true;
        header("Location: admin_panel.php");
        exit();
    } else {
        // Authentication failed, display an error message
        $error = "Invalid email or password.";
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>
<body>
    <div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <form class="p-5 rounded shadow" style="width: 25rem" action="admin_login.php" method="POST">
            <h1 class="text-center pb-3 display-4">Admin Login</h1>
            <?php if (isset($_GET['error']) && $_GET['error'] === 'incorrect'): ?>
                <div class="alert alert-danger" role="alert">
                    Incorrect User name or password
                </div>
            <?php elseif (isset($_GET['success']) && $_GET['success'] === 'true'): ?>
                <div class="alert alert-success" role="alert">
                    User name and password are correct
                </div>
            <?php endif; ?>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" id="email" name="email" class="form-control" aria-describedby="emailHelp"  required="">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password" required="">
            </div> <a href="#" class="float-end m-3">
                    Forgot Password?
                  </a>
            <button type="submit" class="btn btn-primary w-100">LOGIN</button>
           
            <?php if (isset($error)): ?>
                <div class="text-danger mt-3"><?php echo $error; ?></div>
            <?php endif; ?>
        </form>
    </div>
</body>
</html>



