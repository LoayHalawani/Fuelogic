<?php
require_once 'config/database.php'; 
require_once 'models/company.php';
require_once 'controllers/companyController.php';

$db = new Database();
$connection = $db->getConnection();

$companyController = new CompanyController($connection);

$results = $companyController->getTrucksOfCompany($company_id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All bills</title>
    <link href="css/layout.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <?php require 'navbar.php'; ?>
    <?php if (!empty($results)): ?>
    <div class="allrows-div">
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
    </div>
    <?php else: ?>
        <div style="display: flex; justify-content: center; align-items: center; margin-top: 10%;">
            <h1 style="color: black; background-color: white;">No trucks found. <a href="../../../fuelogic/add-truck/company/<?= htmlspecialchars($company_id); ?>">Add</a></h1>
        </div>
    <?php endif; ?>
</body>
</html>