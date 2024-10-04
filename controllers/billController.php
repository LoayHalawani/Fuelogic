<?php

class BillController {
    private $billModel;

    public function __construct($db) {
        $this->billModel = new BillModel($db);
    }

    public function createBill(
        $bill_nb, $company_id, $consumer_id, $fuel_type, $fuel_amount,
        $payment_date, $payment_method, $currency, $price
    ) {
        if ($this->billModel->create(
            $bill_nb, $company_id, $consumer_id, $fuel_type, $fuel_amount,
            $payment_date, $payment_method, $currency, $price
        )) {
            return true;
        } else {
            return false;
        }
    }

    public function getAllBills() {
        $result = $this->billModel->getAll();
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

    public function getBillByNb($bill_id) {
        $Bill = $this->billModel->getByBillNb($bill_id);
        if ($Bill) {
            return $Bill;
        } else {
            return false;
        }
    }

    public function updateBill(
        $bill_nb, $company_id, $consumer_id, $fuel_type, $fuel_amount,
        $payment_date, $payment_method, $currency, $price
    ) {
        if ($this->billModel->update(
            $bill_nb, $company_id, $consumer_id, $fuel_type, $fuel_amount,
            $payment_date, $payment_method, $currency, $price
        )) {
            return true;
        } else {
            return false;
        }
    }
}