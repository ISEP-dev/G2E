<?php

require_once "Database.php";

class Arroseur extends Database
{
    public  $tableArroseurType = 'type_arroseur';
    public  $tableArroseur     = 'arroseur';


    function getArroseurByZoneId(string $table, int $idZone)
    {
        return $this->bdd->query("SELECT * FROM " . $table . " WHERE id_zone=" . $idZone);
    }

    function getArroseurInfoById(string $table, int $idArr)
    {
        return $this->bdd->query("SELECT * FROM " . $table . " WHERE id_arr=" . $idArr)->fetch(PDO::FETCH_ASSOC);
    }

    function addArroseur(string $table, int $idZone, int $idPlante, int $idTypeArroseur): bool
    {
        $attributs = array(
            'nom_arr'                 => $_POST['arr-name'],
            'numero_serie_arr'        => $_POST['arr-num-serie'],
            'etat_arr'                => 0,
            'etat_fonctionnement_arr' => 0,
            'date_ajout_arr'          => date('Y-m-d H:i:s'),
            'id_zone'                 => $idZone,
            'id_plante'               => $idPlante,
            'id_type_arroseur'        => $idTypeArroseur
        );

        if (Database::insert($this->bdd, $table, $attributs)) {
            return true;
        } else {
            return false;
        }

    }

    function getAllArroseurType(string $table)
    {
        return $this->bdd->query("SELECT * FROM " . $table);
    }

    function getArroseurTypeByArroseurId(string $table, string $table2, int $idArr)
    {
        return $this->bdd->query("SELECT nom_type_arroseur FROM " . $table .
            " INNER JOIN arroseur ON arroseur.id_type_arroseur = type_arroseur.id_type_arroseur WHERE arroseur.id_arr=" . $idArr)->fetch(PDO::FETCH_ASSOC);
    }

    function removeArroseur(string $table, int $idArr)
    {
        Database::delete($this->bdd, $table, "id_arr=" . $idArr);
    }

    function updateArroseur(string $table, $checked, int $arroseurId, int $zoneId)
    {
        $statment = $this->bdd->prepare("UPDATE " . $table . " SET etat_arr = :checked WHERE id_arr = :arroseur AND id_zone = :zone");
        $statment->bindParam(':checked', $checked);
        $statment->bindParam(':arroseur', $arroseurId);
        $statment->bindParam(':zone', $zoneId);
        return $statment->execute();
    }

    function addCapteurToArroseur(string $table, int $idArroseur, int $idCapteur, int $capteurState)
    {
        if ($capteurState == 1) {
            $insertArray = array(
                'type_capt' => $idCapteur,
                'id_arr'    => $idArroseur
            );
            Database::insert($this->bdd, $table, $insertArray);
        } else {
            Database::delete($this->bdd, $table, "id_arr=" . $idArroseur . " AND type_capt=" . $idCapteur);
        }

    }
}