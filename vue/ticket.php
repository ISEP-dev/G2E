<script type="text/javascript" src="vue/js/ticket.js"></script>
 <? $date = date('Y-m-d H:i:s'); ?>
  <div class="ligne">
      <div class="col-gauche" style="overflow-y: scroll; -webkit-overflow-scrolling: touch;">
          <div class="v-haut header-user">
            Créez votre ticket
          </div>
          <br/>
              <?php $tickets = displayTicket($bdd, $tableTicket);
              foreach ($tickets as $ticket){?>
                <div class="ticket" value="<?= $ticket['id_ticket']?>" onclick="showTicket(<?= $ticket['id_ticket'] ?>)">
                     <strong>Ticket : <?= $ticket['titre_ticket']?></strong><br/>
                </div><br/>
          <?php } ?>
      </div>

        <div class="col-droite">
          <div id="showTick">
          </div>

        </div>

  </div>
