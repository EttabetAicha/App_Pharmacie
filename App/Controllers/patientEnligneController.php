<?php

namespace App\Controllers;

use App\Models\PatientEnligne;
use App\DAO\UserDAO;
class PatientEnligneController {
    public function displayinterface() {
       return require(__DIR__ ."/../../Views/index.php");
    }
   
}