<?php
require_once 'config/database.php'; 
require_once 'models/employee.php';
require_once 'controllers/employeeController.php';

$db = new Database();
$connection = $db->getConnection();

$employeeController = new EmployeeController($connection);

$result = $employeeController->getAllEmployees();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All employees</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <?php if (!empty($result) && $result['success'] && !empty($result['employees'])): ?>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Company ID</th>
                <th>First name</th>
                <th>Last name</th>
                <th>Gender</th>
                <th>Email</th>
                <th>Age</th>
                <th>Job</th>
                <th>Salary</th>
                <th>Workplace ID</th>
                <th>Address</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($result['employees'] as $employee): ?>
            <tr>
                <td>
                    <a href="/fuelogic/edit-employee/<?= htmlspecialchars($employee['ID']); ?>">
                        <?= htmlspecialchars($employee['ID']); ?>
                    </a>
                </td>
                <td><?= htmlspecialchars($employee['CompanyID']); ?></td>
                <td><?= htmlspecialchars($employee['FirstName']); ?></td>
                <td><?= htmlspecialchars($employee['LastName']); ?></td>
                <td><?= htmlspecialchars($employee['Gender']); ?></td>
                <td><?= htmlspecialchars($employee['Email']); ?></td>
                <td><?= htmlspecialchars($employee['Age']); ?></td>
                <td><?= htmlspecialchars($employee['Job']); ?></td>
                <td><?= htmlspecialchars($employee['Salary']); ?></td>
                <td><?= htmlspecialchars($employee['WorkplaceID']); ?></td>
                <td><?= htmlspecialchars($employee['Address']); ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php elseif ($result['success'] && empty($result['employees'])): ?>
        <p>No employees found.</p>
    <?php endif; ?>
    <?php if (!$result['success']): ?>
        <p>Error: <?= htmlspecialchars($result['error']); ?></p>
    <?php endif; ?>
</body>
</html>