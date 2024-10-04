<?php
class Company {
    private $conn;
    
    public function __construct($db) {
        $this->conn = $db;
    }

    public function findById($company_id) {
        $sql = "SELECT * FROM company WHERE company_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $company_id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

}