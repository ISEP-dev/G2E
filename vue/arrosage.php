<?php $title = "Gestion de l'arrosage" ?>
<?php $head  = '<link rel="stylesheet" href="../vue/css/arrosage.css">'.
                '<script src="../vue/js/main.js" defer async></script>';
?>
<?php ob_start(); ?>
<!-- Pour aucune maison  -->
<!-- <div class="ligne">
    <div class="centre v-centre">
        <p>Vous devez ajouter une maison pour gérer votre arrosage.</p>
    </div><br>
    <div class="v-centre">
        <a href="">Ajouter une maison</a>
    </div>
</div> -->
<!-- Pour minimum 1 maison (requète SQL) -->
<div class="ligne">
    <div class="col-gauche">
        <div class="maison">
            <div class="sticky-header-maison">
                <h2>Maison Principale</h2>
                <a href="javascript:modalOpen();" id="test">
                    <img class="ajout-maison" src="../vue/images/btn-add.png" alt="">
                </a>
            </div>
            <div class="arroseur">
                <div class="space-between">
                    <div class="nom-arroseur">
                        Arbre au fond du jardin
                    </div>
                    <div class="toggle-button">
                        <input type="checkbox" class="arroseur-checkbox" id="arroseurID-maisonID" name="button" checked></input>
                        <label class="arroseur-label" for="arroseurID-maisonID">
                            <span class="arroseur-inner"></span>
                            <span class="arroseur-slider"></span>
                        </label>
                    </div>
                </div>
                <div class="progress">
                    <progress value="50" max="100" class="progress-bar"></progress>
                    <div class="progress-value strong">{{progress.value}}%</div>
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

<div class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <span class="close">&times;</span>
            <h3>Ajouter une nouvelle maison</h3>
        </div>
        <div class="modal-body">
            <p>
                <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat officia aut obcaecati reprehenderit incidunt odit.</span>
                <span>Voluptate itaque omnis ea, illum nisi saepe aut vero dolorem, perferendis, eum cum nostrum vitae.</span>
                <span>Beatae, odio quod iste sed maxime nobis. Excepturi odit pariatur sit eos similique molestias quam!</span>
                <span>Nesciunt voluptatum, temporibus obcaecati tenetur ut atque amet, blanditiis fugiat quam facilis, ea quaerat repudiandae.</span>
                <span>Non minus quaerat rem deleniti voluptates, sequi, optio eaque quam eum et repellat, delectus, laudantium.</span>
            </p>
        </div>
        <div class="modal-footer">
            <a href="" class="droite">Ajouter</a>
        </div>
    </div>
</div>
