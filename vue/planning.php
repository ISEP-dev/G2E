<?php $title = "Planning" ?>
<?php $head  = '<link rel="stylesheet" href="../vue/css/planning.css">'.
                '<script src="../vue/js/main.js" defer async></script>';
?>
<?php ob_start(); ?>
    <div class="ligne">

    
        <div class="col-gauche">
        <div class="rdv">
        <div class="sticky-header-rendezvous">
            Selectionner une date : <br><input type="date" name="date">
            <hr>
            </div>
            
                <div class= "rendezvous space-between" >
                    <div class="nom-rendezvous">
                        M. Dupond à (heure)
                    </div>
                    <a href="" title="Supprimer">
                    <img class="poubelle" src="../vue/images/poubelle.png" alt="poubelle.png" style="width:25px;height:25px;">
                    </a> 
               </div>  
                <div class="rendezvous space-between">
                    <div class="nom-rendezvous">
                        M. Dupond à (heure)
                    </div> 
                    <a href="" title="Supprimer">
                    <img class="poubelle" src="../vue/images/poubelle.png" alt="poubelle.png" style="width:25px;height:25px;">
                    </a> 
               </div> 
                <div class="rendezvous space-between">
                    <div class="nom-rendezvous">
                        M. Dupond à (heure)
                    </div> 
                    <a href="" title="Supprimer">
                    <img class="poubelle" src="../vue/images/poubelle.png" alt="poubelle.png" style="width:25px;height:25px;">
                    </a> 
               </div> 
                <div class="rendezvous space-between">
                    <div class="nom-rendezvous">
                        M. Dupond à (heure)
                    </div> 
                    <a href="" title="Supprimer">
                    <img class="poubelle" src="../vue/images/poubelle.png" alt="poubelle.png" style="width:25px;height:25px;">
                    </a>
                </div>
                <div class="rendezvous space-between">
                    <div class="nom-rendezvous">
                        M. Dupond à (heure)
                    </div> 
                    <a>
                    <a><img class="poubelle" src="../vue/images/poubelle.png" alt="poubelle.png" style="width:25px;height:25px;">
                </a>  
               
              </div>  
            </div>
        </div>

    <div class="col-droite">
        <h1 class="v-centre">Fiche client </h1>
        <div class="space-between">
            <h2 class="v-centre">Nom</h2>
            <h3 class="v-centre">Prenom</h2>
        </div>
        <h4 class="v-centre">Adresse</h4>
        <div class="space-between">
            <h2 class="v-centre">Ville</h2><h3 class="v-centre">Code postal</h2>
        </div>
        <h4 class="v-centre">Numéro de téléphone</h4>
    </div>
<?php $body = ob_get_clean(); ?>
<?php require('base.php'); ?>
