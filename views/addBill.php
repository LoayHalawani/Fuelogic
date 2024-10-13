<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add bill</title>
    <link href="css/layout.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <?php require 'navbar.php'; ?>
    <div class="d-flex justify-content-center vh-50 mt-5" id="">
        <div class="form-div col-sm-8 col-md-6 border border-dark rounded p-4">
            <form action="add-bill" method="POST">
                <div class="mb-3">
                    <label class="form-label" for="exampleCheck1">Company ID</label>
                    <input type="text" class="form-control" name="company_id">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Consumer ID</label>
                    <input type="password" class="form-control" name="consumer_id" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="exampleCheck1">Fuel type</label>
                    <input type="text" name="fuel_type" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="exampleCheck1">Fuel amount</label>
                    <input type="text" name="fuel_amount" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="exampleCheck1">Payment date</label>
                    <input type="text" name="payment_date" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="exampleCheck1">Payment method</label>
                    <input type="text" name="payment_method" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="exampleCheck1">Currency</label>
                    <input type="text" name="currency" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="exampleCheck1">Price</label>
                    <input type="text" name="price" class="form-control" required>
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
require_once 'models/bill.php';
require_once 'controllers/billController.php';

$db = new Database();
$connection = $db->getConnection();

$billController = new BillController($connection);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $company_id = $_POST['company_id'];
    $consumer_id = $_POST['consumer_id'];
    $fuel_type = $_POST['fuel_type'];
    $fuel_amount = $_POST['fuel_amount'];
    $payment_date = $_POST['payment_date'];
    $payment_method = $_POST['payment_method'];
    $currency = $_POST['currency'];
    $price = $_POST['price'];

    $result = $billController->createBill(
        $company_id, $consumer_id, $fuel_type, $fuel_amount, $payment_date, $payment_method, $currency, $price
    );

    if($result) {
        echo "Bill has been added";
    } else {
        echo "Error adding bill";
    }
}