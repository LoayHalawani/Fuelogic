<?php

class BranchController {
    private $branchModel;

    public function __construct($db) {
        $this->branchModel = new BranchModel($db);
    }

    public function createBranch(
        $company_id, $country, $city, $street, $building,
        $nb_of_employees, $nb_of_trucks, $nb_of_storages, $status, $refuels
    ) {
        if ($this->branchModel->create(
            $company_id, $country, $city, $street, $building,
            $nb_of_employees, $nb_of_trucks, $nb_of_storages, $status, $refuels
        )) {
            return true;
        } else {
            return false;
        }
    }

    public function getAllBranches() {
        $result = $this->branchModel->getAll();
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

    public function getBranchByID($branch_id) {
        $branch = $this->branchModel->getById($branch_id);
        if ($branch) {
            return $branch;
        } else {
            return false;
        }
    }

    public function updateBranch(
        $company_id, $country, $city, $street, $building,
        $nb_of_employees, $nb_of_trucks, $nb_of_storages, $status, $refuels
    ) {
        if ($this->branchModel->update(
            $company_id, $country, $city, $street, $building,
            $nb_of_employees, $nb_of_trucks, $nb_of_storages, $status, $refuels
        )) {
            return true;
        } else {
            return false;
        }
    }
}