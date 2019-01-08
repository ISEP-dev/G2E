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
                <td><!--
                    <form id="form-plante-select-arr"
                          action="index.php?cible=habitation&fonction=config-arroseur&id=<?= $arr['id_arr'] ?>"
                          method="post">-->
                    <select name="select-plant" id="select-plant" onchange="">
                        <?php
                        $plante       = new Plante();
                        $plantes_type = $plante->getAllPlantType($bdd, $plante->tablePlante);
                        foreach ($plantes_type as $plante_type) { ?>
                            <option value="<?= $plante_type['id_plante'] ?>"><?= $plante_type['nom_plante'] ?></option>
                        <?php } ?>
                    </select>
                    </form>
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
                <td class="b"><?php if ($arr['etat_arr'] == 0) {
                        echo "<div class='text-off'>Eteint</div>";
                    } else {
                        echo "<div class='text-on'>Allumé</div>";
                    } ?></td>

            </tr>
            <tr>
                <td></td>
                <td><input type="text" placeholder="Temps d'arrosage" value="<?= $planteArr['temps_arrosage_plante'] ?>"
                           disabled></td>
                <td class="td-centre"></td>
                <td>Date d'ajout de l'arroseur :</td>
                <td class="b"><?= date('d M Y, H:m:s', strtotime($arr['date_ajout_arr'])); ?></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>

        </table>
        <br><br>
        <div class="centre">
            <a href="" class="btn">Enregistrer les modifications</a>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="" class="btn-red">Supprimer l'arroseur</a>
        </div>
    </div>
    <div class="col-droite centre">
        <form action="">
        </form>
    </div>
</div>