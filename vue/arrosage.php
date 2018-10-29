<?php $title = "Gestion de l'arrosage" ?>
<?php $head  = '<link rel="stylesheet" href="../vue/css/arrosage.css">'; ?>
<!-- <body> -->
<?php ob_start(); ?>
<!-- Pour aucune maison  -->

<!-- Pour minimum 1 maison (requète SQL) -->
<div class="ligne">
    <div class="col-gauche">
        <div class="maison">
            <h2 class="nom-maison">Maison 1</h2>
            <div class="arroseur">
                <div class="space-between">
                    <div class="nom-arroseur">
                        Arbre au fond du jardin
                    </div>
                    <div class="toggle-button">
                        <input type="checkbox" class="arroseur-checkbox" id="arroseur-check" name="button" checked></input>
                        <label class="arroseur-label" for="arroseur-check">
                            <span class="arroseur-inner"></span>
                            <span class="arroseur-slider"></span>
                        </label>
                    </div>
                </div>
                <div class="progress-bar">
                    <progress value="20" max="100">20%</progress>
                </div>
            </div>
            <div class="arroseur">
            </div>
            <div class="arroseur">
            </div>
            <div class="arroseur">
            </div>
            <div class="arroseur">
            </div>
            <div class="arroseur">
            </div>
        </div>
    </div>
    <div class="col-droite centre">

    </div>
</div>
<?php $body = ob_get_clean(); ?>
<?php require('base.php'); ?>

<!-- </body>
</html> -->
