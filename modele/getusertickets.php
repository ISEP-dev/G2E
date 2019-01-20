<?php
include "connexion.php";

$q = $_GET['q'];
$resultQuery  = $bdd->query("SELECT * FROM ticket WHERE id_ticket='".$q."'");

foreach ($resultQuery as $ticket) {
  echo "<div class='v-haut header-user'>ticket n°000" . $ticket['id_ticket'] . "</div>";
  echo "<br/><br/>";
    echo "<strong> Date de création de l'incident :</strong>" . date(' \L\e d M Y à H:m', strtotime($ticket['date_ticket'])) . "";
  echo "<br/><br/>";
  echo "<h3> Intitulé du ticket: </h3>".$ticket['titre_ticket'];
  echo "<br/><br/>";
  echo "<blockquote>".$ticket['contenu_ticket']."</blockquote>";
  echo "<br/><br/>";
  echo  $ticket['fichier_ticket'];
  echo "<br/><br/>";
}