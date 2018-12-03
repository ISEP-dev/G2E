<?php
/**
 * Contrôleur des maisons
 * User: bastien
 * Date: 25/11/2018
 * Time: 00:42
 */

include "modele/Habitation.php";
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
        $title     = "Gestion de l'arrosage";
        $vue       = "arrosage";
        $maisons   = getHouses($bdd, $tableHabitation);
        $arroseurs = getArroseur($bdd, $tableArroseur, $maisons);
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

    default:
        $title = "Erreur 404";
        $vue   = "erreur404";
//        $message = "Page inexistante";
}

include("vue/header.php");
include("vue/" . $vue . ".php");
include("vue/footer.php");
