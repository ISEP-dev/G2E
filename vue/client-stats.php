<div>
    <nav class="navbar">
        <ul class="navbar">
            <li class="navitem"><a href="index.php">Catalogue</a></li>
            <li class="navitem"><a href="index.php?cible=habitation&fonction=accueil">Maison</a></li>
            <li class="navitem active"><a href="index.php?cible=habitation&fonction=stats">Statistiques</a></li>
        </ul>
    </nav>
</div>
<div class="ligne">
    <div id="can_haut" class="can">
        <form name="form0">
            <label for="selectM">
                <div class="titre-select text-medium"> Choisissez une habitation</div>
            </label>
            <select id="selectM" class="element-haut" name="Maison" onchange="changingM();">
                <option value="---" disabled selected>Séléctionner une habitation</option>
            </select>
            <label for="selectZ">
                <div class="titre-select"> Choisissez une zone</div>
            </label>
            <select class="element-haut" name="Zone" id="selectZ" onchange="changingZ();">
                <option value="---" disabled selected>Séléctionner une Zone</option>
            </select>
            <label for="selectA">
                <div class="titre-select"> Choisissez un Arroseur</div>
            </label>
            <select class="element-haut" name="Arroseur" id="selectA">
                <option value="---" disabled selected>Selectionner un arroseur</option>
            </select>
            <label for="Xaxis">
                <div class="titre-select"> Choisissez votre abscisse</div>
            </label>
            <select class="element-haut" name="Xaxis" id="Xaxis">
                <option value="---">Abscisse du graphe</option>
                <option value="toujours">Depuis toujours</option>
                <option value="année">Depuis cette année</option>
                <option value="mois">Depuis ce mois</option>
                <option value="semaine">Depuis cette semaine</option>
            </select>
        </form>
        <br>
        <div class="centre">
            <button class="btn-graph" onclick="clickingGraph();">Rafraichir</button>
            <button class="btn-graph" onclick="clickingPrint();">Imprimer</button>
            <button class="btn-graph" onclick="clickingExport();">Exporter</button>
        </div>
    </div>

    <div class="can" id="can_bas">
        <canvas id="myChart"></canvas>
    </div>
</div>