<?php

class Capteur
{
    public  $tableCapteur     = "capteur";
    public  $tableTypeCapteur = "type_capteur";
    private $bdd;

    function __construct(PDO $bdd)
    {
        $this->bdd = $bdd;
    }

    public function checkCapteurStatus(string $table, $idArr, $idCapt)
    {
        return $this->bdd->query("SELECT COUNT(1) FROM " . $table . " WHERE id_arr=" . $idArr . " AND type_capt=" . $idCapt . " ")->fetch(PDO::FETCH_ASSOC);
    }

    public function getCapteurType()
    {
        return $this->bdd->query("SELECT * FROM type_capteur");
    }
}