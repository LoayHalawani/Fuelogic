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
            // Remove transaction-related code like beginTransaction() and rollBack()
            
            $sql = "INSERT INTO hq (
                        ID, Email, Nb_of_employees, Country, City,
                        Street, Building
                    ) VALUES (?, ?, ?, ?, ?, ?, ?)";
    
            // Assume generateHqID() generates a unique ID
            $hq_id = $this->generateHqID();
            $stmt = $this->conn->prepare($sql);
    
            // Bind values to the prepared statement
            $stmt->bindValue(1, $hq_id, PDO::PARAM_STR);
            $stmt->bindValue(2, $email, PDO::PARAM_STR);
            $stmt->bindValue(3, $nb_of_employees, PDO::PARAM_STR);
            $stmt->bindValue(4, $country, PDO::PARAM_STR);
            $stmt->bindValue(5, $city, PDO::PARAM_STR);
            $stmt->bindValue(6, $street, PDO::PARAM_STR);
            $stmt->bindValue(7, $building, PDO::PARAM_STR);
    
            // Execute the statement
            if ($stmt->execute()) {
                return true;
            } else {
                die("Execute failed: " . $stmt->error);
            }
    
        } catch (Exception $e) {
            // Handle errors, but no need for rollBack() since autocommit handles commits automatically
            die("Failed to insert: " . $e->getMessage());
        }
    }

    public function getAll() {
        $sql = "SELECT * FROM hq";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Use fetchAll() to get all rows (for PDO)
    }

    public function getById($company_id) {
        $sql = "SELECT * FROM hq WHERE ID = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $company_id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Use fetchAll() to get all rows
    }

    public function update(
        $email, $nb_of_employees, $country, $city,
        $street, $building
    ) {

    }

}