<div class="ligne">
    <div class="col-gauche">
        <div class="rdv">
            <div class="sticky-header-rendezvous">
                <label>
                    Selectionner une date :
                    <input type="date" name="date">
                </label>
                <hr>
            </div>
            <?php

                $mysqli = new mysqli("localhost", "root", "", "g2e") or die("Erreur : " .$mysqli->error);
                $ticketQuery = $mysqli->query("SELECT * FROM ticket WHERE id_util = 1;");
                while ($tickets = $ticketQuery->fetch_assoc())
                {
            ?>
                <div class= "rendezvous space-between" >
                    <div class="nom-rendezvous">
                        <?= $tickets['titre_ticket']; ?>
                    </div>
                    <a href="" title="Supprimer">
                        <img class="poubelle" src="vue/images/poubelle.png" alt="poubelle.png" style="width:25px;height:25px;">
                    </a>
                </div>
                    <?php
                } # End of while
            ?>
            </div>
        </div>

    <div class="col-droite">
        <h1 class="v-centre">Fiche client </h1>
        <div class="space-between">
            <h2 class="v-centre">Nom</h2>
            <h2 class="v-centre">Prenom</h2>
        </div>
        <h4 class="v-centre">Adresse</h4>
        <div class="space-between">
            <h2 class="v-centre">Ville</h2><h2 class="v-centre">Code postal</h2>
        </div>
        <h4 class="v-centre">Numéro de téléphone</h4>
    </div>
</div>