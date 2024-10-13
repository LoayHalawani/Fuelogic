<?php
require_once 'config/database.php'; 
require_once 'models/bill.php';
require_once 'controllers/billController.php';

$db = new Database();
$connection = $db->getConnection();

$billsController = new BillController($connection);

$results = $billsController->getAllBills();
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
                    <th>BillNb</th>
                    <th>CompanyID nb</th>
                    <th>ConsumerID</th>
                    <th>FuelType</th>
                    <th>FuelAmount</th>
                    <th>PaymentDate</th>
                    <th>PaymentMethod</th>
                    <th>Currency</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($results as $bill): ?>
                <tr>
                    <td><?= htmlspecialchars($bill['BillNb']); ?></td>
                    <td><?= htmlspecialchars($bill['CompanyID']); ?></td>
                    <td><?= htmlspecialchars($bill['ConsumerID']); ?></td>
                    <td><?= htmlspecialchars($bill['FuelType']); ?></td>
                    <td><?= htmlspecialchars($bill['FuelAmount']); ?></td>
                    <td><?= htmlspecialchars($bill['PaymentDate']); ?></td>
                    <td><?= htmlspecialchars($bill['PaymentMethod']); ?></td>
                    <td><?= htmlspecialchars($bill['Currency']); ?></td>
                    <td><?= htmlspecialchars($bill['Price']); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?php else: ?>
        <p>No bills found.</p>
    <?php endif; ?>
</body>
</html>