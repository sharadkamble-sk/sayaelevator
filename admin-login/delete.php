<?php

if (isset($_GET["id"])){
$id=$_GET["id"];

$servername = "localhost";
$username = "root";
$password = "Root@#12345";
$database = "testing";

// Create a connection
$conn = new mysqli($servername, $username, $password, $database);

$sql = "DELETE FROM registered_users WHERE id = $id";

  $conn->query($sql);


}

header("location: show_data.php");
exit;




?>

