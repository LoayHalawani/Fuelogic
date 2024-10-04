<?php
class RelativeModel {
    private $conn;
    
    public function __construct($db) {
        $this->conn = $db;
    }

    public function create(
        $employee_id, $name, $age, $relationship, $phone_nb, $country, $city, $street, $building
    ) {
        try {
    
            $sql = "INSERT INTO relative (
                        EmployeeID, Name, Age, Relationship, PhoneNb, Country, City, Street, Building
                    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
            $stmt = $this->conn->prepare($sql);
            
            $stmt->bindValue(1, $employee_id, PDO::PARAM_STR);
            $stmt->bindValue(2, $name, PDO::PARAM_STR);
            $stmt->bindValue(3, $age, PDO::PARAM_STR);
            $stmt->bindValue(4, $relationship, PDO::PARAM_STR);
            $stmt->bindValue(5, $phone_nb, PDO::PARAM_STR);
            $stmt->bindValue(6, $country, PDO::PARAM_STR);
            $stmt->bindValue(7, $city, PDO::PARAM_STR);
            $stmt->bindValue(8, $street, PDO::PARAM_STR);
            $stmt->bindValue(9, $building, PDO::PARAM_STR);
    
            if ($stmt->execute()) {
                return true;
            } else {
                die("Execute failed: " . $stmt->error);
            }
    
            return true;
        } catch (Exception $e) {
            $this->conn->rollBack();
            die("Transaction failed: " . $e->getMessage());
        }
    }

    public function getAll() {
        $sql = "SELECT * FROM relative";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findById($id) {
        $sql = "SELECT * FROM relative WHERE ID = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }
}