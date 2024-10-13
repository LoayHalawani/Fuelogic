<?php
require_once 'config/database.php'; 
require_once 'models/truck.php';
require_once 'controllers/truckController.php';

$db = new Database();
$connection = $db->getConnection();

$truckController = new TruckController($connection);

$truck = $truckController->getTruckByID($id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update truck</title>
    <link href="../css/layout.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <?php require 'navbar.php'; ?>
    <?php if ($truck) { ?>
    <div class="d-flex justify-content-center vh-50 mt-5">
        <div class="form-div col-sm-8 col-md-6 border border-dark rounded p-4">
            <form>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Plate nb</label>
                    <input type="text" name="plate_nb" class="form-control" value=<?= htmlspecialchars($truck['PlateNb']); ?> required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="exampleCheck1">Company id</label>
                    <input type="text" name="company_id" value=<?= htmlspecialchars($truck['CompanyID']); ?> class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="exampleCheck1">Branch ID</label>
                    <input type="text" name="branch_id" value=<?= htmlspecialchars($truck['BranchID']); ?> class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="exampleCheck1">Fuel type</label>
                    <input type="text" name="fuel_type" value=<?= htmlspecialchars($truck['FuelType']); ?> class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="exampleCheck1">Capacity</label>
                    <input type="text" name="capacity" class="form-control" value=<?= htmlspecialchars($truck['Capacity']); ?>>
                </div>
                <button type="submit" class="btn btn-dark">Submit</button>
            </form>
        </div>
    </div>
    <?php 
    } else {
        echo json_encode(['message' => 'truck not found']);
    } 
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $plate_nb = $_POST['plate_nb'];
    $company_id = $_POST['company_id'];
    $branch_id = $_POST['branch_id'];
    $fuel_type = $_POST['fuel_type'];
    $capacity = $_POST['capacity'];

    $result = $truckController->updatetruck(
        $plate_nb, $company_id, $branch_id, $fuel_type, $capacity
    );

    if($result) {
        echo "truck has been updated";
    } else {
        echo "Error updating truck";
    }
}