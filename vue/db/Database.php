<?php
class Database{

    private $bdd;

    public function __construct(){
        $dsn     = "mysql:dbname=testdb;host=localhost";
        $user     = "root";
        $password = "";
        $options = array(
          PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
        );
        $bdd = new PDO($dsn, $user, $password, $options);
        if ($bdd->connect_errno) {
            echo "Échec de la connexion : " . $bdd->connect_errno . "\n<br>";
            exit();
        }
    }

    public static function query($query){
        return $bdd->query($query);
    }


    public static function close(){
        $bdd->close();
    }
}
 ?>
