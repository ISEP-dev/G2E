<?php

require_once "modele/fonctions.php";

$tablePlanning = "ticket";

function getTicketByDate(PDO $bdd, string $table, $date)
{
    $queryDate = $bdd->query("SELECT * FROM " . $table . " WHERE date(date_ticket)='" . $date . "' ORDER BY date_ticket ASC;");
    foreach ($queryDate as $todayTicket) {
        echo "<div class='space-between'>"
            . "<a class='titre-ticket cursor' onclick='showTicketInfos(" . $todayTicket['id_ticket'] . ");'><h2>" . $todayTicket['titre_ticket'] . "</h2></a>"
            . "<div class='time-ticket v-centre text-medium'>" . strftime("%H:%M", strtotime($todayTicket['date_ticket'])) . "</div>"
            . "</div>" . "<hr>";
    }
}

function getTicketInfos(PDO $bdd, string $table, $idTicket)
{
    $queryTicket = $bdd->query("SELECT * FROM " . $table . " WHERE id_ticket=" . $idTicket);
    foreach ($queryTicket as $ticket) {
        $user = getUsernameTicket($bdd, $ticket['id_util']);
        echo "<div class='info-ticket-block'>"
            . "<div class='user-ticket text-medium b'>" . $user['prenom'] . " " . $user['nom'] . "</div>"
            . "<p>Vous pouvez contacter ce client par <span class='italic b'>mail </span> : "
            . $user['email'] . " <br> et par <span class='italic b'>téléphone</span> : " . $user['telephone'] . " </p><br>"
            . "<h1>Titre : " . $ticket['titre_ticket'] . "</h1>"
            . "<p class='text-medium contenu-ticket'> " . $ticket['contenu_ticket'] . "ezhgfbjdg usfioedtyfvueiksjbficevfdsbc ziehflbe" . "</p>"
            . "</div>";
    }
}

function getUsernameTicket(PDO $bdd, $idUser)
{
    $user   = $bdd->query("SELECT * FROM utilisateur WHERE id_util=" . $idUser)->fetch(PDO::FETCH_ASSOC);
    $return = array(
        'nom'       => $user['nom_util'],
        'prenom'    => $user['prenom_util'],
        'telephone' => $user['tel_util'],
        'email'     => $user['email_util']
    );
    return $return;
}