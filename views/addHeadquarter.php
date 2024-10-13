<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add headquarter</title>
    <link href="css/addHeadquarter.css" rel="stylesheet">
    <link href="css/layout.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <?php require 'navbar.php'; ?>
    <div class="d-flex justify-content-center vh-50 mt-5">
        <div class="form-div col-sm-8 col-md-6 border border-dark rounded p-4">
            <form action="add-headquarter" method="POST">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="exampleCheck1">Number of employees</label>
                    <input type="text" name="nb_of_employees" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Country</label>
                    <input type="text" name="country" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="exampleCheck1">City</label>
                    <input type="text" name="city" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="exampleCheck1">Street</label>
                    <input type="text" name="street" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="exampleCheck1">Building</label>
                    <input type="text" name="building" class="form-control" required>
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
require_once 'models/headquarter.php';
require_once 'controllers/hqController.php';

$db = new Database();
$connection = $db->getConnection();

$hqController = new HqController($connection);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST['email'];
    $nb_of_employees = $_POST['nb_of_employees'];
    $country = $_POST['country'];
    $city = $_POST['city'];
    $street = $_POST['street'];
    $building = $_POST['building'];

    $result = $hqController->createHq(
        $email, $nb_of_employees, $country, $city,
        $street, $building
    );

    if($result) {
        echo "Headquarter has been added";
    } else {
        echo "Error adding headquarter";
    }
}