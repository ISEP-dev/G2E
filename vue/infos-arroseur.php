<div>
    <a class="back-button" href="javascript:history.back();">Retour</a>
    <br><br>
</div>
<div class="ligne">
    <div class="col-gauche">
        <form action="">
            <div class="row centre arroseur-info">
                <div class="col">
                    <input type="text" placeholder="Type de plante" autocomplete="off">
                    <div class="result-autocomp-plante"></div>
                </div>
            </div>
            <div class="row centre arroseur-info">
                <div class="div col">
                    <input type="text" placeholder="Fréquence d'arrosage" disabled>
                </div>
            </div>
            <div class="row centre arroseur-info">
                <div class="div col">
                    <input type="text" placeholder="Saison" disabled>
                </div>
            </div>
            <div class="row centre arroseur-info">
                <div class="div col">
                    <input type="text" placeholder="Temps d'arrosage" disabled>
                </div>
            </div>
        </form>
    </div>
    <div class="col-droite centre">
        <form action="">
            <h1 class="centre">Informations</h1>
            <div class="row centre arroseur-info">
                <div class="col">
                    <label>
                        Numéro de série <br>
                        <input type="text" value="<?= $arr['numero_serie_arr'];?>" disabled>
                    </label>
                </div>
            </div>
            <div class="row centre arroseur-info">
                <div class="col">
                    <label>
                        Etat <br>
                        <input type="text" value="<?php if($arr['etat_arr']==0){ echo "Eteint";}else{echo "Allumé";}?>" disabled>
                    </label>
                </div>
            </div>
            <div class="row centre arroseur-info">
                <div class="col">
                    <label>
                        Date d'ajout de l'arroseur
                        <input type="text" value="<?= date('d M Y, H:m:s', strtotime($arr['date_ajout_arr']));?>" disabled>
                    </label>
                </div>
            </div>
        </form>
    </div>
</div>