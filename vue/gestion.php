<div class="ligne">
    <div class="col-gauche">
        <div class="maison">
            <div class="header-maisons">
                Voici vos maisons :
            </div>
                <?php include('../vue/db/process_gestion.php'); ?>
            <?php//$habitation['nom_habit']; ?>
        </div>        
    </div>

    <div class="col-droite v-centre column centre">
            <button id="ceder-maison" class="gestionbutton">Céder votre maison</button>
            <button class="gestionbutton" onclick="resiliation();">Résilier votre abonnement</button>
            <button class="gestionbutton">Accepter la gestion</button>
        </div>
    </div>
</div>

<div class="modal centre" id="modal-ceder-maison">
    <div class="modal-content">
        <form action="index.php?cible=gestion&fonction=ceder-maison" method="post">
            <div class="modal-header">
                <span class="close">&times;</span>
                <h3>Ceder une maison</h3>
            </div>
            <div class="modal-body">
                <table>
                    <tr>
                        <td>Ceder une maison</td>
                        <td>
                            <select>
                            <option value="id_habit">Maison 1</option>
                            <option value="id_habit">Maison Principale</option>
                            </select>
                        </td>
                </table>
            </div>
            <div class="modal-footer droite">
                <input type="submit" name="submit" value="Ceder la maison">
            </div>
        </form>
    </div>
</div>
