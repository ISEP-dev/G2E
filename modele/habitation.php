<?php
/**
 * Created by PhpStorm.
 * User: bastien
 * Date: 20/11/2018
 * Time: 14:32
 */

require "modele/fonctions.php";

$tableHabitation = 'habitation';
$tableZone       = "zone";

//todo : ajouter l'id_user de la session en paramètre
function getHousebyUserId(PDO $bdd, string $table, int $idUser)
{
    return $bdd->query("SELECT habitation.* FROM " . $table .
        " INNER JOIN habitation_utilisateur ON habitation_utilisateur.id_habit = habitation.id_habit" .
        " INNER JOIN utilisateur ON utilisateur.id_util = habitation_utilisateur.id_util" .
        " WHERE utilisateur.id_util = " . $idUser . " AND habitation.order_habit=1 ORDER BY habitation.date_ajout_habit")->fetch(PDO::FETCH_ASSOC);
}

function getAllHousesFromUser(PDO $bdd, string $table, int $idUser)
{
    return $bdd->query("SELECT habitation.* FROM " . $table .
        " INNER JOIN habitation_utilisateur ON habitation_utilisateur.id_habit = habitation.id_habit" .
        " INNER JOIN utilisateur ON utilisateur.id_util = habitation_utilisateur.id_util" .
        " WHERE utilisateur.id_util = " . $idUser . " ORDER BY habitation.date_ajout_habit");
}

function getHouseById(PDO $bdd, string $table, int $idHabit)
{
    return $bdd->query("SELECT * FROM " . $table . " WHERE id_habit=" . $idHabit)->fetch(PDO::FETCH_ASSOC);
}

//todo : ajouter l'id_user de la session en paramètre
function addHouse(PDO $bdd, string $table, int $idUser)
{
    $attributs = array(
        'nom_habit'         => $_POST['house-name'],
        'numero_habit'      => $_POST['house-number'],
        'rue_habit'         => $_POST['house-route'],
        'ville_habit'       => $_POST['house-city'],
        'code_postal_habit' => $_POST['house-postal'],
        'pays_habit'        => $_POST['house-country'],
        'date_ajout_habit'  => date('Y-m-d H:i:s')
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

function removeHouse(PDO $bdd, string $table, $idHouse)
{
    $bdd->query("DELETE * FROM habitation_utilisateur WHERE id_util=1 AND id_habit=" . $idHouse .
        "; DELETE * FROM " . $table . " WHERE id_habit = " . $idHouse . ";");

}

function modifyHouse($id_user)
{

}

function getHouseInfoById(PDO $bdd, string $table, int $idHabit)
{
    return $bdd->query("SELECT * FROM " . $table . " WHERE id_habit=" . $idHabit)->fetch(PDO::FETCH_ASSOC);
}


function addZone(PDO $bdd, string $table, $idHabit): string
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