<div>
    <ul>
        <li><a href="index.php?cible=Commercial&fonction=stat_temp">Statistiques temporelles</a></li>
        <li><a href="">Statistiques géographiques</a></li>
        <li><a href="index.php?cible=Commercial&fonction=accueil">Informations clients</a></li>
    </ul>
</div>
<br><br>
<div class="ligne">
    <div class="col-gauche">
        <form id="" class="" action="index.html" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
            <h1 class="centre">Chercher un client</h1>
            <hr>
            <label for="Nom"> &nbsp;</label>
            <input type="text" id="Nom" name="Nom" placeholder="Nom" required>
            <label for="Prénom"> &nbsp;</label>
            <input type="text" id="Prénom" name="Prénom" placeholder="Prénom" required>

            <label for="Numéro téléphone"> &nbsp;</label>
            <input type="text" id="Numéro téléphone" name="Numéro téléphone" placeholder="Numéro téléphone" required>
            <br><br>
            Résultat recherche
            <div>
                <textarea name="content" rows="8" cols="80" placeholder="Résultat recherches" required></textarea>
                <div id="toolbar-editor">
                    <div id=boutton_publier>
                        <button class="boutton_publier" style="vertical-align:middle"><span> Publier </span></button>
                    </div>
                    <div id=boutton_option>
                        <button class="boutton_option" style="vertical-align:middle">...</button>
                    </div>
                </div>
            </div>
    </div>
    <div class="col-droite">
        <div class="centre">
            <h3>
                // A FAIRE POUR LES BOUTONS EXPORTER ET IMPRIMER
        </div>
        <div class="droite">
            <input type="submit" name="submit" value="Exporter">
            <input type="submit" name="submit" value="Imrpimer">
            <button class="rechercher" style="vertical-align:middle"><span>Rechercher</span></button>
        </div>
    </div>
</div>