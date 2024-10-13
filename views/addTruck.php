<?php
require_once 'config/database.php'; 
require_once 'models/branch.php';
require_once 'controllers/branchController.php';

$db = new Database();
$connection = $db->getConnection();

$branchController = new BranchController($connection);

$results = $branchController->getAllBranches();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add truck</title>
    <link href="css/layout.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <?php require 'navbar.php'; ?>
    <?php if (!empty($results)): ?>
    <div class="d-flex justify-content-center vh-50 mt-5" id="">
        <div class="form-div col-sm-8 col-md-6 border border-dark rounded p-4">
            <form action="add-truck" method="POST">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Plant nb</label>
                    <input type="email" class="form-control" name="plante_nb" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Branch ID</label>
                    <input type="password" class="form-control" name="branch_id" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="exampleCheck1">Fuel type</label>
                    <input type="text" class="form-control" name="fuel_type" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="exampleCheck1">Capacity</label>
                    <input type="text" class="form-control" name="capacity" required>
                </div>
                <button type="submit" class="btn btn-dark">Submit</button>
            </form>
        </div>
    </div>
    <?php else: ?>
        <div style="display: flex; justify-content: center; align-items: center; margin-top: 10%;">
            <h1 style="color: black; background-color: white;">Currently there are no branches to add a truck to.</h1>
        </div>
    <?php endif; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

<?php
require_once 'config/database.php'; 
require_once 'models/truck.php';
require_once 'controllers/truckController.php';

$db = new Database();
$connection = $db->getConnection();

$truckController = new TruckController($connection);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $plate_nb = $_POST['plate_nb'];
    $company_id = $id;
    $branch_id = $_POST['branch_id'];
    $fuel_type = $_POST['fuel_type'];
    $capacity = $_POST['capacity'];

    $result = $truckController->createTruck(
        $plate_nb, $company_id, $branch_id, $fuel_type, $capacity
    );

    if($result) {
        echo "Truck has been added";
    } else {
        echo "Error adding truck";
    }
}