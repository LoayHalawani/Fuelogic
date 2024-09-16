<?php
class HqModel {
    private $conn;
    
    public function __construct($db) {
        $this->conn = $db;
    }

    private function generateHqID() {
        return substr(str_shuffle(str_repeat('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', 5)), 0, 5);
    }

    public function create(
        $email, $nb_of_employees, $country, $city,
        $street, $building
    ) {
        try {
            $this->conn->beginTransaction();
    
            $sql = "INSERT INTO hq (
                        ID, Nb_of_employees, Country, City,
                        Street, Building
                    ) VALUES (?, ?, ?, ?, ?, ?)";
    
            $hq_id = $this->generateHqID();
            $stmt = $this->conn->prepare($sql);
            
            $stmt->bindValue(1, $hq_id, PDO::PARAM_STR);
            $stmt->bindValue(2, $nb_of_employees, PDO::PARAM_STR);
            $stmt->bindValue(3, $country, PDO::PARAM_STR);
            $stmt->bindValue(4, $city, PDO::PARAM_STR);
            $stmt->bindValue(5, $street, PDO::PARAM_STR);
            $stmt->bindValue(6, $building, PDO::PARAM_STR);
    
            if ($stmt->execute()) {
                return true;
            } else {
                die("Execute failed: " . $stmt->error);
            }

        } catch (Exception $e) {
            $this->conn->rollBack();
            die("Transaction failed: " . $e->getMessage());
        }
    }

    public function getById($company_id) {
        $sql = "SELECT * FROM company WHERE company_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $company_id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function update(
        $email, $nb_of_employees, $country, $city,
        $street, $building
    ) {

    }

}