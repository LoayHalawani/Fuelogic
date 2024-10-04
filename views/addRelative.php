<?php
require_once 'config/database.php';
require_once 'models/employee.php';
require_once 'controllers/employeeController.php';

$db = new Database();
$connection = $db->getConnection();
$employeeController = new EmployeeController($connection);

if (isset($_GET['name'])) {
    $name = $_GET['name'];
    $employee = $employeeController->getEmployeeByName($name);

    if ($employee) {
        echo json_encode(['success' => true, 'id' => $employee['ID']]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Employee not found']);
    }
} 
// else {
//     echo json_encode(['success' => false, 'message' => 'No name provided']);
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add relative</title>
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
            <div class="mb-3">
                <label class="form-label" for="employeeName">Employee Name</label>
                <input type="text" id="employeeName" class="form-control" name="employee_name">
            </div>
            <form>
                <div class="mb-3">
                    <label class="form-label" for="employeeID">Employee ID</label>
                    <input type="text" id="employeeID" class="form-control" name="employee_id" readonly>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Name</label>
                    <input type="password" class="form-control" name="name" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="exampleCheck1">Age</label>
                    <input type="text" name="age" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="exampleCheck1">Relationship</label>
                    <input type="text" name="relationship" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="exampleCheck1">Phone number</label>
                    <input type="text" name="phone_nb" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="exampleCheck1">Country</label>
                    <input type="text" name="country" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="exampleCheck1">City</label>
                    <input type="text" name="city" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="exampleCheck1">Street</label>
                    <input type="text" name="street" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="exampleCheck1">Building</label>
                    <input type="text" name="building" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-dark">Submit</button>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        // Attach an event listener to the employee name input field
        document.getElementById('employeeName').addEventListener('input', function () {
            var employeeName = this.value;

            // Make an AJAX request to get the employee ID
            if (employeeName.length > 2) { // Only search if the name is longer than 2 characters
                fetch('getEmployeeID.php?name=' + employeeName)
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // If employee is found, populate the employee ID field
                            document.getElementById('employeeID').value = data.id;
                        } else {
                            // If no employee found, clear the employee ID field
                            document.getElementById('employeeID').value = '';
                            console.log(data.message);
                        }
                    })
                    .catch(error => console.error('Error fetching employee ID:', error));
            } else {
                // Clear the employee ID if the input is too short
                document.getElementById('employeeID').value = '';
            }
        });
    </script>
</body>
</html>

<?php
require_once 'models/relative.php';
require_once 'controllers/relativeController.php';

$db = new Database();
$connection = $db->getConnection();

$relativeController = new RelativeController($connection);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $employee_id = $_POST['employee_id'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $relationship = $_POST['relationship'];
    $phone_nb = $_POST['phone_nb'];
    $country = $_POST['country'];
    $city = $_POST['city'];
    $street = $_POST['street'];
    $building = $_POST['building'];

    $result = $contractController->createContract(
        $employee_id, $name, $age, $relationship, $phone_nb, $country, $city, $street, $building
    );

    if($result) {
        echo "Relative has been added";
    } else {
        echo "Error adding relative";
    }
}