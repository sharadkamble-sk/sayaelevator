<?php
// Retrieve form data
$firstName = isset($_POST['firstName']) ? $_POST['firstName'] : '';
$lastName = isset($_POST['lastName']) ? $_POST['lastName'] : '';
$requestType = isset($_POST['requestType']) ? $_POST['requestType'] : '';
$elevatorNumber = isset($_POST['elevatorNumber']) ? $_POST['elevatorNumber'] : '';
$description = isset($_POST['description']) ? $_POST['description'] : '';

// Validate required fields
if (empty($firstName) || empty($lastName) || empty($requestType) || empty($elevatorNumber)) {
    echo "Error: Please fill in all required fields.";
    exit;
}

// Database connection
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
$stmt = $conn->prepare("INSERT INTO service_requests (first_name, last_name, request_type, elevator_number, description) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $firstName, $lastName, $requestType, $elevatorNumber, $description);

// Execute statement
if ($stmt->execute()) {
    // echo "Request submitted successfully.";
    echo '<script>alert("Request submitted successfully!");</script>';
    echo '<script>window.location.href = "home.php";</script>';
} else {
    echo "Error: " . $stmt->error;
}

// Close statement and connection
$stmt->close();
$conn->close();
?>
