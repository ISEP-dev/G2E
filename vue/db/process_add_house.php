<?php

$mysqli = new mysqli("localhost", "root", "", "g2e");

$houseName       = $_POST['house-name'];
$houseNumber     = $_POST['house-number'];
$houseRoute      = $_POST['house-route'];
$houseCity       = $_POST['house-city'];
$housePostalCode = $_POST['house-postal'];
$houseCountry    = $_POST['house-country'];

// Requête SQL
$addHouseQuery = $mysqli->query("INSERT INTO habitation(nom_habit, numero_habit, rue_habit, ville_habit, code_postal_habit, pays_habit, id_util)
VALUES('$houseName', $houseNumber, '$houseRoute', '$houseCity', '$housePostalCode', '$houseCountry', 1);");
if (!$addHouseQuery) {
    // Erreur d'ajout d'une maison
    die("Une erreur est survenue lors de l'ajout de votre maison, veuillez ré-essayer \n<br>" .$mysqli->error ."\n<br>" .$mysqli->errno);
}
else {
    // Tout s'est bien passé on redirige où on veut
    header("Location: ../arrosage.php");
}


?>
