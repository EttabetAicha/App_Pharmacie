<?php 
namespace App\Controllers;
use App\DAO\VenteDAO ;
use DateTime;

class SalesController{
   
    public function index(){
        $ventesDAO = new VenteDAO;
        $ventes = $ventesDAO->getAllSales();
        require(__DIR__ ."/../../Views/dashboard/vente.php");
    }
    public function buyMedicament()
{
    // Get data from the request body
    $data = $_POST;

    // Check if medicationId and userId are present
    if (!isset($data['medication_id'], $_SESSION['CIN'])) {
        echo "Invalid request parameters.";
        exit();
    }

    // Assuming the keys 'medication_id' and 'user_id' are present in the request body
    $medicationId = $data['medication_id'];
    $userId = $_SESSION['CIN'];

    // Create a new instance of VenteDAO
    $venteDAO = new VenteDAO();

    // Set other variables
    $SaleType = 'VenteEnLigne';
    $dateVente = (new DateTime())->format('Y-m-d');
    $isSale = 1;

    // Create sale record
    $result = $venteDAO->createSale($medicationId, $userId, $SaleType, $dateVente, $isSale);

    // Check the result and provide appropriate feedback
    if ($result) {
        echo 'Sale added successfully';
        exit();
    } else {
        echo "Failed to create sale record.";
    }
}

}