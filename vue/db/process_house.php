<?php
// Connexion à la base de donnée à effectuer
$houseName       = $_POST['name'];
$houseNumber     = $_POST['number'];
$houseRoute      = $_POST['route'];
$houseCity       = $_POST['city'];
$housePostalCode = $_POST['postal'];
$houseCountry    = $_POST['country'];

// strip_tags(mysqli_real_escape_string($link, $string_to_escape));

// REquête SQL sur db à créer ...
/**
 * Classe Maison pour créer, modifier et supprimer
 */
class House
{

    function __construct(argument)
    {
        // code...
    }
    // Ajouter une nouvelle maison
    function addHouse($name, $number, $route, $city, $postalCode, $country){
        // Requête SQL
        $requete = mysqli_query($link, "INSERT INTO TABLE_NAME() VALUES ...;"):
    }
    // Supprimer une maison existante
    function removeHouse($idHome){
        mysqli_query($link, "DELETE FROM TABLE_NAME WHERE 'Home.id' = $idHome;");
    }
    // Modifier une maison déjà enregistrée
    function modifyHouse($idHome, $name){
        mysqli_query($link, "UPDATE TABLE_NAME SET value = ... WHERE 'Home.id' = $idHome;");
    }
}


?>
