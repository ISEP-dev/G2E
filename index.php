<?php
if (empty($_SESSION)) {
    session_start();
}

include("controleurs/fonctions.php");

if (isset($_GET['cible']) && !empty($_GET['cible'])) {
    // Si la variable cible est passé en GET
    $urlControleur = $_GET['cible']; //Controleur appelé : habitation, arroseur, ...
} else {
    $urlControleur = 'utilisateurs'; // Controleur de base :  utilisateurs
}

// On appelle le contrôleur
include('controleurs/' . $urlControleur . '.php');