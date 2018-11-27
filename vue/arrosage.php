<div class="ligne">
    <!-- Bloc pour pouvoir ajouter une maison facilement -->
    <?php foreach ($maisons as $maison) { ?>
    <div class="col-gauche maison">
        <div class="maison">
            <div class="sticky-header-maison">
                <h2><?= $maison['nom_habit']; ?></h2>
                <a id="add-arr-<?= $maison['id_habit'] ?>" title="Ajouter un arroseur">
                    <img class="ajout-arroseur" src="vue/images/btn-add.png" alt="vue/images/btn-add.png">
                </a>
            </div>
            <?php foreach ($arroseurs as $arroseur) { // include('process_arroseur.php'); ?>
            <div class="arroseur">
                <div class="space-between">
                    <div class="nom-arroseur">
                        <?= $arroseur['nom_arr']; ?>
                    </div>
                    <div class="toggle-button">
                        <input id="<?= "maison".$arroseur['id_habit']."-arroseur".$arroseur['id_arr']; ?>" type="checkbox" class="arroseur-checkbox" name="button"<?php if ($arroseur['etat_arr']) { ?>checked<?php } else { }?>>
                        <label class="arroseur-label" for="<?= "maison".$arroseur['id_habit']."-arroseur".$arroseur['id_arr']; ?>">
                            <span class="arroseur-inner"></span>
                            <span class="arroseur-slider"></span>
                        </label>
                    </div>
                </div>
                <div class="progress">
                    <progress value="50" max="100" class="progress-bar"></progress>
                    <div class="progress-value strong">50%</div>
                </div>
                <div class="space-between">
                    <svg class="arroseur-status">
                        <?php if ($arroseur['etat_fonctionnement_arr'] == 0) { ?>
                            <circle cx="15" cy="10" r="10" fill="green"></circle>
                        <?php } elseif ($arroseur['etat_fonctionnement_arr'] == 1) { ?>
                            <circle cx="15" cy="10" r="10" fill="orange"></circle>
                        <?php } elseif ($arroseur['etat_fonctionnement_arr'] == 2) { ?>
                            <circle cx="15" cy="10" r="10" fill="red"></circle>
                        <?php } ?>
                    </svg>
                    <img src="vue/images/info.png" alt="" width="30" height="30">
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
    <?php } ?>

    <div class="col-droite centre v-centre column">
        <a id="add-house-userID" title="Ajouter une maison">
            <img class="add-house" src="vue/images/add-house.png" alt="Ajouter une maison">
        </a>
    </div>
</div>
<!-- Popup pour ajouter une maison -->
<div class="modal centre">
    <div class="modal-content">
        <form action="index.php?cible=habitation&fonction=ajouter" method="post">
            <div class="modal-header">
                <span class="close">&times;</span>
                <h3>Ajouter une nouvelle maison</h3>
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
<?php
// important -> Pour toggle bouton ON/OFF attention au label avec le for="idinput"
?>
