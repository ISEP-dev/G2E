<?php
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
}

/**
 * Contrôleur des maisons
 * User: bastien
 * Date: 25/11/2018
 * Time: 00:42
 */

include "modele/habitation.php";
include "modele/arroseur.php";

if (!isset($_GET['fonction']) || empty($_GET['fonction'])) {
    $fonction = "accueil";
} else {
    $fonction = $_GET['fonction'];
}

$head = '<link rel="stylesheet" href="vue/css/arrosage.css">';
$js   = '<script src="vue/js/arrosage.js"></script>';

// Choix de la vue à afficher
switch ($fonction) {
    case "accueil":
        if (isset($_POST['house-select'])) {
            $maison                = getHouseById($bdd, $tableHabitation, $_POST['house-select']);
            $_SESSION['id_maison'] = $_POST['house-select'];
        } else {
            $maison                = getHousebyUserId($bdd, $tableHabitation, $_SESSION['user_id']);
            $_SESSION['id_maison'] = $maison['id_habit'];
        }
        $title                 = $maison['nom_habit'];
        $vue                   = "arrosage";
        break;

    case "ajouter-maison":
        addHouse($bdd, $tableHabitation, $_SESSION['user_id']);
        $title = "Gestion de l'arrosage";
        $vue   = "arrosage";
        break;

    case "update-view":

        break;

    case "ajouter-zone":
        addZone($bdd, $tableZone, $_POST['id-house']);
        break;

    case "config-arroseur":
        $vue = "infos-arroseur";
        break;

    case "ajouter-arroseur":
        addArroseur($bdd, $tableArroseur, $_POST['zone-id']);
        $title = "Gestion de l'arrosage";
        $vue   = "arrosage";
        break;

    /*  fixme : à voir mais surement à supprimer
        case "infos-maison":
            $maisonInfo = getHouseInfoById($bdd, $tableHabitation, 1);
            $title      = $_GET['name_maison'];
            $vue        = "infos-maison";
            break;

        case "param-maison":
            //$maisonInfo = getHouseInfoById($bdd, $tableHabitation, 1);
            $title = $_GET['name_maison'];
            $vue   = "param-maison";
            break;



        case "infos-arroseur":
            $arr   = getArroseurInfoById($bdd, $tableArroseur, $_GET['name_arroseur']);
            $title = $arr['nom_arr'];
            $vue   = "infos-arroseur";
            break;
    */
    default:
        $title = "Erreur 404";
        $vue   = "erreur404";
//        $message = "Page inexistante";
}

include("vue/header.php");
include("vue/" . $vue . ".php");
include("vue/footer.php");