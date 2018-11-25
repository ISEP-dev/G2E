<?php
/**
 * Created by PhpStorm.
 * User: bastien
 * Date: 20/11/2018
 * Time: 14:32
 */

require "modele/fonctions.php" ;

$tableHabitation = 'habitation';

function getHouses(PDO $bdd, string $table): array
{
    return selectAll($bdd, $table);

}

function addHouse(PDO $bdd, string $table)
{
    $houseName       = $_POST['house-name'];
    $houseNumber     = $_POST['house-number'];
    $houseRoute      = $_POST['house-route'];
    $houseCity       = $_POST['house-city'];
    $housePostalCode = $_POST['house-postal'];
    $houseCountry    = $_POST['house-country'];

    // Requête SQL
    $addHouseQuery = $bdd->query("INSERT INTO habitation(nom_habit, numero_habit, rue_habit, ville_habit, code_postal_habit, pays_habit, id_util)
        VALUES('$houseName', '$houseNumber', '$houseRoute', '$houseCity', '$housePostalCode', '$houseCountry', '1');");
    if (!$addHouseQuery) {
        // Erreur d'ajout d'une maison
        die("Une erreur est survenue lors de l'ajout de votre maison, veuillez ré-essayer \n" .$bdd->errorInfo);
    }
    else {
        // Tout s'est bien passé on redirige où on veut
        header("Location: ../arrosage.php");
    }
}

function removeHouse($id_user)
{

}

function modifyHouse($id_user)
{

}