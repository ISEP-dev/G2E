<?php
if (empty($_SESSION)) {
    session_start();
}

include("controleurs/fonctions.php");

//fixme: important: Changer en POST
if(isset($_GET['cible']) && !empty($_GET['cible'])) {
    // Si la variable cible est passé en GET
    $urlControleur = $_GET['cible']; //habitation, arroseur, etc.

} else {
    // Si aucun contrôleur défini en GET, on bascule sur utilisateurs
    $urlControleur = 'utilisateurs';
}

// On appelle le contrôleur
include('controleurs/' . $urlControleur . '.php');
var_dump($_SESSION);
