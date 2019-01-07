<form method="post" autocomplete="off">
    <input type="text" placeholder="Numéro client" id="search-client" name="search-client" style="margin-left: 50px" autofocus>
    <div class="triangle-up"></div>
    <div id="result-search-client" class="triangle"></div>
</form>
<br><br>
<div class="ligne">
    <div class="col-gauche">
        <div class="rdv">
            <h1 class="v-centre h3">Fiche client </h1>
            <div class="space-between">
                <h2 class="v-centre h3">Nom</h2>
                <h2 class="v-centre h3">Prenom</h2>
            </div>
            <h4 class="v-centre h3">Adresse</h4>
            <div class="space-between">
                <h2 class="v-centre h3">Ville</h2>
                <h2 class="v-centre h3">Code postal</h2>
            </div>
            <h4 class="v-centre h3">Numéro de téléphone</h4>
        </div>
    </div>

    <div class="col-droite">
        <h1 class="centre">Gestion des tickets</h1>
        <?php

        $mysqli = new mysqli("localhost", "root", "", "g2e") or die("Erreur : " . $mysqli->error);
        $ticketQuery = $mysqli->query("SELECT * FROM ticket WHERE id_util = " . $_SESSION['user_id']);
        while ($tickets = $ticketQuery->fetch_assoc()) {
            ?>
            <div class="rendezvous space-between">
                <div class="nom-rendezvous">
                    <?= $tickets['titre_ticket']; ?>
                </div>
                <a href="" title="Supprimer">
                    <img class="poubelle" src="vue/images/poubelle.png" alt="poubelle.png"
                         style="width:25px;height:25px;"/>
                </a>
            </div>
            <?php
        } # End of while
        ?>
    </div>
</div>