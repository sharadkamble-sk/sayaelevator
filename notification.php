<!-- home.php -->
<?php
session_start();

// Check if the user is not logged in
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit();
}
?>

<!-- 
<h1>Welcome, </h1> -->


<!-- <a href="logout.php">Logout</a> -->

<!-- dashboard.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>USER DASHBOARD</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <style>
        /* Custom styles (optional) */
        body {
            padding-top: 70px;
            padding-bottom: 20px;
        }

        .navbar-brand {
            font-weight: bold;
        }

        .navbar-text {
            margin-right: 10px;
        }

        .avatar {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 5px;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top shadow-sm">
        <div class="container">
            <h6>USER DASHBOARD</h6>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span><span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link " href="home.php">Home

                            <i class="fa fa-home"></i>

                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="profile.png" class="avatar" alt="User Avatar">
                            <span class="navbar-text">
                                Welcome,
                                <?php echo $_SESSION["username"]; ?>
                            </span>
                        </a>

                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                            <!-- Dropdown items -->
                            <li><a class="dropdown-item" href="edit-profile.php">Edit Profile</a></li>
                            <li><a class="dropdown-item" href="">Settings</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal"
                                    data-bs-target="#logoutModal">Logout</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="notification.php">

                            <i class="fa fa-bell"></i>
                            <span class="badge bg-danger">3</span>
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
    <!-- Logout Modal -->
    <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="logoutModalLabel">Logout Confirmation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to logout?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <a href="logout.php" class="btn btn-primary">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-4">
        <h4>Notifications</h4>
        <div class="list-group mt-4">
            <!-- Sample Notification Item -->
            <a href="#" class="list-group-item list-group-item-action">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="fw-bold">New Service Request</div>
                    <div class="text-muted">1 day ago</div>
                </div>
                <div>You have a new service request for elevator maintenance.</div>
            </a>

            <!-- Sample Notification Item -->
            <a href="#" class="list-group-item list-group-item-action">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="fw-bold">Service Request Update</div>
                    <div class="text-muted">2 days ago</div>
                </div>
                <div>Your service request for elevator repairs has been completed.</div>
            </a>

            <!-- Sample Notification Item -->
            <a href="#" class="list-group-item list-group-item-action">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="fw-bold">Important Announcement</div>
                    <div class="text-muted">3 days ago</div>
                </div>
                <div>
                    We invite you to join our elevator safety seminar on YouTube to learn valuable insights about
                    elevator safety practices and protocols. The seminar will cover topics such as emergency procedures,
                    passenger etiquette, and general safety guidelines. Enhance your knowledge and ensure a safe
                    elevator experience for everyone.<a href="https://youtu.be/DDKqRVpK60E" target="_blank">Watch Elevator Safety Seminar on YouTube</a></div>

            </a>

        </div>
    </div>




</body>

</html>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
    crossorigin="anonymous"></script>
</body>

</html>