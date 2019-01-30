<?php

include "modele/Model.php";

if (!isset($_GET['fonction']) || empty($_GET['fonction'])) {
    $fonction = "accueil";
} else {
    $fonction = $_GET['fonction'];
}
// Choix de la vue à afficher
$model = new Model();
switch ($fonction) {

    case "accueil":
        $head = '<link rel="stylesheet" href="vue/css/CommercialClient.css">';
        //$css   = 'CommercialClient';
        if (isset($_POST['NumTel']) || isset($_POST['Ville']) || isset($_POST['Prenom']) || isset($_POST['Nom'])) {
            $rows = $model->getInfo($_POST['Nom'], $_POST['Prenom'], $_POST['Ville'], $_POST['NumTel']);
        }
        if (isset($_GET['id'])) {
            $infos = $model->getInfoParID($_GET['id']);
        }
        $title = "Informations Client";
        $vue   = "commercial_client";
        break;

    case "stat_geo":
        $js    = '<script src="vue/js/maps.js" defer></script>'
            . '<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyAteeaTGDmHd0ECWPah2EIPMJksVSW5IyI&callback=initMap" async defer></script>';
        $title = "Statistiques géographiques";
        $vue   = "commercial_geo";
        break;

    case "stat_temp":
        $head = '<link rel="stylesheet" href="vue/css/commercial.css">';
        $js   = '<script src="vue/js/chart1.js" defer></script>' .
            '<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.js"></script>';
        if (!isset($_POST['Xaxis']) && !isset($_POST['Yaxis'])) {
            $Xaxis = "toujours";
            $Yaxis = "clients";
        } else {
            $Xaxis = $_POST['Xaxis'];
            $Yaxis = $_POST['Yaxis'];
        }
        $graph = $model->getGraph($Xaxis, $Yaxis);
        $title = "Statistiques temporelles de ventes";
        $vue   = "commercial_temp";
        break;

    default:
        $title = "Erreur 404";
        $vue   = "erreur404";
//        $message = "Page inexistante";
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