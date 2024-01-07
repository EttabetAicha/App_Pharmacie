<?php

namespace App\Controllers;

use App\DAO\MedicamentDAO;
use App\Models\Medicament;
use Dompdf\Dompdf;
use Dompdf\Options;
class MedicineController
{
    public function index()
    {
        $medicamentDAO = new MedicamentDAO;
        $medicaments = $medicamentDAO->getAllMedicaments([]);
        require(__DIR__ . "/../../Views/dashboard/store.php");
    }

    public function addMedicament()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['nom'], $_POST['description'], $_POST['quantite_stock'], $_POST['prix'])) {
                $nom = $_POST['nom'];
                $id = $_POST['id'];
                $description = $_POST['description'];
                $quantite_stock = $_POST['quantite_stock'];
                $prix = $_POST['prix'];
                $newMedicament = new Medicament($id, $nom, $description, $quantite_stock, $prix);
                $medicamentDAO = new MedicamentDAO;
                $result = $medicamentDAO->create($newMedicament);
                if ($result) {
                    header('location: /medicine');
                } else {
                    echo "Failed to add Medicament.";
                }
            } else {
                echo "Missing required fields.";
            }
        }
    }

    public function updateMedicine()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $nom = $_POST['updateMedicineName'];
            $description = $_POST['updateMedicineDescription'];
            $quantite_stock = $_POST['updateMedicineStock'];
            $prix = $_POST['updateMedicinePrice'];
            $updatedMedicament = new Medicament($id, $nom, $description, $quantite_stock, $prix);
            $medicamentDAO = new MedicamentDAO;
            $result = $medicamentDAO->updateMedicament($updatedMedicament);
            if ($result) {
                header('Location: /medicine');
                exit();
            } else {
                echo "Failed to update Medicine.";
            }
        }
    }

    public function deleteMedicament()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $medicamentDAO = new MedicamentDAO;
            $result = $medicamentDAO->delete($id);
            if ($result) {
                header('location: /medicine');
            } else {
                echo "Failed to delete Medicament.";
            }
        }
    }
    public function searchMedicament()
{
    if (isset($_POST['search'])) {
        $searchTerm = filter_input(INPUT_POST, 'search', FILTER_SANITIZE_STRING);

        // Assuming $yourMedicamentDAO is an instance of your MedicamentDAO class
        $yourMedicamentDAO = new MedicamentDAO(); 

        // Assuming searchMedicaments method accepts a search term and returns matching results
        $medicaments = $yourMedicamentDAO->searchMedicaments($searchTerm);

        $response = [
            'success' => true,
            'data' => $medicaments,
        ];

        header('Content-Type: application/json');
        echo json_encode($response);
        exit();
    }
}

    
    
    public function exportMedicineToPDF() {
        $medicamentDAO = new MedicamentDAO;
        $medicaments = $medicamentDAO->getAllMedicaments();
    
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);
        $dompdf = new Dompdf($options);
    
        $html = '<html><body>';
        $html .= '<h2>Medicine Data</h2>';
        $html .= '<table border="1">';
        $html .= '<tr><th>Product Name</th><th>Description</th><th>Quantite stock</th><th>Prix</th></tr>';
    
        foreach ($medicaments as $medicament) {
            $html .= '<tr>';
            $html .= '<td>' . $medicament['nom'] . '</td>';
            $html .= '<td>' . $medicament['description'] . '</td>';
            $html .= '<td>' . $medicament['quantite_stock'] . '</td>';
            $html .= '<td>' . $medicament['prix'] . '</td>';
            $html .= '</tr>';
        }
    
        $html .= '</table>';
        $html .= '</body></html>';
    
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream("medicine_list.pdf", [
            "Attachment" => false
        ]);
    }

}
