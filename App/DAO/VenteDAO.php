<?php

use DatabaseConnection;
class VenteDAO {
    private static $instance;
    private $database;

    private function __construct() {
        $this->database = DatabaseConnection::getConnection();
    }

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new VenteDAO();
        }
        return self::$instance;
    }

    public function createVente($vente) {
    }

    public function readVente($venteId) {
    }

    public function updateVente($vente) {
    }

    public function deleteVente($venteId) {
    }

}

