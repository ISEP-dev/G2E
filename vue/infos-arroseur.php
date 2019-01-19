<div>
    <a class="back-button" href="javascript:history.back(-1);">Retour</a>
    <br><br>
</div>
<div class="ligne">
    <div class="col-gauche">
        <h1 class="centre">Informations</h1>
        <table>
            <tr>
                <td><label for="select-plant">Type de plante : </label></td>
                <td>
                    <select name="select-plant" id="select-plant" onchange="">
                        <?php
                        $plante       = new Plante();
                        $plantes_type = $plante->getAllPlantType($bdd, $plante->tablePlante);
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
                <td><input type="text" placeholder="Fréquence d'arrosage" value="<?= $planteArr['frequence_plante'] ?>"
                           disabled></td>
                <td class="td-centre"></td>
                <td>Numéro de série :</td>
                <td class="b"><?= $arr['numero_serie_arr']; ?></td>

            </tr>
            <tr>
                <td></td>
                <td><input type="text" placeholder="Saison" value="<?= $planteArr['saison_plante'] ?>" disabled></td>
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
                <td><input type="text" placeholder="Temps d'arrosage" value="<?= $planteArr['temps_arrosage_plante'] ?>"
                           disabled></td>
                <td class="td-centre"></td>
                <td>Date d'ajout de l'arroseur :</td>
                <td class="b"><?= date('d M Y, H:m:s', strtotime($arr['date_ajout_arr'])); ?></td>
            </tr>
        </table>
        <h1 class="centre">Capteurs</h1>
        <table class="centre">
            <?php
            $capteur      = new Capteur();
            $capteursType = $capteur->getCapteurType($bdd);
            /*Todo : refactoring for test checked and checkbox*/
            // Check température (id = 3)
            if ($capteur->checkCapteurStatus($bdd, $capteur->tableCapteur, $arr['id_arr'], 3)['COUNT(1)'] == 1) {
                $checkedTemp = "checked";
            } else {
                $checkedTemp = "";
            }
            // Check humidité (id = 4)
            if ($capteur->checkCapteurStatus($bdd, $capteur->tableCapteur, $arr['id_arr'], 4)['COUNT(1)'] == 1) {
                $checkedHumi = "checked";
            } else {
                $checkedHumi = "";
            }
            // Check présence (id = 7)
            if ($capteur->checkCapteurStatus($bdd, $capteur->tableCapteur, $arr['id_arr'], 7)['COUNT(1)'] == 1) {
                $checkedPres = "checked";
            } else {
                $checkedPres = "";
            }
            ?>
            <tr>
                <td><input type="checkbox" id="checkbox-capteur-3"
                           onclick="updateAvailableCapteurArroseur(this);" <?= $checkedTemp ?>></td>
                <td><label for="checkbox-capteur-3">Capteur de température</label></td>
            </tr>
            <tr>
                <td><input type="checkbox" id="checkbox-capteur-4"
                           onclick="updateAvailableCapteurArroseur(this);" <?= $checkedHumi ?>></td>
                <td><label for="checkbox-capteur-4">Capteur d'humidité</label></td>
            </tr>
            <tr>
                <td><input type="checkbox" id="checkbox-capteur-7"
                           onclick="updateAvailableCapteurArroseur(this);" <?= $checkedPres ?>></td>
                <td><label for="checkbox-capteur-7">Capteur de présence</label></td>
            </tr>
            <input type="hidden" id="id-arr" data-idarr="<?= $arr['id_arr'] ?>">
        </table>
        <br><br>
        <div class="centre">
            <!--            <a href="" class="btn">Enregistrer les modifications</a>-->
            <!--            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-->
            <a id="delete-arroseur" data-idarr="<?= $arr['id_arr'] ?>" class="btn-red cursor"
               onclick="deleteArroseur(this);">Supprimer
                l'arroseur</a>
        </div>
    </div>
    <div class="col-droite">
        <div class="v-haut header-user">
            Créez votre ticket
        </div>
        <form method="POST" action="index.php?cible=utilisateurs&fonction=ajoutTicket" id="formticket">
            <input type="text" class="user-input" placeholder="Libellé du ticket" name="titre-ticket" width="28"
                   required>
            <input type="text" class='user-input' placeholder="Prenom" name="prenom-utilisateur"
                   value="<?= $_SESSION['user_name']; ?>" width="28" disabled>
            <br>
            <div class="adresse">
                <label for="id-util"></label>
                <input type="text" id="id-util" class='user-input' name="identifiant-utilisateur"
                       value="<?= $_SESSION['user_id']; ?>" width="28" disabled>
                <label for="current-date"></label>
                <input type="text" id="current-date" class='user-input'
                       value="<?= strftime("Le %d %B %G, à %H:%M:%S") ?>" width="28"
                       disabled/>
            </div>
            <br>
            <input type="file" class='user-input' name="fichier-ticket" width="28" required>
            <textarea rows="4" cols="50" class="areaticket" form="formticket" name="message-ticket"
                      placeholder="entrez votre message"></textarea>

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
            <div class="modal-footer droite">
                <input type="submit" name="submit" value="Supprimer" class="btn-modal-submit rouge">
                <input type="button" value="Annuler" class="btn-modal-submit"
                       onclick="document.getElementById('modal-delete-arroseur').style.display = 'none';">
            </div>
        </form>
    </div>
</div>