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


    <div class="alert alert-success" role="alert">
        You have successfully logged in!
    </div>

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




    <section class="container mt-4">
        <div class="container">
            <div class="mb-4">
                <h5>You can submit the service requests for elevator maintenance, repairs, and inspections</h5>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="card-title">Submit Request</h6>
                        </div>
                        <div class="card-body">
                            <form action="service-requests.php" method="POST">
                                <div class="mb-3">
                                    <label for="firstName" class="form-label">First name</label>
                                    <input type="text" class="form-control" id="firstName" name="firstName" required>
                                </div>
                                <div class="mb-3">
                                    <label for="lastName" class="form-label">Last name</label>
                                    <input type="text" class="form-control" id="lastName" name="lastName" required>
                                </div>
                                <div class="mb-3">
                                    <label for="requestType" class="form-label">Request Type</label>
                                    <select class="form-select" id="requestType" name="requestType" required>
                                        <option value="" disabled selected>Select Type</option>
                                        <option value="Maintenance">Maintenance</option>
                                        <option value="Repairs">Repairs</option>
                                        <option value="Inspections">Inspections</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="elevatorNumber" class="form-label">Elevator Number</label>
                                    <input type="number" class="form-control" id="elevatorNumber" name="elevatorNumber"
                                        required>
                                </div>
                                <!-- <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <input type="textarea" class="form-control" id="lastName" name="description">
                                </div> -->
                                <div class="mb-3">
                                    <label class="mb-3">Description</label>
                                    <textarea class="form-control" name="description" id="description"
                                        rows="3"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit Request</button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="card-title">My Requests</h6>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Request ID</th>
                                        <th scope="col">Request Type</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Maintenance</td>
                                        <td>In Progress</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>Repairs</td>
                                        <td>Completed</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>Inspections</td>
                                        <td>Open</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </section>
</body>

</html>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
    crossorigin="anonymous"></script>
</body>

</html>