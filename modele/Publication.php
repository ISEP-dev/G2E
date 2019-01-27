<?php

require_once "connexion.php";
require_once "fonctions.php";

class Publication
{
    private $bdd;
    public  $tablePublication = "publication";

    function __construct(PDO $bdd)
    {
        $this->bdd = $bdd;
    }

    public function addPublication(string $table, $titre, $contenu, $idUser)
    {
        $insertArray = array(
            'titre_pub'      => $titre,
            'contenu_pub'    => $contenu,
            'date_envoi_pub' => date('Y-m-d H:i:s'),
            'id_util'        => $idUser
        );
        return insert($this->bdd, $table, $insertArray);
    }

    public function getAllPublications(string $table)
    {
        return $this->bdd->query("SELECT * FROM " . $table);
    }
}