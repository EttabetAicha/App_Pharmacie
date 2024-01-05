<?php
namespace App\Models;
use App\Models\User;

class Patient extends User {
    public function __construct($cin, $fullName, $email, $password, $type) {
        parent::__construct($cin, $fullName, $email, $password, 'patient');
    }

}
?>