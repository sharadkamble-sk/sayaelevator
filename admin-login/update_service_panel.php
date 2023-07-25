<?php
$servername = "localhost";
$username = "root";
$password = "Root@#12345";
$database = "testing";

// Create a connection
$conn = new mysqli($servername, $username, $password, $database);



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $id = $_POST["id"];
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $phone = $_POST["phone"];
    $requestType = $_POST["requestType"];
    $elevatorNumber = $_POST["elevatorNumber"];
    $description = $_POST["description"];

    // Prepare SQL statement
    $sql = "UPDATE service_requests SET
            first_name = '$firstName',
            last_name = '$lastName',
            phone = '$phone',
            request_type = '$requestType',
            elevator_number = '$elevatorNumber',
            description = '$description'
            WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Service updated successfully";
        header("location: service-request.php");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>


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
            <div class="container-fluid m-4">

                
                    <section class="container">
                        <?php
                        // Retrieve the user data from the database
                        $id = $_GET["id"]; // Assuming you pass the user Id as a query parameter
                        $sql = "SELECT * FROM service_requests WHERE id = $id";
                        $result = $conn->query($sql);

                        if ($result->num_rows == 1) {
                            $row = $result->fetch_assoc();

                            ?>


                            <div class="container">


                                <div class="mb-4">
                                    <h5>You can submit the service requests for elevator maintenance, repairs, and
                                        inspections</h5>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-header">
                                                <h6 class="card-title">Submit Request</h6>
                                            </div>
                                            <div class="card-body">
                                                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"
                                                    method="POST">
                                                    <div class="mb-3">

                                                        <input class="form-control" type="hidden" name="id"
                                                            value="<?php echo $row["id"]; ?>">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="firstName" class="form-label">First name</label>
                                                        <input type="text" class="form-control" id="firstName"
                                                            name="firstName" value="<?php echo $row["first_name"]; ?>"
                                                            required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="lastName" class="form-label">Last name</label>
                                                        <input type="text" class="form-control" id="lastName"
                                                            name="lastName" value="<?php echo $row["last_name"]; ?>"
                                                            required>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="phone" class="form-label">Phone</label>
                                                        <input type="number" class="form-control" id="phone" name="phone"
                                                            value="<?php echo $row["phone"]; ?>" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="requestType" class="form-label">Request Type</label>
                                                        <select class="form-control" id="requestType" name="requestType"
                                                            required>
                                                            <!-- <option value="" disabled selected>Select Type</option> -->
                                                            <option value="Maintenance" <?php if ($row["request_type"] == "Maintenance")
                                                                echo "selected"; ?>>Maintenance</option>
                                                            <option value="Repairs" <?php if ($row["request_type"] == "Repairs")
                                                                echo "selected"; ?>>Repairs</option>
                                                            <option value="Inspections" <?php if ($row["request_type"] == "Inspections")
                                                                echo "selected"; ?>>Inspections</option>
                                                        </select>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="elevatorNumber" class="form-label">Elevator
                                                            Number</label>
                                                        <input type="number" class="form-control" id="elevatorNumber"
                                                            name="elevatorNumber"
                                                            value="<?php echo $row["elevator_number"]; ?>" required>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="mb-3">Description</label>
                                                        <textarea class="form-control" name="description" id="description"
                                                            value="<?php echo $row["description"]; ?>" rows="3"></textarea>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">Update Request</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </section>

                        <?php
                        } else {
                            echo "User not found";
                        }
                        ?>
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