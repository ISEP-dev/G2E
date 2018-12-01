<?php
try
{
    $dataSourceName = "mysql:host=localhost;dbname=g2e;charset=utf8";
    $user           = "root";
    $password       = "root";
    $options        = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
    $bdd = new PDO($dataSourceName, $user, $password, $options);
}
catch (\Exception $e)
{
    die('Erreur de connexion : '.$e->getMessage());
}
