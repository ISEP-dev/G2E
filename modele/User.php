<?php

require_once "Database.php";

class User extends Database
{

    public $tableUsers  = 'utilisateur';
    public $tableTicket = 'ticket';

    function connection_to_site(string $table)
    {
        if (isset($_POST['identifiant']) && isset($_POST['motdepasse'])) {
            $email  = $_POST['identifiant'];
            $passwd = $_POST['motdepasse'];
            $stmt   = $this->bdd->prepare("SELECT * FROM " . $table . " WHERE email_util=?");
            $stmt->execute([$email]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($user['mdp_util'] == password_verify($passwd, $user['mdp_util'])) {
                if ($_SERVER['SERVER_NAME'] == "localhost") {
                    if (isset($_POST['remember'])) {
                        setcookie("email", $email, false, "/", false);
                    } else {
                        setcookie("email", "", false, "/", false);
                    }
                } else {
                    if (isset($_POST['remember'])) {
                        setcookie('email', $email, time() + 7 * 24 * 3600, null, null, false, true);
                    } else {
                        setcookie('email', "", time() + 7 * 24 * 3600, null, null, false, true);
                    }
                }
                // on enregistre les paramètres de notre visiteur comme variables de session
                $_SESSION['user_name'] = $user['nom_util'] . " " . $user['prenom_util'];
                $_SESSION['user_id']   = $user['id_util'];
                switch ($user['type_util']) {
                    case 1:
                        // Utilisateur
                        Database::redirect("habitation", "accueil");
                        break;
                    case 2:
                        // Technicien
                        Database::redirect("planning", "accueil");
                        break;
                    case 3:
                        // Commercial
                        Database::redirect("Commercial", "accueil");
                        break;
                    case 4:
                        // Gestionnaire
                        Database::redirect("Mairie", "accueil");
                        break;
                    default:
                        header("Location: index.php");
                        break;
                }
            } else {
                echo "<script>history.back();
                                window.createNotification({
                                    positionClass: 'nfc-top-center',
                                    showDuration: 3000,
                                    theme: 'warning'
                                })({
                                    title: 'Connexion',
                                    message: 'Mot de passe invalide'
                                });</script>";
            }
        } else {
            echo "<script>history.back();
                                window.createNotification({
                                    positionClass: 'nfc-top-center',
                                    showDuration: 3000,
                                    theme: 'warning'
                                })({
                                    title: 'Connexion',
                                    message: 'Utilisateur non reconnu'
                                });</script>";

        }
    }

    function addUsers(string $table)
    {
        $userEmail       = $_POST['email-utilisateur'];
        $userPhoneNumber = $_POST['numero-utilisateur'];
        $insertArray     = array(
            'nom_util'     => $_POST['nom-utilisateur'],
            'prenom_util'  => $_POST['prenom-utilisateur'],
            'email_util'   => $userEmail,
            'mdp_util'     => password_hash($_POST['password-utilisateur'], PASSWORD_BCRYPT),
            'tel_util'     => $userPhoneNumber,
            'type_util'    => $_POST['type-utilisateur'],
            'creee_a_util' => date('Y-m-d H:i:s')
        );
        //On test l'email
        if (filter_var($userEmail, FILTER_VALIDATE_EMAIL)) {
            // On test le numéro de téléphone
            if (preg_match("/^0[1-7]{1}(([0-9]{2}){4})|((\s[0-9]{2}){4})|((-[0-9]{2}){4})$/", $userPhoneNumber)) {
                $addUserQuery = Database::insert($this->bdd, $table, $insertArray);
                if (!$addUserQuery) {
                    // Erreur d'ajout d'un utilisateur
                    die("Une erreur est survenue lors de l'ajout de votre user, veuillez ré-essayer \n" . $this->bdderrorInfo());
                } else {
                    // Tout s'est bien passé on redirige où on veut
                    echo "<script>window.createNotification({
                                    positionClass: 'nfc-top-center',
                                    showDuration: 3000,
                                    theme: 'success'
                                })({
                                    title: 'Création de compte',
                                    message: 'Votre compte a bien été créé'
                                });</script>";
                }
            } else {
                echo "<script>window.createNotification({
                                    positionClass: 'nfc-top-center',
                                    showDuration: 3000,
                                    theme: 'success'
                                })({
                                    title: 'Création de compte',
                                    message: 'Numéro de téléphone invalide'
                                });</script>";
                // puis on le redirige vers la page d'accueil
                //echo '<meta http-equiv="refresh" content="0;URL=index.php">';
            }
        } else {
            echo "<script>window.createNotification({
                                    positionClass: 'nfc-top-center',
                                    showDuration: 3000,
                                    theme: 'success'
                                })({
                                    title: 'Création de compte',
                                    message: 'Adresse mail invalide '
                                });</script>";
            // puis on le redirige vers la page d'accueil
            //echo '<meta http-equiv="refresh" content="0;URL=index.php">';
        }
    }

    function createTicket(string $tableTicket)
    {
        $insertArray    = array(
            'titre_ticket'   => $_POST['titre-ticket'],
            'contenu_ticket' => $_POST['message-ticket'],
            'fichier_ticket' => $_POST['fichier-ticket'],
            'date_ticket'    => date('Y-m-d H:i:s'),
            'id_util'        => $_SESSION['user_id']
        );
        $addTicketQuery = Database::insert($this->bdd, $tableTicket, $insertArray);
        if (!$addTicketQuery) {
            // Erreur d'ajout d'un utilisateur
            die("Une erreur est survenue lors de l'ajout de votre user, veuillez ré-essayer \n");
        } else {
            // Tout s'est bien passé on redirige où on veut
            Database::redirect("habitation", "accueil");
        }
    }

    function displayTicket(string $tableTicket)
    {
        //$idUtil = $_SESSION['user_id'];{
        return $this->bdd->query("SELECT  * FROM " . $tableTicket . " WHERE id_util=" . $_SESSION['user_id']);
        // return selectAll($bdd, $table);
    }

    function getUserTicket(string $table, $idTicket)
    {
        $resultQuery = $this->bdd->query("SELECT * FROM " . $table . " WHERE id_ticket='" . $idTicket . "'");

        foreach ($resultQuery as $ticket) {
            echo "<div class='v-haut header-user'>ticket n°000" . $ticket['id_ticket'] . "</div>";
            echo "<br/><br/>";
            echo "<strong> Date de création de l'incident :</strong>" . date(' \L\e d M Y à H:m', strtotime($ticket['date_ticket'])) . "";
            echo "<br/><br/>";
            echo "<h3> Intitulé du ticket: </h3>" . $ticket['titre_ticket'];
            echo "<br/><br/>";
            echo "<blockquote>" . $ticket['contenu_ticket'] . "</blockquote>";
            echo "<br/><br/>";
            echo $ticket['fichier_ticket'];
            echo "<br/><br/>";
        }
    }
}