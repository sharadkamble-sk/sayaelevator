<?php
session_start();

// Check if the user is not logged in
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit();
}

// Database connection
$servername = "localhost";
$username = "root";
$password = "Root@#12345";
$dbname = "testing";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
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
    $selectState = $_POST["selectState"];
    $selectCountry = $_POST["selectCountry"];

    // Update user's profile data in the database
    $sql = "UPDATE registered_users SET 
                first_name = '$firstName',
                last_name = '$lastName',
                username = '$username',
                password = '$password',
                company_name = '$companyName',
                company_code = '$companyCode',
                phone = '$phone',
                email = '$email',
                address = '$address',
                city = '$city',
                zipcode = '$zipcode',
                gst_no = '$gstNo',
                state = '$selectState',
                country = '$selectCountry'
            WHERE username = '{$_SESSION["username"]}'";

    if ($conn->query($sql) === TRUE) {
        echo "Profile updated successfully!";
    } else {
        echo "Error updating profile: " . $conn->error;
    }
}

$conn->close();
?>


