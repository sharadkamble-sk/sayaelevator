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

// Prepare and bind statement
$stmt = $conn->prepare("INSERT INTO service_requests (first_name, last_name,phone, request_type, elevator_number, description) VALUES (?, ?, ?, ?, ?, ?)");
// Bind the parameters to the statement
$stmt->bind_param("ssssss", $firstName, $lastName, $phone, $requestType, $elevatorNumber, $description);



// Retrieve the form data
$firstName = $_POST["firstName"];
$lastName = $_POST["lastName"];
$phone = $_POST["phone"];
$requestType = $_POST["requestType"];
$elevatorNumber= $_POST["elevatorNumber"];
$description = $_POST["description"];


// Execute the statement and check for success
if ($stmt->execute()) {
    echo "New record added successfully.";
    header("location: service_request.php");
    exit;
} else {
    echo "Error: " . $stmt->error;
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>