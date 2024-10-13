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
    <link href="css/layout.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <?php require 'navbar.php'; ?>
    <div class="d-flex justify-content-center vh-50 mt-5" id="">
        <div class="form-div col-sm-8 col-md-6 border border-dark rounded p-4">
            <div class="mb-3">
                <label class="form-label" for="employeeName">Employee Name</label>
                <input type="text" id="employeeName" class="form-control" name="employee_name">
            </div>
            <form action="add-relative" method="POST">
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

    $result = $relativeController->createRelative(
        $employee_id, $name, $age, $relationship, $phone_nb, $country, $city, $street, $building
    );

    if($result) {
        echo "Relative has been added";
    } else {
        echo "Error adding relative";
    }
}