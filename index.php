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
} elseif ($uri === '/all-companies') {
    include './views/allCompanies.php';
} elseif ($uri === '/all-employees') {
    include './views/allEmployees.php';
} elseif ($uri === '/add-company') {
    include './views/addCompany.php';
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
} else {
    header("HTTP/1.0 404 Not Found");
    echo json_encode(['message' => 'Route not found']);
}