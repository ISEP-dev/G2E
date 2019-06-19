<meta name="title" content="Ecorain, solution d'arrosage automatique">
<meta name="description"
      content="Arrosage automatique géré par dom'ISEP avec la solution Ecorain, arroseur intérieur et extérieur">
<meta name="keywords" content="ecorain, domisep, dom'ISEP, arroseur, arrosage automatique, arrosage, ISEP">
<meta name="robots" content="index, follow">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="language" content="French">
<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
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
