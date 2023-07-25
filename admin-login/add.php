<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Process form submission and insert new user data into the database
  // Use the $_POST superglobal to access the form data
  // Example:
  $firstName = $_POST['firstName'];
  $lastName = $_POST['lastName'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  $companyName = $_POST['companyName'];
  $companyCode = $_POST['companyCode'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $address = $_POST['address'];
  $city = $_POST['city'];
  $zipcode = $_POST['zipcode'];
  $gstNo = $_POST['gstNo'];
  $selectState = $_POST['selectState'];
  $selectCountry = $_POST['selectCountry'];

  // Insert the data into the database using your preferred method (mysqli, PDO, etc.)
  // Example using mysqli:
  $servername = "localhost";
  $dbusername = "root";
  $dbpassword = "Root@#12345";
  $dbname = "testing";

  $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $sql = "INSERT INTO registered_users (first_name, last_name, username, password, company_name, company_code, phone, email, address, city, zipcode, gst_no, select_state, select_country)
          VALUES ('$firstName', '$lastName', '$username', '$password', '$companyName', '$companyCode', '$phone', '$email', '$address', '$city', '$zipcode', '$gstNo', '$selectState', '$selectCountry')";

  if ($conn->query($sql) === TRUE) {
    // Insertion successful
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $conn->close();

  // After successful insertion, redirect back to the index.php to refresh the table with the new data
  header('Location: registered-user.php');
  exit();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>User Registration</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .registration-form {
            max-width: 500px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .registration-form h2 {
            text-align: center;
            margin-bottom: 30px;
        }
    </style>
</head>

<body>
    <div class="container mt-3">
        <div class="registration-form">
            <h2>User Registration</h2>
            <form method="POST" action="create.php">
                <div class="form-group">
                    <label for="firstName">First Name:</label>
                    <input type="text" class="form-control" id="firstName" name="firstName" required>
                </div>
                <div class="form-group">
                    <label for="lastName">Last Name:</label>
                    <input type="text" class="form-control" id="lastName" name="lastName" required>
                </div>
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="form-group">
                    <label for="companyName">Company Name:</label>
                    <input type="text" class="form-control" id="companyName" name="companyName" required>
                </div>
                <div class="form-group">
                    <label for="companyCode">Company Code:</label>
                    <input type="number" class="form-control" id="companyCode" name="companyCode" required>
                </div>
                <div class="form-group">
                    <label for="phone">Phone:</label>
                    <input type="phone" class="form-control" id="phone" name="phone" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="address">Address:</label>
                    <input type="text" class="form-control" id="address" name="address" required>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="city">City:</label>
                        <input type="text" class="form-control" id="city" name="city" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="zipcode">Zipcode:</label>
                        <input type="number" class="form-control" id="zipcode" name="zipcode" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="gstNo">GST No:</label>
                    <input type="number" class="form-control" id="gstNo" name="gstNo" required>
                </div>
                <div class="form-group">
                    <label for="selectState">Select state:</label>
                    <select class="form-control" id="selectState" name="selectState">
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
                    <label for="selectCountry">Select Country:</label>
                    <select class="form-control" id="selectCountry" name="selectCountry">
                        <option value="" selected>Select a country</option>
                        <option value="Afghanistan">Afghanistan</option>
                        <option value="Albania">Albania</option>
                        <option value="Algeria">Algeria</option>
                        <option value="china">China</option>
                        <option value="india">India</option>
                        <option value="Andorra">Andorra</option>
                        <option value="Angola">Angola</option>
                        <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                        <option value="Argentina">Argentina</option>
                        <option value="Armenia">Armenia</option>
                        <option value="Australia">Australia</option>
                        <option value="Austria">Austria</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Register</button>
            </form>
        </div>
    </div>
</body>

</html>