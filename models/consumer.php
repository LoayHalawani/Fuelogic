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
                    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
            $id = $this->generateConsumerID();
            $stmt = $this->conn->prepare($sql);
            
            $stmt->bindValue(1, $id, PDO::PARAM_STR);
            $stmt->bindValue(2, $name, PDO::PARAM_STR);
            $stmt->bindValue(3, $type, PDO::PARAM_STR);
            $stmt->bindValue(4, $company_id, PDO::PARAM_STR);
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

        } catch (Exception $e) {
            die("Failed to insert: " . $e->getMessage());
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

    public function deleteById($id) {
        try {
            $sql = "DELETE FROM consumer WHERE ID = :id"; 
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            error_log("Error deleting record: " . $e->getMessage());
            return false;
        }
    }
}