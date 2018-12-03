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
        $title = "Statistiques temporelles de ventes";
        $vue = "commercial";
        $Xaxis = $_POST['Xaxis'];
        $Yaxis = $_POST['Yaxis'];
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
