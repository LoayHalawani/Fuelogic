<?php

class ContractController {
    private $contractModel;

    public function __construct($db) {
        $this->contractModel = new contractModel($db);
    }

    public function createContract(
        $fuel_type, $fuel_amount, $reception_date, $signature_date, $price, $currency
    ) {
        if ($this->contractModel->create(
            $fuel_type, $fuel_amount, $reception_date, $signature_date, $price, $currency
        )) {
            return true;
        } else {
            return false;
        }
    }

    public function getAllContracts() {
        $result = $this->contractModel->getAll();
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

    public function getContractByID($Contract_id) {
        $Contract = $this->contractModel->getById($Contract_id);
        if ($Contract) {
            return true;
        } else {
            return false;
        }
    }

    public function updateContract(
        $fuel_type, $fuel_amount, $reception_date, $signature_date, $price, $currency
    ) {
        if ($this->contractModel->update(
            $fuel_type, $fuel_amount, $reception_date, $signature_date, $price, $currency
        )) {
            return true;
        } else {
            return false;
        }
    }
}