<?php

require_once "fonctions.php";

class Zone
{

    public function addZone(PDO $bdd, string $table, $idHabit)
    {
        $attributs = array(
            "nom_zone" => $_POST['zone-name'],
            "id_habit" => $idHabit
        );
        $insertOk  = insert($bdd, $table, $attributs);
        if (!$insertOk) {
            die("Impossible d'ajouter une nouvelle zone : " . $bdd->errorInfo());
        } else {
            header("Location: index.php?cible=habitation&fonction=accueil");
        }
    }

    public function getZonesByHouseId(PDO $bdd, string $table, int $idHouse)
    {
        return $bdd->query("SELECT * FROM " . $table . " WHERE id_habit=" . $idHouse);
    }

    public function removeZone(PDO $bdd, string $table, $idZone)
    {
        $bdd->query("DELETE FROM " . $table . " WHERE id_zone=" . $idZone);
    }
}