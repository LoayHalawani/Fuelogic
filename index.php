<?php
$requestUri = $_SERVER['REQUEST_URI'];
$uri = parse_url($requestUri, PHP_URL_PATH);

$basePath = '/fuelogic';

$uri = str_replace($basePath, '', $uri);

if ($uri === '/') {
    include './views/home.php';
} elseif ($uri === '/login') {
    include './views/login.php';
} elseif ($uri === '/signup') {
    include './views/signup.php';
// HEADQUARTER
} elseif ($uri === '/add-headquarter') {
    include './views/addHeadquarter.php';
} elseif (preg_match('#^/edit-headquarter/([a-zA-Z0-9]{5})$#', $uri, $matches)) {
    $id = $matches[1];
    include './views/editHeadquarter.php';
} elseif (preg_match('#^/headquarter-info/([a-zA-Z0-9]{5})$#', $uri, $matches)) {
    $hq_id = $matches[1];
    include './views/headquarterInfo.php';
} elseif (preg_match('#^/hq-companies/hq/([a-zA-Z0-9]{5})$#', $uri, $matches)) {
    $hq_id = $matches[1];
    include './views/allCompanies.php';
// COMPANY  
} elseif ($uri === '/all-companies') {
    include './views/allCompanies.php';
} elseif (preg_match('#^/add-company/hq/([a-zA-Z0-9]{5})$#', $uri, $matches)) {
    $hq_id = $matches[1];
    include './views/addCompany.php';
} elseif (preg_match('#^/edit-company/([a-zA-Z0-9]{5})$#', $uri, $matches)) {
    $id = $matches[1];
    include './views/editCompany.php';
} elseif (preg_match('#^/company-info/([a-zA-Z0-9]{5})$#', $uri, $matches)) {
    $id = $matches[1];
    include './views/companyInfo.php';
} elseif (preg_match('#^/company-branches/company/([a-zA-Z0-9]{5})$#', $uri, $matches)) {
    $company_id = $matches[1];
    include './views/allBranches.php';
} elseif (preg_match('#^/company-trucks/company/([a-zA-Z0-9]{5})$#', $uri, $matches)) {
    $company_id = $matches[1];
    include './views/allTrucks.php';
} elseif (preg_match('#^/company-consumers/company/([a-zA-Z0-9]{5})$#', $uri, $matches)) {
    $company_id = $matches[1];
    include './views/allConsumers.php';
} elseif (preg_match('#^/company-employees/company/([a-zA-Z0-9]{5})$#', $uri, $matches)) {
    $company_id = $matches[1];
    include './views/allEmployees.php';
// EMPLOYEE
} elseif ($uri === '/all-employees') {
    include './views/allEmployees.php';
} elseif (preg_match('#^/add-employee/company/([a-zA-Z0-9]{5})$#', $uri, $matches)) {
    $id = $matches[1];
    include './views/addEmployee.php';
} elseif (preg_match('#^/edit-employee/([a-zA-Z0-9]{8})$#', $uri, $matches)) {
    $id = $matches[1];
    include './views/editEmployee.php';
// BRANCH
} elseif (preg_match('#^/add-branch/company/([a-zA-Z0-9]{5})$#', $uri, $matches)) {
    $company_id = $matches[1];
    include './views/addBranch.php';
} elseif (preg_match('#^/edit-branch/([a-zA-Z0-9]{6})$#', $uri, $matches)) {
    $id = $matches[1];
    include './views/editBranch.php';
// STORAGE
} elseif ($uri === '/add-storage') {
    include './views/addStorage.php';
} elseif ($uri === '/all-storages') {
    include './views/allStorages.php';
} elseif (preg_match('#^/edit-storage/([a-zA-Z0-9]{7})$#', $uri, $matches)) {
    $id = $matches[1];
    include './views/editStorage.php';
// CONSUMER
} elseif (preg_match('#^/add-consumer/company/([a-zA-Z0-9]{5})$#', $uri, $matches)) {
    $id = $matches[1];
    include './views/addConsumer.php';
} elseif ($uri === '/all-consumers') {
    include './views/allConsumers.php';
} elseif (preg_match('#^/edit-consumer/([a-zA-Z0-9]{8})$#', $uri, $matches)) {
    $id = $matches[1];
    include './views/editConsumer.php';
// BILL
} elseif ($uri === '/add-bill') {
    include './views/addBill.php';
} elseif ($uri === '/all-bills') {
    include './views/allBills.php';
} elseif (preg_match('#^/edit-bill/([a-zA-Z0-9]{8})$#', $uri, $matches)) {
    $id = $matches[1];
    include './views/editBill.php';
// CONTRACT     
} elseif ($uri === '/add-contract') {
    include './views/addContract.php';
} elseif ($uri === '/all-contracts') {
    include './views/allContracts.php';
} elseif (preg_match('#^/edit-contract/([a-zA-Z0-9]{8})$#', $uri, $matches)) {
    $id = $matches[1];
    include './views/editContract.php';
// RELATIVE
} elseif ($uri === '/add-relative') {
    include './views/addRelative.php';
} elseif ($uri === '/all-relatives') {
    include './views/allRelatives.php';
} elseif (preg_match('#^/edit-relative/([a-zA-Z0-9]{8})$#', $uri, $matches)) {
    $id = $matches[1];
    include './views/editRelative.php';
// SUPPLIER
} elseif ($uri === '/add-supplier') {
    include './views/addSupplier.php';
} elseif ($uri === '/all-suppliers') {
    include './views/allSuppliers.php';
} elseif (preg_match('#^/edit-supplier/([a-zA-Z0-9]{9})$#', $uri, $matches)) {
    $id = $matches[1];
    include './views/editSupplier.php';
// TRUCK
} elseif (preg_match('#^/add-truck/company/([a-zA-Z0-9]{5})$#', $uri, $matches)) {
    $id = $matches[1];
    include './views/addTruck.php';
} elseif (preg_match('#^/edit-truck/([a-zA-Z0-9]{9})$#', $uri, $matches)) {
    $id = $matches[1];
    include './views/editTruck.php';
} else {
    header("HTTP/1.0 404 Not Found");
    echo json_encode(['message' => 'Route not found']);
}