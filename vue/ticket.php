
 <? $date = date('Y-m-d H:i:s'); ?>
  <div class="ligne">
      <div class="col-gauche">

          <div class="v-haut header-user">
            Créez votre ticket
          </div>
            <form method="post" action="index.php?cible=&fonction=r" id="formticket">
                <input type="text" class="user-input" placeholder="Libellé du ticket" name="titre-ticket" width="28" required>
                <div class="adresse">
                    <input type="text" class='user-input' placeholder="Nom" name="nom-utilisateur" value="Ba" width="28" disabled>
                    <input type="text" class='user-input' placeholder="Prenom" name="prenom-utilisateur" value="<?php echo $_SESSION['user_name']; ?>" width="28" disabled>
                </div>
                <br>
                <div class="adresse">
                  <input id="id-util" class='user-input' type="text" name="identifiant-utilisateur" value="<?php echo "000".$_SESSION['user_id']; ?>" width="28" disabled>
                  <input type="text" class='user-input' value="<?php echo date('Y-m-d'); ?>" width="28"  disabled/>
                </div>
                <br>
                <input type="file" class='user-input' name="passwd-utilisateur2" width="28" required>
                <textarea  rows="4" cols="50" class="areaticket" form="formticket" name="message"placeholder="entrez votre message"></textarea>

                <div class="v-bas">
                    <input id="suivant" name="Transmettre" class="boutonConnexion" type="submit" >
                </div>
            </form>
        </fieldset>
        </div>

        <div class="col-droite">
          <div class="v-haut header-user"><?php echo $_SESSION['user_id'];?> </div><br/>
              <?php $tickets = displayTicket($bdd, $tableTicket);
              foreach ($tickets as $ticket){?>
                <div class="ticket">
                     <strong>Ticket : <?= $ticket['titre_ticket']?></strong><br/>
                </div><br/>
          <?php } ?>
        </div>
  </div>
