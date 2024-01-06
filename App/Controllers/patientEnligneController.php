<?php

namespace App\Controllers;

use App\DAO\MedicamentDAO;
use App\Models\PatientEnligne;
use App\DAO\UserDAO;
class PatientEnligneController {
    public function displayinterface() {
       return require(__DIR__ ."/../../Views/index.php");
    }
    public function showpro() {
        $medicamentDAO = new MedicamentDAO;
        $medicaments = $medicamentDAO->getAllMedicaments([]);
        require(__DIR__ . "/../../Views/medicament.php");     }
   
}