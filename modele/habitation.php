<?php
/**
 * Created by PhpStorm.
 * User: bastien
 * Date: 20/11/2018
 * Time: 14:32
 */

require "modele/fonctions.php" ;

$tableHabitation = 'habitation';

//todo : ajouter l'id_user de la session en paramètre
function getHouses(PDO $bdd, string $table)
{
    return $bdd->query("SELECT * FROM " . $table .
                        " INNER JOIN habitation_utilisateur ON habitation_utilisateur.id_habit = habitation.id_habit".
                        " INNER JOIN utilisateur ON utilisateur.id_util = habitation_utilisateur.id_util".
                        " WHERE utilisateur.id_util = 1 ORDER BY habitation.date_ajout_habit");
}
//todo : ajouter l'id_user de la session en paramètre
function addHouse(PDO $bdd, string $table)
{
    $houseName       = $_POST['house-name'];
    $houseNumber     = $_POST['house-number'];
    $houseRoute      = $_POST['house-route'];
    $houseCity       = $_POST['house-city'];
    $housePostalCode = $_POST['house-postal'];
    $houseCountry    = $_POST['house-country'];

//    Association des attributs de la base de donnée au valeurs récupérées du formulaire
    $attributs = array(
        'nom_habit'         => $houseName,
        'numero_habit'      => $houseNumber,
        'rue_habit'         => $houseRoute,
        'ville_habit'       => $houseCity,
        'code_postal_habit' => $housePostalCode,
        'pays_habit'        => $houseCountry,
        'date_ajout_habit'  => date('Y-m-d H:i:s')
    );
//    Insertion nouvelle habitation
    insert($bdd, $table, $attributs);

//    insertion id de la maison et de l'utilisateur dans habitation_utilisateur
    $idHabit = $bdd->lastInsertId();
    $tableHabitUtil = 'habitation_utilisateur';
    $attributsHabitUtil = array(
        'id_util'  => 1,//$_SESSION['user_id'];
        'id_habit' => $idHabit
    );
    $addKeyHouse = insert($bdd, $tableHabitUtil, $attributsHabitUtil);
    if (!$addKeyHouse)
    {
        die("Une erreur est survenue lors de l'ajout de votre maison, veuillez ré-essayer \n" .$bdd->errorInfo);
    }
    else
    {
        header("Location: index.php?cible=habitation&fonction=accueil");
    }
}

function removeHouse(PDO $bdd, string $table, $idHouse)
{
    $bdd->query("DELETE * FROM habitation_utilisateur WHERE id_util=1 AND id_habit=" . $idHouse .
                      "; DELETE * FROM " . $table ." WHERE id_habit = " . $idHouse .";");

}

function modifyHouse($id_user)
{

}

//fixme: replace '1' with $_SESSION['user_id']
function getIdHouses(PDO $bdd)
{

}