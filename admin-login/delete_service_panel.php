<?php

if (isset($_GET["id"])){
$id=$_GET["id"];

$servername = "localhost";
$username = "root";
$password = "Root@#12345";
$database = "testing";

// Create a connection
$conn = new mysqli($servername, $username, $password, $database);

$sql = "DELETE FROM service_requests WHERE id = $id";

  $conn->query($sql);


}

header("location: service-request.php");
exit;




?>

