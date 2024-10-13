<?php
class BranchModel {
    private $conn;
    
    public function __construct($db) {
        $this->conn = $db;
    }

    private function generateBranchID() {
        return substr(str_shuffle(str_repeat('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', 6)), 0, 6);
    }

    public function create(
        $company_id, $country, $city, $street, $building,
        $nb_of_employees, $nb_of_trucks, $nb_of_storages, $status, $refuels
    ) {
        try {
    
            $sql = "INSERT INTO branch (
                        ID, CompanyID, Country, City, Street, Building, Nb_of_employees, 
                        Nb_of_trucks, Nb_of_storages, Status, Refuels
                    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
            $id = $this->generateBranchID();
            $stmt = $this->conn->prepare($sql);
            
            $stmt->bindValue(1, $id, PDO::PARAM_STR);
            $stmt->bindValue(2, $company_id, PDO::PARAM_STR);
            $stmt->bindValue(3, $country, PDO::PARAM_STR);
            $stmt->bindValue(4, $city, PDO::PARAM_STR);
            $stmt->bindValue(5, $street, PDO::PARAM_STR);
            $stmt->bindValue(6, $building, PDO::PARAM_STR);
            $stmt->bindValue(7, $nb_of_employees, PDO::PARAM_INT);
            $stmt->bindValue(8, $nb_of_trucks, PDO::PARAM_INT);
            $stmt->bindValue(9, $nb_of_storages, PDO::PARAM_INT);
            $stmt->bindValue(10, $status, PDO::PARAM_INT);
            $stmt->bindValue(11, $refuels, PDO::PARAM_INT);
    
            if ($stmt->execute()) {
                return true;
            } else {
                die("Execute failed: " . $stmt->error);
            }
    
            return true;
        } catch (Exception $e) {
            die("Failed to insert: " . $e->getMessage());
        }
    }

    public function getAll() {
        $sql = "SELECT * FROM branch";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $sql = "SELECT * FROM branch WHERE ID = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}