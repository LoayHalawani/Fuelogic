<?php
class CompanyModel {
    private $conn;
    
    public function __construct($db) {
        $this->conn = $db;
    }

    private function generateCompanyID() {
        return substr(str_shuffle(str_repeat('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', 5)), 0, 5);
    }

    public function create(
        $registration_nb, $nb_of_trucks, $nb_of_branches, $nb_of_employees,
        $total_income, $hq_id, $name, $continent
    ) {
        try {
            $this->conn->beginTransaction();
    
            $sql1 = "INSERT INTO company (
                        ID, RegistrationNb, Nb_of_trucks, Nb_of_employees, Nb_of_branches,
                        TotalIncome, HeadquarterID, Name, Continent
                    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
            $company_id = $this->generateCompanyID();
            $stmt = $this->conn->prepare($sql1);
            
            $stmt->bindValue(1, $company_id, PDO::PARAM_STR);
            $stmt->bindValue(2, $registration_nb, PDO::PARAM_STR);
            $stmt->bindValue(3, $nb_of_trucks, PDO::PARAM_STR);
            $stmt->bindValue(5, $nb_of_employees, PDO::PARAM_STR);
            $stmt->bindValue(4, $nb_of_branches, PDO::PARAM_STR);
            $stmt->bindValue(6, $total_income, PDO::PARAM_STR);
            $stmt->bindValue(7, $hq_id, PDO::PARAM_INT);
            $stmt->bindValue(8, $name, PDO::PARAM_INT);
            $stmt->bindValue(9, $continent, PDO::PARAM_INT);
    
            if ($stmt->execute()) {
                return true;
            } else {
                die("Execute failed: " . $stmt->error);
            }
    
            $this->conn->commit();
    
            return true;
        } catch (Exception $e) {
            $this->conn->rollBack();
            die("Transaction failed: " . $e->getMessage());
        }
    }

    public function getAll() {
        $sql = "SELECT * FROM company";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($company_id) {
        $sql = "SELECT * FROM company WHERE ID = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $company_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}