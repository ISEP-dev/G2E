<?php include('../vue/db/process_maison.php');
    $title = "Gestion de l'arrosage";
    $head  = '<link rel="stylesheet" href="../vue/css/arrosage.css">'.
                '<script src="../vue/js/main.js" defer async></script>';
    ob_start();
?>
<div class="ligne">
    <?php House::getHouses(); ?>
    <!-- Requête pour afficher les maisons de l'utilisateur -->
<!--     <div class="col-gauche">
        <div class="maison">
            <div class="sticky-header-maison">
                <h2>Maison Principale</h2>
                <a id="add-arr-1">
                    <img class="ajout-arroseur" src="../vue/images/btn-add.png" alt="">
                </a>
            </div>
            <!-- Requête PHP db pour afficher les arroseurs de la maison
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
            <div class="arroseur"></div>
            <div class="arroseur"></div>
            <div class="arroseur"></div>
            <div class="arroseur"></div>
            <div class="arroseur"></div>
        </div>
    </div>-->
    <!-- Bloc pour pouvoir ajouter une maison facilement -->
    <div class="col-droite centre v-centre column">
        <img src="../vue/images/house.png" alt="" height="150">
        <p>Ajouter une maison</p>
        <a id="add-house-userID">
            <img src="../vue/images/btn-add-house.png" alt="" height="150">
        </a>
    </div>
</div>
<!-- Popup pour ajouter une maison -->
<div class="modal centre">
    <div class="modal-content">
        <form class="" action="../vue/db/process_add_house.php" method="post">
            <div class="modal-header">
                <span class="close">&times;</span>
                <h3>Ajouter un nouvel arroseur</h3>
            </div>
            <div class="modal-body">
                <label for="house-name">Nom de la maison : </label>
                <input type="text" id="house-name" name="house-name" placeholder="Entrez le nom de la maison">
                <br>
                <label for="house-number">Numéro de rue : </label>
                <input type="number" id="house-number" name="house-number" placeholder="Entrez numéro de rue">
                <br>
                <label for="house-route">Rue : </label>
                <input type="text" id="house-route" name="house-route" placeholder="Rue, route, avenue, ...">
                <br>
                <label for="house-city">Nom de la ville : </label>
                <input type="text" id="house-city" name="house-city" placeholder="Entrez votre ville">
                <br>
                <label for="house-postal">Numéro de code postal : </label>
                <input type="text" id="house-postal" name="house-postal" placeholder="Code Postal">
                <br>
                <label for="house-country">Pays : </label>
                <input type="text" id="house-country" name="house-country" placeholder="Pays">

            </div>
            <div class="modal-footer droite">
                <!-- <a href="" class="droite">Ajouter</a> -->
                <input type="submit" name="submit" value="Ajouter">
            </div>
        </form>
    </div>
</div>
<?php $body = ob_get_clean();
    require('base.php');

// WARNING: Pour toggle bouton ON/OFF attention au label avec le for="idinput"
?>
