<nav class="navbar">
    <ul class="navbar">
        <li class="navitem"><a href="index.php">Catalogue</a></li>
        <li class="navitem active"><a href="index.php?cible=habitation&fonction=accueil">Maison</a></li>
        <li class="navitem"><a href="index.php?cible=utilisateurs&fonction=stats">Statistiques</a></li>
    </ul>
</nav>
<!-- S : Client house select -->
<div class="space-between">
    <div>
        <form id="form-house-select" action="index.php?cible=Habitation&fonction=accueil" method="post">
            <label for="house-select"></label>
            <select id="house-select" name="house-select" class="maison-select" onchange="onSelectHouseChange(this)">
                <option selected disabled>-- Selectionner votre maison --</option>
                <?php $maisonSelect = getAllHousesFromUser($bdd, $tableHabitation, $_SESSION['user_id']);
                foreach ($maisonSelect as $maisonUser) { ?>
                    <option value="<?= $maisonUser['id_habit'] ?>"><?= $maisonUser['nom_habit'] ?></option>
                <?php } ?>
            </select>
        </form>
    </div>
    <a id="add-house" class="add-house b cursor">+ Nouvelle maison</a>
</div>
<!-- S : Zone -->
<?php
if (getNbHousesByUserId($bdd, $tableHabitationUser, $_SESSION['user_id']) != 0) {
    $zones = getZonesByHouseId($bdd, $tableZone, $_SESSION['id_maison']);
    foreach ($zones as $zone) { ?>
        <fieldset class="zone">
            <legend class="zone-titre b"><?= $zone['nom_zone'] ?></legend>
            <div class="delete-zone">
                <a class="cursor" id="delete-zone" data-idzone="<?= $zone['id_zone'] ?>" title="Supprimer la zone"
                   onclick="deleteZone(this);">
                    <div class="circle-delete"></div>
                </a>
            </div>
            <div class="container-zone">

                <?php $arroseurs = getArroseurByZoneId($bdd, $tableArroseur, $zone['id_zone']);
                foreach ($arroseurs as $arroseur) {
                    if ($arroseur['etat_fonctionnement_arr'] == 0) {
                        $state_arr   = "green";
                        $title_state = "";
                    } else {
                        if ($arroseur['etat_fonctionnement_arr'] == 1) {
                            $state_arr   = "orange";
                            $title_state = "Problème détecté";
                        } else {
                            if ($arroseur['etat_fonctionnement_arr'] == 2) {
                                $state_arr   = "red";
                                $title_state = "Arroseur " . $arroseur['nom_arr'] . " en panne";
                            }
                        }
                    }
                    if ($arroseur['etat_arr']) {
                        $checked = "checked";
                    } else {
                        $checked = "";
                    }
                    $plante            = new Plante();
                    $plante_infos      = $plante->getPlantType($bdd, $plante->tablePlante, $arroseur['id_plante']);
                    $prctTempsArrosage = rand(0, 100);

                    $arroseurType = getArroseurTypeByArroseurId($bdd, $tableArroseurType, $tableArroseur, $arroseur['id_arr']);
                    ?>
                    <!-- S : Arroseur -->
                    <div class="arroseur">
                        <div class="space-between">
                            <div class="nom-arroseur">
                                <a href="index.php?cible=habitation&fonction=config-arroseur&id=<?= $arroseur['id_arr'] ?>"><?= $arroseur['nom_arr'] ?></a>
                                <span class="small-text">(<?= $arroseurType['nom_type_arroseur'] ?>)</span>
                            </div>
                            <div class="toggle-button">
                                <input id="z<?= $arroseur['id_zone'] ?>-a<?= $arroseur['id_arr'] ?>" type="checkbox"
                                       class="arroseur-checkbox" name="button" <?= $checked ?>>
                                <label for="z<?= $arroseur['id_zone'] ?>-a<?= $arroseur['id_arr'] ?>"
                                       class="arroseur-label"
                                       onclick="updateStatusArroseur(this);">
                                    <span class="arroseur-inner"></span>
                                    <span class="arroseur-slider"></span>
                                </label>
                            </div>
                        </div>
                        <div class="space-between">
                            <div class="progress">
                                <progress value="<?= $prctTempsArrosage ?>" max="100" class="progress-bar"></progress>
                                <div class="progress-value strong"><?= $prctTempsArrosage ?>%
                                    / <?= $plante_infos['temps_arrosage_plante'] ?></div>
                            </div>
                            <div class="capteur-type">
                                Type de plante : <span class="italic"><?= $plante_infos['nom_plante'] ?></span>
                            </div>
                        </div>
                        <svg class="arroseur-status">
                            <title><?= $title_state ?></title>
                            <circle cx="15" cy="10" r="10" fill="<?= $state_arr ?>"></circle>
                        </svg>
                        <div class="space-between">
                            <div class="capteur-type">
                                <table>
                                    <?php $capteur = new Capteur();
                                    if ($capteur->checkCapteurStatus($bdd, $capteur->tableCapteur, $arroseur['id_arr'], 3)['COUNT(1)']) {
                                        $visibilityTemp = true;
                                    } else {
                                        $visibilityTemp = false;
                                    }
                                    if ($capteur->checkCapteurStatus($bdd, $capteur->tableCapteur, $arroseur['id_arr'], 4)['COUNT(1)']) {
                                        $visibilityHumi = true;
                                    } else {
                                        $visibilityHumi = false;
                                    }
                                    if ($capteur->checkCapteurStatus($bdd, $capteur->tableCapteur, $arroseur['id_arr'], 7)['COUNT(1)']) {
                                        $visibilityPres = true;
                                    } else {
                                        $visibilityPres = false;
                                    }
                                    if ($visibilityTemp) { ?>
                                        <tr>
                                            <td>Température :</td>
                                            <td class="italic"><?= rand(10, 35) ?>°C</td>
                                        </tr>
                                    <?php }
                                    if ($visibilityHumi == 2) { ?>
                                        <tr>
                                            <td>Humidité :</td>
                                            <td class="italic"><?= rand(0, 100) ?>%</td>
                                        </tr>
                                    <?php }
                                    if ($visibilityPres == 3) { ?>
                                        <tr>
                                            <td>Présence :</td>
                                            <td class="italic"><?= rand(0, 1) ?></td>
                                        </tr>
                                    <?php } ?>
                                </table>
                            </div>
                            <div>
                                <div class="freq_plante">
                                    Arroser <i class="b"><?= $plante_infos['frequence_plante'] ?></i>
                                </div>
                                <div class="saison_plante">
                                    Arroser pendant <?= $plante_infos['saison_plante'] ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <a id="add-arroseur-z<?= $zone['id_zone'] ?>" class="add-arroseur cursor" onclick="addArroseur(this);">
                    <div class="arroseur"><img src="vue/images/add-sprinkler.png" alt="vue/images/add-sprinkler.png"
                                               width="210"></div>
                </a>
            </div>
        </fieldset>
    <?php } ?>

    <!-- S : Add new zone -->
    <div class="col-droite centre v-centre space-around">
        <a id="add-zone" title="Ajouter une nouvelle zone" class="cursor">
            <img src="vue/images/add-zone.png" alt="Ajouter une zone">
        </a>
        <a id="delete-maison" class="cursor">
            <img src="vue/images/no-home.png" alt="Supprimer la maison">
        </a>
    </div>
<?php } else {
    echo "<br><br><br>";
} ?>
<!-- S : Popups -->
<div class="modal centre" id="modal-add-maison">
    <div class="modal-content">
        <form action="index.php?cible=habitation&fonction=ajouter-maison" method="post">
            <div class="modal-header space-between">
                <h3>Ajouter une nouvelle maison</h3>
                <span class="close">&times;</span>
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
                    <tr>
                        <td><label for="house-select-principal">Maison principale</label></td>
                        <td><select name="house-select-principal" id="house-select-principal">
                                <option value="1">Maison principale</option>
                                <option value="2">Maison secondaire</option>
                            </select>
                            <img src="vue/images/icon_question_1024x1024.png" alt="question.png" class="icon-question"
                                 title="Maison affichée par défaut">
                        </td>
                </table>
            </div>
            <div class="modal-footer droite">
                <!-- <a href="" class="droite">Ajouter</a> -->
                <input type="submit" name="submit" value="Ajouter" class="btn-modal-submit text-medium">
            </div>
        </form>
    </div>
</div>
<div class="modal centre" id="modal-add-zone">
    <div class="modal-content">
        <form action="index.php?cible=habitation&fonction=ajouter-zone" method="post">
            <div class="modal-header space-between">
                <h3>Ajouter une nouvelle zone à votre maison
                    <?php if (getNbHousesByUserId($bdd, $tableHabitationUser, $_SESSION['user_id']) != 0) {
                        echo "(" . getHouseNameById($bdd, $tableHabitation, $_SESSION['id_maison'])['nom_habit'] . ")";
                    } ?></h3>
                <span class="close">&times;</span>
            </div>
            <div class="modal-body">
                <table class="centre">
                    <tr>
                        <td><label for="arr-name">Nom de la zone : </label></td>
                        <td><input type="text" id="zone-name" name="zone-name" placeholder="Entrez le nom" required>
                            <img src="vue/images/icon_question_1024x1024.png" alt="question.png" class="icon-question"
                                 title="Entrez un nom de zone ex: Potager, Serre, ...">
                        </td>
                </table>
            </div>
            <input type="hidden" name="id-house" value="<?= $_SESSION['id_maison'] ?>">
            <div class="modal-footer droite">
                <input type="submit" name="submit" value="Ajouter" class="btn-modal-submit text-medium">
            </div>
        </form>
    </div>
</div>
<div class="modal centre" id="modal-add-arroseur">
    <div class="modal-content">
        <form action="index.php?cible=habitation&fonction=ajouter-arroseur" method="post">
            <div class="modal-header space-between">
                <h3>Ajouter un nouvel arroseur</h3>
                <span class="close">&times;</span>
            </div>
            <div class="modal-body">
                <table class="centre">
                    <tr>
                        <td><label for="arr-name">Nom de l'arroseur : </label></td>
                        <td><input type="text" id="arr-name" name="arr-name" placeholder="Entrez le nom" required>
                            <img src="vue/images/icon_question_1024x1024.png" alt="question.png" class="icon-question"
                                 title="Nom explicite (affiché pour la gestion de vos différents arroseurs)">
                        </td>
                    </tr>
                    <tr>
                        <td><label for="arr-num-serie">Numéro de série : </label></td>
                        <td><input type="text" id="arr-num-serie" name="arr-num-serie"
                                   placeholder="Entrez le numéro de série (DOM...)" onkeyup="checkSeriallNumber();"
                                   required>
                            <img src="vue/images/icon_question_1024x1024.png" alt="question.png" class="icon-question"
                                 title="Vous le trouverez sur l'appareil (ex : DOM1111)">
                        </td>
                    </tr>
                    <tr>
                        <td><label for="select-plante-type">Type de plante</label></td>
                        <td><select name="select-plante-type" id="select-plante-type">
                                <?php $plante = new Plante();
                                $plantes_type = $plante->getAllPlantType($bdd, "plante");
                                foreach ($plantes_type as $plante_type) { ?>
                                    <option value="<?= $plante_type['id_plante'] ?>"><?= $plante_type['nom_plante'] ?></option>
                                <?php } ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="select-arroseur-type">Type d'arroseur</label></td>
                        <td><select name="select-arroseur-type" id="select-arroseur-type">
                                <?php $types_arroseur = getAllArroseurType($bdd, $tableArroseurType);
                                foreach ($types_arroseur as $type_arroseur) { ?>
                                    <option value="<?= $type_arroseur['id_type_arroseur'] ?>"><?= $type_arroseur['nom_type_arroseur'] ?></option>
                                <?php } ?>
                            </select>
                        </td>
                    </tr>
                </table>
            </div>
            <input type="hidden" id="zone-id-add-arr" name="zone-id-add-arr" value="">
            <div class="modal-footer droite">
                <input type="submit" name="submit" value="Ajouter" class="btn-modal-submit text-medium">
            </div>
        </form>
    </div>
</div>
<div class="modal centre" id="modal-delete-maison">
    <div class="modal-content">
        <form action="index.php?cible=habitation&fonction=supprimer-maison" method="post">
            <div class="modal-header space-between">
                <h3>Voulez-vous vraiment supprimer cette maison ? </h3>
                <span class="close">&times;</span>
            </div>
            <input type="hidden" name="id-house" value="<?= $_SESSION['id_maison'] ?>">
            <div class="modal-footer centre">
                <input type="submit" name="submit" value="Supprimer" class="btn-modal-submit rouge text-medium">
                <input type="button" value="Annuler" class="btn-modal-submit text-medium"
                       onclick="document.getElementById('modal-delete-maison').style.display = 'none';">
            </div>
        </form>
    </div>
</div>
<div class="modal centre" id="modal-delete-zone">
    <div class="modal-content">
        <form action="index.php?cible=habitation&fonction=supprimer-zone" method="post">
            <div class="modal-header space-between">
                <h3>Voulez-vous vraiment supprimer cette zone ? </h3>
                <span class="close">&times;</span>
            </div>
            <input type="hidden" id="zone-id-delete-zone" name="zone-id-delete-zone" value="">
            <div class="modal-footer centre">
                <input type="submit" name="submit" value="Supprimer" class="btn-modal-submit rouge text-medium">
                <input type="button" value="Annuler" class="btn-modal-submit text-medium"
                       onclick="document.getElementById('modal-delete-zone').style.display = 'none';">
            </div>
        </form>
    </div>
</div>
