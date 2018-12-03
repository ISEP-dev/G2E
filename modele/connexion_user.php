<?php
/**
 * Created by Atom.
 * User: saliou
 * Date: 26/11/2018
 * Time: 10:28
 */

require "modele/fonctions.php" ;


$tableUsers = 'utilisateur';

function getUsers(PDO $bdd, string $table): array
{
    return selectAll($bdd, $table);

}
	// Récupère les champs du formulaire et connecte l'utilisateur sur index.php
function connection_to_site(PDO $bdd, string $table){
      // On définit un login et un mot de passe de base pour tester notre exemple. Cependant, vous pouvez très bien interroger votre base de données afin de savoir si le visiteur qui se connecte est bien membre de votre site
      // on teste si nos variables sont définies
      if (isset($_POST['identifiant']) && isset($_POST['motdepasse'])) {
      	// on vérifie les informations du formulaire, à savoir si le pseudo saisi est bien un pseudo autorisé, de même pour le mot de passe
          $email = $_POST['identifiant'];
          $passwd = $_POST['motdepasse'];
          $stmt = $bdd->prepare("SELECT email_util,mdp_util,id_util FROM utilisateur WHERE email_util=?");
          $stmt->execute([$email]);
          $login= $stmt->fetchAll();
          if($login){
              $stmt = $bdd->prepare("SELECT email_util,mdp_util FROM utilisateur WHERE mdp_util=?");
              $stmt->execute([$passwd]);
              $passwd = $stmt->fetchAll();
              if($passwd){
                // dans ce cas, tout est ok, on peut démarrer notre session
          		  // on la démarre :)
          		   session_start ();
          		  // on enregistre les paramètres de notre visiteur comme variables de session ($login et $pwd) (notez bien que l'on utilise pas le $ pour enregistrer ces variables)
          		   $_SESSION['login'] = $_POST['identifiant'];
          		   $_SESSION['passwd'] = $_POST['motdepasse'];
                 //$_SESSION['id'] = $_POST[]
          		// on redirige notre visiteur vers une page de notre section membre
          		   header("Location: index.php?cible=habitation&fonction=accueil");
              }
          }
          else{
          		// Le visiteur n'a pas été reconnu comme étant membre de notre site. On utilise alors un petit javascript lui signalant ce fait
          		echo '<body onLoad="alert(\'Membre non reconnu... entrez des identifiants valides\')">';
          		// puis on le redirige vers la page d'accueil
          		echo '<meta http-equiv="refresh" content="0;URL=index.php">';

          }

      }

}
?>
