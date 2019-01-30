<script src="vue/js/chart1.js" defer></script>
<nav class="navbar">
    <ul class="navbar">
        <li class="navitem active"><a href="index.php?cible=Commercial&fonction=stat_temp">Statistiques temporelles</a>
        </li>
        <li class="navitem"><a href="index.php?cible=Commercial&fonction=stat_geo">Statistiques géographiques</a></li>
        <li class="navitem"><a href="index.php?cible=Commercial&fonction=accueil">Informations clients</a></li>
    </ul>
</nav>
<div class="ligne">
    <div id="can_haut" class="can">
        <form name="form0" action="index.php?cible=Commercial&fonction=stat_temp" method="post">
            <label for="Yaxis">
                <div class="titre-axe text-medium">Choisissez votre ordonnée</div>
            </label>
            <select class="element-haut" name="Yaxis" id="Yaxis">
                <option disabled selected>Ordonnées du graphe</option>
                <option value="clients">Nouveau clients inscrits</option>
                <option value="maisons">Maisons enregistrées</option>
                <option value="arroseurs">Arroseurs en service</option>
            </select>
            <label for="Xaxis">
                <div class="titre-axe text-medium"> Choisissez votre abscisse</div>
            </label>
            <select class="element-haut" name="Xaxis" id="Xaxis">
                <option disabled selected>Abscisse du graphe</option>
                <option value="toujours">Depuis toujours</option>
                <option value="année">Depuis cette année</option>
                <option value="mois">Depuis ce mois</option>
                <option value="semaine">Depuis cette semaine</option>
            </select>
        </form>
        <br>
        <div class="centre">
            <button class="btn-graph" onclick="clickingRefresh();">Rafraichir</button>
            <button class="btn-graph" onclick="clickingPrint();">Imprimer</button>
            <button class="btn-graph" onclick="clickingExport();">Exporter</button>
        </div>
    </div>

    <div id="can_bas" class="can">
        <canvas id="myChart"></canvas>
    </div>
</div>
