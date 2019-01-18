<?php

class Capteur
{
    public $tableCapteur     = "capteur";
    public $tableTypeCapteur = "type_capteur";

    public function checkCapteurStatus(PDO $bdd, string $table, $idArr, $idCapt)
    {
        return $bdd->query("SELECT COUNT(1) FROM " . $table . " WHERE id_arr=" . $idArr . " AND type_capt=" . $idCapt . " ");
    }

    public function getCapteurType(PDO $bdd)
    {
        return $bdd->query("SELECT * FROM type_capteur");
    }
}