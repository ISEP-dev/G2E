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
    foreach ($attributs as $key => $value) {
        $where .= "$key = :$key" . ", ";
    }
    $where = substr_replace($where, '', -2, 2); //caractère de fin de chaine ? \0

    $statement = $bdd->prepare('SELECT * FROM ' . $table . ' WHERE ' . $where);


    foreach ($attributs as $key => $value) {
        $statement->bindParam(":$key", $value);
    }
    $statement->execute();

    return $statement->fetchAll();
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
    $valeurs   = '';
    foreach ($values as $key => $value) {

        $attributs .= $key . ', ';
        $valeurs   .= ':' . $key . ', ';
        $v[]       = $value;
    }
    $attributs = substr_replace($attributs, '', -2, 2);
    $valeurs   = substr_replace($valeurs, '', -2, 2);

    $query = ' INSERT INTO ' . $table . ' (' . $attributs . ') VALUES (' . $valeurs . ')';

    $donnees = $bdd->prepare($query);
    $requete = "";
    foreach ($values as $key => $value) {
        $requete = $requete . $key . ' : ' . $value . ', ';
        $donnees->bindParam($key, $values[$key], PDO::PARAM_STR);
    }

    return $donnees->execute();

}

function delete(PDO $bdd, string $table, string $where)
{
    $bdd->query("DELETE FROM " . $table . "WHERE " . $where);
}
