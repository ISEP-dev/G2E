<?php

include "modele/user.php";
include "modele/habitation.php";
require "modele/Gestion.php";

if (!isset($_GET['fonction']) || empty($_GET['fonction'])) {
    $fonction = "accueil";
} else {
    $fonction = $_GET['fonction'];
}

switch ($fonction) {
    case "accueil":
        $head    = '<link rel="stylesheet" href="vue/css/gestion.css">';
        $js      = '<script src="vue/js/gestion.js"></script>';
        $maisons = getAllHousesFromUser($bdd, $tableHabitation, $_SESSION['user_id']);
        $title   = "Gestion de vos maisons";
        $vue     = "gestion";
        break;

    case "ceder-maison":
        $gestion = new Gestion();
        $gestion->cederMaison($bdd, "utilisateur", $_POST['id-maison-ceder'], $_POST['mail']);
        header("Location: index.php?cible=gestion&fonction=accueil");
        break;

    default:
        $title = "Erreur 404";
        $vue   = "erreur404";
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