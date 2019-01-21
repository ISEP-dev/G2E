<!-- <form method="post" autocomplete="off">
    <input type="text" placeholder="Numéro client" id="search-client" name="search-client" style="margin-left: 50px" autofocus>
    <div class="triangle-up"></div>
    <div id="result-search-client" class="triangle"></div>
</form> -->
<script src="vue/js/planning.js" async></script>
<br><br>
<div class="ligne">
    <div class="col-gauche">
        <div class="rdv">
            <div class="sticky-header-rendezvous">
                <label>
                    Selectionner une date :
                    <input id="calendrier" type="date" name="date">
                </label>
                <hr>
            </div>
            <div class="result"></div>
            <?php
            /*foreach($tickets as $ticket){
                */ ?><!--
                <div class="rendezvous space-between">
                    <div class="nom-rendezvous">
                        <? /*= $ticket['titre_ticket']; */ ?>
                    </div>
                    --><?php
            /*            }*/
            ?>
            <br>

        </div>
    </div>

    <div class="col-droite">
        <h1 class="centre">Gestion des tickets</h1>
        <?php
        /*
                $mysqli = new mysqli("localhost", "root", "", "g2e") or die("Erreur : " . $mysqli->error);
                $ticketQuery = $mysqli->query("SELECT * FROM ticket WHERE id_util = " . $_SESSION['user_id']);
                while ($tickets = $ticketQuery->fetch_assoc()) {
                    */ ?><!--
            <div class="rendezvous space-between">
                <div class="nom-rendezvous">
                    <? /*= $tickets['titre_ticket']; */ ?>
                </div>
                <a href="" title="Supprimer">
                    <img class="poubelle" src="vue/images/poubelle.png" alt="poubelle.png"
                         style="width:25px;height:25px;"/>
                </a>
            </div>
            --><?php
        /*        } # End of while*/
        ?>
    </div>
</div>
