<?php

require_once "connexion.php";
require_once "fonctions.php";

class Publication
{
    public $tablePublication = "publication";

    public function addPublication(PDO $bdd, string $table, $titre, $contenu, $idUser)
    {
        $insertArray = array(
            'titre_pub'      => $titre,
            'contenu_pub'    => $contenu,
            'date_envoi_pub' => date('Y-m-d H:i:s'),
            'id_util'        => $idUser
        );
        return insert($bdd, $table, $insertArray);
    }

    public function getAllPublications(PDO $bdd, string $table)
    {
        return $bdd->query("SELECT * FROM " . $table);
    }
}