<?php

class Vente {
    private $id;
    private $medicament; 
    private $user; 
    private $date_vente;
    private $type;
    private $IsSale;

    public function __construct($medicament, $user,$date_vente, $type, $IsSale) {
        $this->medicament = $medicament;
        $this->user=$user;
        $this->date_vente = $date_vente;
        $this->type = $type;
        $this->IsSale = $IsSale;
    }


    public function getMedicament() {
        return $this->medicament;
    }
    public function getUser(){
        return $this->user;
    }
    public function getdate() {
        return $this->date_vente;
    }
    public function getType() { 
        return $this->type;
    }
    public function getIsSale() {
        return $this->IsSale;
    }
}

