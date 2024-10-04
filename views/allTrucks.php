<?php
require_once 'config/database.php'; 
require_once 'models/truck.php';
require_once 'controllers/truckController.php';

$db = new Database();
$connection = $db->getConnection();

$truckController = new TruckController($connection);

$results = $truckController->getAllTrucks();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All bills</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <?php if (!empty($results)): ?>
    <table class="table">
        <thead>
            <tr>
                <th>PlateNb</th>
                <th>CompanyID</th>
                <th>BranchID</th>
                <th>FuelType</th>
                <th>Capacity</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($results as $truck): ?>
            <tr>
                <td><?= htmlspecialchars($truck['PlateNb']); ?></td>
                <td><?= htmlspecialchars($truck['CompanyID']); ?></td>
                <td><?= htmlspecialchars($truck['BranchID']); ?></td>
                <td><?= htmlspecialchars($truck['FuelType']); ?></td>
                <td><?= htmlspecialchars($truck['Capacity']); ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php else: ?>
        <p>No trucks found.</p>
    <?php endif; ?>
</body>
</html>