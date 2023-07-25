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
    <title>User Dashboard</title>
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
                            <li><a class="dropdown-item" href="#">Edit Profile</a></li>
                            <li><a class="dropdown-item" href="edit-profile.php">Settings</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal"
                                    data-bs-target="#logoutModal">Logout</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="#">

                            <i class="fa fa-bell"></i>
                            <span class="badge bg-danger">3</span>
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>



    <!-- <div class="alert alert-success" role="alert">
        You have successfully logged in!
    </div> -->

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

    <div class="container my-4">
        <!-- <div class="card col-md-6"> -->
        <!-- <div class="card-header">Edit Profile</div>
            <div class="card-body">
                <form method="POST" action="update-profile.php">
                    <div class="form-group">
                        <label class="mb-2" for="firstName">First Name:</label>
                        <input type="text" class="form-control" id="firstName" name="firstName" required>
                    </div>
                    <div class="form-group">
                        <label class="mb-2" for="lastName">Last Name:</label>
                        <input type="text" class="form-control" id="lastName" name="lastName" required>
                    </div>
                    <div class="form-group">
                        <label class="mb-2" for="username">Username:</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="form-group">
                        <label class="mb-2" for="password">Password:</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="form-group">
                        <label class="mb-2" for="companyName">Company Name:</label>
                        <input type="text" class="form-control" id="companyName" name="companyName" required>
                    </div>
                    <div class="form-group">
                        <label class="mb-2" for="companyCode">Company Code:</label>
                        <input type="number" class="form-control" id="companyCode" name="companyCode" required>
                    </div>
                    <div class="form-group">
                        <label class="mb-2" for="phone">Phone:</label>
                        <input type="phone" class="form-control" id="phone" name="phone" required>
                    </div>
                    <div class="form-group">
                        <label class="mb-2" for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label class="mb-2" for="address">Address:</label>
                        <input type="text" class="form-control" id="address" name="address" required>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="mb-2" for="city">City:</label>
                            <input type="text" class="form-control" id="city" name="city" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="mb-2" for="zipcode">Zipcode:</label>
                            <input type="number" class="form-control" id="zipcode" name="zipcode" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="mb-2" for="gstNo">GST No:</label>
                        <input type="number" class="form-control mb-2" id="gstNo" name="gstNo" required>
                    </div>
                    <div class="form-group" class="mb-2">
                        <label class="mb-2" for="selectState">Select state:</label>
                        <select class="form-control mb-2" id="selectState" name="selectState">
                            <option value="" selected>Select a state</option>
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
                        <label class="mb-2" for="selectCountry">Select Country:</label>
                        <select class="form-control mb-3" id="selectCountry" name="selectCountry">
                            <option value="" selected>Select a country</option>
                            <option value="Afghanistan">Afghanistan</option>
                            <option value="China">China</option>
                            <option value="India">India</option>
                            <option value="Andorra">Andorra</option>
                            <option value="Angola">Angola</option>
                            <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                            <option value="Argentina">Argentina</option>
                            <option value="Armenia">Armenia</option>
                            <option value="Australia">Australia</option>

                        </select>
                    </div>
                    <button type="submit" class="btn btn-success btn-block">Save Changes </button>
                </form>

            </div> -->

        <?php


        // Database connection
        $servername = "localhost";
        $username = "root";
        $password = "Root@#12345";
        $dbname = "testing";
        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Fetch user's data from the database
        $username = $_SESSION["username"];
        $sql = "SELECT * FROM registered_users WHERE username = '$username'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $firstName = $row["first_name"];
            $lastName = $row["last_name"];
            $username = $row["username"];
            // ... Retrieve the rest of the fields from the $row array
        
        } else {
            echo "User data not found!";
        }

        $conn->close();
        ?>

        <!-- Use the fetched data in the HTML form -->
        <!-- <div class="container my-4"> -->
        <div class="card col-md-6">
            <div class="card-header">Edit Profile</div>
            <div class="card-body">
                <form method="POST" action="update-profile.php">
                    <div class="form-group">
                        <label class="mb-2" for="firstName">First Name:</label>
                        <input type="text" class="form-control" id="firstName" name="firstName"
                            value="<?php echo $firstName; ?>" required>
                    </div>
                    <div class="form-group">
                        <label class="mb-2" for="lastName">Last Name:</label>
                        <input type="text" class="form-control" id="lastName" name="lastName"
                            value="<?php echo $lastName; ?>" required>
                    </div>
                    <div class="form-group">
                        <label class="mb-2" for="username">Username:</label>
                        <input type="text" class="form-control" id="username" name="username"
                            value="<?php echo $username; ?>" required>
                    </div>
                    <div class="form-group">
                        <label class="mb-2" for="password">Password:</label>
                        <input type="password" class="form-control" id="password" name="password"
                            value="<?php echo $password; ?>" required>
                    </div>

                    <!-- ... Add the rest of the fields and populate them with the corresponding values -->
                    <div class="form-group">
                        <label class="mb-2" for="companyName">Company Name:</label>
                        <input type="text" class="form-control" id="companyName" name="companyName"
                            value="<?php echo $companyName = $row["company_name"]; ?>" required>
                    </div>
                    <div class="form-group">
                        <label class="mb-2" for="companyCode">Company Code:</label>
                        <input type="number" class="form-control" id="companyCode" name="companyCode"
                            value="<?php echo $companyCode = $row["company_code"]; ?>" required>

                    </div>
                    <div class="form-group">
                        <label class="mb-2" for="phone">Phone:</label>
                        <input type="phone" class="form-control" id="phone" name="phone"
                            value="<?php echo $phone = $row["phone"]; ?>" required>
                    </div>
                    <div class="form-group">
                        <label class="mb-2" for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email"
                            value="<?php echo $email = $row["email"]; ?>" required>
                    </div>
                    <div class="form-group">
                        <label class="mb-2" for="address">Address:</label>
                        <input type="text" class="form-control" id="address" name="address"
                            value="<?php echo $address = $row["address"]; ?>" required>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="mb-2" for="city">City:</label>
                            <input type="text" class="form-control" id="city" name="city"
                                value="<?php echo $city = $row["city"]; ?>" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="mb-2" for="zipcode">Zipcode:</label>
                            <input type="number" class="form-control" id="zipcode" name="zipcode"
                                value="<?php echo $zipcode = $row["zipcode"]; ?>" required>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="mb-2" for="gstNo">GST No:</label>
                        <input type="number" class="form-control" id="gstNo" name="gstNo"
                            value="<?php echo $row["gstNo"];?>" required>
                    </div>

                    <div class="form-group" class="mb-2">
                        <label class="mb-2" for="selectState">Select state:</label>
                        <select class="form-control mb-2" id="selectState" name="selectState"
                            value="<?php echo $selectState = $row['selectState']; ?>" required>
                            <!-- <option value="<?php echo $selectState = $row['selectState']; ?>" required>Select a state</option> -->
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
                        <label class="mb-2" for="selectCountry">Select Country:</label>
                        <select class="form-control mb-2" id="selectCountry" name="selectCountry"
                            value="<?php echo $selectCountry = $row['selectCountry']; ?>" required>
                            <!-- <option value="" selected>Select a country</option> -->
                            <option value="Afghanistan">Afghanistan</option>
                            <option value="China">China</option>
                            <option value="India">India</option>
                            <option value="Andorra">Andorra</option>
                            <option value="Angola">Angola</option>
                            <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                            <option value="Argentina">Argentina</option>
                            <option value="Armenia">Armenia</option>
                            <option value="Australia">Australia</option>

                        </select>
                    </div>
                    <button type="submit" class="btn btn-success btn-block">Save Changes </button>
                </form>
            </div>
        </div>
    </div>

    </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>