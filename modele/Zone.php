<?php

require_once "Database.php";

class Zone extends Database
{

    public function addZone(string $table, $idHabit)
    {
        $attributs = array(
            "nom_zone" => $_POST['zone-name'],
            "id_habit" => $idHabit
        );
        $insertOk  = Database::insert($this->bdd, $table, $attributs);
        if (!$insertOk) {
            die("Impossible d'ajouter une nouvelle zone : " . $this->bdd->errorInfo());
        } else {
            Database::redirect("habitation", "accueil");
        }
    }

    public function getZonesByHouseId(string $table, int $idHouse)
    {
        return $this->bdd->query("SELECT * FROM " . $table . " WHERE id_habit=" . $idHouse);
    }

    public function removeZone(string $table, $idZone)
    {
        Database::delete($this->bdd, $table, "id_zone=" . $idZone);
    }
}