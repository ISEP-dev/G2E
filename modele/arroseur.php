<?php
/**
 * Modèle des arroseurs
 * User: bastien
 * Date: 25/11/2018
 * Time: 17:03
 */

// info -> déja  inclu dans modele/Habitation.php
//include "modele/fonctions.php";

$tableArroseur = 'arroseur';

function getArroseurByZoneId(PDO $bdd, string $table, int $idZone)
{
    return $bdd->query("SELECT * FROM " . $table . " WHERE id_zone=" . $idZone);
    // return selectAll($bdd, $table);
}

function getArroseurInfoById(PDO $bdd, string $table, int $idArr)
{
    return $bdd->query("SELECT * FROM " . $table . " WHERE id_arr=" . $idArr)->fetch(PDO::FETCH_ASSOC);
}

function addArroseur(PDO $bdd, string $table, $idZone): bool
{
    $attributs = array(
        'nom_arr'                 => $arrName     = $_POST['arr-name'],
        'numero_serie_arr'        => $_POST['arr-num-serie'],
        'etat_arr'                => 0,
        'etat_fonctionnement_arr' => 0,
        'date_ajout_arr'          => date('Y-m-d H:i:s'),
        'id_zone'                => $idZone
    );

    return insert($bdd, $table, $attributs);

}

function removeArroseur(PDO $bdd, string $table)
{

}

function getPlantes(PDO $bdd, string $table)
{

}