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

$head      = '<link rel="stylesheet" href="vue/css/arrosage.css">';

// Choix de la vue à afficher
switch ($fonction)
{
    case "accueil":
        $title     = "Gestion de l'arrosage";
        $vue       = "arrosage";
        $maisons   = getHouses($bdd, $tableHabitation);
        $arroseurs = getArroseur($bdd, $tableArroseur);
        break;

    case "ajouter-maison":
        addHouse($bdd, $tableHabitation);
        $title = "Gestion de l'arrosage";
        $vue   = "arrosage";
        break;

    case "ajouter-arroseur":
        addArroseur($bdd, $tableArroseur, $_GET['id_habit']);
        $title = "Gestion de l'arrosage";
        $vue   = "arrosage";
        break;

    case "infos-maison":
        $title = "Informations sur la " . $_GET['id'];
        $vue   = "infos-maison";
        break;

    case "infos-arroseur":
        $arroseur = getArroseurById($bdd, $tableArroseur, $_GET['id']);
        $title = "Informations de l'arroseur";
        $vue   = "infos-arroseur";
        break;

    default:
        $title = "Erreur 404";
        $vue   = "erreur404";
//        $message = "Page inexistante";
}

include("vue/header.php");
include("vue/" . $vue . ".php");
include("vue/footer.php");