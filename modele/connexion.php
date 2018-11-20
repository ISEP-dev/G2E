<?php
try
{
    $dataSourceName = "mysql:host=localhost;dbname=g2e_test;charset=utf8";
    $user           = "root";
    $password       = "";
    $options        = array(
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION
    );
    $bdd = new PDO($dsn, $user, $password, $options);
}
catch (Exception $e)
{
    die('Erreur de connexion : '.$e->getMessage());
}
