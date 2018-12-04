<div class="ligne">
    <!-- Bloc pour pouvoir ajouter une maison facilement -->
    <?php foreach ($maisons as $maison) { ?>
        <div class="col-gauche maison">
            <div class="maison">
                <div class="sticky-header-maison">
                    <h2><?= $maison['nom_habit']; ?></h2>
                    <div>
                        <a id="add-arr-<?= $maison['id_habit'] ?>" title="Ajouter un arroseur" class="add">
                            <img class="param-arroseur" src="vue/images/btn-add.png" alt="vue/images/btn-add.png">
                        </a>
                        <div class="dropdown">
                            <a onclick="toggleDropdown('param-dropdown')" class="btn-dropdown">
                                <img class="param-arroseur" src="vue/images/settings_white_192x192.png"
                                     alt="vue/images/settings_white_192x192.png">
                            </a>
                            <div id="param-dropdown" class="dropdown-content">
                                <a href="">Modifier</a>
                                <a href="">Paramètres</a>
                                <a href="index.php?cible=habitation&fonction=infos-maison&id=<?= $maison['nom_habit']; ?>">Informations</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php foreach ($arroseurs as $arroseur) { //include('vue/db/process_arroseur.php'); ?>
                    <div class="arroseur">
                        <div class="space-between">
                            <div class="nom-arroseur">
                                <a href="index.php?cible=habitation&fonction=infos-arroseur&id=<?= $arroseur['id_arr'];?>">
                                    <?= $arroseur['nom_arr']; ?>
                                </a>
                            </div>
                            <div class="toggle-button">
                                <input id="<?= "maison" . $arroseur['id_habit'] . "-arroseur" . $arroseur['id_arr']; ?>"
                                       type="checkbox" class="arroseur-checkbox" name="button"
                                       <?php if ($arroseur['etat_arr']) { ?>checked<?php } else {
                                } ?>>
                                <label class="arroseur-label"
                                       for="<?= "maison" . $arroseur['id_habit'] . "-arroseur" . $arroseur['id_arr']; ?>">
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

    <!-- TODO : change to $_SESSION['iser_id'] -->
    <div class="col-droite centre v-centre column">
        <a id="add-house-userID" title="Ajouter une maison" class="add">
            <img class="add-house" src="vue/images/add-house.png" alt="Ajouter une maison">
        </a>
    </div>
</div>
<!-- Popup pour ajouter une maison -->
<div class="modal centre" id="add-maison">
    <div class="modal-content">
        <form action="index.php?cible=habitation&fonction=ajouter-maison" method="post">
            <div class="modal-header">
                <span class="close" id="close-maison">&times;</span>
                <h3>Ajouter une nouvelle maison</h3>
            </div>
            <div class="modal-body">
                <label for="house-name">Nom de la maison : </label>
                <input type="text" id="house-name" name="house-name" placeholder="Entrez le nom de la maison" required>
                <br>
                <label for="house-number">Numéro de rue : </label>
                <input type="number" id="house-number" name="house-number" placeholder="Entrez numéro de rue" required>
                <br>
                <label for="house-route">Rue : </label>
                <input type="text" id="house-route" name="house-route" placeholder="Rue, route, avenue, ..." required>
                <br>
                <label for="house-city">Nom de la ville : </label>
                <input type="text" id="house-city" name="house-city" placeholder="Entrez votre ville" required>
                <br>
                <label for="house-postal">Numéro de code postal : </label>
                <input type="text" id="house-postal" name="house-postal" placeholder="Code Postal" required>
                <br>
                <label for="house-country">Pays : </label>
                <input type="text" id="house-country" name="house-country" placeholder="Pays" required>

            </div>
            <div class="modal-footer droite">
                <!-- <a href="" class="droite">Ajouter</a> -->
                <input type="submit" name="submit" value="Ajouter" class="btn-modal-submit">
            </div>
        </form>
    </div>
</div>
<div class="modal centre" id="add-arroseur">
    <div class="modal-content">
        <form action="index.php?cible=habitation&fonction=ajouter-arroseur&id_habit=" method="post">
            <div class="modal-header">
                <span class="close arr" id="close-arr">&times;</span>
                <h3>Ajouter un nouvel arroseur</h3>
            </div>
            <div class="modal-body">
                <label for="arr-name">Nom d'affichage de l'arroseur : </label>
                <input type="text" id="arr-name" name="arr-name" placeholder="Entrez le nom" required>
                <br>
                <label for="arr-num-serie">Numéro de série : </label>
                <input type="text" id="arr-num-serie" name="arr-num-serie"
                       placeholder="Entrez le numéro de série (DOM...)" required>
                <br>
            </div>
            <div class="modal-footer droite">
                <!-- <a href="" class="droite">Ajouter</a> -->
                <input type="submit" name="submit" value="Ajouter" class="btn-modal-submit">
            </div>
        </form>
    </div>
</div>
<?php
// important -> Pour toggle bouton ON/OFF attention au label avec le for="idinput"
// href="index.php?cible=habitation&fonction=ajouter-arroseur&id_habit="<?= $maison['id_habit']; "
?>
