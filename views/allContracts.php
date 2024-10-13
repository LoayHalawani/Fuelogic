<?php
require_once 'config/database.php'; 
require_once 'models/contract.php';
require_once 'controllers/contractController.php';

$db = new Database();
$connection = $db->getConnection();

$contractController = new ContractController($connection);

$results = $contractController->getAllContracts();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All contracts</title>
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
                    <th>ID</th>
                    <th>Fuel type</th>
                    <th>Fuel amount</th>
                    <th>Reception date</th>
                    <th>Signature date</th>
                    <th>Price</th>
                    <th>Currency</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($results as $contract): ?>
                <tr>
                    <td><?= htmlspecialchars($contract['ID']); ?></td>
                    <td><?= htmlspecialchars($contract['FuelType']); ?></td>
                    <td><?= htmlspecialchars($contract['FuelAmount']); ?></td>
                    <td><?= htmlspecialchars($contract['ReceptionDate']); ?></td>
                    <td><?= htmlspecialchars($contract['SignatureDate']); ?></td>
                    <td><?= htmlspecialchars($contract['Price']); ?></td>
                    <td><?= htmlspecialchars($contract['Currency']); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?php else: ?>
        <p>No contracts found.</p>
    <?php endif; ?>
</body>
</html>