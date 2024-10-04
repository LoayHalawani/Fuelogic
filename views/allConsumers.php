<?php
require_once 'config/database.php'; 
require_once 'models/contract.php';
require_once 'controllers/consumersController.php';

$db = new Database();
$connection = $db->getConnection();

$consumersController = new ConsumerController($connection);

$results = $consumersController->getAllConsumers);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All consumers</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <?php if (!empty($results)): ?>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Type</th>
                <th>Company ID</th>
                <th>Phone number</th>
                <th>Country</th>
                <th>City</th>
                <th>Street</th>
                <th>Building</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($results as $consumer): ?>
            <tr>
                <td><?= htmlspecialchars($consumer['ID']); ?></td>
                <td><?= htmlspecialchars($consumer['Name']); ?></td>
                <td><?= htmlspecialchars($consumer['Type']); ?></td>
                <td><?= htmlspecialchars($consumer['Company ID']); ?></td>
                <td><?= htmlspecialchars($consumer['Country']); ?></td>
                <td><?= htmlspecialchars($consumer['City']); ?></td>
                <td><?= htmlspecialchars($consumer['Street']); ?></td>
                <td><?= htmlspecialchars($consumer['Building']); ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php else: ?>
        <p>No consumers found.</p>
    <?php endif; ?>
</body>
</html>