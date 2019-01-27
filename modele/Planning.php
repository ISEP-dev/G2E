<?php

require_once "modele/fonctions.php";

class Planning
{

    private $bdd;
    public  $tablePlanning = "ticket";

    function __construct(PDO $bdd)
    {
        $this->bdd = $bdd;
    }

    function getTicketByDate(string $table, $date)
    {
        $queryDate = $this->bdd->query("SELECT * FROM " . $table . " WHERE date(date_ticket)='" . $date . "' ORDER BY date_ticket ASC;");
        foreach ($queryDate as $todayTicket) {
            echo "<div class='space-between'>"
                . "<a class='titre-ticket cursor' onclick='showTicketInfos(" . $todayTicket['id_ticket'] . ");'><h2>" . $todayTicket['titre_ticket'] . "</h2></a>"
                . "<div class='time-ticket v-centre text-medium'>" . strftime("%H:%M", strtotime($todayTicket['date_ticket'])) . "</div>"
                . "</div>" . "<hr>";
        }
    }

    function getTicketInfos(string $table, $idTicket)
    {
        $queryTicket = $this->bdd->query("SELECT * FROM " . $table . " WHERE id_ticket=" . $idTicket);
        foreach ($queryTicket as $ticket) {
            $user = $this->getUsernameTicket($ticket['id_util']);
            echo "<div class='info-ticket-block'>"
                . "<div class='user-ticket text-medium b'>" . $user['prenom'] . " " . $user['nom'] . "</div>"
                . "<p>Vous pouvez contacter ce client par <span class='italic b'>mail </span> : "
                . $user['email'] . " <br> et par <span class='italic b'>téléphone</span> : " . $user['telephone'] . " </p><br>"
                . "<h1>Titre : " . $ticket['titre_ticket'] . "</h1>"
                . "<p class='text-medium contenu-ticket'> " . $ticket['contenu_ticket'] . "</p>"
                . "</div>";
        }
    }

    function getUsernameTicket($idUser)
    {
        $user   = $this->bdd->query("SELECT * FROM utilisateur WHERE id_util=" . $idUser)->fetch(PDO::FETCH_ASSOC);
        $return = array(
            'nom'       => $user['nom_util'],
            'prenom'    => $user['prenom_util'],
            'telephone' => $user['tel_util'],
            'email'     => $user['email_util']
        );
        return $return;
    }

}