<?php

require "connexion.php";

$idArroseur   = $_POST['arroseur'];
$idCapteur    = $_POST['capteur'];
$capteurState = $_POST['state'];

if ($capteurState == 1) {
    $bdd->query("INSERT INTO capteur(type_capt, id_arr) VALUES('$idCapteur', '$idArroseur')");
} else {
    $bdd->query("DELETE FROM capteur WHERE id_arr=" . $idArroseur . " AND type_capt=" . $idCapteur);
}
