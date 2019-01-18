<?php

require "connexion.php";

class Publication
{
    public $tablePublication = "publication";

    public function addPublication(PDO $bdd, string $table, $titre, $contenu, $idUser)
    {
        return $bdd->query("INSERT INTO " . $table . "(titre_pub, contenu_pub, date_envoi_pub, id_util) VALUES('$titre', '$contenu', NOW(), $idUser);");
    }

    public function getAllPublications(PDO $bdd, string $table)
    {
        return $bdd->query("SELECT * FROM " . $table);
    }
}