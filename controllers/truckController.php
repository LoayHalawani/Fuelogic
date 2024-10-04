<?php

class truckController {
    private $truckModel;

    public function __construct($db) {
        $this->truckModel = new TruckModel($db);
    }

    public function createTruck(
        $plate_nb, $company_id, $branch_id, $fuel_type, $capacity
    ) {
        if ($this->truckModel->create(
            $plate_nb, $company_id, $branch_id, $fuel_type, $capacity
        )) {
            return true;
        } else {
            return false;
        }
    }

    public function getAllTrucks() {
        $result = $this->truckModel->getAll();
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

    public function getTruckByID($truck_id) {
        $truck = $this->truckModel->getById($truck_id);
        if ($truck) {
            return true;
        } else {
            return false;
        }
    }

    public function updateTruck(
        $plate_nb, $company_id, $branch_id, $fuel_type, $capacity
    ) {
        if ($this->truckModel->update(
            $plate_nb, $company_id, $branch_id, $fuel_type, $capacity
        )) {
            return true;
        } else {
            return false;
        }
    }
}