<?php
/**
 * Contrôleur des maisons
 * User: bastien
 * Date: 25/11/2018
 * Time: 00:42
 */

if (!isset($_GET['fonction']) || empty($_GET['fonction'])) {
    $fonction = "accueil";
} else {
    $fonction = $_GET['fonction'];
}


// Choix de la vue à afficher
switch ($fonction) {
    case "accueil":
        $head  = '<link rel="stylesheet" href="vue/css/publication.css">';
        $title = "Espace commune";
        $vue   = "publication";
        break;

    default:
        $title = "Erreur 404";
        $vue   = "erreur404";
}

include("vue/header.php");
include("vue/" . $vue . ".php");
include("vue/footer.php");