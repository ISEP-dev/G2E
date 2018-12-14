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
$js = '<script src="vue/js/arrosage.js"></script>';

// Choix de la vue à afficher
switch ($fonction)
{
    case "accueil":
        $title     = "Gestion de l'arrosage";
        $vue       = "arrosage";
        $maisons   = getHouses($bdd, $tableHabitation, $_SESSION['user_id']);
        $arroseurs = getArroseur($bdd, $tableArroseur, 1);
        break;

    case "ajouter-maison":
        addHouse($bdd, $tableHabitation, $_SESSION['user_id']);
        $title = "Gestion de l'arrosage";
        $vue   = "arrosage";
        break;


    case "infos-maison":
        $maisonInfo = getHouseInfoById($bdd, $tableHabitation, 1);
        $title = $_GET['name_maison'];
        $vue   = "infos-maison";
        break;

    case "param-maison":
        //$maisonInfo = getHouseInfoById($bdd, $tableHabitation, 1);
        $title = $_GET['name_maison'];
        $vue   = "param-maison";
        break;

    case "ajouter-arroseur":
        addArroseur($bdd, $tableArroseur, $_GET['id_habit']);
        $title = "Gestion de l'arrosage";
        $vue   = "arrosage";
        break;

    case "infos-arroseur":
        $arr = getArroseurInfoById($bdd, $tableArroseur, $_GET['name_arroseur']);
        $title = $arr['nom_arr'];
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