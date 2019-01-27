<?php
/**
 * Created by PhpStorm.
 * User: basti
 * Date: 26/12/2018
 * Time: 11:57
 */

class Plante
{
    public  $tablePlante = "plante";
    private $bdd;

    function __construct(PDO $bdd)
    {
        $this->bdd = $bdd;
    }

    public function getPlantType(string $table, int $idPlante)
    {
        return $this->bdd->query("SELECT * FROM " . $table . " WHERE id_plante=" . $idPlante)->fetch(PDO::FETCH_ASSOC);
    }

    public function getAllPlantType(string $table)
    {
        return $this->bdd->query("SELECT * FROM " . $table);
    }

}