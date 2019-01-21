<?php

class Gestion
{

    public function cederMaison(PDO $bdd, string $table, $idMaisonACeder, $emailUserToConcede)
    {
        if ($this->isUserInDb($bdd, $table, $emailUserToConcede)) {
            $idUserToConcede = $bdd->query("SELECT id_util FROM utilisateur WHERE email_util='" . $emailUserToConcede . "'")->fetch(PDO::FETCH_ASSOC)['id_util'];
            return $bdd->query("UPDATE habitation_utilisateur SET id_util=" . $idUserToConcede . " WHERE id_habit=" . $idMaisonACeder);
        } else {
            //    User email not in database
            return false;
        }
    }

    public function isUserInDb(PDO $bdd, string $table, string $email)
    {
        if ($bdd->query("SELECT email_util FROM " . $table . " WHERE email_util='" . $email . "'")->rowCount() == 1) {
            return true;
        } else {
            return false;
        }
    }

}