<div>
    <ul>
        <li><a href="index.php?cible=Commercial&fonction=stat_temp">Statistiques temporelles</a></li>
        <li><a href="">Statistiques géographiques</a></li>
        <li><a href="index.php?cible=Commercial&fonction=accueil">Informations clients</a></li>
        <script type="text/javascript" src="vue/js/CommercialClient.js"></script>
    </ul>
</div>
<br><br>
<div class="ligne">
    <div class="col-gauche">
        <form id="" class="" action="index.html" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
            <h1 class="centre test">Chercher un client</h1>

            <div class="champs1">
            <label for="Nom"> &nbsp;</label>
            <input type="text" id="Nom" name="Nom" placeholder="Nom">
            <label for="Prénom"> &nbsp;</label>
            <input type="text" id="Prénom" name="Prénom" placeholder="Prénom" >
            <label for="Numéro téléphone"> &nbsp;</label>
            <input type="text" id="Numéro téléphone" name="Numéro téléphone" placeholder="Numéro téléphone" >
            <label for="Ville"> &nbsp;</label>
            <input type="text" id="Ville" name="Ville" placeholder="Ville" >
          </div>

            <br><br>

            <div>
                <textarea name="content" rows="8" cols="80" placeholder="Résultat recherches" required></textarea>
                <div id="rechercher">

                    <div id=boutton_rechercher>

                        <button onclick="makeRequest('http://localhost/G2E/index.php?cible=CommercialClient')" class="rechercher" style="vertical-align:middle"><span>Rechercher</span></button>
                    </div>
                </div>
            </div>
    </div>
    <div class="col-droite">
        <div class="centre">

        </div>
        <div class="droite">
            <input type="submit" name="submitExport" value="Exporter">
            <input type="submit" name="submitPrint" value="Imrpimer">

        </div>
    </div>
</div>
