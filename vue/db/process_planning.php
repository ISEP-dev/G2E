<?php

include "../../modele/connexion.php";

$jsonArray = array();
$searchClient = $_GET['term'];
$resultQuery = $bdd->query("SELECT DISTINCT * FROM utilisateur WHERE nom_util LIKE '%$searchClient%' ORDER BY nom_util ASC");

foreach ($resultQuery as $client) {
    $jsonArray[] = array('label' => $client['prenom_util'] . "     " . $client['nom_util'], 'link' => $client['id_util']);
}
echo json_encode($jsonArray);
?>
