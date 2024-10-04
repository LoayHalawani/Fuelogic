<?php
class BillModel {
    private $conn;
    
    public function __construct($db) {
        $this->conn = $db;
    }

    private function generateBillNb() {
        return substr(str_shuffle(str_repeat('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', 8)), 0, 8);
    }

    public function create(
        $bill_nb, $company_id, $consumer_id, $fuel_type, $fuel_amount,
        $payment_date, $payment_method, $currency, $price
    ) {
        try {
    
            $sql = "INSERT INTO bill (
                        BillNb, CompanyID, ConsumerID, FuelType, FuelAmount, PaymentDate, 
                        PaymentMethod, Currency, Price	
                    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
            $bill_nb = $this->generateBillNb();
            $stmt = $this->conn->prepare($sql);
            
            $stmt->bindValue(1, $bill_nb, PDO::PARAM_STR);
            $stmt->bindValue(2, $company_id, PDO::PARAM_STR);
            $stmt->bindValue(3, $consumer_id, PDO::PARAM_STR);
            $stmt->bindValue(4, $fuel_type, PDO::PARAM_STR);
            $stmt->bindValue(5, $fuel_amount, PDO::PARAM_STR);
            $stmt->bindValue(6, $payment_date, PDO::PARAM_STR);
            $stmt->bindValue(7, $payment_method, PDO::PARAM_STR);
            $stmt->bindValue(8, $currency, PDO::PARAM_STR);
            $stmt->bindValue(9, $price, PDO::PARAM_STR);
    
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
        $sql = "SELECT * FROM bill";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getByBillNb($bill_nb) {
        $sql = "SELECT * FROM bill WHERE BillNb = :bill_nb";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':bill_nb', $bill_nb, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }    
}