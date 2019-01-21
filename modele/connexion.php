<?php
try {
    $dataSourceName = "mysql:host=localhost;dbname=g2e;charset=utf8";
    $user           = "root";
    $password       = "root";
    $options        = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
    $bdd            = new PDO($dataSourceName, $user, $password, $options);
    date_default_timezone_set('Europe/Paris');
}
catch (\Exception $e) {
    die('Erreur de connexion : ' . $e->getMessage());
}
