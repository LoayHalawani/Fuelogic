<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add company</title>
</head>
<body>
    <?php require 'navbar.php'; ?>
    <div class="d-flex justify-content-center vh-50 mt-5" id="">
        <div class="form-div col-sm-8 col-md-6 border border-dark rounded p-4">
            <form action="<?= htmlspecialchars($hq_id); ?>" method="POST">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Registration nb</label>
                    <input type="text" name="registration_nb" class="form-control" placeholder="Registration nb" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="exampleCheck1">Number of trucks</label>
                    <input type="text" name="nb_of_trucks" class="form-control" placeholder="Number of trucks" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Number of branches</label>
                    <input type="text" name="nb_of_branches" class="form-control" placeholder="Number of branches" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="exampleCheck1">Number of employees</label>
                    <input type="text" name="nb_of_employees" class="form-control" placeholder="Number of employees" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="exampleCheck1">Total income</label>
                    <input type="text" name="total_income" class="form-control" placeholder="Total income" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="exampleCheck1">Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Name" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="exampleCheck1">Continent</label>
                    <input type="text" name="continent" class="form-control" placeholder="Continent" required>
                </div>
                <button type="submit" class="btn btn-dark">Submit</button>
            </form>
        </div>
    </div>
</body>
</html>

<?php
require_once 'config/database.php'; 
require_once 'models/company.php';
require_once 'controllers/companyController.php';

$db = new Database();
$connection = $db->getConnection();

$companyController = new CompanyController($connection);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $registration_nb = $_POST['registration_nb'];
    $nb_of_trucks = $_POST['nb_of_trucks'];
    $nb_of_branches = $_POST['nb_of_branches'];
    $nb_of_employees= $_POST['nb_of_employees'];
    $total_income= $_POST['total_income'];
    $name= $_POST['name'];
    $continent= $_POST['continent'];

    $result = $companyController->createCompany(
        $registration_nb, $nb_of_trucks, $nb_of_branches, $nb_of_employees,
        $total_income, $hq_id, $name, $continent
    );

    if($result) {
        echo "Company has been added";
    } else {
        echo "Error adding company";
    }
}