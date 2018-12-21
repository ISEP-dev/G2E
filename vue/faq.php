<script src="vue/js/cgu.js" defer async></script>
<?php if (!isset($_SESSION['user_id'])) { ?>
    <div class="ligne">
        <div class="col-gauche">
            <div class="v-haut header-user">
                <h2> Foire aux questions </h2>
            </div>
            <br><br><br><br>
            <div class="centre">

            </div>
        </div>
        <div class="col-droite">
            <div class="v-haut header-user">
                <h2>Posez vos questions</h2>
                <br>
            </div>
            <br>
            <div class="v-centre">
                <form method="post" action="index.php?cible=utilisateurs&fonction=ajouter">
                  <h4>Soumettez une question: </h4>
                  <input type="text" placeholder="posez votre question" required/>
                </form>
            </div>
        </div>
    </div>
  <!-- MOT DE PASSE OUBLIE -->
  <div class="modal centre" id="forget_passwd">
    <div class="modal-content">
  <!--    <script>console.log(document.getElementById("test").textContent)</script>-->
    <div class="modal-header">
      <span class="close-passwd">&times;</span>
      <div class="centre">
        <h5>Récupérez votre mot de passe</h5>
      </div>
    </div>
      <div class="modal-body">
            <p> afin de récupérer votre mot de passe, entrez votre adresse mail.</br>
              Un mot de passe vous sera envoyé par mail</p>
            <form method="POST" action="#">
              <input type="text" placeholder="entrez votre adresse mail" name="mail-user"/>
              <input type="submit" class="boutonConnexion"/>
            </form>
      </div>
      <div class="modal-footer droite">
        Cliquez à l'extérieur de la popup pour quitter les CGU.
      </div>
  </form>
</div>
  </div>
  <!-- MODAL DE CGU -->
  <div class="modal centre" id="cgu">
      <div class="modal-content">
    <!--    <script>console.log(document.getElementById("test").textContent)</script>-->
        <div class="modal-header">
            <span class="close-cgu">&times;</span>
            <h5>Conditions générales d'utilisation: </h5>
        </div>
        <div class="modal-body">
              <h1 class="v-haut header-user"> Article 1: Notion</h1>
              <p>
                Les présentes « conditions générales d'utilisation » ont pour objet l'encadrement juridique des modalités de mise à disposition des services du site [Nom du site] et leur utilisation par « l'Utilisateur ».
                Les conditions générales d'utilisation doivent être acceptées par tout Utilisateur souhaitant accéder au site. Elles constituent le contrat entre le site et l'Utilisateur. L’accès au site par l’Utilisateur signifie son acceptation des présentes conditions générales d’utilisation.
                Éventuellement :
                <ul>
                  <li>En cas de non-acceptation des conditions générales d'utilisation stipulées dans le présent contrat, l'Utilisateur se doit de renoncer à l'accès des services proposés par le site.</li>
                  <li>Ecorain se réserve le droit de modifier unilatéralement et à tout moment le contenu des présentes conditions générales d'utilisation.</li>
                </ul>
              </p>
              <h1 class="v-haut header-user"> Article 2: Définition </h1>
              <p>
                La présente clause a pour objet de définir les différents termes essentiels du contrat :
                <ul>
                  <li>Utilisateur : ce terme désigne toute personne qui utilise le site ou l'un des services proposés par le site.</li>
                  <li>Contenu utilisateur : ce sont les données transmises par l'Utilisateur au sein du site.</li>
                  <li>Membre : l'Utilisateur devient membre lorsqu'il est identifié sur le site.</li>
                  <li>Identifiant et mot de passe : c'est l'ensemble des informations nécessaires à l'identification d'un Utilisateur sur le site. L'identifiant et le mot de passe permettent à l'Utilisateur d'accéder à des services réservés aux membres du site. Le mot de passe est confidentiel.</li>
                </ul>
              </p>
              <h1 class="v-haut header-user"> Article 3: Accès aux services </h1>
              <p>
                Le site permet à l'utilisateur un accès gratuit aux services suivants :
                <strong>[Gestion de l'arrosage] ;</strong>
                <strong>[Accès aux statistiques] ;</strong>
                <strong>[Données de consommation] ;</strong>
                <strong>[publication de commentaires] ;</strong>
                […].
                Le site est accessible gratuitement en tout lieu à tout Utilisateur ayant un accès à Internet. Tous les frais supportés par l'Utilisateur pour accéder au service (matériel informatique, logiciels, connexion Internet, etc.) sont à sa charge.
                Selon le cas :
                <ul>
                  <li>L’Utilisateur non membre n'a pas accès aux services réservés aux membres. Pour cela, il doit s'identifier à l'aide de son identifiant et de son mot de passe.</li>
                  <li>Le site met en œuvre tous les moyens mis à sa disposition pour assurer un accès de qualité à ses services. L'obligation étant de moyens, le site ne s'engage pas à atteindre ce résultat.</li>
                  <li>Tout événement dû à un cas de force majeure ayant pour conséquence un dysfonctionnement du réseau ou du serveur n'engage pas la responsabilité de [Nom du site].</li>
                  <li>L'accès aux services du site peut à tout moment faire l'objet d'une interruption, d'une suspension, d'une modification sans préavis pour une maintenance ou pour tout autre cas. L'Utilisateur s'oblige à ne réclamer aucune indemnisation suite à l'interruption, à la suspension ou à la modification du présent contrat.</li>
                  <li>L'Utilisateur a la possibilité de contacter le site par messagerie électronique à l’adresse <strong>[contact.ecorain@messagerie.com]</strong>.
              </ul>
        </div>
        <div class="modal-footer droite">
          Cliquez à l'extérieur de la popup pour quitter les CGU.
        </div>
  </div>
    </div>

<?php } else {?>

    <h1><a href="index.php?cible=utilisateurs&fonction=planning">Planning</a></h1>
    <br>
    <h1><a href="index.php?cible=habitation&fonction=accueil">Arrosage</a></h1>
    <br>
    <h1><a href="index.php?cible=Commercial&fonction=accueil">Commercial</a></h1>
    <br>
    <h1><a href="index.php?cible=Mairie&fonction=accueil">Publication</a></h1>

    <h1>Mettre les différents produits ici</h1>
<!--  arroseur simple,   -->

<?php } ?>


<?php

/*
 TODO: Utiliser les polices adaptatives
 TODO: Barre de navigation
 */
?>
