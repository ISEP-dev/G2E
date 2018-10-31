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
                <a id="test">
                    <img class="ajout-maison" src="../vue/images/btn-add.png" alt="">
                </a>
            </div>
            <!-- Requête PHP db pour afficher les arroseurs de la maison -->
            <div class="arroseur">
                <div class="space-between">
                    <div class="nom-arroseur">
                        Arbre au fond du jardin
                    </div>
                    <div class="toggle-button">
                        <input id="maison1-arroseur1" type="checkbox" class="arroseur-checkbox" name="button" checked></input>
                        <label class="arroseur-label" for="maison1-arroseur1">
                            <span class="arroseur-inner"></span>
                            <span class="arroseur-slider"></span>
                        </label>
                    </div>
                </div>
                <div class="progress">
                    <progress value="50" max="100" class="progress-bar"></progress>
                    <div class="progress-value strong">{{progress.value}}%</div>
                </div>
                <div class="space-between">
                    <svg class="arroseur-status">
                        <circle cx="15" cy="10" r="10" />
                    </svg>
                    <img src="../vue/images/info.png" alt="" width="30" height="30">
                </div>
            </div>
            <div class="arroseur">
                <div class="space-between">
                    <div class="nom-arroseur">
                        Pelouse
                    </div>
                    <div class="toggle-button">
                        <input id="maison1-arroseur2" type="checkbox" class="arroseur-checkbox" name="button"></input>
                        <label class="arroseur-label" for="maison1-arroseur2">
                            <span class="arroseur-inner"></span>
                            <span class="arroseur-slider"></span>
                        </label>
                    </div>
                </div>
                <div class="progress">
                    <progress value="50" max="100" class="progress-bar"></progress>
                    <div class="progress-value strong">{{progress.value}}%</div>
                </div>
                <div class="space-between">
                    <svg class="arroseur-status">
                        <circle cx="15" cy="10" r="10" />
                    </svg>
                    <img src="../vue/images/info.png" alt="" width="30" height="30">
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
            <div class="arroseur">
            </div>
            <div class="arroseur">
            </div>
        </div>
    </div>
    <div class="col-droite centre v-centre column">
        <img src="../vue/images/house.png" alt="" height="150">
        <p>Ajouter une maison</p>
        <a href="">
            <img src="../vue/images/btn-add-house.png" alt="" height="150">
        </a>
    </div>
</div>
<?php $body = ob_get_clean(); ?>
<?php require('base.php'); ?>

<div class="modal centre">
    <div class="modal-content">
        <form class="" action="" method="post">
            <div class="modal-header">
                <span class="close">&times;</span>
                <h3>Ajouter un nouvel arroseur</h3>
            </div>
            <div class="modal-body">
                <input type="text" name="house-name" placeholder="Nom de la maison">
                <input type="number" name="house-number" placeholder="Numéro de rue">
                <input type="text" name="house-route" placeholder="Rue">
                <input type="text" name="house-city" placeholder="Ville">
                <input type="text" name="house-postal" placeholder="Code Postal">
                <input type="text" name="house-country" placeholder="Pays">

            </div>
            <div class="modal-footer droite">
                <!-- <a href="" class="droite">Ajouter</a> -->
                <input type="submit" name="submit" value="Ajouter">
            </div>
        </form>
    </div>
</div>

<?php // WARNING: Pour toggle bouton ON/OFF attention au label avec le for="idinput" ?>
