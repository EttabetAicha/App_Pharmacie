<?php

use App\Models\Medicament;

class MedicamentDAO {
    private $db;

    public function __construct() {
        $this->db = DatabaseConnection::getConnection(); 
    }

    public function create(Medicament $medicament) {
        $query = "INSERT INTO medicaments (nom, description, quantite_stock, prix) VALUES (:nom, :description, :quantite_stock, :prix)";
        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':nom', $medicament->getNom());
        $stmt->bindValue(':description', $medicament->getDescription());
        $stmt->bindValue(':quantite_stock', $medicament->getQuantiteStock());
        $stmt->bindValue(':prix', $medicament->getPrix());

        return $stmt->execute();
    }

    public function read($id) {
        $query = "SELECT * FROM medicaments WHERE id = :id";
        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':id', $id);
        $stmt->execute();

        $medicamentData = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$medicamentData) {
            return null; 
        }

        return new Medicament(
            $medicamentData['id'],
            $medicamentData['nom'],
            $medicamentData['description'],
            $medicamentData['quantite_stock'],
            $medicamentData['prix']
        );
    }

    public function update(Medicament $medicament) {
        $query = "UPDATE medicaments SET nom = :nom, description = :description, quantite_stock = :quantite_stock, prix = :prix WHERE id = :id";
        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':nom', $medicament->getNom());
        $stmt->bindValue(':description', $medicament->getDescription());
        $stmt->bindValue(':quantite_stock', $medicament->getQuantiteStock());
        $stmt->bindValue(':prix', $medicament->getPrix());
        $stmt->bindValue(':id', $medicament->getId());

        return $stmt->execute();
    }

    public function delete($id) {
        $query = "DELETE FROM medicaments WHERE id = :id";
        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':id', $id);

        return $stmt->execute();
    }
}