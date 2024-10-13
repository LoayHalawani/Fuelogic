<?php 
require_once 'config/database.php'; 
require_once 'models/company.php';
require_once 'controllers/companyController.php';

$db = new Database();
$connection = $db->getConnection();

$companyController = new CompanyController($connection);

$company = $companyController->getCompanyByID($id);

$trucks = $companyController->getTrucksOfCompany($id);
$consumers = $companyController->getConsumersOfCompany($id);
$employees = $companyController->getEmployeesOfCompany($id);
$branches = $companyController->getBranchesOfCompany($id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company info</title>
</head>
<body>
    <?php require 'navbar.php'; ?>
    <?php if ($company) { ?>
        <div class="d-flex justify-content-center vh-50 mt-5">
            <div class="form-div col-sm-8 col-md-6 border border-dark rounded p-4">
                <ol class="list-group list-group-numbered">
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                        <div class="fw-bold"><a href="/fuelogic/company-branches/company/<?= htmlspecialchars($company['ID']); ?>">Branches</a></div>
                            View all branches of company
                        </div>
                        <span class="badge bg-primary rounded-pill"><?= htmlspecialchars($branches ? count($branches) : 0); ?></span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                        <div class="fw-bold"><a href="/fuelogic/company-trucks/company/<?= htmlspecialchars($company['ID']); ?>">Trucks</a></div>
                            View all trucks of company
                        </div>
                        <span class="badge bg-primary rounded-pill"><?= htmlspecialchars($trucks ? count($trucks) : 0); ?></span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                        <div class="fw-bold"><a href="/fuelogic/company-consumers/company/<?= htmlspecialchars($company['ID']); ?>">Consumers</div>
                            View all consumers of company
                        </div>
                        <span class="badge bg-primary rounded-pill"><?= htmlspecialchars($employees ? count($employees) : 0); ?></span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                        <div class="fw-bold"><a href="/fuelogic/company-employees/company/<?= htmlspecialchars($company['ID']); ?>">Employees</div>
                            View all employees of company
                        </div>
                        <span class="badge bg-primary rounded-pill"><?= htmlspecialchars($employees ? count($branches) : 0); ?></span>
                    </li>
                </ol>
            </div>
        </div>
    <?php 
    } else {
        echo json_encode(['message' => 'company not found']);
    } 
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>