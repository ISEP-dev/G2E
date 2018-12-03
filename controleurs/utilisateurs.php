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

include "modele/user.php";

if (!isset($_GET['fonction']) || empty($_GET['fonction'])) {
    $fonction = "accueil";
} else {
    $fonction = $_GET['fonction'];
}
// Choix de la vue à afficher
switch ($fonction) {
    case "accueil":
        $head  = '<link rel="stylesheet" href="vue/css/utilisateurs.css">';
        $vue   = "home";
        $title = "Accueil";
        break;

    case "connexion":
        $ok = connection_to_site($bdd, $tableUsers);
        if ($ok) {
            $head  = '<link rel="stylesheet" href="vue/css/arrosage.css">';
            $title = "Gestion de l'arrosage";
            $vue   = "arrosage";
        } else {
            // Email ou mdp inconnu
            $title = "Identifiants incorrects";
            $vue = "erreur404";
        }
        break;

    case "inscription":
        $head  = '<link rel="stylesheet" href="vue/css/planning.css">';
        $title = "Planning";
        $vue   = "planning";
        break;

    /* ajout d'un utilisateur */
    case "ajouter":
        addUsers($bdd, $tableUsers);
        $head  = '<link rel="stylesheet" href="vue/css/utilisateurs.css">';
        $vue   = "home";
        $title = "Accueil";
        break;

    case "logout":
        $head = '<link rel="stylesheet" href="vue/css/utilisateurs.css">';
        session_unset();
        session_destroy();
        $vue   = "home";
        $title = "Accueil";
        break;
    default:
        $title = "Erreur 404";
        $vue   = "erreur404";
//        $message = "Page inexistante";
        break;
}

include("vue/header.php");
include("vue/" . $vue . ".php");
include("vue/footer.php");
?>
