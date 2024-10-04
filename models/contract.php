<?php
class ContractModel {
    private $conn;
    
    public function __construct($db) {
        $this->conn = $db;
    }

    private function generateContractID() {
        return substr(str_shuffle(str_repeat('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', 8)), 0, 8);
    }

    public function create(
        $fuel_type, $fuel_amount, $reception_date, $signature_date, $price, $currency
    ) {
        try {
    
            $sql = "INSERT INTO contract (
                        ID, FuelType, FuelAmount, ReceptionDate, SignatureDate, Price, Currency
                    ) VALUES (?, ?, ?, ?, ?, ?, ?)";
    
            $id = $this->generateContractID();
            $stmt = $this->conn->prepare($sql);
            
            $stmt->bindValue(1, $id, PDO::PARAM_STR);
            $stmt->bindValue(2, $fuel_type, PDO::PARAM_STR);
            $stmt->bindValue(3, $fuel_amount, PDO::PARAM_STR);
            $stmt->bindValue(4, $reception_date, PDO::PARAM_STR);
            $stmt->bindValue(5, $signature_date, PDO::PARAM_STR);
            $stmt->bindValue(6, $price, PDO::PARAM_STR);
            $stmt->bindValue(7, $currency, PDO::PARAM_STR);
    
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
        $sql = "SELECT * FROM contract";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findById($id) {
        $sql = "SELECT * FROM contract WHERE ID = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }
}