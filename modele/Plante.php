<?php

require_once "Database.php";

class Plante extends Database
{
    public  $tablePlante = "plante";

    public function getPlantType(string $table, int $idPlante)
    {
        return $this->bdd->query("SELECT * FROM " . $table . " WHERE id_plante=" . $idPlante)->fetch(PDO::FETCH_ASSOC);
    }

    public function getAllPlantType(string $table)
    {
        return $this->bdd->query("SELECT * FROM " . $table);
    }

}