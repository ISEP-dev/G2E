<div>
    <a class="back-button" href="index.php">Retour</a>
    <br><br>
</div>
<div class="ligne">
    <div class="col-gauche">
        <div class="maison">
            <div class="header-maisons">
                Voici vos maisons :
            </div>
            <br>
            <?php foreach ($maisons as $maison) { ?>
                <a class="user-maison cursor" onclick="showHouseInfo(<?= $maison['id_habit'] ?>);">
                    <div class="space-between">
                        <h2 class="titre-maison"><?= $maison['nom_habit'] ?> </h2>
                        <div class="v-centre arrow-maison"> ></div>
                    </div>
                    <hr>
                </a>
            <?php } ?>
        </div>
    </div>
    <div class="col-droite">
        <div id="info-maison"></div>
    </div>
</div>

<div class="modal centre" id="modal-ceder-maison">
    <div class="modal-content">
        <form action="index.php?cible=gestion&fonction=ceder-maison" method="post">
            <div class="modal-header space-between">
                <h3>Ceder cette maison</h3>
                <span class="close">&times;</span>
            </div>
            <div class="modal-body">
                <div class="centre column new-owner">
                    <h2 class="centre">Nouveau propriétaire</h2>
                    <label for="mail"> Adresse mail :</label>
                    <input type="email" id="mail" name="mail" required>
                    <br>
                </div>
            </div>
            <div class="modal-footer centre">
                <input type="submit" name="submit" class="btn-red" value="Ceder votre maison">
            </div>
            <input type="hidden" id="id-maison-ceder" name="id-maison-ceder" value="">
        </form>
    </div>
</div>