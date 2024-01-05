<?php

use App\Models\Patient;

class PatientInStore extends Patient {
    private $physicalAddress;

    public function __construct($cin, $fullName, $email, $password, $type, $physicalAddress) {
        parent::__construct($cin, $fullName, $email, $password, $type);
        $this->physicalAddress = $physicalAddress;
    }

    public function setPhysicalAddress($physicalAddress) {
        $this->physicalAddress = $physicalAddress;
    }

    public function getPhysicalAddress() {
        return $this->physicalAddress;
    }
}