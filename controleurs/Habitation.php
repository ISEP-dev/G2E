<?php
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
}

include "modele/Habitation.php";
include "modele/Arroseur.php";
include "modele/Plante.php";
include "modele/Capteur.php";
include "modele/Zone.php";
include "modele/Model.php";
include "modele/Programme.php";

if (!isset($_GET['fonction']) || empty($_GET['fonction'])) {
    $fonction = "accueil";
} else {
    $fonction = $_GET['fonction'];
}

$head = '<link rel="stylesheet" href="vue/css/arrosage.css">';
$js   = '<script src="vue/js/arrosage.js"></script>';

$arroseur   = new Arroseur();
$habitation = new Habitation();

// Choix de la vue à afficher
switch ($fonction) {
    case "accueil":
        if (isset($_POST['house-select'])) {
            $maison                = $habitation->getHouseById($habitation->tableHabitation, $_POST['house-select']);
            $_SESSION['id_maison'] = $_POST['house-select'];
        } else {
            $maison                = $habitation->getHousebyUserId($habitation->tableHabitation, $_SESSION['user_id']);
            $_SESSION['id_maison'] = $maison['id_habit'];
        }
        $title = $maison['nom_habit'];
        $vue   = "arrosage";
        break;

    /**********************
     ******* Maison *******
     **********************/
    case "ajouter-maison":
        $habitation->addHouse($habitation->tableHabitation, $_SESSION['user_id']);
        Database::redirect("habitation", "accueil");
        break;

    case "get-house-info":
        $idMaison = $_POST['idmaison'];
        $habitation->getHouseInfos($habitation->tableHabitation, $idMaison);
        $vue = null;
        break;

    case "supprimer-maison":
        $habitation->removeHouse($habitation->tableHabitation, $_POST['id-house']);
        Database::redirect("habitation", "accueil");
        break;

    /**********************
     ******** Zone ********
     **********************/
    case "ajouter-zone":
        $zone = new Zone();
        $zone->addZone($habitation->tableZone, $_POST['id-house']);
        Database::redirect("habitation", "accueil");
        break;

    case "supprimer-zone":
        $zone = new Zone();
        $zone->removeZone($habitation->tableZone, $_POST['zone-id-delete-zone']);
        Database::redirect("habitation", "accueil");
        break;

    /**********************
     ****** Arroseur ******
     **********************/
    case "ajouter-arroseur":
        $arroseur->addArroseur($arroseur->tableArroseur, $_POST['zone-id-add-arr'], $_POST['select-plante-type'], $_POST['select-arroseur-type']);
        Database::redirect("habitation", "accueil");
        break;

    case "config-arroseur":
        $head      = '<link rel="stylesheet" href="vue/css/utilisateurs.css">' . '<link rel="stylesheet" href="vue/css/arrosage.css">';
        $js        = '<script src="vue/js/arrosage.js" async defer></script>';
        $plante    = new Plante();
        $arr       = $arroseur->getArroseurInfoById($arroseur->tableArroseur, $_GET['id']);
        $planteArr = $plante->getPlantType($plante->tablePlante, $arr['id_plante']);
        $title     = "Configuration de l'arroseur";
        $vue       = "infos-arroseur";
        break;

    case "update-arroseur":
        $arroseurId = $_POST['arroseur'];
        $zoneId     = $_POST['zone'];
        $checked    = $_POST['state'];
        $arroseur->updateArroseur($arroseur->tableArroseur, $checked, $arroseurId);
        $vue = null;
        break;

    case "supprimer-arroseur":
        $arroseur->removeArroseur($arroseur->tableArroseur, $_POST['arr-id-delete-arr']);
        Database::redirect("habitation", "accueil");
        break;

    /**********************
     ****** Capteur *******
     **********************/
    case "add-capteur-to-arroseur":
        $arraySend = array(
            'type_capt'   => $_POST['select-capteur'],
            'id_arr'      => $_POST['id_arr'],
            'name_capt'   => $_POST['name-capt'],
            'number_capt' => isset($_POST['input-add-capteur-nb']) ? $_POST['input-add-capteur-nb'] : 1
        );
        $arroseur->addCapteurToArroseur("capteur", $arraySend);
        header('Location: index.php?cible=habitation&fonction=config-arroseur&id=' . $_POST['id_arr']);
        break;

    case "supprimer-capteur":
        $capteur = new Capteur();
        $capteur->deleteCapteur($_POST['id-arr'], $_POST['delete-number-capt'], $_POST['delete-type-capt']);
        header('Location: index.php?cible=habitation&fonction=config-arroseur&id=' . $_POST['id-arr']);
        break;

    case "update-capteur-number":
        $capteur = new Capteur();
        echo $capteur->getCapteurNumber($_POST['id_arr'], $_POST['type-capt']);
        $vue = null;
        break;

    /**********************
     ***** Programme ******
     **********************/
    case "ajouter-programme":
        foreach ($_POST['weekday'] as $weekday) {
            $sendWeekday .= $weekday . ", ";
        }
        $attributs = array(
            'nom_prog'        => $_POST['titre-programme'],
            'date_debut_prog' => $_POST['date-start'],
            'date_fin_prog'   => $_POST['date-end'],
            'intensite_prog'  => 1, // todo change this value don't know by what
            'iteration_prog'  => $sendWeekday,
            'id_arr'          => $_POST['arr-id-add-program']
        );
        $programme = new Programme();
        $programme->addProgram($programme->tableProgramme, $attributs);
        break;

    case "check-program-date":
        $arroseurs     = new Arroseur();
        $arroseursList = $arroseurs->getAll();
        $programme     = new Programme();
        $programme->deleteExpireProgram();
        $arrayToSend = [];
        foreach ($arroseursList as $arroseur) {
            $arrayToSend[] = array(
                "etat"     => $programme->checkDateActivation($arroseur['id_arr']),
                "zone"     => $arroseur['id_zone'],
                "arroseur" => $arroseur['id_arr']
            );
        }
        echo json_encode($arrayToSend);
        $vue = null;
        break;

    case "supprimer-programme":

        break;

    /**********************
     **** Statistiques ****
     **********************/
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