<?php
/**
 * Contrôleur des utilisateurs
 * User: bastien
 * Date: 25/11/2018
 * Time: 00:42
 */

/* info : Explication des variables
 * $title -> Titre de la page et de l'onglet
 * $head  -> Ajout de fichiers CSS ou JS spécifique (optionnel)
 * $vue   -> Vue HTML à afficher
 */


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
        $vue = "home";
        $title = "Accueil";
        break;

    case "inscription":
        $head  = '<link rel="stylesheet" href="vue/css/planning.css">';
        $title = "Planning";
        $vue = "planning";
        break;

    case "connexion":
        $title = "Connexion";
        $vue = "";
        break;

    default:
        $title = "Erreur 404";
        $vue = "erreur404";
//        $message = "Page inexistante";
        break;
}

include("vue/header.php");
include("vue/" . $vue . ".php");
include("vue/footer.php");
// fixme rassembler incsription et connexion