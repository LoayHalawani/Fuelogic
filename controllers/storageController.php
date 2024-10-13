<?php

class StorageController {
    private $storageModel;

    public function __construct($db) {
        $this->storageModel = new StorageModel($db);
    }

    public function createStorage(
        $capacity, $current_capacity, $storing_conditions, $branch_id, $fuel_type
    ) {
        if ($this->storageModel->create(
            $capacity, $current_capacity, $storing_conditions, $branch_id, $fuel_type
        )) {
            return true;
        } else {
            return false;
        }
    }

    public function getAllStorages() {
        $result = $this->storageModel->getAll();
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

    public function getStorageByID($storage_id) {
        $storage = $this->storageModel->getById($storage_id);
        if ($storage) {
            return $storage;
        } else {
            return false;
        }
    }

    public function updateStorage(
        $capacity, $current_capacity, $storing_conditions, $branch_id, $fuel_type
    ) {
        if ($this->storageModel->update(
            $capacity, $current_capacity, $storing_conditions, $branch_id, $fuel_type
        )) {
            return true;
        } else {
            return false;
        }
    }
}