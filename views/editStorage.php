<?php
require_once 'config/database.php'; 
require_once 'models/storage.php';
require_once 'controllers/storageController.php';

$db = new Database();
$connection = $db->getConnection();

$storageController = new StorageController($connection);

$storage = $storageController->getstorageByID($id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update storage</title>
    <link href="../css/layout.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <?php require 'navbar.php'; ?>
    <?php if ($storage) { ?>
    <div class="d-flex justify-content-center vh-50 mt-5">
        <div class="form-div col-sm-8 col-md-6 border border-dark rounded p-4">
            <form>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Capacity</label>
                    <input type="text" name="name" class="form-control" value=<?= htmlspecialchars($storage['Capacity']); ?> required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="exampleCheck1">Current capacity</label>
                    <input type="text" name="age" value=<?= htmlspecialchars($storage['CurrentCapacity']); ?> class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="exampleCheck1">Storing conditions</label>
                    <input type="text" name="relationship" value=<?= htmlspecialchars($storage['StoringConditions']); ?> class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="exampleCheck1">Branch ID</label>
                    <input type="text" name="phone_nb" value=<?= htmlspecialchars($storage['BranchID']); ?> class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="exampleCheck1">Fuel type</label>
                    <input type="text" name="employee_id" class="form-control" value=<?= htmlspecialchars($storage['FuelType']); ?>>
                </div>
                <button type="submit" class="btn btn-dark">Submit</button>
            </form>
        </div>
    </div>
    <?php 
    } else {
        echo json_encode(['message' => 'storage not found']);
    } 
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $capacity = $_POST['capacity'];
    $current_capacity = $_POST['current_capacity'];
    $storing_conditions = $_POST['storing_conditions'];
    $branch_id = $_POST['branch_id'];
    $fuel_type = $_POST['fuel_type'];

    $result = $storageController->updatestorage(
        $capacity, $current_capacity, $storing_conditions, $branch_id, $fuel_type
    );

    if($result) {
        echo "storage has been updated";
    } else {
        echo "Error updating storage";
    }
}