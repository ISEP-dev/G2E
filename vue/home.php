<?php if (!isset($_SESSION['user_id'])) { ?>
    <div class="ligne">
        <div class="col-gauche">
            <div class="v-haut header-user">
                <h2> Se connecter </h2>
            </div>
            <br><br><br><br>
            <div class="centre">
                <form action="index.php?cible=utilisateurs&fonction=connexion" method="post">
                    <label for="input_login">Login: </label>
                    <input id="input_login" type="text" placeholder="Entrez un identifiant" name="identifiant" required>
                    <label for="input_password">Mot de passe: </label>
                    <input id="input_password" type="password" placeholder="Entrez un mot de passe" name="motdepasse"
                           required>
                    <br>
                    <label for="check_remember">Se souvenir: </label>
                    <input id="check_remember" type="checkbox" checked="checked" name="remember">
                    <div class="droite">
                        <label>
                            <a href="#">Mot de passe oublié?</a>
                        </label>
                    </div>
                    <input type="submit" value="Connexion" align="center" class="boutonConnexion"/>
                </form>
            </div>
        </div>
        <div class="col-droite">
            <div class="v-haut header-user">
                <h2>S'inscrire</h2>
                <br>
            </div>
            <br>
            <div class="v-centre">
                <form method="post" action="index.php?cible=utilisateurs&fonction=ajouter">
                    <div class="adresse">
                        <input type="text" placeholder="Nom" name="nom-utilisateur" width="28" required>
                        <input type="text" placeholder="Prenom" name="prenom-utilisateur" width="28" required>
                    </div>
                    <div class="adresse">
<!--                        <input type="text" placeholder="N° de Rue" name="rue" width="28" required>-->
<!--                        <input type="text" placeholder="Nom de la voie" name="voie" width="28" required>-->
                        <input type="text" class="form-control" id="adresse-autocomplete" name="adresse-autocomplete" placeholder="Adresse postal" onkeypress="refuserToucheEntree(event);">
                        <input type="hidden" name="street_number" id="street_number">
                        <input type="hidden" name="route" id="route">
                        <input type="hidden" name="locality" id="locality">
                        <input type="hidden" name="coor-lat" id="latitude">
                        <input type="hidden" name="coor-lng" id="longitude">
                    </div>
                    <input type="text" placeholder="Complement d'adresse (facultatif)" name="complement" width="28">
                    <input id="mail" type="text" placeholder="Adresse mail" name="email-utilisateur" width="28"
                           required>
                    <input type="text" placeholder="Téléphone" name="numero-utilisateur" width="28" required>
                    <input type="password" placeholder="Entrez un mot de passe" name="password-utilisateur" width="28"
                           required>
                    <input type="password" placeholder="Confirmez le" name="passwd-utilisateur2" width="28"
                           required>
                    <select name="type-utilisateur">
                        <option value="1"> Utilisateur  </option>
                        <option value="2"> Technicien   </option>
                        <option value="3"> Commercial   </option>
                        <option value="4"> Mairie </option>
                    </select>
                    <input type="checkbox" id="cgu_check" name="cgu_check">
                    <label for="cgu_check">
                        Accepter les CGU
                    </label>
                    <div class="v-bas">
                        <input id="suivant" name="submit" class="boutonInscription" type="submit">
                    </div>
                </form>
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
