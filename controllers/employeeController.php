<?php

class EmployeeController {
    private $employeeModel;

    public function __construct($db) {
        // Initialize the Employee model
        $this->employeeModel = new EmployeeModel($db); // import Employee model object
    }

    // Handle employee creation
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
            // Redirect to the success page or show a success message
            $this->render('employeeView', ['message' => 'Employee created successfully!']);
        } else {
            // Handle failure case
            $this->render('employeeView', ['message' => 'Failed to create employee.']);
        }
    }

    // Handle retrieving an employee by ID
    public function getEmployee($employee_id) {
        $employee = $this->employeeModel->getById($employee_id);
        if ($employee) {
            // Pass the employee data to the view
            $this->render('employeeView', ['employee' => $employee]);
        } else {
            $this->render('employeeView', ['message' => 'Employee not found.']);
        }
    }

    // Handle updating an employee's data
    public function updateEmployee(
        $employee_id, $phone_nb, $gender, $email, $id_of_workplace, $dob, 
        $job, $age, $company_id, $first_name, $last_name, $middle_name, 
        $cnss_nb, $salary_currency, $salary_amount, $address_floor, 
        $address_building, $address_street, $address_city, $address_country
    ) {
        if ($this->employeeModel->update(
            $employee_id, $phone_nb, $gender, $email, $id_of_workplace, 
            $dob, $job, $age, $company_id, $first_name, $last_name, 
            $middle_name, $cnss_nb, $salary_currency, $salary_amount, 
            $address_floor, $address_building, $address_street, 
            $address_city, $address_country
        )) {
            $this->render('employeeView', ['message' => 'Employee updated successfully!']);
        } else {
            $this->render('employeeView', ['message' => 'Failed to update employee.']);
        }
    }

    // Utility method to render a view
    private function render($view, $data = []) {
        extract($data);  // Extracts the data array into variables
        require "../views/{$view}.php";  // Loads the view file
    }
}
