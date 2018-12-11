<div class="ligne">
    <div class="col-gauche">
        <div class="maison">
            <div class="sticky-header-maisons">
                Voici vos maisons :
            </div>
                <?php include('../vue/db/process_gestion.php'); ?>
            <?php//$habitation['nom_habit']; ?>
        </div>        
    </div>

    <div class="col-droite v-centre column centre">
            <button class="gestionbutton" style="vertical-align:middle"><span>Céder votre maison </span></button>
            <button class="gestionbutton" style="vertical-align:middle" onclick="resiliation();"><span>Résilier votre abonnement</span></button>
            <button class="gestionbutton" style="vertical-align:middle"><span>Accepter la gestion</span></button>
        </div>
    </div>
</div>