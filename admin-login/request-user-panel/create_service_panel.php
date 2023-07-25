
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>USER DASHBOARD</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <style>
        /* Custom styles (optional) */
        body {
            padding-top: 70px;
            padding-bottom: 20px;
        }

        .navbar-brand {
            font-weight: bold;
        }

        .navbar-text {
            margin-right: 10px;
        }

        .avatar {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 5px;
        }
    </style>
</head>

<body>




    <section class="container mt-4">
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
                            <form action="create_service.php" method="POST">
                                <div class="mb-3">
                                    <label for="firstName" class="form-label">First name</label>
                                    <input type="text" class="form-control" id="firstName" name="firstName" required>
                                </div>
                                <div class="mb-3">
                                    <label for="lastName" class="form-label">Last name</label>
                                    <input type="text" class="form-control" id="lastName" name="lastName" required>
                                </div>

                                <div class="mb-3">
                                    <label for="phone" class="form-label">Phone</label>
                                    <input type="number" class="form-control" id="phone" name="phone" required>
                                </div>
                                <div class="mb-3">
                                    <label for="requestType" class="form-label">Request Type</label>
                                    <select class="form-select" id="requestType" name="requestType" required>
                                        <option value="" disabled selected>Select Type</option>
                                        <option value="Maintenance">Maintenance</option>
                                        <option value="Repairs">Repairs</option>
                                        <option value="Inspections">Inspections</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="elevatorNumber" class="form-label">Elevator Number</label>
                                    <input type="number" class="form-control" id="elevatorNumber" name="elevatorNumber"
                                        required>
                                </div>
                                
                                <div class="mb-3">
                                    <label class="mb-3">Description</label>
                                    <textarea class="form-control" name="description" id="description"
                                        rows="3"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit Request</button>
                            </form>
                        </div>
                    </div>
                </div>

                
            </div>
        </div>
    </section>
</body>

</html>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
    crossorigin="anonymous"></script>
</body>

</html>