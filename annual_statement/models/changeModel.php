<?php

class changeModel {

    private $id;
    private $cpr;
    private $income_id;
    private $value;
    private $date;
    private $status;

    /* -------------------------------------------------------------------------------------------------------------- */

    public function __construct($id, $cpr, $income_id, $value, $date, $status) {

        $this->id = $id;
        $this->cpr = $cpr;
        $this->income_id = $income_id;
        $this->value = $value;
        $this->date = $date;
        $this->status = $status;
    }
   
    /* -------------------------------------------------------------------------------------------------------------- */

    public function setId($id) {

        if (isset($id) && is_numeric($id) && $id > 0) {
            $this->id = $id;
        } else {
            return false;
        }
    }

    public function setCpr($cpr) {

        if (isset($cpr) && is_numeric($cpr) && $cpr > 0) {
            $this->id = $cpr;
        } else {
            return false;
        }
    }

    public function setIncome_id($income_id) {

        if (isset($income_id) && is_numeric($income_id) && $income_id > 0) {
            $this->id = $income_id;
        } else {
            return false;
        }
    }

    public function setValue($value) {
        if (isset($value) && is_numeric($value) && $value > 0) {
            $this->value = $value;
        } else {
            return false;
        }
    }

    public function setDate($date) {
        if (isset($date)) {
            $this->date = $date;
        } else {
            return false;
        }
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    /* -------------------------------------------------------------------------------------------------------------- */

    public function getId() {

        return $this->id;
    }

    public function getCpr() {
        return $this->cpr;
    }

    public function getIncome_id() {
        return $this->income_id;
    }

    public function getValue() {
        return $this->value;
    }

    public function getDate() {
        return $this->date;
    }

    public function getStatus() {
        return $this->status;
    }

}

?>