<?php
/**
 * Requête liées à l'utilisateur
 * User: bastien
 * Date: 03/12/2018
 * Time: 16:36
 */
require "modele/fonctions.php";

$tableUsers = 'utilisateur';

function connection_to_site(PDO $bdd, string $table)
{
    if (isset($_POST['identifiant']) && isset($_POST['motdepasse'])) {
        $email  = $_POST['identifiant'];
        $passwd = $_POST['motdepasse'];
        $stmt   = $bdd->prepare("SELECT * FROM " . $table . " WHERE email_util=?");
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user['mdp_util'] == password_verify($passwd, $user['mdp_util'])) {
          if($_SERVER['SERVER_NAME'] == "localhost"){
				         if(isset($_POST['remember'])){
					              setcookie("email",$email,false,"/",false);
				         }
				         else {
					              setcookie("email","",false,"/",false);
				         }
			    }
          else {
            		  if(isset($_POST['remember'])){
            					setcookie('email', $email, time() + 7*24*3600, null, null, false, true);
            			}
            			else {
            					setcookie('email', "", time() + 7*24*3600, null, null, false, true);
            			}
          }
            // on enregistre les paramètres de notre visiteur comme variables de session
            $_SESSION['user_name'] = $user['nom_util'] . " " . $user['prenom_util'];
            $_SESSION['user_id']   = $user['id_util'];
            switch ($user['type_util']){
                case 1:
                    // Utilisateur
                    header("Location: index.php?cible=habitation&fonction=accueil");
                    break;
                case 2:
                    // Technicien
                    header("Location: index.php?cible=utilisateurs&fonction=planning");
                    break;
                case 3:
                    // Commercial
                    header("Location: index.php?cible=Commercial&fonction=accueil");
                    break;
                case 3:
                    // Gestionnaire
                    header("Location: index.php?cible=habitation&fonction=accueil");
                    break;
                default:
                    header("Location: index.php?cible=habitation&fonction=accueil");
                    break;
            }
        }
    } else {
        echo '<body onLoad="alert(\'Membre non reconnu... entrez des identifiants valides\')">';
        // On le redirige vers la page d'accueil
        echo '<meta http-equiv="refresh" content="0;URL=index.php">';

    }
}

function addUsers(PDO $bdd, string $table)
{
    $userFirstName    = $_POST['nom-utilisateur'];
    $userLastName     = $_POST['prenom-utilisateur'];
    $userEmail        = $_POST['email-utilisateur'];
    $userPassword     = password_hash($_POST['password-utilisateur'], PASSWORD_BCRYPT);
    $userPhoneNumber  = $_POST['numero-utilisateur'];
    $userType         = $_POST['type-utilisateur'];
    $userCreationDate = date('Y-m-d H:i:s');
    //On test l'email
    if (filter_var($userEmail, FILTER_VALIDATE_EMAIL)) {
        // On test le numéro de téléphone
        if (preg_match("/^0[1-7]{1}(([0-9]{2}){4})|((\s[0-9]{2}){4})|((-[0-9]{2}){4})$/", $userPhoneNumber)) {
            //Requête sql d'insertion dans la BDD
            $addUserQuery = $bdd->exec("INSERT INTO utilisateur(nom_util,prenom_util,email_util,mdp_util,tel_util,type_util,creee_a_util)
                                          VALUES('$userFirstName', '$userLastName', '$userEmail', '$userPassword', '$userPhoneNumber', '$userType', '$userCreationDate');"
            );
            if (!$addUserQuery) {
                // Erreur d'ajout d'un utilisateur
                die("Une erreur est survenue lors de l'ajout de votre user, veuillez ré-essayer \n" . $bdd->errorInfo());
            } else {
                // Tout s'est bien passé on redirige où on veut
                header("Location: index.php?cible=utilisateurs&fonction=accueil");
            }
        } else {
            echo '<body onload="alert(\'Entrez un numéro de téléphone valide\')">';
            // puis on le redirige vers la page d'accueil
            echo '<meta http-equiv="refresh" content="0;URL=index.php">';
        }
    } else {
        echo '<body onLoad="alert(\'Entre un mail valide\')">';
        // puis on le redirige vers la page d'accueil
        echo '<meta http-equiv="refresh" content="0;URL=index.php">';
    }
}
