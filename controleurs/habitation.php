<?php
/**
 * Contrôleur des maisons
 * User: bastien
 * Date: 25/11/2018
 * Time: 00:42
 */

include "modele/habitation.php";
include "modele/arroseur.php";

if (!isset($_GET['fonction']) || empty($_GET['fonction']))
{
    $fonction = "accueil";
}
else
{
    $fonction = $_GET['fonction'];
}
// Choix de la vue à afficher
switch ($fonction)
{
    case "accueil":
        $head  = '<link rel="stylesheet" href="vue/css/arrosage.css">';
        $title = "Gestion de l'arrosage";
        $vue = "arrosage";
        $maisons = getHouses($bdd, $tableHabitation);
        $arroseurs = getArroseur($bdd, $tableArroseur);
        break;

    case "ajouter":
        addHouse($bdd, $tableHabitation);
        $head  = '<link rel="stylesheet" href="vue/css/arrosage.css">';
        $title = "Gestion de l'arrosage";
        $vue = "arrosage";
        break;
    default:
        $title = "Erreur 404";
        $vue = "erreur404";
//        $message = "Page inexistante";
}

include("vue/header.php");
include("vue/" . $vue . ".php");
include("vue/footer.php");
