<?php
class ScheduleModel {
    private $conn;
    
    public function __construct($db) {
        $this->conn = $db;
    }

    public function create(
        $employee_id, $schedule_date, $start_time, $end_time // get employee_id through frontend
    ) {
        try {
            $this->conn->beginTransaction();
    
            $sql = "INSERT INTO company_a (
                        EmployeeID, ScheduleDate, StartTime, EndTime	
                    ) VALUES (?, ?, ?, ?)";
    
            $stmt = $this->conn->prepare($sql);
            
            $stmt->bindValue(1, $employee_id, PDO::PARAM_STR);
            $stmt->bindValue(2, $schedule_date, PDO::PARAM_STR);
            $stmt->bindValue(3, $start_time, PDO::PARAM_STR);
            $stmt->bindValue(4, $end_time, PDO::PARAM_STR);
    
            if (!$stmt->execute()) {
                throw new Exception("Failed to insert employee: " . implode(", ", $stmt->errorInfo()));
            }
    
            $this->conn->commit();
    
            return true;
        } catch (Exception $e) {
            $this->conn->rollBack();
            die("Transaction failed: " . $e->getMessage());
        }
    }

    public function findById($company_id) {
        $sql = "SELECT * FROM company WHERE company_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $company_id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

}