<?php

//fixme: à enlever après
//include 'vue/base.php';

if (empty($_SESSION)) {
    session_start();
}
//define('ROOT_PATH', __DIR__ . '/');

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