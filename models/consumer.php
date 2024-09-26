<?php
class ConsumerModel {
    private $conn;
    
    public function __construct($db) {
        $this->conn = $db;
    }

    private function generateConsumerID() {
        return substr(str_shuffle(str_repeat('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', 8)), 0, 8);
    }

    public function create(
        $name, $type, $company_id, $phone_nb, $country, $city, $street, $building
    ) {
        try {
    
            $sql = "INSERT INTO consumer (
                        ID, Name, Type, CompanyID, PhoneNb, Country, 
                        City, Street, Building
                    ) VALUES (?, ?, ?, ?, ?, ?)";
    
            $id = $this->generateConsumerID();
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
        $sql = "SELECT * FROM consumer";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findById($id) {
        $sql = "SELECT * FROM consumer WHERE ID = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }
}