<?php
/**
 * Modèle des arroseurs
 * User: bastien
 * Date: 25/11/2018
 * Time: 17:03
 */

// info -> déja  inclu dans modele/habitation.php
//include "modele/fonctions.php";

$tableArroseur = 'arroseur';

function getArroseur(PDO $bdd, string $table): array
{
    return selectAll($bdd, $table);
}