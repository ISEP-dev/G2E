<?php
/**
 * Created by PhpStorm.
 * User: bastien
 * Date: 20/11/2018
 * Time: 14:32
 */

require "modele/fonctions.php";

$tableHabitation     = "habitation";
$tableHabitationUser = "habitation_utilisateur";
$tableZone           = "zone";

function getHousebyUserId(PDO $bdd, string $table, int $idUser)
{
    return $bdd->query("SELECT habitation.* FROM " . $table .
        " INNER JOIN habitation_utilisateur ON habitation_utilisateur.id_habit = habitation.id_habit" .
        " INNER JOIN utilisateur ON utilisateur.id_util = habitation_utilisateur.id_util" .
        " WHERE utilisateur.id_util = " . $idUser . " AND habitation.order_habit=1 ORDER BY habitation.date_ajout_habit")->fetch(PDO::FETCH_ASSOC);
}

function getHouseById(PDO $bdd, string $table, int $idHabit)
{
    return $bdd->query("SELECT * FROM " . $table . " WHERE id_habit=" . $idHabit)->fetch(PDO::FETCH_ASSOC);
}

function getHouseNameById(PDO $bdd, string $table, int $idHabit)
{
    return $bdd->query("SELECT nom_habit FROM " . $table . " WHERE id_habit=" . $idHabit)->fetch(PDO::FETCH_ASSOC);
}

function getAllHousesFromUser(PDO $bdd, string $table, int $idUser)
{
    return $bdd->query("SELECT habitation.* FROM " . $table .
        " INNER JOIN habitation_utilisateur ON habitation_utilisateur.id_habit = habitation.id_habit" .
        " INNER JOIN utilisateur ON utilisateur.id_util = habitation_utilisateur.id_util" .
        " WHERE utilisateur.id_util = " . $idUser . " ORDER BY habitation.date_ajout_habit");
}

function addHouse(PDO $bdd, string $table, int $idUser)
{
    $attributs = array(
        'nom_habit'         => $_POST['house-name'],
        'numero_habit'      => $_POST['house-number'],
        'rue_habit'         => $_POST['house-route'],
        'ville_habit'       => $_POST['house-city'],
        'code_postal_habit' => $_POST['house-postal'],
        'pays_habit'        => $_POST['house-country'],
        'date_ajout_habit'  => date('Y-m-d H:i:s'),
        'order_habit'       => $_POST['house-select-principal']
    );
//    Insertion nouvelle habitation
    insert($bdd, $table, $attributs);

//    insertion id de la maison et de l'utilisateur dans habitation_utilisateur
    $idHabit            = $bdd->lastInsertId();
    $tableHabitUtil     = 'habitation_utilisateur';
    $attributsHabitUtil = array(
        'id_util'  => $idUser,
        'id_habit' => $idHabit
    );
    $addKeyHouse        = insert($bdd, $tableHabitUtil, $attributsHabitUtil);
    if (!$addKeyHouse) {
        die("Une erreur est survenue lors de l'ajout de votre maison, veuillez ré-essayer \n" . $bdd->errorInfo());
    } else {
        header("Location: index.php?cible=habitation&fonction=accueil");
    }
}

function getNbHousesByUserId(PDO $bdd, string $table, $idUser): int
{
    return $bdd->query("SELECT COUNT(*) FROM " . $table . " WHERE id_util=" . $idUser)->fetch(PDO::FETCH_ASSOC)['COUNT(*)'];
}

function removeHouse(PDO $bdd, string $table, $idUser, $idHouse)
{
    $bdd->query("DELETE * FROM habitation_utilisateur WHERE id_util=" . $idUser . " AND id_habit=" . $idHouse .
        "; DELETE * FROM " . $table . " WHERE id_habit = " . $idHouse . ";");

}

function modifyHouse(PDO $bdd, string $table, $id_user)
{

}


function addZone(PDO $bdd, string $table, $idHabit)
{
    $attributs = array(
        "nom_zone" => $_POST['zone-name'],
        "id_habit" => $idHabit
    );
    $insertOk  = insert($bdd, $table, $attributs);
    if (!$insertOk) {
        die("Impossible d'ajouter une nouvelle zone : " . $bdd->errorInfo());
    } else {
        header("Location: index.php?cible=habitation&fonction=accueil");
    }
}

function getZonesByHouseId(PDO $bdd, string $table, int $idHouse)
{
    return $bdd->query("SELECT * FROM " . $table . " WHERE id_habit=" . $idHouse);
}