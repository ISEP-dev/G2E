<?php
    $mysqli = new mysqli("localhost", "root", "", "g2e");

    $ticketQuery = $mysqli->query("SELECT * FROM  ticket");
    while ($ticket = $ticketQuery->fetch_assoc())    
    {
    ?>
    <div class="rendezvous space-between" >
        <div class="nom-rendezvous">
            <?= $ticket['titre_ticket'] ?>
        </div>
        <a href="" title="Supprimer"><img class="poubelle" src="../vue/images/poubelle.png" alt="poubelle.png" style="width:25px;height:25px;"></a>  
    </div>
    <?php
    }
?>
