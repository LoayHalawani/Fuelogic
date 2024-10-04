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
} elseif ($uri === '/add-headquarter') {
    include './views/addHeadquarter.php';
} elseif ($uri === '/all-headquarters') {
    include './views/allHeadquarters.php';
} elseif (preg_match('#^/edit-headquarter/([a-zA-Z0-9]{5})$#', $uri, $matches)) {
    $id = $matches[1];
    include './views/editHeadquarter.php';    
} elseif ($uri === '/all-companies') {
    include './views/allCompanies.php';
} elseif ($uri === '/add-company') {
    include './views/addCompany.php';
} elseif (preg_match('#^/edit-company/([a-zA-Z0-9]{5})$#', $uri, $matches)) {
    $id = $matches[1];
    include './views/editCompany.php';
} elseif ($uri === '/all-employees') {
    include './views/allEmployees.php';
} elseif (preg_match('#^/edit-employee/([a-zA-Z0-9]{8})$#', $uri, $matches)) {
    $id = $matches[1];
    include './views/editEmployee.php';  
} elseif ($uri === '/add-employee') {
    include './views/addEmployee.php';
} elseif ($uri === '/add-branch') {
    include './views/addBranch.php';
} elseif ($uri === '/all-branches') {
    include './views/allBranches.php';
} elseif ($uri === '/add-storage') {
    include './views/addStorage.php';
} elseif ($uri === '/all-storages') {
    include './views/allStorages.php';
} elseif ($uri === '/add-consumer') {
    include './views/addConsumer.php';
} elseif ($uri === '/add-bill') {
    include './views/addBill.php';
} elseif ($uri === '/all-bills') {
    include './views/allBills.php';
} elseif (preg_match('#^/edit-bill/([a-zA-Z0-9]{8})$#', $uri, $matches)) {
    $id = $matches[1];
    include './views/editBill.php';    
} elseif ($uri === '/add-contract') {
    include './views/addContract.php';
} elseif ($uri === '/all-contract') {
    include './views/allContracts.php';
} elseif ($uri === '/add-relative') {
    include './views/addRelative.php';
} elseif ($uri === '/add-truck') {
    include './views/addTruck.php';
} elseif ($uri === '/all-trucks') {
    include './views/allTrucks.php';
} else {
    header("HTTP/1.0 404 Not Found");
    echo json_encode(['message' => 'Route not found']);
}