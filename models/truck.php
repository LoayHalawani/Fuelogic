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

    public function findById($company_id) {
        $sql = "SELECT * FROM company WHERE company_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $company_id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }
}