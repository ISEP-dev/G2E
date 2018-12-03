<?php
/**
 * Created by Atom.
 * User: saliou
 * Date: 26/11/2018
 * Time: 10:28
 */

require "modele/fonctions.php" ;


$tableUser = 'utilisateur';

function getUsers(PDO $bdd, string $table): array
{
    return selectAll($bdd, $table);

}

function addUsers(PDO $bdd, string $table)
{
    $userFirstName = $_POST['nom-utilisateur'];
    $userLastName = $_POST['prenom-utilisateur'];
    $userEmail = $_POST['email-utilisateur'];
    $userPassword = $_POST['password-utilisateur'];
    $userPhoneNumber = $_POST['numero-utilisateur'];
    $userType = $_POST['type-utilisateur'];
    //$userCreationDate = NOW();
    //On test l'email
    if (filter_var($userEmail, FILTER_VALIDATE_EMAIL)) {
          // On test le numéro de téléphone
          if(preg_match("/^[0-9]{3}-[0-9]{4}-[0-9]{4}$/", $userPhoneNumber)){
            //Requête sql d'insertion dans la BDD
              $addUserQuery = $bdd->exec("INSERT INTO utilisateur(nom_util,prenom_util,email_util,mdp_util,tel_util,type_util)
                                          VALUES('$userFirstName', '$userLastName', '$userEmail', '$userPassword', '$userPhoneNumber', '$userType');"
                                        );
              if (!$addUserQuery) {
                  // Erreur d'ajout d'un utilisateur
                  die("Une erreur est survenue lors de l'ajout de votre user, veuillez ré-essayer \n" .$bdd->errorInfo);
              }
              else {
                  // Tout s'est bien passé on redirige où on veut
                  header("Location: index.php?cible=habitation&fonction=accueil");
              }
          }
          else{
            echo '<body onLoad="alert(\'Entrez un numéro de téléphone valide\')">';
            // puis on le redirige vers la page d'accueil
            echo '<meta http-equiv="refresh" content="0;URL=index.php">';
          }
    }
    else{
      echo '<body onLoad="alert(\'Entre un mail valide\')">';
      // puis on le redirige vers la page d'accueil
      echo '<meta http-equiv="refresh" content="0;URL=index.php">';
    }
}
