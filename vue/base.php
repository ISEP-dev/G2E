<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="vue/css/style.css">
    <link rel="stylesheet" href="vue/css/base.css">
    <?= isset($head); ?>
    <title><?= isset($title); ?></title>
</head>
<body>
    <?php require('header.php'); ?>
    <?= isset($body); ?>
    <?php require('footer.php'); ?>
</body>
</html>
