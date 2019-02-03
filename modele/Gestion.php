<?php

require_once "Database.php";

class Gestion extends Database
{

    public function cederMaison(string $table, int $idMaisonACeder, string $emailUserToConcede)
    {
        if ($this->isUserInDb($table, $emailUserToConcede)) {
            $idUserToConcede = $this->bdd->query("SELECT id_util FROM utilisateur WHERE email_util='" . $emailUserToConcede . "'")->fetch(PDO::FETCH_ASSOC)['id_util'];
            $statment        = $this->bdd->prepare("UPDATE habitation_utilisateur SET id_util= :util WHERE id_habit= :habit");
            $statment->bindParam(":util", $idUserToConcede);
            $statment->bindParam(":habit", $idMaisonACeder);
            $statment->execute();
            Database::redirect("gestion", "accueil");
            return $statment;
        } else {
            //    User email not in database
            return false;
        }
    }

    public function isUserInDb(string $table, string $email)
    {
        if ($this->bdd->query("SELECT email_util FROM " . $table . " WHERE email_util='" . $email . "'")->rowCount() == 1) {
            return true;
        } else {
            return false;
        }
    }

}