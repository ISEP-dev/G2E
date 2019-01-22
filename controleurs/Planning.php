<?php

include_once "modele/planning.php";

if (!isset($_GET['fonction']) || empty($_GET['fonction'])) {
    $fonction = "accueil";
} else {
    $fonction = $_GET['fonction'];
}

switch ($fonction) {
    case "accueil":
        $head  = '<link rel="stylesheet" href="vue/css/planning.css">';
        $title = "Gestion des incidents";
        $vue   = "planning";
        break;

    case "get-today-ticket":
        $Todaydate = $_POST['date'];
        getTicketByDate($bdd, $tablePlanning, $Todaydate);
        $vue = null;
        break;

    case "get-ticket-info":
        $idTicket = $_POST['idticket'];
        getTicketInfos($bdd, $tablePlanning, $idTicket);
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