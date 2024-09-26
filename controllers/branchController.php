<?php

class BranchController {
    private $branchModel;

    public function __construct($db) {
        $this->branchModel = new branchModel($db);
    }

    public function createBranch(
        $hq_id, $country, $city, $street, $building,
        $nb_of_employees, $nb_of_trucks, $nb_of_storages, $status, $refuels
    ) {
        if ($this->branchModel->create(
            $hq_id, $country, $city, $street, $building,
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
            return true;
        } else {
            return false;
        }
    }

    public function updateBranch(
        $hq_id, $country, $city, $street, $building,
        $nb_of_employees, $nb_of_trucks, $nb_of_storages, $status, $refuels
    ) {
        if ($this->branchModel->update(
            $hq_id, $country, $city, $street, $building,
            $nb_of_employees, $nb_of_trucks, $nb_of_storages, $status, $refuels
        )) {
            return true;
        } else {
            return false;
        }
    }
}