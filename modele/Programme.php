<?php

require_once "Database.php";

class Programme extends Database
{

    public $tableProgramme = "programme";

    public function addProgram(string $table, array $attributs)
    {
        $insertOk = Database::insert($this->bdd, $table, $attributs);
        if ($insertOk) {
            Database::redirect("habitation", "accueil");
        }
    }

    public function checkDateActivation(int $idArr)
    {
        $statment = $this->bdd->prepare("SELECT * FROM programme WHERE id_arr=" . $idArr);
        $statment->execute();
        foreach ($statment->fetchAll(PDO::FETCH_ASSOC) as $prog) {
            if (time() == strtotime($prog['date_debut_prog'])) {
                $arroseur = new Arroseur();
                $arroseur->updateArroseur($arroseur->tableArroseur, 1, $prog['id_arr']);
                return "on";
            }
            if (time() == strtotime($prog['date_fin_prog'])) {
                $arroseur = new Arroseur();
                $arroseur->updateArroseur($arroseur->tableArroseur, 0, $prog['id_arr']);
                return "off";
            }
        }
        return null;
    }
}