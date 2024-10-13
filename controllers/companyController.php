<?php

class CompanyController {
    private $companyModel;

    public function __construct($db) {
        $this->companyModel = new CompanyModel($db);
    }

    public function createCompany(
        $registration_nb, $nb_of_trucks, $nb_of_branches, $nb_of_employees,
        $total_income, $hq_id, $name, $continent
    ) {
        if ($this->companyModel->create(
            $registration_nb, $nb_of_trucks, $nb_of_branches, $nb_of_employees,
            $total_income, $hq_id, $name, $continent
        )) {
            return true;
        } else {
            return false;
        }
    }

    public function getAllCompanies() {
        $result = $this->companyModel->getAll();
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

    public function getCompanyByID($company_id) {
        $company = $this->companyModel->getById($company_id);
        if ($company) {
            return $company;
        } else {
            return false;
        }
    }

    public function updateCompany(
        $registration_nb, $nb_of_trucks, $nb_of_branches, $nb_of_employees,
        $total_income, $hq_id, $name, $continent
    ) {
        if ($this->companyModel->update(
            $registration_nb, $nb_of_trucks, $nb_of_branches, $nb_of_employees,
            $total_income, $hq_id, $name, $continent
        )) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteCompanyByID($company_id) {
        $result = $this->companyModel->deleteById($company_id);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function getBranchesOfCompany($company_id) {
        $result = $this->companyModel->getBranches($company_id);
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

    public function getTrucksOfCompany($company_id) {
        $result = $this->companyModel->getTrucks($company_id);
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

    public function getConsumersOfCompany($company_id) {
        $result = $this->companyModel->getConsumers($company_id);
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

    public function getEmployeesOfCompany($company_id) {
        $result = $this->companyModel->getEmployees($company_id);
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }
}