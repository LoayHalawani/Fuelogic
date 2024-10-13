<?php
require_once 'config/database.php';
require_once 'models/headquarter.php';
require_once 'controllers/hqController.php';

$db = new Database();
$connection = $db->getConnection();

$hqController = new HqController($connection);
$results = $hqController->getCompaniesOfHQ($hq_id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Headquarter info</title>
</head>
<body>
    <?php require 'navbar.php'; ?>
    <?php if (!empty($results)): ?>
    <div class="allrows-div">
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
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($results as $company): ?>
                <tr>
                    <td><a href="/fuelogic/company-info/<?= htmlspecialchars($company['ID']); ?>"><?= htmlspecialchars($company['ID']); ?></td> <!-- Simalar to forEach in react -->
                    <td><?= htmlspecialchars($company['RegistrationNb']); ?></td>
                    <td><?= htmlspecialchars($company['Nb_of_trucks']); ?></td>
                    <td><?= htmlspecialchars($company['Nb_of_employees']); ?></td>
                    <td><?= htmlspecialchars($company['Nb_of_branches']); ?></td>
                    <td><?= htmlspecialchars($company['TotalIncome']); ?></td>
                    <td><?= htmlspecialchars($company['HeadquarterID']); ?></td>
                    <td>
                        <a style="color: blue;" href="/fuelogic/edit-company/<?= htmlspecialchars($company['ID']); ?>">Edit</a>
                    </td>
                    <td>
                        <form action="all-companies" method="POST">
                            <input style="display: none;" type="text" name="company_id" class="form-control" value=<?= htmlspecialchars($company['ID']); ?>>
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
            <h1 style="color: black; background-color: white;">No companies found. <a href="../../../fuelogic/add-company/hq/<?= htmlspecialchars($hq_id); ?>">Add</a></h1>
        </div>
    <?php endif; ?>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $company_id = $_POST['company_id'];

    $result = $companyController->deleteCompanyByID($company_id);

    if ($result) {
        // Redirect to the same page with the updated headquarter data to refresh the form fields
        // header("Location: /fuelogic/all-companies/$id");
        echo "<script>alert('Company has been deleted');</script>";
    } else {
        echo "<script>alert('Error deleting company');</script>";
    }
}