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
            $this->render('hqView', ['message' => 'HQ created successfully!']);
        } else {
            $this->render('hqView', ['message' => 'Failed to create HQ.']);
        }
    }

    public function getHqByID($hq_id) {
        $hq = $this->hqModel->getById($hq_id);
        if ($hq) {
            $this->render('hqView', ['hq' => $hq]);
        } else {
            $this->render('hqView', ['message' => 'HQ not found.']);
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

    // Utility method to render a view
    private function render($view, $data = []) {
        extract($data);  // Extracts the data array into variables
        require "../views/{$view}.php";  // Loads the view file
    }
}