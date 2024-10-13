<?php
require_once 'config/database.php';
require_once 'models/company.php';
require_once 'controllers/companyController.php';

$db = new Database();
$connection = $db->getConnection();

$companyController = new CompanyController($connection);
$results = $companyController->getBranchesOfCompany($company_id);
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
                    <td>
                        <a style="color: blue;" href="/fuelogic/edit-branch/<?= htmlspecialchars($branch['ID']); ?>">Edit</a>
                    </td>
                    <td>
                        <form action="all-branches" method="POST">
                            <input style="display: none;" type="text" name="id" class="form-control" value=<?= htmlspecialchars($branch['ID']); ?>>
                            <button type="submit" style="color: red;">Delete</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?php else: ?>
        <div style="display: flex; justify-content: center; align-items: center; margin-top: 10%;">
            <h1 style="color: black; background-color: white;">No branches found. <a href="../../../fuelogic/add-branch/company/<?= htmlspecialchars($company_id); ?>">Add</a></h1>
        </div>
    <?php endif; ?>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_POST['id'];

    $result = $branchController->deleteBranchByID($id);

    if ($result) {
        // Redirect to the same page with the updated headquarter data to refresh the form fields
        // header("Location: /fuelogic/all-companies/$id");
        echo "<script>alert('Branch has been deleted');</script>";
    } else {
        echo "<script>alert('Error deleting branch');</script>";
    }
}