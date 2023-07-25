<?php
session_start();

// Check if admin is logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: login.php");
    exit;
}
?>

<?php
$servername = "localhost";
$username = "root";
$password = "Root@#12345";
$dbname = "testing";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$query = "SELECT * FROM registered_users";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Error: " . mysqli_error($conn));
}

function display_data()
{
    global $conn;
    $query = "SELECT * FROM registered_users";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Error: " . mysqli_error($conn));
    }

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
    <style>
        /* Custom styles */
        .table-card {
            border: 1px solid #dee2e6;
        }

        .table-card .card-header {
            background-color: #007bff;
            color: #ffffff;
            padding: 0.75rem;
        }

        .table-card .card-body {
            padding: 0;
        }

        .table-responsive {
            max-height: 550px;
            overflow-y: auto;
        }

        /* Styles for the table */
        .table-bordered th,
        .table-bordered td {
            border: 1px solid #dee2e6;
            padding: 0.5rem;
        }

        /* .table-bordered thead th {
            background-color: #007bff;
            color: #ffffff;
        } */

        .table-bordered tbody td {
            vertical-align: middle;
        }

        .table-bordered tbody tr:nth-child(even) {
            background-color: #f8f9fa;
        }

        .table-bordered tbody tr:hover {
            background-color: #f1f3f5;
        }
        
    </style>
    

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
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Registered
                    User</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="service-request.php">User service
                    requests</a>
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


            <div class="container mt-4">
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h4 class="mb-0">Registered Users</h4>
                                    <button class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#addUserModal">Add User</button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover">
                                        <thead class="text-black">
                                            <tr>
                                                <th>ID</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Username</th>
                                                <th>Password</th>
                                                <th>Company Name</th>
                                                <th>Company Code</th>
                                                <th>Phone</th>
                                                <th>Email</th>
                                                <th>Address</th>
                                                <th>City</th>
                                                <th>Zipcode</th>
                                                <th>GST Number</th>
                                                <th>Select State</th>
                                                <th>Select Country</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                echo "<tr>
                                                    <td>{$row['id']}</td>
                                                    <td>{$row['first_name']}</td>
                                                    <td>{$row['last_name']}</td>
                                                    <td>{$row['username']}</td>
                                                    <td>{$row['password']}</td>
                                                    <td>{$row['company_name']}</td>
                                                    <td>{$row['company_code']}</td>
                                                    <td class='phone-width'>{$row['phone']}</td>
                                                    <td>{$row['email']}</td>
                                                    <td>{$row['address']}</td>
                                                    <td>{$row['city']}</td>
                                                    <td>{$row['zipcode']}</td>
                                                    <td>{$row['gst_no']}</td>
                                                    <td>{$row['select_state']}</td>
                                                    <td>{$row['select_country']}</td>
                                                    <td>
                                                        <a href='edit.php?id={$row['id']}' class='btn btn-primary'>Edit</a>
                                                    </td>
                                                    <td>
                                                        <a href='delete.php?id={$row['id']}' class='btn btn-danger' name='delete'>Delete</a>
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


            <!-- Bootstrap Modal for Add User -->
            <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header bg-primary text-white">
                            <h5 class="modal-title" id="addUserModalLabel">Add User</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="add.php" id="userForm">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="firstName">First Name:</label>
                                            <input type="text" class="form-control" id="firstName" name="firstName"
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <label for="lastName">Last Name:</label>
                                            <input type="text" class="form-control" id="lastName" name="lastName"
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <label for="username">Username:</label>
                                            <input type="text" class="form-control" id="username" name="username"
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Password:</label>
                                            <input type="password" class="form-control" id="password" name="password"
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email:</label>
                                            <input type="email" class="form-control" id="email" name="email" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="phone">Phone:</label>
                                            <input type="number" class="form-control" id="phone" name="phone" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="companyName">Company Name:</label>
                                            <input type="text" class="form-control" id="companyName" name="companyName"
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <label for="companyCode">Company Code:</label>
                                            <input type="text" class="form-control" id="companyCode" name="companyCode"
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <label for="city">City:</label>
                                            <input type="text" class="form-control" id="city" name="city" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="zipcode">ZIP Code:</label>
                                            <input type="text" class="form-control" id="zipcode" name="zipcode"
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <label for="gstNo">GST Number:</label>
                                            <input type="text" class="form-control" id="gstNo" name="gstNo" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="selectState">Select State:</label>
                                            <select class="form-control" id="selectState" name="selectState" required>
                                                <option value="">Select State</option>
                                                <option value="Andhra Pradesh">Andhra Pradesh</option>
                                                <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                                <option value="Assam">Assam</option>
                                                <option value="Bihar">Bihar</option>
                                                <option value="Chhattisgarh">Chhattisgarh</option>
                                                <option value="Goa">Goa</option>
                                                <option value="Gujarat">Gujarat</option>
                                                <option value="Haryana">Haryana</option>
                                                <option value="Himachal Pradesh">Himachal Pradesh</option>
                                                <option value="Jharkhand">Jharkhand</option>
                                                <option value="Karnataka">Karnataka</option>
                                                <option value="Kerala">Kerala</option>
                                                <option value="Madhya Pradesh">Madhya Pradesh</option>
                                                <option value="Maharashtra">Maharashtra</option>
                                                <option value="Manipur">Manipur</option>
                                                <option value="Meghalaya">Meghalaya</option>
                                                <option value="Mizoram">Mizoram</option>
                                                <option value="Nagaland">Nagaland</option>
                                                <option value="Odisha">Odisha</option>
                                                <option value="Punjab">Punjab</option>
                                                <option value="Rajasthan">Rajasthan</option>
                                                <option value="Sikkim">Sikkim</option>
                                                <option value="Tamil Nadu">Tamil Nadu</option>
                                                <option value="Telangana">Telangana</option>
                                                <option value="Tripura">Tripura</option>
                                                <option value="Uttar Pradesh">Uttar Pradesh</option>
                                                <option value="Uttarakhand">Uttarakhand</option>
                                                <option value="West Bengal">West Bengal</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="selectCountry">Select Country:</label>
                                            <select class="form-control" id="selectCountry" name="selectCountry"
                                                required>
                                                <option value="">Select Country</option>
                                                <option value="Afghanistan">Afghanistan</option>
                                                <option value="Albania">Albania</option>
                                                <option value="Algeria">Algeria</option>
                                                <option value="China">China</option>
                                                <option value="India">India</option>
                                                <option value="Andorra">Andorra</option>
                                                <option value="Angola">Angola</option>
                                                <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                                <option value="Argentina">Argentina</option>
                                                <option value="Armenia">Armenia</option>
                                                <option value="Australia">Australia</option>
                                                <option value="Austria">Austria</option>
                                            </select>
                                        </div>

                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Add User</button>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Bootstrap core JS-->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
            <!-- Core theme JS-->
            <script src="js/scripts.js"></script>
           

</html>