<?php
//echo realpath('./');
session_start();
$id = $_SESSION['user_id'];
include "../modele/Model.php";
$model = new Model($bdd);

$fonction = $_POST['fonction'];

$model = new Model($bdd);

switch ($fonction) {
    case 'maisons':
        $result = $model->getMaisonsFromUserId($id);
        echo json_encode($result);
        break;
    case 'zones':
        $habitation = $_POST['maison'];
        $result     = $model->getZonesFromMaison($habitation, $id);
        echo json_encode($result);
        break;
    case 'arroseurs':
        $arroseur = $_POST['zone'];
        $result   = $model->getArroseursFromZone($arroseur, $id);
        echo json_encode($result);
        break;
    case 'stat':
        $Xaxis  = $_POST['Xaxis'];
        $Yaxis  = $_POST['Yaxis'];
        $result = $model->getGraph($Xaxis, $Yaxis);
        echo json_encode($result);
        break;
    case 'stat_temp':
        if (!isset($_POST['Xaxis']) && !isset($_POST['Yaxis'])) {
            $Xaxis = "toujours";
            $Yaxis = "arroseurs";
        } else {
            $Xaxis = $_POST['Yaxis'];
            $Yaxis = $_POST['Xaxis'];
        }
        $graph  = $model->getGraph($Yaxis, $Xaxis);
        $result = array('Xaxis' => json_encode($graph->getXaxis()), 'Yaxis' => json_encode($graph->getYaxis()), 'Titre' => json_encode($graph->getTitre()));
        echo json_encode($result);
        break;

        break;
    default:
        echo("retour du case default");
        break;

}


?>