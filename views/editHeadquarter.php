<?php
require_once 'config/database.php'; 
require_once 'models/headquarter.php';
require_once 'controllers/hqController.php';

$db = new Database();
$connection = $db->getConnection();

$hqController = new HqController($connection);

$headquarter = $hqController->getHqByID($id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update headquarter</title>
    <link href="../css/layout.css" rel="stylesheet">
</head>
<body>
    <?php require 'navbar.php'; ?>
    <?php if ($headquarter) { ?>
    <div class="d-flex justify-content-center vh-50 mt-5">
        <div class="form-div col-sm-8 col-md-6 border border-dark rounded p-4">
            <form id="form" action="../edit-headquarter/<?= htmlspecialchars($headquarter['ID']); ?>" method="POST">
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Email</label>
                    <input type="text" name="email" class="form-control" value=<?= htmlspecialchars($headquarter['Email']); ?> required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="exampleCheck1">Number of employees</label>
                    <input type="text" name="nb_of_employees" value=<?= htmlspecialchars($headquarter['Nb_of_employees']); ?> class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="exampleCheck1">Country</label>
                    <input type="text" name="country" value=<?= htmlspecialchars($headquarter['Country']); ?> class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="exampleCheck1">City</label>
                    <input type="text" name="city" value=<?= htmlspecialchars($headquarter['City']); ?> class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="exampleCheck1">Street</label>
                    <input type="text" name="street" value=<?= htmlspecialchars($headquarter['Street']); ?> class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="exampleCheck1">Building</label>
                    <input type="text" name="building" value=<?= htmlspecialchars($headquarter['Building']); ?> class="form-control" required>
                </div>
                <button type="submit" class="btn btn-dark">Submit</button>
            </form>
        </div>
    </div>
    <?php 
    } else {
        echo json_encode(['message' => 'headquarter not found']);
    } 
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST['email'];
    $nb_of_employees = $_POST['nb_of_employees'];
    $country = $_POST['country'];
    $city = $_POST['city'];
    $street = $_POST['street'];
    $building = $_POST['building'];

    $result = $hqController->updateHq(
        $id, $email, $nb_of_employees, $country, $city,
        $street, $building
    );

    if ($result) {
        // Redirect to the same page with the updated headquarter data to refresh the form fields
        header("Location: /fuelogic/edit-headquarter/$id");
        echo "<script>alert('Headquarter has been updated successfully');</script>";
    } else {
        echo "<script>alert('Error updating headquarter');</script>";
    }
}