<?php
class Employee {
    private $conn;
    
    public function __construct($db) {
        $this->conn = $db;
    }

    // (insert)
    public function create(
        $phone_nb, $gender, $email, $id_of_workplace, $dob, 
        $job, $age, $company_id, $first_name, $last_name, 
        $middle_name, $cnss_nb, $salary_currency, $salary_amount,
        $address_floor, $address_building, $address_street, $address_city,
        $address_country
    ) {
        // SQL query to insert employee data
        $sql = "INSERT INTO employees (
                    phone_nb, gender, email, id_of_workplace, dob, job, age, 
                    company_id, first_name, last_name, middle_name, cnss_nb, 
                    salary_currency, salary_amount, address_floor, 
                    address_building, address_street, address_city, 
                    address_country
                ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
        // Prepare the SQL statement
        $stmt = $this->conn->prepare($sql);
        
        if ($stmt === false) {
            die("Prepare failed: " . $this->conn->error);
        }

        // Bind parameters to the prepared statement
        // "ssss" are placeholders for the data types: string (s), integer (i), double (d), blob (b)
        $stmt->bind_param(
            "ssssssssssssdsssss", // Adjust types based on your data
            $phone_nb, $gender, $email, $id_of_workplace, $dob, 
            $job, $age, $company_id, $first_name, $last_name, 
            $middle_name, $cnss_nb, $salary_currency, $salary_amount,
            $address_floor, $address_building, $address_street, $address_city,
            $address_country
        );

        // Execute the statement
        if ($stmt->execute()) {
            return true;  // Success
        } else {
            die("Execute failed: " . $stmt->error);
        }
    }

    public function findById($employee_id) {
        $sql = "SELECT * FROM employees WHERE employee_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $employee_id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function getByEmail($email) {
        $sql = "SELECT * FROM employees WHERE email = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function delete($employee_id) {
        $sql = "DELETE FROM employees WHERE employee_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $employee_id);
        return $stmt->execute();
    }
}

public function update(
    $employee_id, $phone_nb, $gender, $email, $id_of_workplace, $dob, 
    $job, $age, $company_id, $first_name, $last_name, 
    $middle_name, $cnss_nb, $salary_currency, $salary_amount,
    $address_floor, $address_building, $address_street, $address_city,
    $address_country
) {
    // SQL query to update employee data
    $sql = "UPDATE employees 
            SET phone_nb = ?, gender = ?, email = ?, id_of_workplace = ?, 
                dob = ?, job = ?, age = ?, company_id = ?, first_name = ?, 
                last_name = ?, middle_name = ?, cnss_nb = ?, 
                salary_currency = ?, salary_amount = ?, address_floor = ?, 
                address_building = ?, address_street = ?, address_city = ?, 
                address_country = ?
            WHERE employee_id = ?";  // Make sure to update using employee_id or any unique identifier
    
    // Prepare the SQL statement
    $stmt = $this->conn->prepare($sql);
    
    if ($stmt === false) {
        die("Prepare failed: " . $this->conn->error);
    }

    // Bind parameters to the prepared statement
    $stmt->bind_param(
        "ssssssiiisssdsisssi", // Adjust types as per your database schema
        $phone_nb, $gender, $email, $id_of_workplace, $dob, 
        $job, $age, $company_id, $first_name, $last_name, 
        $middle_name, $cnss_nb, $salary_currency, $salary_amount,
        $address_floor, $address_building, $address_street, $address_city,
        $address_country, $employee_id
    );

    // Execute the statement
    if ($stmt->execute()) {
        return true;  // Update successful
    } else {
        die("Execute failed: " . $stmt->error);
    }
}