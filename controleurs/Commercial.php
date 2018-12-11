<?php
/**
 * Contrôleur des maisons
 * User: bastien
 * Date: 25/11/2018
 * Time: 00:42
 */
include "modele/model.php";

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
        $head = '<link rel="stylesheet" href="vue/css/CommercialClient.css">';
        $title = "Informations Client";
        $vue = "CommercialClient";
        break;
    case "stat_temp":
        $head = '<script src="vue/js/chart1.js" defer></script>' .
                    '<link rel="stylesheet" type="text/css" href="vue/css/commercial.css" media="all">' .
                    '<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.js"></script>';
        $title = "Statistiques temporelles de ventes";
        $vue = "commercial";
        if (!isset($_POST['Xaxis']) && !isset($_POST['Yaxis'])){
            $Xaxis = "toujours";
            $Yaxis = "clients";
        } else{
            $Xaxis = $_POST['Xaxis'];
            $Yaxis = $_POST['Yaxis'];
        }
        $model = new Model();
        $graph = $model->getGraph($Xaxis,$Yaxis);
        break;
    default:
        $title = "Erreur 404";
        $vue = "erreur404";
//        $message = "Page inexistante";
}

include("vue/header.php");
include("vue/" . $vue . ".php");
include("vue/footer.php");
