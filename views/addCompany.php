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
    <title>Add company</title>
    <link href="css/addHeadquarter.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <form action="add-company" method="POST">
        
        
        
        <label for="cars">HQ id:</label>
        <select name="hq_id" id="hq">
            <?php foreach($result['headquarters'] as $hq): ?>
            <option value=<?= htmlspecialchars($hq['ID']); ?>><?= htmlspecialchars($hq['ID']); ?></option>
            <?php endforeach; ?>
        </select>
        
        
        <button type="submit">Add Company</button>
    </form>

    <div class="d-flex justify-content-center vh-50 mt-5" id="">
        <div class="col-sm-8 col-md-6 border border-dark rounded p-4">
            <form>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="text" name="registration_nb" class="form-control" placeholder="Registration number" required>
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
require_once 'models/company.php';
require_once 'controllers/companyController.php';

$db = new Database();
$connection = $db->getConnection();

$companyController = new CompanyController($connection);
$hqController = new HqController($connection);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $registration_nb = $_POST['registration_nb'];
    $nb_of_trucks = $_POST['nb_of_trucks'];
    $nb_of_branches = $_POST['nb_of_branches'];
    $nb_of_employees= $_POST['nb_of_employees'];
    $total_income= $_POST['total_income'];
    $hq_id = $_POST['hq_id'];
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