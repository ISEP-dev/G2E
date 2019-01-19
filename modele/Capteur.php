<?php

class Capteur
{
    public $tableCapteur     = "capteur";
    public $tableTypeCapteur = "type_capteur";

    public function checkCapteurStatus(PDO $bdd, string $table, $idArr, $idCapt)
    {
        return $bdd->query("SELECT COUNT(1) FROM " . $table . " WHERE id_arr=" . $idArr . " AND type_capt=" . $idCapt . " ")->fetch(PDO::FETCH_ASSOC);
    }

    public function getCapteurType(PDO $bdd)
    {
        return $bdd->query("SELECT * FROM type_capteur");
    }

    public function checkAllCapteur(PDO $bdd, $idArr)
    {
        $capteur = new Capteur();
        if ($capteur->checkCapteurStatus($bdd, $capteur->tableCapteur, $idArr, 3)['COUNT(1)']) {
            echo "température";
        }
        if ($capteur->checkCapteurStatus($bdd, $capteur->tableCapteur, $idArr, 4)['COUNT(1)']) {
            echo "humidité";
        }
        if ($capteur->checkCapteurStatus($bdd, $capteur->tableCapteur, $idArr, 7)['COUNT(1)']) {
            echo "présence";
        }
    }
}