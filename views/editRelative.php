<?php
require_once 'config/database.php'; 
require_once 'models/relative.php';
require_once 'controllers/relativeController.php';

$db = new Database();
$connection = $db->getConnection();

$relativeController = new RelativeController($connection);

$relative = $relativeController->getRelativeByID($id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update relative</title>
    <link href="../css/layout.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <?php require 'navbar.php'; ?>
    <?php if ($relative) { ?>
    <div class="d-flex justify-content-center vh-50 mt-5">
        <div class="form-div col-sm-8 col-md-6 border border-dark rounded p-4">
            <form>
                <div class="mb-3">
                    <label class="form-label" for="exampleCheck1">Employee ID</label>
                    <input type="text" name="employee_id" class="form-control" value=<?= htmlspecialchars($relative['EmployeeID']); ?>>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" value=<?= htmlspecialchars($relative['Name']); ?> required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="exampleCheck1">Age</label>
                    <input type="text" name="age" value=<?= htmlspecialchars($relative['Age']); ?> class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="exampleCheck1">Relationship</label>
                    <input type="text" name="relationship" value=<?= htmlspecialchars($relative['Relationship']); ?> class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="exampleCheck1">Phone number</label>
                    <input type="text" name="phone_nb" value=<?= htmlspecialchars($relative['PhoneNb']); ?> class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="exampleCheck1">Country</label>
                    <input type="text" name="country" value=<?= htmlspecialchars($relative['Country']); ?> class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="exampleCheck1">City</label>
                    <input type="text" name="city" value=<?= htmlspecialchars($relative['City']); ?> class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="exampleCheck1">Street</label>
                    <input type="text" name="street" value=<?= htmlspecialchars($relative['Street']); ?> class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="exampleCheck1">Building</label>
                    <input type="text" name="building" value=<?= htmlspecialchars($relative['Building']); ?> class="form-control" required>
                </div>
                <button type="submit" class="btn btn-dark">Submit</button>
            </form>
        </div>
    </div>
    <?php 
    } else {
        echo json_encode(['message' => 'relative not found']);
    } 
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

<?php
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

    $result = $relativeController->updaterelative(
        $employee_id, $name, $age, $relationship, $phone_nb, $country, $city, $street, $building
    );

    if($result) {
        echo "relative has been updated";
    } else {
        echo "Error updating relative";
    }
}