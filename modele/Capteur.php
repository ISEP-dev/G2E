<?php

require_once "Database.php";

class Capteur extends Database
{
    public  $tableCapteur     = "capteur";
    public  $tableTypeCapteur = "type_capteur";

    public function checkCapteurStatus(string $table, int $idArr, int $idCapt)
    {
        return $this->bdd->query("SELECT COUNT(1) FROM " . $table . " WHERE id_arr=" . $idArr . " AND type_capt=" . $idCapt . " ")->fetch(PDO::FETCH_ASSOC);
    }

    public function getCapteurType()
    {
        return $this->bdd->query("SELECT * FROM type_capteur");
    }
}