<?php

require 'connexion.php';

$arroseurId = $_POST['arroseur'];
$zoneId     = $_POST['zone'];
$checked    = $_POST['state'];

$bdd->query("UPDATE arroseur SET etat_arr=" . $checked . " WHERE id_arr=" . $arroseurId . " AND id_zone=" . $zoneId);