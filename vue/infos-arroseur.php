<div>
    <a class="back-button" href="index.php?cible=habitation&fonction=accueil">Retour</a>
    <br><br>
</div>
<div class="ligne">
    <div class="col-gauche">
        <div class="infos-capteur">
            <h1 class="centre">Informations</h1>
            <table>
                <tr>
                    <td><label for="select-plant">Type de plante : </label></td>
                    <td>
                        <select name="select-plant" id="select-plant" onchange="">
                            <?php
                            $plante       = new Plante();
                            $plantes_type = $plante->getAllPlantType($plante->tablePlante);
                            foreach ($plantes_type as $plante_type) { ?>
                                <option value="<?= $plante_type['id_plante'] ?>"><?= $plante_type['nom_plante'] ?></option>
                            <?php } ?>
                        </select>
                    </td>
                    <td class="td-centre"></td>
                    <td>Nom de l'arroseur :</td>
                    <td class="b"><?= $arr['nom_arr'] ?></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="text" placeholder="Fréquence d'arrosage"
                               value="<?= $planteArr['frequence_plante'] ?>"
                               disabled></td>
                    <td class="td-centre"></td>
                    <td>Numéro de série :</td>
                    <td class="b"><?= $arr['numero_serie_arr']; ?></td>

                </tr>
                <tr>
                    <td></td>
                    <td><input type="text" placeholder="Saison" value="<?= $planteArr['saison_plante'] ?>" disabled>
                    </td>
                    <td class="td-centre"></td>
                    <td>&Eacute;tat :</td>
                    <td class="b">
                        <?php if ($arr['etat_arr'] == 0) { ?>
                            <div class='text-off'>Eteint</div>
                        <?php } else { ?>
                            <div class='text-on'>Allumé</div>
                        <?php } ?></td>

                </tr>
                <tr>
                    <td></td>
                    <td><input type="text" placeholder="Temps d'arrosage"
                               value="<?= $planteArr['temps_arrosage_plante'] ?>"
                               disabled></td>
                    <td class="td-centre"></td>
                    <td>Date d'ajout de l'arroseur :</td>
                    <td class="b"><?= date('d M Y, H:m:s', strtotime($arr['date_ajout_arr'])); ?></td>
                </tr>
            </table>
            <br>
            <div class="centre">
                <a id="delete-arroseur" data-idarr="<?= $arr['id_arr'] ?>" class="btn-red cursor"
                   onclick="deleteArroseur(this);">Supprimer l'arroseur</a>
            </div>
            <hr>
            <h1 class="centre">Capteurs</h1>
            <div class="centre">
                <a class="btn cursor" onclick="addCapteur();">Ajouter un capteur</a>
            </div>
            <?php
            $capteur  = new Capteur();
            $capteurs = $capteur->getAllCapteurFromArroseur($arr['id_arr']);
            if ($capteurs->rowCount() > 0) {
                foreach ($capteurs as $capteurItem) {
                    if ($capteurItem['type_capt'] == 3) {
                        $image = "thermometer";
                    } else {
                        if ($capteurItem['type_capt'] == 5) {
                            $image = "luminosite";
                        } else {
                            if ($capteurItem['type_capt'] == 1) {
                                $image = "presence";
                            }
                        }
                    }
                    ?>
                    <div class="block-capteur">
                        <span class="close-block" onclick="deleteCapteur(this);"
                              data-type="<?= $capteurItem['type_capt'] . "-" . $capteurItem['number_capt'] ?>">&times;</span>
                        <h5><?= $capteur->beautifyBlockNameCapteur($capteurItem['type_capt'], $capteurItem['name_capt'], $capteurItem['number_capt']); ?> </h5>
                        <img src="vue/images/<?= $image ?>.png" alt="vue/images/<?= $image ?>.png" height="80">
                    </div>
                <?php }
            } else { ?>
                <div class="space-around b"><br>Aucun capteur associé à cet arroseur</div>
            <?php } ?>
        </div>
    </div>
    <div class="col-droite">
        <div class="v-centre header-user">
            Créez votre ticket
        </div>
        <form method="POST" action="index.php?cible=utilisateurs&fonction=ajoutTicket" id="formticket">
            <input type="text" class="user-input" placeholder="Libellé du ticket" name="titre-ticket" width="28"
                   required>
            <input type="text" class='user-input' placeholder="Prenom" name="prenom-utilisateur"
                   value="<?= $_SESSION['user_name']; ?>" width="28" disabled>
            <br>
            <div class="adresse">
                <label for="current-date"></label>
                <input type="text" id="current-date" class='user-input'
                       value="<?= strftime("Le %d %B %G, à %H:%M:%S") ?>" width="28"
                       disabled/>
            </div>
            <br>
            <input type="file" class='user-input' name="fichier-ticket" width="28" required>
            <label>
                <textarea rows="4" cols="50" class="areaticket" form="formticket" name="message-ticket"
                          placeholder="Entrez votre message"></textarea>
            </label>
            <div class="v-bas">
                <input id="suivant" name="Transmettre" class="boutonConnexion" type="submit">
            </div>
        </form>
    </div>
</div>
<div class="modal centre" id="modal-delete-arroseur">
    <div class="modal-content">
        <form action="index.php?cible=habitation&fonction=supprimer-arroseur" method="post">
            <div class="modal-header space-between">
                <h3>Voulez-vous vraiment supprimer cet arroseur ? </h3>
                <span class="close">&times;</span>
            </div>
            <input type="hidden" id="arr-id-delete-arr" name="arr-id-delete-arr" value="">
            <div class="modal-footer centre">
                <input type="submit" name="submit" value="Supprimer" class="btn-modal-submit rouge">
                <input type="button" value="Annuler" class="btn-modal-submit"
                       onclick="document.getElementById('modal-delete-arroseur').style.display = 'none';">
            </div>
        </form>
    </div>
</div>
<div class="modal centre" id="modal-add-capteur">
    <div class="modal-content">
        <form action="index.php?cible=habitation&fonction=add-capteur-to-arroseur" method="post">
            <div class="modal-header space-between">
                <h3>Ajouter un nouveau capteur</h3>
                <span class="close">&times;</span>
            </div>
            <div class="modal-body">
                <table>
                    <tr>
                        <td><label for="select-capteur">Type de capteur </label></td>
                        <td><select name="select-capteur" id="select-capteur"
                                    onchange="changePlaceholderCapteurName(this);" data-id="<?= $arr['id_arr'] ?>">
                                <?php
                                $capteur       = new Capteur();
                                $cptNumber     = $capteur->getCapteurNumber($arr['id_arr'], 3);
                                $capteurs_type = $capteur->getCapteurType();
                                foreach ($capteurs_type as $capteur_type) {
                                    $capteur->getCapteurNumber($arr['id_arr'], $capteur_type['id_type_capteur']);
                                    ?>
                                    <option value="<?= $capteur_type['id_type_capteur'] ?>"><?= ucfirst($capteur_type['nom_type_capteur']) ?></option>
                                <?php } ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="name-capt">Nom du capteur <span class="small-text">(optionnel)</span></label>
                        </td>
                        <td><input type="text" name="name-capt" id="name-capt" value="Température"></td>
                    </tr>
                    <tr>
                        <td><label for="input-add-capteur-nb">Numéro de capteur <span
                                        class="small-text">(optionnel)</span></label></td>
                        <td><input type="text" id="input-add-capteur-nb" name="input-add-capteur-nb"
                                   value="<?= $cptNumber + 1 ?>"></td>
                    </tr>
                </table>
            </div>
            <input type="hidden" id="id_arr" name="id_arr" value="<?= $arr['id_arr'] ?>">
            <div class="modal-footer droite">
                <input type="submit" name="submit" value="Ajouter" class="btn-modal-submit">
                <input type="button" value="Annuler" class="btn-modal-submit rouge"
                       onclick="document.getElementById('modal-add-capteur').style.display = 'none';">
            </div>
        </form>
    </div>
</div>
<div class="modal centre" id="modal-delete-capteur">
    <div class="modal-content">
        <form action="index.php?cible=habitation&fonction=supprimer-capteur" method="post">
            <div class="modal-header space-between">
                <h3>Voulez-vous vraiment supprimer ce capteur ?</h3>
                <span class="close">&times;</span>
            </div>
            <input type="hidden" name="id-arr" value="<?= $arr['id_arr'] ?>">
            <input type="hidden" id="delete-number-capt" name="delete-number-capt" value="">
            <input type="hidden" id="delete-type-capt" name="delete-type-capt" value="">
            <div class="modal-footer centre">
                <input type="submit" name="submit" value="Supprimer" class="btn-modal-submit rouge">
                <input type="button" value="Annuler" class="btn-modal-submit"
                       onclick="document.getElementById('modal-delete-capteur').style.display = 'none';">
            </div>
        </form>
    </div>
</div>