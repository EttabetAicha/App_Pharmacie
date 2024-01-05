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

    public function createSale($medicationId,$userId,$type, $date_vente, $IsSale) {
        $query = "INSERT INTO vente (medication_id, userId, type,date_vente,isSale) VALUES ( :medicationId, :userId, :type ,:date_Vente,:IsSale)";
        $statement = $this->database->prepare($query);
        $statement->bindParam(":medicationId", $medicationId, PDO::PARAM_INT);
        $statement->bindParam(":userId", $userId, PDO::PARAM_INT);
        $statement->bindParam(":type", $type, PDO::PARAM_STR);
        $statement->bindParam(":date_vente", $date_vente, PDO::PARAM_STR);
        $statement->bindParam(":isSale", $IsSale, PDO::PARAM_STR);
        
        return $statement->execute();
    }

    public function getSaleById($venteID) {
        $query = "SELECT * FROM vente WHERE id = :venteID";
        $statement = $this->database->prepare($query);
        $statement->bindParam(":venteID", $venteID, PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function updateSale($venteID,$medicationId,$userId,$type, $date_vente, $IsSale) {
        $query = "UPDATE vente SET id = :userId, medication_id = :medicationId, type = :type, date_vente = :date_vente ,IsSale=:IsSale WHERE id = :venteID";
        $statement = $this->database->prepare($query);
        $statement->bindParam(":venteID", $venteID, PDO::PARAM_INT);
        $statement->bindParam(":medicationId", $medicationId, PDO::PARAM_INT);
        $statement->bindParam(":userId", $userId, PDO::PARAM_INT);
        $statement->bindParam(":type", $type, PDO::PARAM_STR);
        $statement->bindParam(":date_vente", $date_vente, PDO::PARAM_STR);
        $statement->bindParam(":isSale", $IsSale, PDO::PARAM_STR);
        

        return $statement->execute();
    }

    public function deleteSale($venteID) {
        $query = "DELETE FROM vente WHERE id = :venteID";
        $statement = $this->database->prepare($query);
        $statement->bindParam(":venteID", $venteID, PDO::PARAM_INT);

        return $statement->execute();
    }

}
?>
