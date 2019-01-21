<?php

require_once 'connexion.php';

$idMaison = $_POST['idmaison'];
$query    = $bdd->query("SELECT * FROM habitation WHERE id_habit=" . $idMaison);
foreach ($query as $maison) {
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