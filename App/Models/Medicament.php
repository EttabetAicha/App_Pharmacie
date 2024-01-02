<?php

namespace App\Models;

class Medicament {
    private $id;
    private $nom;
    private $description;
    private $quantiteStock;
    private $prix;
    private $dateCreation; 

    public function __construct($nom, $description, $quantiteStock, $prix) {
        $this->nom = $nom;
        $this->description = $description;
        $this->quantiteStock = $quantiteStock;
        $this->prix = $prix;
        $this->dateCreation = new \DateTime(); 
    }

    public function getId() {
        return $this->id;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getQuantiteStock() {
        return $this->quantiteStock;
    }

    public function getPrix() {
        return $this->prix;
    }

    public function getDateCreation() {
        return $this->dateCreation;
    }

    // Setters
    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function setQuantiteStock($quantiteStock) {
        $this->quantiteStock = $quantiteStock;
    }

    public function setPrix($prix) {
        $this->prix = $prix;
    }
}
