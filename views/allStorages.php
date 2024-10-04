<?php
require_once 'config/database.php'; 
require_once 'models/branch.php';
require_once 'controllers/storageController.php';

$db = new Database();
$connection = $db->getConnection();

$storageController = new StorageController($connection);

$results = $storageController->getAllStorages();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All storages</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <?php if (!empty($results)): ?>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Capacity</th>
                <th>CurrentCapacity</th>
                <th>StoringConditions</th>
                <th>BranchID</th>
                <th>FuelType</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($results as $storage): ?>
            <tr>
                <td><?= htmlspecialchars($storage['ID']); ?></td>
                <td><?= htmlspecialchars($storage['Capacity']); ?></td>
                <td><?= htmlspecialchars($storage['CurrentCapacity']); ?></td>
                <td><?= htmlspecialchars($storage['StoringConditions']); ?></td>
                <td><?= htmlspecialchars($storage['BranchID']); ?></td>
                <td><?= htmlspecialchars($storage['FuelType']); ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php else: ?>
        <p>No storages found.</p>
    <?php endif; ?>
</body>
</html>