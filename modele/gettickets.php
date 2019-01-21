<?php
require_once 'connexion.php';

$date      = $_POST['date'];
$allTicket = $bdd->query("SELECT * FROM ticket WHERE date_ticket='" . $date . "'");

while ($allTicket->rowCount() > 0) {
    echo "string";
}
// foreach ($allTicket as $oneTicket) {
//     echo $oneTicket['numero_ticket'];
// }