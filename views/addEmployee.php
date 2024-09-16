<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add employee</title>
</head>
<body>
    <form action="add-employee" method="POST">
        <input type="text" name="first_name" placeholder="First Name" required>
        <input type="text" name="last_name" placeholder="Last Name" required>
        <input type="text" name="middle_name" placeholder="Middle Name" required>
        <input type="text" name="email" placeholder="Email" required>
        <input type="text" name="phone_nb" placeholder="Phone Number" required>
        <input type="text" name="gender" placeholder="Gender" required>
        <input type="text" name="workplace_id" placeholder="Workplace ID" required>
        <input type="text" name="job" placeholder="Job" required>
        <input type="text" name="age" placeholder="Age" required>
        <input type="text" name="company_id" placeholder="Company ID" required>
        <input type="text" name="salary" placeholder="Salary" required>
        <input type="text" name="address" placeholder="Address" required>
        <button type="submit">Add Employee</button>
    </form>
</body>
</html>

<?php
// Include the necessary files
require_once 'config/database.php';  // For the database connection
require_once 'models/employee.php';   // The Employee model
require_once 'controllers/employeeController.php';  // The Employee controller

// Create the database connection
$db = new Database();  // Assuming you have a class Database for managing DB connections
$connection = $db->getConnection(); // -> in php is same as '.' in other languages like java (connection.getConnection();)

// Initialize the EmployeeController
$employeeController = new EmployeeController($connection);

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve form data
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $middle_name = $_POST['middle_name'];
    $email = $_POST['email'];
    $phone_nb = $_POST['phone_nb'];
    $gender = $_POST['gender'];
    $workplace_id = $_POST['workplace_id'];
    $job = $_POST['job'];
    $age = $_POST['age'];
    $company_id = $_POST['company_id'];
    $salary = $_POST['salary'];
    $address = $_POST['address'];

    

    // Call the createEmployee method to insert the data into the database
    $employeeController->createEmployee(
        $phone_nb, $gender, $email, $workplace_id, 
        $job, $age, $company_id, $first_name, $last_name, 
        $middle_name, $salary, $address
    );
}