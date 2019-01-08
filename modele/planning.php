<?php

// require "modele/fonctions.php";

function getTicketByDate(PDO $bdd, string $table, $date) {
    return $bdd->query("SELECT * FROM ".$table." WHERE date_ticket = ". $date);
}
?>