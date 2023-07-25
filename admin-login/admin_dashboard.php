<?php
session_start();

// Check if admin is logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: login.php");
    exit;
}
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
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="admin_dashboard.php">Dashboard</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="registered-user.php">Registered User</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="service-request.php">User service requests</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">User contact form</a>
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

                            <!-- <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="#!">Action</a>
                                        <a class="dropdown-item" href="#!">Another action</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#!">Something else here</a>
                                    </div>
                                </li> -->
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
            <!-- Page content-->
            <div class="container-fluid mt-4">
                <h1 class="mt-4">Admin Dashboard</h1>
                <!-- <div class="container mt-5">
                    <h2>Welcome,
                        <?php echo $_SESSION['email']; ?>
                    </h2>
                    <a href="logout.php" class="btn btn-danger">Logout</a>
                </div> -->
                <!-- <p>The starting state of the menu will appear collapsed on smaller screens, and will appear
                    non-collapsed on larger screens. When toggled using the button below, the menu will change.</p> -->
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae, autem, consectetur accusantium
                    totam architecto dolores ab quas iste voluptas explicabo deleniti reprehenderit animi dicta nemo
                    sequi! Esse laudantium libero accusantium!Lorem Lorem ipsum dolor sit, amet consectetur adipisicing
                    elit. Quasi repudiandae rem suscipit sapiente doloremque voluptatem voluptate quo, ab dolorum nam
                    repellat unde voluptatibus rerum aperiam. Nobis earum ipsa tempora adipisci.
                </p>
                <div class="container mt-4">
                    <div class="row">
                        <div class="col-lg-4">
                            <!-- Elevator Status Card -->
                            <div class="card mb-3">
                                <div class="card-header bg-primary text-white">
                                    Elevator Status
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Elevator 1</h5>
                                    <p class="card-text">Status: Running</p>
                                    <p class="card-text">Floor: 5</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <!-- Elevator Logs Card -->
                            <div class="card mb-3">
                                <div class="card-header bg-success text-white">
                                    Elevator Logs
                                </div>
                                <div class="card-body">
                                    <ul class="list-group">
                                        <li class="list-group-item">Event 1</li>
                                        <li class="list-group-item">Event 2</li>
                                        <li class="list-group-item">Event 3</li>
                                        <!-- Add more logs here -->
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <!-- Elevator Statistics Card -->
                            <div class="card mb-3">
                                <div class="card-header bg-info text-white">
                                    Elevator Statistics
                                </div>
                                <div class="card-body">
                                    <p class="card-text">Total Trips: 100</p>
                                    <p class="card-text">Average Trip Time: 35 seconds</p>
                                    <p class="card-text">Total Passengers: 500</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>

</html>