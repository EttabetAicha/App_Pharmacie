<?php

namespace App\DAO;

use App\Models\Vente ;
use PDO;
use Config\DbConnection;

class VenteDAO
{
    private $database;
    public function __construct()
    {
        $this->database = DbConnection::getConnection();
    }

    public function createSale(Vente $vente)
    {
        try {
            $query = "INSERT INTO vente (medicament_id, users_id, type, date_vente, IsSale) VALUES (?, ?, ?, ?, ?)";
            $stmt = $this->database->prepare($query);
            $stmt->execute([
                $vente->getMedicamentId(),
                $vente->getUserId(),
                $vente->getType(),
                $vente->getDateVente(),
                $vente->getIsSale()
            ]);
        } catch (\Exception $e) {
            echo "Error creating sale: " . $e->getMessage();
        }
    }


    public function getAllSales()
    {
        $query = "SELECT vente.*, users.full_name, medicament.nom ,medicament.prix
        FROM vente
        INNER JOIN users ON vente.users_id = users.CIN
        INNER JOIN medicament ON vente.medicament_id = medicament.id";

      $statement = $this->database->prepare($query);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateSale($venteID, $medicationId, $userId, $type, $date_vente, $IsSale)
    {
        $query = "UPDATE vente SET medication_id = :medicationId, users_id = :userId, type = :type, date_vente = :date_vente, is_sale = :IsSale WHERE id = :venteID";
        $statement = $this->database->prepare($query);
        $statement->bindParam(":venteID", $venteID, PDO::PARAM_INT);
        $statement->bindParam(":medicationId", $medicationId, PDO::PARAM_INT);
        $statement->bindParam(":userId", $userId, PDO::PARAM_INT);
        $statement->bindParam(":type", $type, PDO::PARAM_STR);
        $statement->bindParam(":date_vente", $date_vente, PDO::PARAM_STR);
        $statement->bindParam(":IsSale", $IsSale, PDO::PARAM_INT);

        return $statement->execute();
    }

    public function deleteSale($venteID)
    {
        $query = "DELETE FROM vente WHERE id = :venteID";
        $statement = $this->database->prepare($query);
        $statement->bindParam(":venteID", $venteID, PDO::PARAM_INT);

        return $statement->execute();
    }
}
?>
