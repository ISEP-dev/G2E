<?php

include "modele/user.php";
if (!isset($_GET['fonction']) || empty($_GET['fonction'])) {
    $fonction = "accueil";
} else {
    $fonction = $_GET['fonction'];
}

switch ($fonction) {
    case "accueil":
        $head  = '<link rel="stylesheet" href="vue/css/gestion.css">';
        $js    = '<script src="vue/js/gestion.js"></script>';
        $title = "Gestion des maisons";
        $vue   = "gestion";
        break;

    default:
        $title = "Erreur 404";
        $vue   = "erreur404";
        break;
}
include("vue/header.php");
include("vue/" . $vue . ".php");
include("vue/footer.php");
?>