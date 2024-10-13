<?php
class TruckModel {
    private $conn;
    
    public function __construct($db) {
        $this->conn = $db;
    }

    public function create(
        $plate_nb, $company_id, $branch_id, $fuel_type, $capacity
    ) {
        try {
    
            $sql1 = "INSERT INTO company_a (
                    PlateNb, CompanyID, BranchID, FuelType, Capacity
                    ) VALUES (?, ?, ?, ?, ?)";
    
            $stmt = $this->conn->prepare($sql);
            
            $stmt->bindValue(1, $plate_nb, PDO::PARAM_STR);
            $stmt->bindValue(2, $company_id, PDO::PARAM_STR);
            $stmt->bindValue(3, $branch_id, PDO::PARAM_STR);
            $stmt->bindValue(4, $fuel_type, PDO::PARAM_STR);
            $stmt->bindValue(5, $capacity, PDO::PARAM_STR);
    
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
        $sql = "SELECT * FROM truck";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $sql = "SELECT * FROM company WHERE truck = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}