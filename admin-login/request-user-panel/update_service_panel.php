
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
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $phone = $_POST["phone"];
    $requestType = $_POST["requestType"];
    $elevatorNumber= $_POST["elevatorNumber"];
    $description = $_POST["description"];
    
    // Prepare SQL statement
    $sql = "UPDATE service_requests SET
            first_name = '$firstName',
            last_name = '$lastName',
            phone = '$phone',
            request_type = '$requestType',
            elevator_number = '$elevatorNumber',
            description = '$description'
            WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Service updated successfully";
        header("location: service_request_panel.php");
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
   
</head>
<body>
  
  <section class="container mt-4">
        <?php
           // Retrieve the user data from the database
           $id = $_GET["id"]; // Assuming you pass the user Id as a query parameter
           $sql = "SELECT * FROM service_requests WHERE id = $id";
           $result = $conn->query($sql);

           if ($result->num_rows == 1) {
           $row = $result->fetch_assoc();
       
          ?>


        <div class="container">

           
            <div class="mb-4">
                <h5>You can submit the service requests for elevator maintenance, repairs, and inspections</h5>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="card-title">Submit Request</h6>
                        </div>
                        <div class="card-body">
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                                <div class="mb-3">
                                
                                  <input class="form-control" type="hidden" name="id" value="<?php echo $row["id"]; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="firstName" class="form-label">First name</label>
                                    <input type="text" class="form-control" id="firstName" name="firstName" value="<?php echo $row["first_name"]; ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="lastName" class="form-label">Last name</label>
                                    <input type="text" class="form-control" id="lastName" name="lastName" value="<?php echo $row["last_name"]; ?>" required>
                                </div>

                                <div class="mb-3">
                                    <label for="phone" class="form-label">Phone</label>
                                    <input type="number" class="form-control" id="phone" name="phone" value="<?php echo $row["phone"]; ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="requestType" class="form-label">Request Type</label>
                                    <select class="form-control" id="requestType" name="requestType" required>
                                        <!-- <option value="" disabled selected>Select Type</option> -->
                                        <option value="Maintenance" <?php if ($row["request_type"] == "Maintenance") echo "selected"; ?>>Maintenance</option>
                                        <option value="Repairs" <?php if ($row["request_type"] == "Repairs") echo "selected"; ?>>Repairs</option>
                                        <option value="Inspections" <?php if ($row["request_type"] == "Inspections") echo "selected"; ?>>Inspections</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="elevatorNumber" class="form-label">Elevator Number</label>
                                    <input type="number" class="form-control" id="elevatorNumber" name="elevatorNumber"
                                    value="<?php echo $row["elevator_number"]; ?>"   required>
                                </div>
                                
                                <div class="mb-3">
                                    <label class="mb-3">Description</label>
                                    <textarea class="form-control" name="description" id="description"
                                    value="<?php echo $row["description"]; ?>"    rows="3"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Update Request</button>
                            </form>
                        </div>
                    </div>
                </div>

                
            </div>
        </div>
    </section>

    <?php
    } else {
        echo "User not found";
    }
    ?>
</body>
</html>
