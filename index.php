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
} elseif ($uri === '/add-employee') {
        include './views/addEmployee.php';
} else {
    header("HTTP/1.0 404 Not Found");
    echo json_encode(['message' => 'Route not found']);
}