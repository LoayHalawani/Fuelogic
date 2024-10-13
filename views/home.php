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
    <link href="css/layout.css" rel="stylesheet">
    <link href="css/home.css" rel="stylesheet">
    <title>Home</title>
</head>
<body>
    <?php require 'navbar.php'; ?>
    <h2>Headquarters</h2>
    <?php if (!empty($result) && $result['success'] && !empty($result['headquarters'])): ?>
    <div class="allrows-div">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Email</th>
                    <th>Nb of employees</th>
                    <th>Country</th>
                    <th>City</th>
                    <th>Street</th>
                    <th>Building</th>
                    <th>Edit</th>
                    <th>Delete</th>
                    <th><a href="/fuelogic/add-headquarter">Add HQ</a></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($result['headquarters'] as $hq): ?>
                <tr>
                    <td><a href="/fuelogic/headquarter-info/<?= htmlspecialchars($hq['ID']); ?>"><?= htmlspecialchars($hq['ID']); ?></a></td>
                    <td><?= htmlspecialchars($hq['Email']); ?></td>
                    <td><?= htmlspecialchars($hq['Nb_of_employees']); ?></td>
                    <td><?= htmlspecialchars($hq['Country']); ?></td>
                    <td><?= htmlspecialchars($hq['City']); ?></td>
                    <td><?= htmlspecialchars($hq['Street']); ?></td>
                    <td><?= htmlspecialchars($hq['Building']); ?></td>
                    <td>
                        <a style="color: blue;" href="/fuelogic/edit-headquarter/<?= htmlspecialchars($hq['ID']); ?>">Edit</a>
                    </td>
                    <td>
                        <form action="all-headquarters" method="POST">
                            <input style="display: none;" type="text" name="hq_id" class="form-control" value=<?= htmlspecialchars($hq['ID']); ?>>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                    <td></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?php else: ?>
        <div style="display: flex; justify-content: center; align-items: center; margin-top: 10%;">
            <h1 style="color: black; background-color: white;">No headquarters found. <a href="/fuelogic/add-headquarter">Add</a></h1>
        </div>
    <?php endif; ?>
</body>
</html>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['hq_id'])) {
    $hq_id = $_POST['hq_id'];
    $result = $hqController->deleteHqByID($hq_id);

    if ($result) {
        // Redirect to the same page with the updated headquarter data to refresh the form fields
        // header("Location: /fuelogic/all-companies/$id");
        echo "<script>alert('HQ has been deleted');</script>";
    } else {
        echo "<script>alert('Error deleting HQ');</script>";
    }
}
?>