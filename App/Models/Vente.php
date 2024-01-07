<?php
namespace App\Models;

class Vente
{
    private $medicamentId;
    private $userId;
    private $dateVente;
    private $type;
    private $isSale;

    public function __construct($medicamentId, $userId, $dateVente, $type, $isSale)
    {
        $this->medicamentId = $medicamentId;
        $this->userId = $userId;
        $this->dateVente = $dateVente;
        $this->type = $type;
        $this->isSale = $isSale;
    }

    public function getMedicamentId()
    {
        return $this->medicamentId;
    }

    public function getUserId()
    {
        return $this->userId;
    }

    public function getDateVente()
    {
        return $this->dateVente;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getIsSale()
    {
        return $this->isSale;
    }
}
