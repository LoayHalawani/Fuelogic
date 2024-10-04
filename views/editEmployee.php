<?php
require_once 'config/database.php'; 
require_once 'models/employee.php';
require_once 'controllers/employeeController.php';

$db = new Database();
$connection = $db->getConnection();

$employeeController = new EmployeeController($connection);

$employee = $employeeController->getEmployeeByID($id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update employee</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">NAHL Company</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Dropdown
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
                </li>
                <li class="nav-item">
                <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                </li>
            </ul>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
            </div>
        </div>
    </nav>
    <?php if ($employee) { ?>
    <div class="d-flex justify-content-center vh-50 mt-5">
        <div class="col-sm-8 col-md-6 border border-dark rounded p-4">
            <form action="edit-employee/<?php $id?>" method="POST">
                <div class="mb-3">
                    <label class="form-label" for="exampleCheck1">ID</label>
                    <input type="text" class="form-control" value=<?= htmlspecialchars($employee['ID']); ?> name="company_id">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Company ID</label>
                    <input type="text" class="form-control" value=<?= htmlspecialchars($employee['CompanyID']); ?> name="consumer_id" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="exampleCheck1">First name</label>
                    <input type="text" name="fuel_type" value=<?= htmlspecialchars($employee['FirstName']); ?> class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="exampleCheck1">Middle name</label>
                    <input type="text" name="fuel_amount" value=<?= htmlspecialchars($employee['MiddleName']); ?> class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="exampleCheck1">Last name</label>
                    <input type="text" name="payment_date" value=<?= htmlspecialchars($employee['LastName']); ?> class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="exampleCheck1">Gender</label>
                    <input type="text" name="payment_method" value=<?= htmlspecialchars($employee['Gender']); ?> class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="exampleCheck1">Email</label>
                    <input type="text" name="currency" value=<?= htmlspecialchars($employee['Email']); ?> class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="exampleCheck1">Age</label>
                    <input type="text" name="currency" value=<?= htmlspecialchars($employee['Age']); ?> class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="exampleCheck1">Job</label>
                    <input type="text" name="currency" value=<?= htmlspecialchars($employee['Job']); ?> class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="exampleCheck1">Salary</label>
                    <input type="text" name="currency" value=<?= htmlspecialchars($employee['Salary']); ?> class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="exampleCheck1">Workplace ID</label>
                    <input type="text" name="currency" value=<?= htmlspecialchars($employee['WorkplaceID']); ?> class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="exampleCheck1">Address</label>
                    <input type="text" name="currency" value=<?= htmlspecialchars($employee['Address']); ?> class="form-control" required>
                </div>
                <button type="submit" class="btn btn-dark">Submit</button>
            </form>
        </div>
    </div>
    <?php 
    } else {
        echo json_encode(['message' => 'employee not found']);
    } 
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $company_id = $_POST['company_id'];
    $consumer_id = $_POST['consumer_id'];
    $fuel_type = $_POST['fuel_type'];
    $fuel_amount = $_POST['fuel_amount'];
    $payment_date = $_POST['payment_date'];
    $payment_method = $_POST['payment_method'];
    $currency = $_POST['currency'];
    $price = $_POST['price'];

    $result = $employeeController->updateemployee(
        $company_id, $consumer_id, $fuel_type, $fuel_amount, $payment_date, $payment_method, $currency, $price
    );

    if($result) {
        echo "employee has been updated";
    } else {
        echo "Error updating employee";
    }
}