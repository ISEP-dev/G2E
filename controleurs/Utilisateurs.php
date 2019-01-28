<?php
/* info : Explication des variables
 * $title -> Titre de la page et de l'onglet
 * $css   -> Ajout de fichiers CSS juste le nom de fichier sans .Css (optionnel)
 * $js    ->  Ajout de fichiers JS (optionnel)
 * $vue   -> Vue HTML à afficher
 */
include "modele/Model.php";
include "modele/User.php";
include "modele/Planning.php";


if (!isset($_GET['fonction']) || empty($_GET['fonction'])) {
    $fonction = "accueil";
} else {
    $fonction = $_GET['fonction'];
}

$utilisateur = new User();

// Choix de la vue à afficher
switch ($fonction) {
    case "accueil":
        $head = '<link rel="stylesheet" href="vue/css/utilisateurs.css">';
        // '<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyAteeaTGDmHd0ECWPah2EIPMJksVSW5IyI"></script>'.
        // '<script type="text/javascript" src="vue/js/autocomplete.js"></script>';
        $vue   = "home";
        $title = "Accueil";
        break;

    case "connexion":
        $utilisateur->connection_to_site($utilisateur->tableUsers);
        $head = '<link rel="stylesheet" href="vue/css/arrosage.css">';
        break;

    /* ajout d'un utilisateur */
    case "ajouter":
        $utilisateur->addUsers($utilisateur->tableUsers);
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

    case "ticket":
        $utilisateur->displayTicket($utilisateur->tableTicket);
        $head  = '<link rel="stylesheet" href="vue/css/utilisateurs.css">';
        $vue   = "ticket";
        $title = "Historique de vos incidents";
        break;

    case "get-ticket":
        $idTicket = $_POST['id'];
        $utilisateur->getUserTicket($utilisateur->tableTicket, $idTicket);
        $vue = null;
        break;

    case "ajoutTicket":
        $utilisateur->createTicket($utilisateur->tableTicket);
        $head  = '<link rel="stylesheet" href="vue/css/utilisateurs.css">';
        $vue   = "infos-arroseur";
        $title = "Configuration de l'arroseur";
        break;

    default:
        $title = "Erreur 404";
        $vue   = "erreur404";
//        $message = "Page inexistante";
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