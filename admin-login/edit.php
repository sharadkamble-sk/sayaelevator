
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
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $company_name = $_POST["company_name"];
    $company_code = $_POST["company_code"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $city = $_POST["city"];
    $zipcode = $_POST["zipcode"];
    $gst_no = $_POST["gst_no"];
    $select_state = $_POST["select_state"];
    $select_country = $_POST["select_country"];

    // Prepare SQL statement
    $sql = "UPDATE registered_users SET
            first_name = '$first_name',
            last_name = '$last_name',
            username = '$username',
            password = '$password',
            company_name = '$company_name',
            company_code = '$company_code',
            email = '$email',
            phone = '$phone',
            city = '$city',
            zipcode = '$zipcode',
            gst_no = '$gst_no',
            select_state = '$select_state',
            select_country = '$select_country'
            WHERE id = $id"; 

    if ($conn->query($sql) === TRUE) {
        echo "User updated successfully";
        header("location: show_data.php");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update User</title>
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
    <?php
    // Retrieve the user data from the database
    $id = $_GET["id"]; // Assuming you pass the user Id as a query parameter
    $sql = "SELECT * FROM registered_users WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();

    ?>
  <div class="registration-form">
     <h2>Update Data</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <div class="form-group">
            <input class="form-control" type="hidden" name="id" value="<?php echo $row["id"]; ?>">
        </div>

        <div class="form-group">
            <label for="first_name">First Name:</label>
            <input class="form-control" type="text" id="first_name" name="first_name" value="<?php echo $row["first_name"]; ?>" required>
        </div>
        <div class="form-group">
            <label for="last_name">Last Name:</label>
            <input class="form-control" type="text" id="last_name" name="last_name" value="<?php echo $row["last_name"]; ?>" required>
        </div>

        <div class="form-group">
            <label for="username">Username:</label>
            <input class="form-control" type="text" id="username" name="username" value="<?php echo $row["username"]; ?>" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input class="form-control" type="password" id="password" name="password" value="<?php echo $row["password"]; ?>" required>
        </div>
        <div class="form-group">
            <label for="company_name">Company Name:</label>
            <input class="form-control" type="text" id="company_name" name="company_name" value="<?php echo $row["company_name"]; ?>" required>
        </div>
        <div class="form-group">
            <label for="company_code">Company Code:</label>
            <input class="form-control" type="text" id="company_code" name="company_code" value="<?php echo $row["company_code"]; ?>" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input class="form-control" type="email" id="email" name="email" value="<?php echo $row["email"]; ?>" required>
        </div>
        <div class="form-group">
            <label for="phone">Phone:</label>
            <input class="form-control" type="number" id="phone" name="phone" value="<?php echo $row["phone"]; ?>" required>
        </div>
        <div class="form-group">
            <label for="city">City:</label>
            <input class="form-control" type="text" id="city" name="city" value="<?php echo $row["city"]; ?>" required>
        </div>
        <div class="form-group">
            <label for="zipcode">ZIP Code:</label>
            <input class="form-control" type="text" id="zipcode" name="zipcode" value="<?php echo $row["zipcode"]; ?>" required>
        </div>
        <div class="form-group">
            <label for="gst_no">GST Number:</label>
            <input class="form-control" type="text" id="gst_no" name="gst_no" value="<?php echo $row["gst_no"]; ?>" required>
        </div>
        <div class="form-group">
            <label for="select_state">Select State:</label>
            <select class="form-control" id="select_state" name="select_state" required>
                <option value="Andhra Pradesh" <?php if ($row["select_state"] == "Andhra Pradesh") echo "selected"; ?>>Andhra Pradesh</option>
                <option value="Arunachal Pradesh" <?php if ($row["select_state"] == "Arunachal Pradesh") echo "selected"; ?>>Arunachal Pradesh</option>
                <!-- Add other options here -->
            </select>
        </div>
        <div class="form-group">
            <label for="select_country">Select Country:</label>
            <select class="form-control" id="select_country" name="select_country" required>
                <option value="Afghanistan" <?php if ($row["select_country"] == "Afghanistan") echo "selected"; ?>>Afghanistan</option>
                <option value="Albania" <?php if ($row["select_country"] == "Albania") echo "selected"; ?>>Albania</option>
                <!-- Add other options here -->
            </select>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary btn-block" value="Update User">
        </div>
    </form>
   </div>
</div>
    <?php
    } else {
        echo "User not found";
    }
    ?>
</body>
</html>
