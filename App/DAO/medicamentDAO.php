<?php

namespace App\DAO;

use App\Models\Medicament;
use Config\DbConnection;
use PDO;
use PDOException;

class MedicamentDAO {
    private $db;
    private static $instance;

    public function __construct() {
        $this->db = DbConnection::getConnection();
    }

    public function create(Medicament $medicament) {
        $query = "INSERT INTO medicament (nom, description, quantite_stock, prix) VALUES (:nom, :description, :quantite_stock, :prix)";
        $stmt = $this->db->prepare($query);
    
        $stmt->bindValue(':nom', $medicament->getNom());
        $stmt->bindValue(':description', $medicament->getDescription());
        $stmt->bindValue(':quantite_stock', $medicament->getQuantiteStock());
        $stmt->bindValue(':prix', $medicament->getPrix());
    
        try {
            $result = $stmt->execute();
            return $result;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage(); 
            return false;
        }
    }
    

    public function getAllMedicaments() {
        $query = "SELECT * FROM medicament";
        $stmt = $this->db->prepare($query);
        $stmt->execute([]);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function updateMedicament(Medicament $medicament)
    {
        $query = "UPDATE medicament SET nom = :nom, description = :description, quantite_stock = :quantite_stock, prix = :prix WHERE id = :id";
        $stmt = $this->db->prepare($query);
    
        $stmt->bindValue(':nom', $medicament->getNom());
        $stmt->bindValue(':description', $medicament->getDescription());
        $stmt->bindValue(':quantite_stock', $medicament->getQuantiteStock());
        $stmt->bindValue(':prix', $medicament->getPrix());
        $stmt->bindValue(':id', $medicament->getId());
    
        try {
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
    public function searchMedicaments($searchTerm)
    {
        $query = "SELECT * FROM medicament WHERE nom LIKE :searchTerm";
        $statement = $this->db->prepare($query);
        $searchPattern = "%{$searchTerm}%";
        $statement->bindParam(":searchTerm", $searchPattern, PDO::PARAM_STR);
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    
    
    
    public function delete($id) {
        $query = "DELETE FROM medicament WHERE id = :id";
        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':id', $id);

        return $stmt->execute();
    }
}
