<?php
/**
 * Created by PhpStorm.
 * User: basti
 * Date: 26/12/2018
 * Time: 11:57
 */

class Plante
{
    public $tablePlante = "plante";

    public function getPlantType(PDO $bdd, string $table, int $idPlante)
    {
        return $bdd->query("SELECT * FROM " . $table . " WHERE id_plante=" . $idPlante)->fetch(PDO::FETCH_ASSOC);
    }

    public function getAllPlantType(PDO $bdd, string $table)
    {
        return $bdd->query("SELECT * FROM " . $table);
    }

}