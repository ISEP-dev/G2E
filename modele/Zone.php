<?php

require_once "fonctions.php";

class Zone
{

    private $bdd;

    function __construct(PDO $bdd)
    {
        $this->bdd = $bdd;
    }

    public function addZone(string $table, $idHabit)
    {
        $attributs = array(
            "nom_zone" => $_POST['zone-name'],
            "id_habit" => $idHabit
        );
        $insertOk  = insert($this->bdd, $table, $attributs);
        if (!$insertOk) {
            die("Impossible d'ajouter une nouvelle zone : " . $this->bdd->errorInfo());
        } else {
            header("Location: index.php?cible=habitation&fonction=accueil");
        }
    }

    public function getZonesByHouseId(string $table, int $idHouse)
    {
        return $this->bdd->query("SELECT * FROM " . $table . " WHERE id_habit=" . $idHouse);
    }

    public function removeZone(string $table, $idZone)
    {
        delete($this->bdd, $table, "id_zone=" . $idZone);
    }
}