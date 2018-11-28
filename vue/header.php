<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="vue/css/style.css">
    <link rel="stylesheet" href="vue/css/base.css">
    <link rel="icon" href="vue/images/logo_31x19.png">
    <script src="vue/js/main.js" defer async></script>
    <?php if (isset($head)) {
        echo $head;
    } ?>
    <title>
        <?php if (isset($title)) {
            echo $title;
        } ?>
    </title>
</head>
<body>
<header class="space-between">
    <a href="index.php">
        <img class="logo" src="vue/images/logo_153x94.png" alt="ecorain">
    </a>
    <div class="v-centre">
        <?php if (isset($title)) {
            echo $title;
        } ?>
    </div>
    <button class="button">
        <img class="img-compte" src="vue/images/compte.png" alt="compte">
        <br>Votre compte
    </button>
</header>
<br>
