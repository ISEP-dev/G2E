<?php
require 'connexion.php';

$date = $_POST['date'];
$allTicket = $bdd->query("SELECT * FROM ticket WHERE date_ticket='" . $date ."'");
foreach($allTicket as $oneTicket){
    $jsonArray[] = array();
}
echo $allTicket->fetch(PDO::FETCH_ASSOC);