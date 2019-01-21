<?php

require "modele/Publication.php";

if (!isset($_GET['fonction']) || empty($_GET['fonction'])) {
    $fonction = "accueil";
} else {
    $fonction = $_GET['fonction'];
}


// Choix de la vue à afficher
switch ($fonction) {
    case "accueil":
        $head  = '<link rel="stylesheet" href="vue/css/publication.css">';
        $js    = '<script src="vue/js/publication.js"></script>';
        $title = "Espace commune";
        $vue   = "publication";
        break;

    case "ajouter-publication":
        $publication = new Publication();
        $publication->addPublication($bdd, $publication->tablePublication, $_POST['titre-publication'], $_POST['content-publication'], $_SESSION['user_id']);
        header("Location: index.php?cible=mairie&fonction=accueil");
        break;

    default:
        $title = "Erreur 404";
        $vue   = "erreur404";
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