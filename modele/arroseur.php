<?php
/**
 * Modèle des arroseurs
 * User: bastien
 * Date: 25/11/2018
 * Time: 17:03
 */

// info -> déja  inclu dans modele/Habitation.php
//include "modele/fonctions.php";

$tableArroseur     = 'arroseur';
$tableArroseurType = 'type_arroseur';

function getArroseurByZoneId(PDO $bdd, string $table, int $idZone)
{
    return $bdd->query("SELECT * FROM " . $table . " WHERE id_zone=" . $idZone);
    // return selectAll($bdd, $table);
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
    $bdd->query("DELETE FROM " . $table . " WHERE id_arr=" . $idArr);
}
