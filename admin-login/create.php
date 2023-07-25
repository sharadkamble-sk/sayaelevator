<?php
$servername = "localhost";
$username = "root";
$password = "Root@#12345";
$dbname = "testing";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind the INSERT statement
$stmt = $conn->prepare("INSERT INTO registered_users (first_name, last_name, username, password, company_name, company_code, phone, email, address, city, zipcode, gst_no, select_state, select_country) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");


// Bind the parameters to the statement
$stmt->bind_param("ssssssssssssss", $firstName, $lastName, $username, $password, $companyName, $companyCode, $phone, $email, $address, $city, $zipcode, $gstNo, $selectState, $selectCountry);

// Retrieve the form data
$firstName = $_POST["firstName"];
$lastName = $_POST["lastName"];
$username = $_POST["username"];
$password = $_POST["password"];
$companyName = $_POST["companyName"];
$companyCode = $_POST["companyCode"];
$phone = $_POST["phone"];
$email = $_POST["email"];
$address = $_POST["address"];
$city = $_POST["city"];
$zipcode = $_POST["zipcode"]; 
$gstNo = $_POST["gstNo"];
$selectCountry = $_POST["selectCountry"];
$selectState = $_POST["selectState"];

// Execute the statement and check for success
if ($stmt->execute()) {
    echo "User Add successful!";
    header("location: show_data.php");
    exit;
} else {
    echo "Error: " . $stmt->error;
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>


