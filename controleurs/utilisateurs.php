<?php
/**
 * Contrôleur des utilisateurs
 * User: bastien
 * Date: 25/11/2018
 * Time: 00:42
 */

/* info : Explication des variables
 * $title -> Titre de la page et de l'onglet
 * $css   -> Ajout de fichiers CSS juste le nom de fichier sans .Css (optionnel)
 * $js    ->  Ajout de fichiers JS (optionnel)
 * $vue   -> Vue HTML à afficher
 */

include "modele/user.php";
include "modele/planning.php";

if (!isset($_GET['fonction']) || empty($_GET['fonction'])) {
    $fonction = "accueil";
} else {
    $fonction = $_GET['fonction'];
}

// Choix de la vue à afficher
switch ($fonction) {
    case "accueil":
        $head  = '<link rel="stylesheet" href="vue/css/utilisateurs.css">';
        // '<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyAteeaTGDmHd0ECWPah2EIPMJksVSW5IyI"></script>'.
        // '<script type="text/javascript" src="vue/js/autocomplete.js"></script>';
        $vue   = "home";
        $title = "Accueil";
        break;

    case "connexion":
        connection_to_site($bdd, $tableUsers);
        $head     = '<link rel="stylesheet" href="vue/css/arrosage.css">';
        break;

    case "planning":
        $head  = '<link rel="stylesheet" href="vue/css/planning.css">';
        if(isset($_POST['date'])){
            $tickets   = getTicketByDate($bdd,"ticket", "2018-11-19");
            $noTickets = false;
        } else {
            $noTickets = true;
        }
        $title = "Gestion des incidents";
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

    case "faq":
        $head  = '<link rel="stylesheet" href="vue/css/faq.css">';
        $vue   = "faq";
        $title = "Foire aux questions";
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
