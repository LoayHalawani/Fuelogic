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
            <form action="<?= htmlspecialchars($company_id); ?>" method="POST">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Country</label>
                    <input type="text" class="form-control" name="country" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="exampleCheck1">City</label>
                    <input type="text" class="form-control" name="city">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Street</label>
                    <input type="text" class="form-control" name="street" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="exampleCheck1">Building</label>
                    <input type="text" class="form-control" name="building" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="exampleCheck1">Nb of employees</label>
                    <input type="text" name="nb_of_employees" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="exampleCheck1">Nb of trucks</label>
                    <input type="text" name="nb_of_trucks" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="exampleCheck1">Nb of storages</label>
                    <input type="text" name="nb_of_storages" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="exampleCheck1">Status</label>
                    <input type="text" name="status" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="exampleCheck1">Refuels</label>
                    <input type="text" name="refuels" class="form-control" required>
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
require_once 'models/branch.php';
require_once 'controllers/branchController.php';

$db = new Database();
$connection = $db->getConnection();

$branchController = new BranchController($connection);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $country = $_POST['country'];
    $city = $_POST['city'];
    $street = $_POST['street'];
    $building = $_POST['building'];
    $nb_of_employees = $_POST['nb_of_employees'];
    $nb_of_trucks = $_POST['nb_of_trucks'];
    $nb_of_storages = $_POST['nb_of_storages'];
    $status = $_POST['status'];
    $refuels = $_POST['refuels'];

    $result = $branchController->createBranch(
        $company_id, $country, $city, $street, $building,
        $nb_of_employees, $nb_of_trucks, $nb_of_storages, $status, $refuels
    );

    if($result) {
        echo "Branch has been added";
    } else {
        echo "Error adding branch";
    }
}