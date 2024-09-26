<?php
require_once 'config/database.php'; 
require_once 'models/company.php';
require_once 'controllers/companyController.php';

$db = new Database();
$connection = $db->getConnection();

$companyController = new CompanyController($connection);

$results = $companyController->getAllCompanies();
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
    <?php if (!empty($results)): ?>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Registration nb</th>
                <th>Nb of trucks</th>
                <th>Nb of employees</th>
                <th>Nb of branches</th>
                <th>Total income</th>
                <th>Headquarter ID</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($results as $hq): ?>
            <tr>
                <td><?= htmlspecialchars($hq['ID']); ?></td> <!-- Simalar to forEach in react -->
                <td><?= htmlspecialchars($hq['RegistrationNb']); ?></td>
                <td><?= htmlspecialchars($hq['Nb_of_trucks']); ?></td>
                <td><?= htmlspecialchars($hq['Nb_of_employees']); ?></td>
                <td><?= htmlspecialchars($hq['Nb_of_branches']); ?></td>
                <td><?= htmlspecialchars($hq['TotalIncome']); ?></td>
                <td><?= htmlspecialchars($hq['HeadquarterID']); ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php else: ?>
        <p>No companies found.</p>
    <?php endif; ?>
</body>
</html>