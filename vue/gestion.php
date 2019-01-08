<link rel="stylesheet" href="css/gestion.css">


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
                            <select>
                            <option value="id_habit">Maison 1</option>
                            <option value="id_habit">Maison Principale</option>
                            </select>
                        <form id ="formulaire" action="gestion.php" method="post">
                            <h5>Nouveau propriétaire :</h5>
                            <label for="prenom">Prenom :</label>
                            <input type="prenom" id="prenom" name="prenom" />
                            <br>
                            <label for="mail">Nom :</label>
                            <input type="nom" id="nom" name="nom" />
                            <br>
                            <label for="mail"> Adresse Mail :</label>
                            <input type="mail" id="mail" name="mail" />
                            <br>
                        </form>
                    
                </table>
            </div>
            <div class="modal-footer droite">
                <input type="submit" onclick="controle();" name="submit" value="Ceder la maison">
            </div>
        </form>
    </div>
</div>
