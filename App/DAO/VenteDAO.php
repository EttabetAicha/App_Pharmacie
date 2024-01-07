<?php

namespace App\DAO;

use PDO;
use Config\DbConnection;

class VenteDAO
{
    private $database;

    public function __construct()
    {
        $this->database = DbConnection::getConnection();
    }

    public function createSale($medicationId, $userId, $saletype, $date_vente, $IsSale)
    {
        $query = "INSERT INTO vente (medication_id, user_id, type, date_vente, is_sale) VALUES (:medicationId, :userId, :type, :date_vente, :IsSale)";
        $statement = $this->database->prepare($query);
        $statement->bindParam(":medicationId", $medicationId, PDO::PARAM_INT);
        $statement->bindParam(":userId", $userId, PDO::PARAM_INT);
        $statement->bindParam(":type", $saletype, PDO::PARAM_STR);
        $statement->bindParam(":date_vente", $date_vente, PDO::PARAM_STR);
        $statement->bindParam(":IsSale", $IsSale, PDO::PARAM_INT);

        return $statement->execute();
    }

    public function getAllSales()
    {
        $query = "SELECT vente.*, users.full_name, medicament.nom ,medicament.prix
        FROM vente
        INNER JOIN users ON vente.user_id = users.CIN
        INNER JOIN medicament ON vente.medicament_id = medicament.id";

      $statement = $this->database->prepare($query);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateSale($venteID, $medicationId, $userId, $type, $date_vente, $IsSale)
    {
        $query = "UPDATE vente SET medication_id = :medicationId, user_id = :userId, type = :type, date_vente = :date_vente, is_sale = :IsSale WHERE id = :venteID";
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
