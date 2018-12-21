<div class="space-between">
    <form id="form-house-select" action="index.php?cible=Habitation&fonction=update-view" method="post">
        <label for="house-select"></label>
        <select id="house-select" name="house-select" class="maison-select" onchange="onSelectHouseChange()">
            <?php foreach ($maisonsUtil as $maisonUser) { ?>
                <option value="<?= $maisonUser['id_habit'] ?>"><?= $maisonUser['nom_habit'] ?></option>
            <?php } ?>
        </select>
    </form>
    <a id="add-house" class="add-house b cursor">+ Nouvelle maison</a>
</div>
<fieldset class="zone">
    <legend class="zone-titre b">Potager</legend>
    <a id="add-arroseur" class="add-zone b cursor">+</a>
    <div class="arroseur">
        <div class="space-between">
            <div class="nom-arroseur">
                <a href="index.php?cible=habitation&fonction=infos-arroseur&id=1">
                    Tomates
                </a>
            </div>
            <div class="toggle-button">
                <input id="maison-arroseur" type="checkbox" class="arroseur-checkbox" name="button" checked>
                <label for="maison-arroseur" class="arroseur-label">
                    <span class="arroseur-inner"></span>
                    <span class="arroseur-slider"></span>
                </label>
            </div>
        </div>
        <div class="space-between">
            <div class="progress">
                <progress value="50" max="100" class="progress-bar"></progress>
                <div class="progress-value strong">50%</div>
            </div>
            <div class="capteur-type">
                Type de plante : <span class="italic">arbre</span>
            </div>
        </div>
        <svg class="arroseur-status">
            <circle cx="15" cy="10" r="10" fill="green"></circle>
        </svg>
        <div class="capteur-type">
            <table>
                <tr>
                    <td>Type de plante :</td>
                    <td class="italic">Arbre</td>
                <tr>
                    <td>Température :</td>
                    <td class="italic">18°C</td>
                <tr>
                    <td>Humidité :</td>
                    <td class="italic">50%</td>
            </table>
        </div>
    </div>
    <div class="arroseur">
        <div class="space-between">
            <div class="nom-arroseur">
                <a href="index.php?cible=habitation&fonction=infos-arroseur&id=1">
                    Framboise
                </a>
            </div>
            <div class="toggle-button">
                <input id="maison-arroseur1" type="checkbox" class="arroseur-checkbox" name="button" checked>
                <label for="maison-arroseur1" class="arroseur-label">
                    <span class="arroseur-inner"></span>
                    <span class="arroseur-slider"></span>
                </label>
            </div>
        </div>
        <div class="progress">
            <progress value="50" max="100" class="progress-bar"></progress>
            <div class="progress-value strong">50%</div>
        </div>
        <svg class="arroseur-status">
            <circle cx="15" cy="10" r="10" fill="green"></circle>
        </svg>
        <div class="capteur-type">
            <table>
                <tr>
                    <td>Type de plante :</td>
                    <td class="italic">fruit</td>
                <tr>
                    <td>Température :</td>
                    <td class="italic">15°C</td>
                <tr>
                    <td>Humidité :</td>
                    <td class="italic">85%</td>
            </table>
        </div>
    </div>
    <div class="arroseur">
        <div class="space-between">
            <div class="nom-arroseur">
                <a href="index.php?cible=habitation&fonction=infos-arroseur&id=1">
                    Salade
                </a>
            </div>
            <div class="toggle-button">
                <input id="maison-arroseur2" type="checkbox" class="arroseur-checkbox" name="button">
                <label for="maison-arroseur2" class="arroseur-label">
                    <span class="arroseur-inner"></span>
                    <span class="arroseur-slider"></span>
                </label>
            </div>
        </div>
        <div class="progress">
            <progress value="50" max="100" class="progress-bar"></progress>
            <div class="progress-value strong">50%</div>
        </div>
        <svg class="arroseur-status">
            <circle cx="15" cy="10" r="10" fill="orange"></circle>
        </svg>
        <div class="capteur-type">
            <table>
                <tr>
                    <td>Type de plante :</td>
                    <td class="italic">légume</td>
                <tr>
                    <td>Température :</td>
                    <td class="italic">22°C</td>
                <tr>
                    <td>Humidité :</td>
                    <td class="italic">20%</td>
            </table>
        </div>
    </div>
</fieldset>
<!-- TODO : change to $_SESSION['iser_id'] -->
<div class="col-droite centre v-centre column">
    <a id="add-zone" title="Ajouter une nouvelle zone" class="cursor">
        <img src="vue/images/add-zone.png" alt="Ajouter une zone">
    </a>
</div>
<!-- Popup pour ajouter une maison -->
<div class="modal centre" id="modal-add-maison">
    <div class="modal-content">
        <form action="index.php?cible=habitation&fonction=ajouter-maison" method="post">
            <div class="modal-header">
                <span class="close">&times;</span>
                <h3>Ajouter une nouvelle maison</h3>
            </div>
            <div class="modal-body">
                <table class="centre">
                    <tr>
                        <td><label for="house-name">Nom de la maison : </label></td>
                        <td><input type="text" id="house-name" name="house-name"
                                   placeholder="Entrez le nom de la maison" required></td>
                    <tr>
                        <td><label for="house-number">Numéro de rue : </label></td>
                        <td><input type="number" id="house-number" name="house-number"
                                   placeholder="Entrez numéro de rue"
                                   required></td>
                    <tr>
                        <td><label for="house-route">Rue : </label></td>
                        <td><input type="text" id="house-route" name="house-route" placeholder="Rue, route, avenue, ..."
                                   required></td>
                    <tr>
                        <td><label for="house-city">Nom de la ville : </label></td>
                        <td><input type="text" id="house-city" name="house-city" placeholder="Entrez votre ville"
                                   required></td>
                    <tr>
                        <td><label for="house-postal">Numéro de code postal : </label></td>
                        <td><input type="text" id="house-postal" name="house-postal" placeholder="Code Postal" required>
                        </td>
                    <tr>
                        <td><label for="house-country">Pays : </label></td>
                        <td><input type="text" id="house-country" name="house-country" placeholder="Pays" required></td>
                </table>
            </div>
            <div class="modal-footer droite">
                <!-- <a href="" class="droite">Ajouter</a> -->
                <input type="submit" name="submit" value="Ajouter" class="btn-modal-submit">
            </div>
        </form>
    </div>
</div>
<div class="modal centre" id="modal-add-zone">
    <div class="modal-content">
        <form action="index.php?cible=habitation&fonction=ajouter-arroseur" method="post">
            <div class="modal-header space-between">
                <h3>Ajouter une nouvelle zone</h3>
                <span class="close">&times;</span>
            </div>
            <div class="modal-body">
                <table class="centre">
                    <tr>
                        <td><label for="arr-name">Nom de la zone : </label></td>
                        <td><input type="text" id="arr-name" name="arr-name" placeholder="Entrez le nom" required>
                            <img src="vue/images/icon_question_1024x1024.png" alt="" width="20"
                                 title="Entrez un nom de zone ex: Potager, Serre, ...">
                        </td>
                </table>
            </div>
            <input type="hidden" name="house-id">
            <div class="modal-footer droite">
                <!-- <a href="" class="droite">Ajouter</a> -->
                <input type="submit" name="submit" value="Ajouter" class="btn-modal-submit">
            </div>
        </form>
    </div>
</div>
<div class="modal centre" id="modal-add-arroseur">
    <!--    <script>console.log(document.getElementById("test").textContent)</script>-->
    <div class="modal-content">

        <form action="index.php?cible=habitation&fonction=ajouter-arroseur" method="post">
            <div class="modal-header">
                <span class="close">&times;</span>
                <h3>Ajouter un nouvel arroseur </h3>
            </div>
            <div class="modal-body">
                <table class="centre">
                    <tr>
                        <td><label for="arr-name">Nom de l'arroseur : </label></td>
                        <td><input type="text" id="arr-name" name="arr-name" placeholder="Entrez le nom" required>
                            <img src="vue/images/icon_question_1024x1024.png" alt="" width="20" title="Nom explicite (affiché pour la gestion de vos différents arroseurs)">
                        </td>
                    <tr>
                        <td><label for="arr-num-serie">Numéro de série : </label></td>
                        <td><input type="text" id="arr-num-serie" name="arr-num-serie" placeholder="Entrez le numéro de série (DOM...)" required>
                            <img src="vue/images/icon_question_1024x1024.png" alt="" width="20" title="Vous le trouverez sur l'appareil (ex : DOM1111)">
                        </td>

                </table>
            </div>
            <input type="hidden" name="house-id" value="">
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
<!--  <div class="arroseur">-->
<!--                        <div class="space-between">-->
<!--                            <div class="nom-arroseur">-->
<!--                                <a href="index.php?cible=habitation&fonction=infos-arroseur&id=--><? // //= $arroseur['id_arr'];?><!--">-->
<!--                                    --><? // //= $arroseur['nom_arr']; ?>
<!--                                </a>-->
<!--                            </div>-->
<!--                            <div class="toggle-button">-->
<!--                                <input id="--><? // //= "maison" . $arroseur['id_habit'] . "-arroseur" . $arroseur['id_arr']; ?><!--"-->
<!--                                       type="checkbox" class="arroseur-checkbox" name="button"-->
<!--                                       --><?php //if ($arroseur['etat_arr']) { ?><!--checked--><?php //} else {} ?>
<!--                                <label class="arroseur-label"-->
<!--                                       for="--><? // //= "maison" . $arroseur['id_habit'] . "-arroseur" . $arroseur['id_arr']; ?><!--">-->
<!--                                    <span class="arroseur-inner"></span>-->
<!--                                    <span class="arroseur-slider"></span>-->
<!--                                </label>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="progress">-->
<!--                            <progress value="50" max="100" class="progress-bar"></progress>-->
<!--                            <div class="progress-value strong">50%</div>-->
<!--                        </div>-->
<!--                        <div class="space-between">-->
<!--                            <svg class="arroseur-status">-->
<!--                                --><?php //if ($arroseur['etat_fonctionnement_arr'] == 0) { ?>
<!--                                    <circle cx="15" cy="10" r="10" fill="green"></circle>-->
<!--                                --><?php //} elseif ($arroseur['etat_fonctionnement_arr'] == 1) { ?>
<!--                                    <circle cx="15" cy="10" r="10" fill="orange"></circle>-->
<!--                                --><?php //} elseif ($arroseur['etat_fonctionnement_arr'] == 2) { ?>
<!--                                    <circle cx="15" cy="10" r="10" fill="red"></circle>-->
<!--                                --><?php //} ?>
<!--                            </svg>-->
<!--                            <img src="vue/images/info.png" alt="" width="30" height="30">-->
<!--                        </div>-->
<!--                    </div>-->
