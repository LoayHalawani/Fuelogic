<?php

class HqController {
    private $hqModel;

    public function __construct($db) {
        $this->hqModel = new HqModel($db);
    }

    public function createHq(
        $email, $nb_of_employees, $country, $city,
        $street, $building
    ) {
        if ($this->hqModel->create(
            $email, $nb_of_employees, $country, $city,
            $street, $building
        )) {
            return true;
        } else {
            return false;
        }
    }

    public function getAllHeadquarters() {
        $result = $this->hqModel->getAll();
        if ($result) {
            return ['success' => true, 'headquarters' => $result];
        } else {
            return ['success' => false, 'error' => 'Failed to get hqs.'];
        }
    }

    public function getHqByID($hq_id) {
        $hq = $this->hqModel->getById($hq_id);
        if ($hq) {
            return $hq;
        } else {
            return false;
        }
    }

    public function updateHq(
        $email, $nb_of_employees, $country, $city,
        $street, $building
    ) {
        if ($this->hqModel->update(
            $email, $nb_of_employees, $country, $city,
            $street, $building
        )) {
            $this->render('hqView', ['message' => 'HQ updated successfully!']);
        } else {
            $this->render('hqView', ['message' => 'Failed to update HQ.']);
        }
    }
}