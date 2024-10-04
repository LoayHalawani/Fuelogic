<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add contract</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">NAHL Company</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Dropdown
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
                </li>
                <li class="nav-item">
                <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                </li>
            </ul>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
            </div>
        </div>
    </nav>

    <div class="d-flex justify-content-center vh-50 mt-5" id="">
        <div class="col-sm-8 col-md-6 border border-dark rounded p-4">
            <form>
                <div class="mb-3">
                    <label class="form-label" for="exampleCheck1">Fuel type</label>
                    <input type="text" class="form-control" name="fuel_type">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Fuel amount</label>
                    <input type="password" class="form-control" name="fuel_amount" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="exampleCheck1">Reception date</label>
                    <input type="text" name="reception_date" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="exampleCheck1">Signature date</label>
                    <input type="text" name="signature_date" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="exampleCheck1">Price</label>
                    <input type="text" name="price" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="exampleCheck1">Currency</label>
                    <input type="text" name="currency" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-dark">Submit</button>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

<?php
require_once 'config/database.php'; 
require_once 'models/contract.php';
require_once 'controllers/contractController.php';

$db = new Database();
$connection = $db->getConnection();

$contractController = new ContractController($connection);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $fuel_type = $_POST['fuel_type'];
    $fuel_amount = $_POST['fuel_amount'];
    $reception_date = $_POST['reception_date'];
    $signature_date = $_POST['signature_date'];
    $currency = $_POST['currency'];

    $result = $contractController->createContract(
        $fuel_type, $fuel_amount, $reception_date, $signature_date, $price, $currency
    );

    if($result) {
        echo "Contract has been added";
    } else {
        echo "Error adding contract";
    }
}