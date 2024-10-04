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
    <title>All bills</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <?php if (!empty($results)): ?>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>HeadquarterID</th>
                <th>Country</th>
                <th>City</th>
                <th>Street</th>
                <th>Building</th>
                <th>Nb_of_employees</th>
                <th>Nb_of_trucks</th>
                <th>Nb_of_storages</th>
                <th>Status</th>
                <th>Refuels</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($results as $branch): ?>
            <tr>
                <td><?= htmlspecialchars($branch['ID']); ?></td>
                <td><?= htmlspecialchars($branch['HeadquarterID']); ?></td>
                <td><?= htmlspecialchars($branch['Country']); ?></td>
                <td><?= htmlspecialchars($branch['City']); ?></td>
                <td><?= htmlspecialchars($branch['Street']); ?></td>
                <td><?= htmlspecialchars($branch['Building']); ?></td>
                <td><?= htmlspecialchars($branch['Nb_of_employees']); ?></td>
                <td><?= htmlspecialchars($branch['Nb_of_trucks']); ?></td>
                <td><?= htmlspecialchars($branch['Nb_of_storages']); ?></td>
                <td><?= htmlspecialchars($branch['Status']); ?></td>
                <td><?= htmlspecialchars($branch['Refuels']); ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php else: ?>
        <p>No branch found.</p>
    <?php endif; ?>
</body>
</html>