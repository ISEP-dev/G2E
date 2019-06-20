<?php

class Database
{
    protected $bdd;

    public function __construct()
    {
        try {
            $dataSourceName = "mysql:host=localhost;dbname=g2e;charset=utf8";
            $user           = "root";
            $password       = "root";
            $options        = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
            $this->bdd      = new PDO($dataSourceName, $user, $password, $options);
            date_default_timezone_set('Europe/Paris');
        }
        catch (\Exception $e) {
            die('Erreur de connexion : ' . $e->getMessage());
        }
    }

    /**
     * @param PDO $bdd
     * @param string $table
     * @return array
     */
    public function selectAll(PDO $bdd, string $table): array
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
    public function selectWhere(PDO $bdd, string $table, array $attributs): array
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
    public function insert(PDO $bdd, string $table, array $values): bool
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

    public static function delete(PDO $bdd, string $table, string $conditions)
    {
        $bdd->query("DELETE FROM " . $table . " WHERE " . $conditions);
    }

    public function redirect(string $controleur, string $fonction)
    {
        header('Location: index.php?cible=' . $controleur . '&fonction=' . $fonction);
    }

}