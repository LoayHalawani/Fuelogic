<?php

class SupplierController {
    private $supplierModel;

    public function __construct($db) {
        $this->supplierModel = new SupplierModel($db);
    }

    public function createSupplier(
        $name, $email, $fuel_type, $country, $city, $branch_id
    ) {
        if ($this->supplierModel->create(
            $name, $email, $fuel_type, $country, $city, $branch_id
        )) {
            return true;
        } else {
            return false;
        }
    }

    public function getAllSuppliers() {
        $result = $this->supplierModel->getAll();
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

    public function getSupplierByID($supplier_id) {
        $supplier = $this->supplierModel->getById($supplier_id);
        if ($supplier) {
            return $supplier;
        } else {
            return false;
        }
    }

    public function updateSupplier(
        $name, $email, $fuel_type, $country, $city, $branch_id
    ) {
        if ($this->supplierModel->update(
            $name, $email, $fuel_type, $country, $city, $branch_id
        )) {
            return true;
        } else {
            return false;
        }
    }
}