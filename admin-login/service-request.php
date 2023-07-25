<?php
session_start();

// Check if admin is logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: login.php");
    exit;
}
?>
<?php

// Database connection
$servername = "localhost";
$email = "root";
$password = "Root@#12345";
$dbname = "testing";

// Create connection
$conn = new mysqli($servername, $email, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$query = "SELECT * FROM service_requests ";
$result = mysqli_query($conn, $query);

function display_data()
{
    global $conn;
    $query = "SELECT * FROM  service_requests";
    $result = mysqli_query($conn, $query);

    return $result;
}

$result = display_data();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Admin Dashboard</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Add this link in the <head> section of your PHP file -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        integrity="sha512-P3GRZ1z2EDMz3z2wXQdO7vqA4Y55v6q9rU3ZMD4BxIJUqVT1ImHHq9SQq1ivILyf6S5wQz4nDhrSpzadn8WJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Bootstrap JS (Popper.js and Bootstrap JS) -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script> -->
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />


</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar-->
        <div class="border-end bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading border-bottom bg-light">Admin Dashboard</div>
            <div class="list-group list-group-flush">
                <a class="list-group-item list-group-item-action list-group-item-light p-3"
                    href="admin_dashboard.php">Dashboard</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3"
                    href="registered-user.php">Registered User</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3"
                    href="service-request.php">User service requests</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">User contact
                    form</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Profile</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Status</a>
            </div>
        </div>
        <!-- Page content wrapper-->
        <div id="page-content-wrapper">
            <!-- Top navigation-->
            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <div class="container-fluid">
                    <button class="btn btn-primary" id="sidebarToggle">Toggle Menu</button>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation"><span
                            class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                            <li class="nav-item active">
                                <a class="nav-link" href="admin_dashboard.php">Home</a>
                            </li>

                            <li class="nav-item active"><a class="nav-link" href="#!">Welcome,
                                    <?php echo $_SESSION['email']; ?>
                                </a></li>
                            <li class="nav-item">
                                </a></li>
                            <li class="nav-item active">
                                <a class="nav-link" href="#" data-bs-toggle="modal"
                                    data-bs-target="#logoutModal">Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- Logout Confirmation Modal -->
                <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-top">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="logoutModalLabel">Confirm Logout</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to logout?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <a class="btn btn-primary" href="logout.php">Logout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
            <!DOCTYPE html>
            <html lang="en">

            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Admin Panel</title>
                <link rel="stylesheet"
                    href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
            </head>

            <body>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col">
                            <div class="card mt-3">
                                <div class="card-header">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h4 class="mb-0">User service requests</h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead class="bg-dark text-white">
                                                <tr>
                                                    <th>id</th>
                                                    <th>first_name</th>
                                                    <th>last_name</th>
                                                    <th>phone</th>
                                                    <th>request_type</th>
                                                    <th>elevator_number</th>
                                                    <th>description</th>
                                                    <th>update</th>
                                                    <th>delete</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    echo "<tr>
                                            <td> $row[id]</td>
                                            <td> $row[first_name]</td>
                                            <td>$row[last_name]</td>
                                            <td> $row[phone]</td>
                                            <td> $row[request_type]</td>
                                            <td>$row[elevator_number]</td>
                                            <td>$row[description]</td>
                                            <td>
                                                <a href='update_service_panel.php?id=$row[id]' class='btn btn-primary'>edit</a>
                                            </td>
                                            <td>     
                                                <a href='delete_service_panel.php?id=$row[id]' class='btn btn-danger' name='delete'>delete</a>
                                            </td>
                                         </tr>";
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <script
                    src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
            </body>

            </html>

        </div>
    </div>
  

    <!-- Bootstrap core JS-->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script> -->
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>

</html>