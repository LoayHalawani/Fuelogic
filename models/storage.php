<?php
class StorageModel {
    private $conn;
    
    public function __construct($db) {
        $this->conn = $db;
    }

    private function generateStorageID() {
        return substr(str_shuffle(str_repeat('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', 7)), 0, 7);
    }

    public function create(
        $capacity, $current_capacity, $storing_conditions, $branch_id, $fuel_type
    ) {
        try {
    
            $sql = "INSERT INTO storage (
                        ID, Capacity, CurrentCapacity, StoringConditions, BranchID, FuelType
                    ) VALUES (?, ?, ?, ?, ?, ?)";
    
            $id = $this->generatestorageID();
            $stmt = $this->conn->prepare($sql);
            
            $stmt->bindValue(1, $id, PDO::PARAM_STR);
            $stmt->bindValue(2, $capacity, PDO::PARAM_STR);
            $stmt->bindValue(3, $current_capacity, PDO::PARAM_STR);
            $stmt->bindValue(4, $storing_conditions, PDO::PARAM_STR);
            $stmt->bindValue(5, $branch_id, PDO::PARAM_STR);
            $stmt->bindValue(5, $fuel_type, PDO::PARAM_STR);
    
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
        $sql = "SELECT * FROM storage";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findById($id) {
        $sql = "SELECT * FROM storage WHERE ID = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }
}