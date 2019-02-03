<?php

require_once "Database.php";

class Publication extends Database
{
    public  $tablePublication = "publication";

    public function addPublication(string $table, string $titre, string $contenu, int $idUser)
    {
        $insertArray = array(
            'titre_pub'      => $titre,
            'contenu_pub'    => $contenu,
            'date_envoi_pub' => date('Y-m-d H:i:s'),
            'id_util'        => $idUser
        );
        return Database::insert($this->bdd, $table, $insertArray);
    }

    public function getAllPublications(string $table)
    {
        return $this->bdd->query("SELECT * FROM " . $table);
    }
}