<?php
require_once 'config/database.php';
require_once 'models/company.php';
require_once 'controllers/companyController.php';

$db = new Database();
$connection = $db->getConnection();

$companyController = new CompanyController($connection);

$result = $companyController->getAllCompanies();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add employee</title>
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
    
    <div class="d-flex justify-content-center vh-50 mt-5" id="">
        <div class="col-sm-8 col-md-6 border border-dark rounded p-4">
            <form action="add-employee" method="POST">
                <div class="mb-3">
                    <label for="first_name" class="form-label">First Name</label>
                    <input type="text" name="first_name" class="form-control" placeholder="First Name" required>
                </div>
                <div class="mb-3">
                    <label for="last_name" class="form-label">Last Name</label>
                    <input type="text" name="last_name" class="form-control" placeholder="Last Name" required>
                </div>
                <div class="mb-3">
                    <label for="middle_name" class="form-label">Middle Name</label>
                    <input type="text" name="middle_name" class="form-control" placeholder="Middle Name" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" name="email" class="form-control" placeholder="Email" required>
                </div>
                <div class="mb-3">
                    <label for="phone_nb" class="form-label">Phone Number</label>
                    <input type="text" name="phone_nb" class="form-control" placeholder="Phone Number" required>
                </div>
                <div class="mb-3">
                    <label for="gender" class="form-label">Gender</label>
                    <input type="text" name="gender" class="form-control" placeholder="Gender" required>
                </div>
                <div class="mb-3">
                    <label for="workplace_id" class="form-label">Workplace ID</label>
                    <input type="text" name="workplace_id" class="form-control" placeholder="Workplace ID" required>
                </div>
                <div class="mb-3">
                    <label for="job" class="form-label">Job</label>
                    <input type="text" name="job" class="form-control" placeholder="Job" required>
                </div>
                <div class="mb-3">
                    <label for="age" class="form-label">Age</label>
                    <input type="text" name="age" class="form-control" placeholder="Age" required>
                </div>
                <div class="mb-3">
                    <label for="company_id" class="form-label">Company ID</label>
                    <input type="text" name="company_id" class="form-control" placeholder="Company ID" required>
                </div>
                <div class="mb-3">
                    <label for="salary" class="form-label">Salary</label>
                    <input type="text" name="salary" class="form-control" placeholder="Salary" required>
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" name="address" class="form-control" placeholder="Address" required>
                </div>
                <button type="submit" class="btn btn-dark">Submit</button>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

<?php
require_once 'models/employee.php';
require_once 'controllers/employeeController.php';

$db = new Database();
$connection = $db->getConnection(); // -> in php is same as '.' in other languages like java (connection.getConnection();)

$employeeController = new EmployeeController($connection);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve form data
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $middle_name = $_POST['middle_name'];
    $email = $_POST['email'];
    $phone_nb = $_POST['phone_nb'];
    $gender = $_POST['gender'];
    $workplace_id = $_POST['workplace_id'];
    $job = $_POST['job'];
    $age = $_POST['age'];
    $company_id = $_POST['company_id'];
    $salary = $_POST['salary'];
    $address = $_POST['address'];

    $employeeController->createEmployee(
        $phone_nb, $gender, $email, $workplace_id, 
        $job, $age, $company_id, $first_name, $last_name, 
        $middle_name, $salary, $address
    );
}