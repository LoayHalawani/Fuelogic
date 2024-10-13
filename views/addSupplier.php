<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add supplier</title>
    <link href="css/layout.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <?php require 'navbar.php'; ?>
    <div class="d-flex justify-content-center vh-50 mt-5" id="">
        <div class="form-div col-sm-8 col-md-6 border border-dark rounded p-4">
            <form action="add-supplier" method="POST">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="exampleCheck1">Email</label>
                    <input type="email" class="form-control" name="city">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Fuel type</label>
                    <input type="password" class="form-control" name="FuelType" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="exampleCheck1">Country</label>
                    <input type="text" class="form-control" name="country" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="exampleCheck1">City</label>
                    <input type="text" class="form-control" name="city" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="exampleCheck1">Branch ID</label>
                    <input type="text" class="form-control" name="branch_id" required>
                </div>
                <button type="submit" class="btn btn-dark">Submit</button>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

<?php
require_once 'config/database.php'; 
require_once 'models/supplier.php';
require_once 'controllers/supplierController.php';

$db = new Database();
$connection = $db->getConnection();

$supplierController = new SupplierController($connection);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $fuel_type = $_POST['fuel_type'];
    $country = $_POST['country'];
    $city = $_POST['city'];
    $branch_id = $_POST['branch_id'];

    $result = $supplierController->createSupplier(
        $name, $email, $fuel_type, $country, $city, $branch_id
    );

    if($result) {
        echo "Supplier has been added";
    } else {
        echo "Error adding supplier";
    }
}