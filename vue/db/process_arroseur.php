<?php

    $arroseurQuery = $bdd->query("SELECT * FROM arroseur WHERE id_habit =" .$maison['id_habit']);
    while ($arroseur = $arroseurQuery->fetch(PDO::FETCH_ASSOC))
    {
    ?>
        <div class="arroseur">
            <div class="space-between">
                <div class="nom-arroseur">
                    <a href="index.php?cible=habitation&fonction=infos-arroseur&name_arroseur=<?= $arroseur['id_arr'];?>">
                        <?= $arroseur['nom_arr']; ?>
                    </a>
                </div>
                <div class="toggle-button">
                    <input id="<?= "maison" . $arroseur['id_habit'] . "-arroseur" . $arroseur['id_arr']; ?>"
                           type="checkbox" class="arroseur-checkbox" name="button"
                           <?php if ($arroseur['etat_arr']) { ?>checked<?php } else {} ?>>
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
    <?php
    }

?>
