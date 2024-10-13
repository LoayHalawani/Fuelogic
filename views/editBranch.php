<?php
require_once 'config/database.php'; 
require_once 'models/branch.php';
require_once 'controllers/branchController.php';

$db = new Database();
$connection = $db->getConnection();

$branchController = new BranchController($connection);

$branch = $branchController->getbranchByID($id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update branch</title>
    <link href="../css/layout.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <?php require 'navbar.php'; ?>
    <?php if ($branch) { ?>
    <div class="d-flex justify-content-center vh-50 mt-5">
        <div class="form-div col-sm-8 col-md-6 border border-dark rounded p-4">
            <form action="edit-branch/<?php $id?>" method="POST">
                <div class="mb-3">
                    <label class="form-label" for="exampleCheck1">ID</label>
                    <input type="text" class="form-control" value=<?= htmlspecialchars($branch['ID']); ?> name="branch_id">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Headquarter ID</label>
                    <input type="text" class="form-control" value=<?= htmlspecialchars($branch['HeadquarterID']); ?> name="consumer_id" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="exampleCheck1">Country</label>
                    <input type="text" name="fuel_type" value=<?= htmlspecialchars($branch['Country']); ?> class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="exampleCheck1">City</label>
                    <input type="text" name="fuel_amount" value=<?= htmlspecialchars($branch['City']); ?> class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="exampleCheck1">Street</label>
                    <input type="text" name="payment_date" value=<?= htmlspecialchars($branch['Street']); ?> class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="exampleCheck1">Building</label>
                    <input type="text" name="payment_method" value=<?= htmlspecialchars($branch['Building']); ?> class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="exampleCheck1">Number of employees</label>
                    <input type="text" name="currency" value=<?= htmlspecialchars($branch['Nb_of_employees']); ?> class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="exampleCheck1">Number of trucks</label>
                    <input type="text" name="currency" value=<?= htmlspecialchars($branch['Nb_of_trucks']); ?> class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="exampleCheck1">Nb ofstorages</label>
                    <input type="text" name="currency" value=<?= htmlspecialchars($branch['Nb_of_storages']); ?> class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="exampleCheck1">Status</label>
                    <input type="text" name="currency" value=<?= htmlspecialchars($branch['Status']); ?> class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="exampleCheck1">Refuels</label>
                    <input type="text" name="currency" value=<?= htmlspecialchars($branch['Refuels']); ?> class="form-control" required>
                </div>
                <button type="submit" class="btn btn-dark">Submit</button>
            </form>
        </div>
    </div>
    <?php 
    } else {
        echo json_encode(['message' => 'branch not found']);
    } 
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $hq_id = $_POST['hq_id'];
    $country = $_POST['country'];
    $city = $_POST['city'];
    $street = $_POST['street'];
    $building = $_POST['building'];
    $nb_of_employees = $_POST['nb_of_employees'];
    $nb_of_trucks = $_POST['nb_of_trucks'];
    $nb_of_storages = $_POST['nb_of_storages'];
    $status = $_POST['status'];
    $refuels = $_POST['refuels'];

    $result = $branchController->updatebranch(
        $hq_id, $country, $city, $street, $building,
        $nb_of_employees, $nb_of_trucks, $nb_of_storages, $status, $refuels
    );

    if($result) {
        echo "branch has been updated";
    } else {
        echo "Error updating branch";
    }
}