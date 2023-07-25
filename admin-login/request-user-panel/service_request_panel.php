<?php

// Database connection
$servername = "localhost";
$email = "root";
$password = "Root@#12345";
$dbname = "testing";

// Create connection
$conn = new mysqli($servername, $email, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$query = "SELECT * FROM service_requests ";
$result = mysqli_query($conn, $query);




function display_data()
{
  global $conn;
  $query = "SELECT * FROM  service_requests";
  $result = mysqli_query($conn, $query);

  return $result;
}

$result = display_data();


?>


<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Service Panel</title>
  <link rel="stylesheet" href="styles.css"> <!-- Link to your CSS file for styling -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">



</head>

<body>
  <div class="container-fluid  ">
    <div class="row mt-5 ">
      <div class="col">
        <div class="card mt-5">
          <div class="card-header">
            <button class="btn btn-primary"><a href="create_service_panel.php" class="text-light">Add Service
              </a></button>
            <!-- <h2 class="text-center">Register User DATA</h2> -->
          </div>
          <div class="card-body">
            <form method="post" action="delete.php">
              <table class="table table-bordered">
                <tr class="bg-dark text-white">
                  <td>id</td>
                  <td>first_name</td>
                  <td>last_name</td>
                  <td>phone</td>
                  <td>request_type</td>
                  <td>elevator_number</td>
                  <td>description</td>
                  <td>update</td>
                  <td>delete</td>

                </tr>
                <tr>
                  <?php

                  while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                        <td> $row[id]</td>
                        <td> $row[first_name]</td>
                        <td>$row[last_name]</td>
                        <td> $row[phone]</td>
                        <td> $row[request_type]</td>
                        <td>$row[elevator_number]</td>
                        <td>$row[description]</td>
            
                        <td>
                             <a href='update_service_panel.php?id=$row[id]' class='btn btn-primary'>edit</a>
                        </td>
                        <td>     
                             <a href='delete_service_panel.php?id=$row[id]' class='btn btn-danger' name='delete'>delete</a>
                        </td>
                        
                        
                      </tr>";


                  }
                  ?>

              </table>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>



</body>

</html>