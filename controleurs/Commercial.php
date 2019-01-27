<?php
/**
 * Contrôleur des commerciaux
 * User: not me
 * Date: 25/11/2018
 * Time: 00:42
 */
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
        $vue   = "CommercialClient";
        break;
    case "stat_temp":
        $head  = '<link rel="stylesheet" href="vue/css/commercial.css">';
        $js    = '<script src="vue/js/chart1.js" defer></script>' .
            '<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.js"></script>';
        $title = "Statistiques temporelles de ventes";
        $vue   = "commercial";
        if (!isset($_POST['Xaxis']) && !isset($_POST['Yaxis'])) {
            $Xaxis = "toujours";
            $Yaxis = "clients";
        } else {
            $Xaxis = $_POST['Xaxis'];
            $Yaxis = $_POST['Yaxis'];
        }
        $graph = $model->getGraph($Xaxis, $Yaxis);
        break;
    case "stat_geo":
        $title = "Statistiques géographiques";
        $vue   = "";
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