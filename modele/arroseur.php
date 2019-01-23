<?php

require_once "fonctions.php";

$tableArroseur     = 'arroseur';
$tableArroseurType = 'type_arroseur';

function getArroseurByZoneId(PDO $bdd, string $table, int $idZone)
{
    return $bdd->query("SELECT * FROM " . $table . " WHERE id_zone=" . $idZone);
}

function getArroseurInfoById(PDO $bdd, string $table, int $idArr)
{
    return $bdd->query("SELECT * FROM " . $table . " WHERE id_arr=" . $idArr)->fetch(PDO::FETCH_ASSOC);
}

function addArroseur(PDO $bdd, string $table, $idZone, $idPlante, $idTypeArroseur): bool
{
    /* fixme : try this regex to avoid non serial-number entry for sprinkler : /^DOM[0-9]{5}$/m */
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

    return insert($bdd, $table, $attributs);

}

function getAllArroseurType(PDO $bdd, string $table)
{
    return $bdd->query("SELECT * FROM " . $table);
}

function getArroseurTypeByArroseurId(PDO $bdd, string $table, string $table2, $idArr)
{
    return $bdd->query("SELECT nom_type_arroseur FROM " . $table .
        " INNER JOIN arroseur ON arroseur.id_type_arroseur = type_arroseur.id_type_arroseur WHERE arroseur.id_arr=" . $idArr)->fetch(PDO::FETCH_ASSOC);
}

function removeArroseur(PDO $bdd, string $table, $idArr)
{
    delete($bdd, $table, "id_arr=" . $idArr);
}

function updateArroseur(PDO $bdd, string $table, $checked, $arroseurId, $zoneId)
{
    $statment = $bdd->prepare("UPDATE " . $table . " SET etat_arr = :checked WHERE id_arr = :arroseur AND id_zone = :zone");
    $statment->bindParam(':checked', $checked);
    $statment->bindParam(':arroseur', $arroseurId);
    $statment->bindParam(':zone', $zoneId);
    return $statment->execute();
}

function addCapteurToArroseur(PDO $bdd, string $table, $idArroseur, $idCapteur, $capteurState)
{
    if ($capteurState == 1) {
        $insertArray = array(
            'type_capt' => $idCapteur,
            'id_arr'    => $idArroseur
        );
        insert($bdd, $table, $insertArray);
    } else {
        delete($bdd, $table, "id_arr=" . $idArroseur . " AND type_capt=" . $idCapteur);
    }

}