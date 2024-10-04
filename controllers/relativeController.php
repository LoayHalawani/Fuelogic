<?php

class RelativeController {
    private $relativeModel;

    public function __construct($db) {
        $this->relativeModel = new relativeModel($db);
    }

    public function createRelative(
        $employee_id, $name, $age, $relationship, $phone_nb, $country, $city, $street, $building
    ) {
        if ($this->relativeModel->create(
            $employee_id, $name, $age, $relationship, $phone_nb, $country, $city, $street, $building
        )) {
            return true;
        } else {
            return false;
        }
    }

    public function getAllRelatives() {
        $result = $this->relativeModel->getAll();
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

    public function getRelativeByID($Relative_id) {
        $Relative = $this->relativeModel->getById($Relative_id);
        if ($Relative) {
            return true;
        } else {
            return false;
        }
    }

    public function updateRelative(
        $employee_id, $name, $age, $relationship, $phone_nb, $country, $city, $street, $building
    ) {
        if ($this->relativeModel->update(
            $employee_id, $name, $age, $relationship, $phone_nb, $country, $city, $street, $building
        )) {
            return true;
        } else {
            return false;
        }
    }
}