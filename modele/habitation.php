<?php

require_once "modele/fonctions.php";

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

function removeHouse(PDO $bdd, string $table, $idHouse)
{
    delete($bdd, $table, "id_habit=" . $idHouse);
}

function getHouseInfos(PDO $bdd, string $table, $idMaison)
{
    $statment = $bdd->prepare("SELECT * FROM " . $table . " WHERE id_habit = :maison");
    $statment->bindParam(':maison', $idMaison);
    $statment->execute();
    // $query = $bdd->query("SELECT * FROM " . $table . " WHERE id_habit=" . $idMaison);
    foreach ($statment->fetchAll() as $maison) {
        if ($maison['order_habit'] == 1) {
            $status = "principale";
        } else {
            $status = "secondaire";
        }
        echo "<div class='centre info-maison-nom b'> " . $maison['nom_habit'] . "</div><br><br>"
            . "<div class='info-maison-date'>Vous avez ajouté cette maison le "
            . strftime("%d %B %G, à %H:%M", strtotime($maison['date_ajout_habit']))
            . "</div><br>"
            . "<div class='info-maison-adresse'><b>Votre adresse :  </b><i>"
            . $maison['numero_habit'] . ", "
            . $maison['rue_habit'] . ", "
            . $maison['code_postal_habit'] . " "
            . $maison['ville_habit']
            . "</i></div><br>"
            . "<div class='info-maison-status'>C'est votre maison $status</div><br><br>"
            . "<div class='centre'>"
            . "<button class='gestion-button' onclick='cederMaison(" . $maison['id_habit'] . ");'>Céder votre maison</button>"
            . "<button class='gestion-button' onclick='resiliation();'>Résilier l'abonnement</button>"
            . "</div>";
    }
}

function modifyHouse(PDO $bdd, string $table, $id_user)
{

}