<?php
class SupplierModel {
    private $conn;
    
    public function __construct($db) {
        $this->conn = $db;
    }

    private function generateSupplierID() {
        return substr(str_shuffle(str_repeat('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', 6)), 0, 6);
    }

    public function create(
        $name, $email, $fuel_type, $country, $city, $branch_id
    ) {
        try {
    
            $sql1 = "INSERT INTO supplier (
                    ID, Name, Email, FuelType, Country, City, BranchID
                    ) VALUES (?, ?, ?, ?, ?, ?, ?)";
    
            $stmt = $this->conn->prepare($sql);
            $id = $this->generateSupplierID();
            
            $stmt->bindValue(1, $id, PDO::PARAM_STR);
            $stmt->bindValue(2, $name, PDO::PARAM_STR);
            $stmt->bindValue(3, $email, PDO::PARAM_STR);
            $stmt->bindValue(4, $fuel_type, PDO::PARAM_STR);
            $stmt->bindValue(5, $country, PDO::PARAM_STR);
            $stmt->bindValue(6, $city, PDO::PARAM_STR);
            $stmt->bindValue(7, $branch_id, PDO::PARAM_STR);
    
            if ($stmt->execute()) {
                return true;
            } else {
                die("Execute failed: " . $stmt->error);
            }
    
            return true;
        } catch (Exception $e) {
            die("Transaction failed: " . $e->getMessage());
        }
    }

    public function getAll() {
        $sql = "SELECT * FROM supplier";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $sql = "SELECT * FROM supplier WHERE ID = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}