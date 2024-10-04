<?php

class EmployeeController {
    private $employeeModel;

    public function __construct($db) {
        // Initialize the Employee model
        $this->employeeModel = new EmployeeModel($db); // import Employee model object
    }

    public function createEmployee(
        $phone_nb, $gender, $email, $workplace_id, 
        $job, $age, $company_id, $first_name, $last_name, 
        $middle_name, $salary, $address
    ) {
        if ($this->employeeModel->create(
            $phone_nb, $gender, $email, $workplace_id, 
            $job, $age, $company_id, $first_name, $last_name, 
            $middle_name, $salary, $address
        )) {
            return ['success' => true]; // => in php is declaration. in this case a dictionary is returned with a variable (first index) called success
        } else {
            return ['success' => false, 'error' => 'Failed to create employee.'];
        }
    }

    public function getAllEmployees() {
        $result = $this->employeeModel->getAll();
        if ($result) {
            return ['success' => true, 'employees' => $result];
        } else {
            return ['success' => false, 'error' => 'Failed to get employees.'];
        }
    }

    public function getEmployeeById($employee_id) {
        $employee = $this->employeeModel->getById($employee_id);
        if ($employee) {
            return $employee;
        } else {
            return false;
        }
    }

    public function updateEmployee(
        $phone_nb, $gender, $email, $workplace_id, 
        $job, $age, $company_id, $first_name, $last_name, 
        $middle_name, $salary, $address
    ) {
        if ($this->employeeModel->update(
            $phone_nb, $gender, $email, $workplace_id, 
            $job, $age, $company_id, $first_name, $last_name, 
            $middle_name, $salary, $address
        )) {
            return true;
        } else {
            return false;
        }
    }
}
