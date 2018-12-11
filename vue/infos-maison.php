<div>
    <a class="back-button" href="javascript:history.back();">Retour</a>
    <br><br>
</div>
<div class="ligne">
    <div class="col-gauche">
        <h1 class="centre">Informations</h1>
        <form action="">
            <div class="row centre arroseur-info">
                <div class="col">
                    Adresse <br>
                    <input type="text" placeholder="<?= $maisonInfo['numero_habit'] . " " . $maisonInfo['rue_habit'];?>" disabled>
                </div>
            </div>
            <div class="row centre arroseur-info">
                <div class="div col">
                    Ville <br>
                    <input type="text" placeholder="<?= $maisonInfo['code_postal_habit'] . " " . $maisonInfo['ville_habit'];?>" disabled>
                </div>
            </div>
            <div class="row centre arroseur-info">
                <div class="div col">
                    Date de création <br>
                    <input type="text" placeholder="<?= date('d M Y, H:m:s', strtotime($maisonInfo['date_ajout_habit']));?>" disabled>
                </div>
            </div>
        </form>
    </div>
    <div class="col-droite">
        <h1 class="centre">Utilisateurs associés à la maison</h1>
    </div>
</div>