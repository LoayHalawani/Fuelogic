<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add branch</title>
    <link href="css/layout.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <?php require 'navbar.php'; ?>
    <div class="d-flex justify-content-center vh-50 mt-5" id="">
        <div class="form-div col-sm-8 col-md-6 border border-dark rounded p-4">
            <form action="add-storage" method="POST">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Capacity</label>
                    <input type="email" class="form-control" name="capacity" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="exampleCheck1">Current capacity</label>
                    <input type="text" class="form-control" name="current_capacity">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Storing conditions</label>
                    <input type="password" class="form-control" name="storing_conditions" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="exampleCheck1">Branch id</label>
                    <input type="text" class="form-control" name="branch_id" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="exampleCheck1">Fuel type</label>
                    <input type="text" class="form-control" name="fuel_type" required>
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
require_once 'models/storage.php';
require_once 'controllers/storageController.php';

$db = new Database();
$connection = $db->getConnection();

$storageController = new StorageController($connection);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $capacity = $_POST['capacity'];
    $current_capacity = $_POST['current_capacity'];
    $storing_conditions = $_POST['storing_conditions'];
    $branch_id = $_POST['branch_id'];
    $fuel_type = $_POST['fuel_type'];

    $result = $branchController->createBranch(
        $capacity, $current_capacity, $storing_conditions, $branch_id, $fuel_type
    );

    if($result) {
        echo "Storage has been added";
    } else {
        echo "Error adding branch";
    }
}