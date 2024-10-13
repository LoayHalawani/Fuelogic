<?php
require_once 'config/database.php'; 
require_once 'models/company.php';
require_once 'controllers/companyController.php';

$db = new Database();
$connection = $db->getConnection();

$companyController = new CompanyController($connection);

$company = $companyController->getCompanyByID($id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update company</title>
    <link href="../css/layout.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <?php require 'navbar.php'; ?>
    <?php if ($company) { ?>
    <div class="d-flex justify-content-center vh-50 mt-5">
        <div class="form-div col-sm-8 col-md-6 border border-dark rounded p-4">
            <form action="edit-company/<?php $id?>" method="POST">
                <div class="mb-3">
                    <label class="form-label" for="exampleCheck1">ID</label>
                    <input type="text" class="form-control" value=<?= htmlspecialchars($company['ID']); ?> name="company_id">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Company ID</label>
                    <input type="text" class="form-control" value=<?= htmlspecialchars($company['RegistrationNb']); ?> name="consumer_id" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="exampleCheck1">First name</label>
                    <input type="text" name="fuel_type" value=<?= htmlspecialchars($company['Nb_of_trucks']); ?> class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="exampleCheck1">Middle name</label>
                    <input type="text" name="fuel_amount" value=<?= htmlspecialchars($company['Nb_of_employees']); ?> class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="exampleCheck1">Last name</label>
                    <input type="text" name="payment_date" value=<?= htmlspecialchars($company['Nb_of_branches']); ?> class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="exampleCheck1">Gender</label>
                    <input type="text" name="payment_method" value=<?= htmlspecialchars($company['TotalIncome']); ?> class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="exampleCheck1">Email</label>
                    <input type="text" name="currency" value=<?= htmlspecialchars($company['HeadquarterID']); ?> class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="exampleCheck1">Age</label>
                    <input type="text" name="currency" value=<?= htmlspecialchars($company['Continent']); ?> class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="exampleCheck1">Job</label>
                    <input type="text" name="currency" value=<?= htmlspecialchars($company['Name']); ?> class="form-control" required>
                </div>
                <button type="submit" class="btn btn-dark">Submit</button>
            </form>
        </div>
    </div>
    <?php 
    } else {
        echo json_encode(['message' => 'company not found']);
    } 
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $registration_nb = $_POST['registration_nb'];
    $nb_of_trucks = $_POST['nb_of_trucks'];
    $nb_of_branches = $_POST['nb_of_branches'];
    $nb_of_employees= $_POST['nb_of_employees'];
    $total_income= $_POST['total_income'];
    $hq_id = $_POST['hq_id'];
    $name= $_POST['name'];
    $continent= $_POST['continent'];

    $result = $companyController->updatecompany(
        $registration_nb, $nb_of_trucks, $nb_of_branches, $nb_of_employees,
        $total_income, $hq_id, $name, $continent
    );

    if($result) {
        echo "company has been updated";
    } else {
        echo "Error updating company";
    }
}