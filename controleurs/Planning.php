<?php

include_once "modele/Planning.php";

if (!isset($_GET['fonction']) || empty($_GET['fonction'])) {
    $fonction = "accueil";
} else {
    $fonction = $_GET['fonction'];
}

$planning = new Planning($bdd);

switch ($fonction) {
    case "accueil":
        $head  = '<link rel="stylesheet" href="vue/css/planning.css">';
        $title = "Gestion des incidents";
        $vue   = "planning";
        break;

    case "get-today-ticket":
        $Todaydate = $_POST['date'];
        $planning->getTicketByDate($planning->tablePlanning, $Todaydate);
        $vue = null;
        break;

    case "get-ticket-info":
        $idTicket = $_POST['idticket'];
        $planning->getTicketInfos($planning->tablePlanning, $idTicket);
        $vue = null;
        break;

    default:
        break;
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