<?php

/*
 * Fonctions utiles pour la base de donnée
 */

include("modele/connexion.php");

/**
 * @param PDO $bdd
 * @param string $table
 * @return array
 */
function selectAll(PDO $bdd, string $table): array
{
    $query = 'SELECT * FROM ' . $table;
    return $bdd->query($query)->fetchAll();
}

/**
 * @param PDO $bdd
 * @param string $table
 * @param array $attributs
 * @return array
 */
function selectWhere(PDO $bdd, string $table, array $attributs): array
{
    $where = '';
    foreach ($attributs as $key => $value){

        $where .= "";
    }
    $query = $bdd->prepare('SELECT * FROM' . $table . 'WHERE' . $where);


    return $query->fetchAll();
}

/**
 * @param PDO $bdd
 * @param string $table
 * @param array $values
 * @return bool
 */
function insert(PDO $bdd, string $table, array $values): bool
{
    $attributs = '';
    $valeurs = '';

    $query = 'INSERT INTO' . $table . '(' . $attributs . ') VALUES (' . $valeurs . ')';
    $donnees = $bdd->prepare($query);

    $requete = '';
    foreach ($values as $key => $value) {
        $requete = $requete . $key . ' : ' . $value . ',v';
        $donnees->bindParam($key, $values[$key], PDO::PARAM_STR);
    }
    return $donnees->execute();

}
