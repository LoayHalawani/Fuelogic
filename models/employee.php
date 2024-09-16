<?php
class EmployeeModel {
    private $conn;
    
    public function __construct($db) {
        $this->conn = $db;
    }

    // Function to generate a unique 8-character ID
    private function generateEmployeeID() {
        return substr(str_shuffle(str_repeat('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', 8)), 0, 8);
    }

    // (insert)
    public function create(
        $phone_nb, $gender, $email, $workplace_id, 
        $job, $age, $company_id, $first_name, $last_name, 
        $middle_name, $salary, $address
    ) {
        try {
            // Begin a transaction
            $this->conn->beginTransaction();
    
            // First, insert into the employee table
            $sql1 = "INSERT INTO employee (
                        ID, Gender, Email, WorkplaceID, Job, Age, 
                        CompanyID, FirstName, LastName, MiddleName, 
                        Salary, Address
                    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
            $employee_id = $this->generateEmployeeID();  // Generate an 8-character ID
            $stmt1 = $this->conn->prepare($sql1);
            
            $stmt1->bindValue(1, $employee_id, PDO::PARAM_STR);
            $stmt1->bindValue(2, $gender, PDO::PARAM_STR);
            $stmt1->bindValue(3, $email, PDO::PARAM_STR);
            $stmt1->bindValue(4, $workplace_id, PDO::PARAM_STR);
            $stmt1->bindValue(5, $job, PDO::PARAM_STR);
            $stmt1->bindValue(6, $age, PDO::PARAM_INT);
            $stmt1->bindValue(7, $company_id, PDO::PARAM_STR);
            $stmt1->bindValue(8, $first_name, PDO::PARAM_STR);
            $stmt1->bindValue(9, $last_name, PDO::PARAM_STR);
            $stmt1->bindValue(10, $middle_name, PDO::PARAM_STR);
            $stmt1->bindValue(11, $salary, PDO::PARAM_INT);
            $stmt1->bindValue(12, $address, PDO::PARAM_STR);
    
            if (!$stmt1->execute()) {
                throw new Exception("Failed to insert employee: " . implode(", ", $stmt1->errorInfo()));
            }
    
            // Second, insert into the employee_phone_nb table
            $sql2 = "INSERT INTO employee_phone_nb (EmployeeID, PhoneNb) VALUES (?, ?)";
            $stmt2 = $this->conn->prepare($sql2);
    
            $stmt2->bindValue(1, $employee_id, PDO::PARAM_STR);  // Use the generated employee_id
            $stmt2->bindValue(2, $phone_nb, PDO::PARAM_STR);
    
            if (!$stmt2->execute()) {
                throw new Exception("Failed to insert employee phone number: " . implode(", ", $stmt2->errorInfo()));
            }
    
            // Commit the transaction if both insertions were successful
            $this->conn->commit();
    
            return true;  // Success
        } catch (Exception $e) {
            // Rollback the transaction in case of an error
            $this->conn->rollBack();
            die("Transaction failed: " . $e->getMessage());
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
}