<script type="text/javascript" src="vue/js/ticket.js"></script>
<div>
    <a class="back-button" href="javascript:history.back();">Retour</a>
    <br><br>
</div>
<?php $date = date('Y-m-d H:i:s'); ?>
<div class="ligne">
    <div class="col-gauche" style="overflow-y: scroll; -webkit-overflow-scrolling: touch;">
        <div class="v-haut header-user">
            Liste de vos tickets :
        </div>
        <br/>
        <?php $tickets = displayTicket($bdd, $tableTicket);
        foreach ($tickets as $ticket) {
            ?>
            <div class="ticket" value="<?= $ticket['id_ticket'] ?>" onclick="showTicket(<?= $ticket['id_ticket'] ?>)">
                <strong>Ticket : <?= $ticket['titre_ticket'] ?></strong><br/>
            </div><br/>
        <?php } ?>
    </div>
    <div class="col-droite">
        <div id="showTick">
        </div>
    </div>
</div>
