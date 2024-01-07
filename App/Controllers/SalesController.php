<?php

namespace App\Controllers;

use App\DAO\VenteDAO;
use App\Models\Medicament;
use App\Models\Vente;
use DateTime;

class SalesController
{

    public function index()
    {
        $ventesDAO = new VenteDAO;
        $ventes = $ventesDAO->getAllSales();
        require(__DIR__ . "/../../Views/dashboard/vente.php");
    }
    public function buyMedicament()
    {
        if (!isset($_POST['medication_id'], $_POST['user_id'])) {
            echo "Invalid request parameters.";
            exit();
        }

        $medicationId = $_POST['medication_id'];
        $userId = $_POST['user_id'];
        $venteDAO = new VenteDAO();
        $saleType = 'VenteEnLigne';
        $dateVente = (new DateTime())->format('Y-m-d');
        $isSale = 1;

        $vente = new Vente($medicationId, $userId, $dateVente, $saleType, $isSale);
        $venteDAO->createSale($vente);

        echo 'Sale added successfully';
        exit();
    }
    
}
