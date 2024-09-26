<?php

class ConsumerController {
    private $consumerModel;

    public function __construct($db) {
        $this->consumerModel = new ConsumerModel($db);
    }

    public function createConsumer(
        $name, $type, $company_id, $phone_nb, $country, $city, $street, $building
    ) {
        if ($this->consumerModel->create(
            $name, $type, $company_id, $phone_nb, $country, $city, $street, $building
        )) {
            return true;
        } else {
            return false;
        }
    }

    public function getAllConsumers() {
        $result = $this->consumerModel->getAll();
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

    public function getConsumerByID($consumer_id) {
        $consumer = $this->consumerModel->getById($consumer_id);
        if ($consumer) {
            return true;
        } else {
            return false;
        }
    }

    public function updateConsumer(
        $name, $type, $company_id, $phone_nb, $country, $city, $street, $building
    ) {
        if ($this->consumerModel->update(
            $name, $type, $company_id, $phone_nb, $country, $city, $street, $building
        )) {
            return true;
        } else {
            return false;
        }
    }
}