<?php
require_once 'config/database.php'; 
require_once 'models/headquarter.php';
require_once 'controllers/hqController.php';

$db = new Database();
$connection = $db->getConnection();

$hqController = new HqController($connection);

$result = $hqController->getAllHeadquarters();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All headquarters</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <?php if (!empty($result) && $result['success'] && !empty($result['headquarters'])): ?>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Email</th>
                <th>Nb of employees</th>
                <th>Country</th>
                <th>City</th>
                <th>Street</th>
                <th>Building</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($result['headquarters'] as $hq): ?>
            <tr>
                <td>
                    <a href="/fuelogic/edit-headquarter/<?= htmlspecialchars($hq['ID']); ?>">
                        <?= htmlspecialchars($hq['ID']); ?>
                    </a>
                </td> <!-- Simalar to forEach in react -->
                <td><?= htmlspecialchars($hq['Email']); ?></td>
                <td><?= htmlspecialchars($hq['Nb_of_employees']); ?></td>
                <td><?= htmlspecialchars($hq['Country']); ?></td>
                <td><?= htmlspecialchars($hq['City']); ?></td>
                <td><?= htmlspecialchars($hq['Street']); ?></td>
                <td><?= htmlspecialchars($hq['Building']); ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php elseif ($result['success'] && empty($result['headquarters'])): ?>
        <p>No headquarters found.</p>
    <?php endif; ?>
    <?php if (!$result['success']): ?>
        <p>Error: <?= htmlspecialchars($result['error']); ?></p>
    <?php endif; ?>
</body>
</html>