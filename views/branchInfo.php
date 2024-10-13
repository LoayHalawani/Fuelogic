<?php 
require_once 'config/database.php'; 
require_once 'models/branch.php';
require_once 'controllers/branchController.php';

$db = new Database();
$connection = $db->getConnection();

$branchController = new BranchController($connection);

$branch = $branchController->getBranchByID($company_id);

$trucks = $branchController->getSuppliersOfBranch($company_id);
$consumers = $branchController->getStoragesOfBranch($company_id);
$employees = $branchController->getTrucksOfBranch($company_id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Branch info</title>
</head>
<body>
    <?php require 'navbar.php'; ?>
    <?php if ($branch) { ?>
        <div class="d-flex justify-content-center vh-50 mt-5">
            <div class="form-div col-sm-8 col-md-6 border border-dark rounded p-4">
                <ol class="list-group list-group-numbered">
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                        <div class="fw-bold"><a href="/fuelogic/branch-branches/branch/<?= htmlspecialchars($branch['ID']); ?>">Branches</a></div>
                            View all suppliers of branch
                        </div>
                        <span class="badge bg-primary rounded-pill"><?= htmlspecialchars($branches ? count($branches) : 0); ?></span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                        <div class="fw-bold"><a href="/fuelogic/branch-trucks/branch/<?= htmlspecialchars($branch['ID']); ?>">Trucks</a></div>
                            View all storages of branch
                        </div>
                        <span class="badge bg-primary rounded-pill"><?= htmlspecialchars($trucks ? count($trucks) : 0); ?></span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                        <div class="fw-bold"><a href="/fuelogic/branch-consumers/branch/<?= htmlspecialchars($branch['ID']); ?>">Consumers</div>
                            View all trucks of branch
                        </div>
                        <span class="badge bg-primary rounded-pill"><?= htmlspecialchars($employees ? count($employees) : 0); ?></span>
                    </li>
                </ol>
            </div>
        </div>
    <?php 
    } else {
        echo json_encode(['message' => 'branch not found']);
    } 
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>