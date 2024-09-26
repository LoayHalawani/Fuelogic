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
    
            $sql1 = "INSERT INTO company_a (
                        ID, RegistrationNb, Nb_of_trucks, Nb_of_employees, Nb_of_branches,
                        TotalIncome, HeadquarterID, Name, Continent
                    ) VALUES (?, ?, ?, ?, ?, ?, ?)";
    
            $company_id = $this->generateCompanyID();
            $stmt1 = $this->conn->prepare($sql1);
            
            $stmt1->bindValue(1, $company_id, PDO::PARAM_STR);
            $stmt1->bindValue(2, $registration_nb, PDO::PARAM_STR);
            $stmt1->bindValue(3, $nb_of_trucks, PDO::PARAM_STR);
            $stmt1->bindValue(4, $nb_of_branches, PDO::PARAM_STR);
            $stmt1->bindValue(5, $nb_of_employees, PDO::PARAM_STR);
            $stmt1->bindValue(6, $total_income, PDO::PARAM_STR);
            $stmt1->bindValue(7, $hq_id, PDO::PARAM_INT);
            $stmt1->bindValue(8, $name, PDO::PARAM_INT);
            $stmt1->bindValue(9, $continent, PDO::PARAM_INT);
    
            if (!$stmt1->execute()) {
                throw new Exception("Failed to insert employee: " . implode(", ", $stmt1->errorInfo()));
            }
    
            $sql2 = "INSERT INTO company_b (RegistrationNb, Name, Continent) VALUES (?, ?, ?)";
            $stmt2 = $this->conn->prepare($sql2);
    
            $stmt2->bindValue(1, $registration_nb, PDO::PARAM_STR);
            $stmt2->bindValue(2, $name, PDO::PARAM_STR);
            $stmt2->bindValue(2, $continent, PDO::PARAM_STR);
    
            if (!$stmt2->execute()) {
                throw new Exception("Failed to insert employee phone number: " . implode(", ", $stmt2->errorInfo()));
            }
    
            $this->conn->commit();
    
            return true;
        } catch (Exception $e) {
            $this->conn->rollBack();
            die("Transaction failed: " . $e->getMessage());
        }
    }

    public function getAll() {
        $sql = "SELECT * FROM company_a";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findById($company_id) {
        $sql = "SELECT * FROM company_a WHERE ID = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $company_id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }
}