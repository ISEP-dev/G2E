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

function getArroseur(PDO $bdd, string $table)
{
    return $bdd->query("SELECT * FROM " . $table . " WHERE id_habit=1");
    // return selectAll($bdd, $table);
}

function getArroseurById(PDO $bdd, string $table, int $idArr)
{
    return $bdd->query("SELECT * FROM " . $table . " WHERE id_arr=" . $idArr)->fetch(PDO::FETCH_ASSOC);
}

function addArroseur(PDO $bdd, string $table, $idHabit): bool
{
    $arrName      = $_POST['arr-name'];
    $arrNUmSerie  = $_POST['arr-num-serie'];
    $arrEtat      = 0; // $_POST['arr-etat'];
    $arrEtatFct   = 0; // $_POST['arr-etat-fct'];
    $arrIdHabit   = $idHabit; // fixme -> change to id from house

    $attributs = array(
        'nom_arr' => $arrName,
        'numero_serie_arr' => $arrNUmSerie,
        'etat_arr' => $arrEtat,
        'etat_fonctionnement_arr' => $arrEtatFct,
        'date_ajout_arr' => date('Y-m-d H:i:s'),
        'id_habit' => $arrIdHabit
    );

    insert($bdd, $table, $attributs);

}

function removeArroseur(PDO $bdd, string $table)
{

}