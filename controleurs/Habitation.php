<?php
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
}

include "modele/habitation.php";
include "modele/arroseur.php";
include "modele/Plante.php";
include "modele/Capteur.php";
include "modele/Zone.php";
include "modele/model.php";

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
        $title = $maison['nom_habit'];
        $vue   = "arrosage";
        break;

    case "ajouter-arroseur":
        addArroseur($bdd, $tableArroseur, $_POST['zone-id-add-arr'], $_POST['select-plante-type'], $_POST['select-arroseur-type']);
        $title = "Gestion de l'arrosage";
        $vue   = "arrosage";
        break;

    case "config-arroseur":
        $plante    = new Plante();
        $arr       = getArroseurInfoById($bdd, $tableArroseur, $_GET['id']);
        $planteArr = $plante->getPlantType($bdd, $plante->tablePlante, $arr['id_plante']);
        $head      = '<link rel="stylesheet" href="vue/css/utilisateurs.css">' . '<link rel="stylesheet" href="vue/css/arrosage.css">';
        $title     = "Configuration de l'arroseur";
        $vue       = "infos-arroseur";
        break;

    case "update-arroseur":
        $arroseurId = $_POST['arroseur'];
        $zoneId     = $_POST['zone'];
        $checked    = $_POST['state'];
        updateArroseur($bdd, $tableArroseur, $checked, $arroseurId, $zoneId);
        $vue = null;
        break;

    case "add-capteur-to-arroseur":
        $idArroseur   = $_POST['arroseur'];
        $idCapteur    = $_POST['capteur'];
        $capteurState = $_POST['state'];
        addCapteurToArroseur($bdd, "capteur", $idArroseur, $idCapteur, $capteurState);
        break;

    case "supprimer-arroseur":
        removeArroseur($bdd, $tableArroseur, $_POST['arr-id-delete-arr']);
        $title = "Gestion de l'arrosage";
        $vue   = "arrosage";
        break;

    case "ajouter-zone":
        $zone = new Zone();
        $zone->addZone($bdd, $tableZone, $_POST['id-house']);
        break;


    case "supprimer-zone":
        $zone = new Zone();
        $zone->removeZone($bdd, $tableZone, $_POST['zone-id-delete-zone']);
        $title = "Gestion de l'arrosage";
        $vue   = "arrosage";
        break;

    case "ajouter-maison":
        addHouse($bdd, $tableHabitation, $_SESSION['user_id']);
        $title = "Gestion de l'arrosage";
        $vue   = "arrosage";
        break;

    case "get-house-info":
        $idMaison = $_POST['idmaison'];
        getHouseInfos($bdd, $tableHabitation, $idMaison);
        $vue = null;
        break;

    case "supprimer-maison":
        removeHouse($bdd, $tableHabitation, $_POST['id-house']);
        header("Location: index.php?cible=habitation&fonction=accueil");
        $title = "Gestion de l'arrosage";
        $vue   = "arrosage";
        break;

    case "client-stat":
        $title = "Satistiques client";
        $vue   = "client-stats";
        break;
    case "stats":
        $head  = '<link rel="stylesheet" href="vue/css/client-stats.css">';
        $vue   = "client-stats";
        $js    = '<script src="vue/js/chart2.js" defer></script>' .
            '<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.js"></script>';
        $title = "Statistique de consommation, votre solution personalisée";
        break;

    default:
        $title = "Erreur 404";
        $vue   = "erreur404";
}
if (isset($vue)) {
    include("vue/header.php");
    include("vue/" . $vue . ".php");
    include("vue/footer.php");
} elseif ($vue == null) {

} else {
    include("vue/header.php");
    include("vue/erreur404.php");
    include("vue/footer.php");
}