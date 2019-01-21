<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
if (empty($_SESSION)) {
    session_start();
}
setlocale(LC_ALL, "fr_FR");

if (isset($_GET['cible']) && !empty($_GET['cible'])) {
    $urlControleur = $_GET['cible']; //Controleur appelé : habitation, arroseur, ...
} else {
    $urlControleur = 'utilisateurs'; // Controleur de base :  utilisateurs
}

include('controleurs/' . $urlControleur . '.php');