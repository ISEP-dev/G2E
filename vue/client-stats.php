<div>
<nav class="navbar">
    <ul class="navbar">
        <li class="navitem"><a href="index.php">Catalogue</a></li>
        <li class="navitem"><a href="index.php?cible=habitation&fonction=accueil">Maison</a></li>
        <li class="navitem active"><a href="index.php?cible=habitation&fonction=stats">Statistiques</a></li>
    </ul>
</nav>
</div>

<div id="can_haut" class="can">
    <form name="form0">
        <div class="haut">


            <label for="Maison"><h3 id="titre_haut"> Choisissez une habitation</h3></label>
            <select id="selectM" class="element-haut" name="Maison" onchange="changingM();">
                <option value="---">Séléctionner une habitation</option>
            </select>
            <label for="Zone"><h3> Choisissez une zone </h3></label>
            <select class="element-haut" name="Zone" id="selectZ" onchange="changingZ();">
                <option value="---">Séléctionner une Zone</option>
            </select>
            <label for="Arroseur"><h3> Choisissez un Arroseur </h3></label>
            <select class="element-haut" name="Arroseur" id="selectA">
                <option value="---">Selectionner un arroseur</option>
            </select>

            <label for="Xaxis"><h3> Choisissez votre abscisse</h3></label>
            <select class="element-haut" name="Xaxis" id="Xaxis">
                <option value="---">Abscisse du graphe</option>
                <option value="toujours">Depuis toujours</option>
                <option value="année">Depuis cette année</option>
                <option value="mois">Depuis ce mois</option>
                <option value="semaine">Depuis cette semaine</option>

            </select>

        </div>
    </form>
    <div id="bas">
        <button class="element-bas" onclick="clickingGraph();" id="search">Rafraichir</button>
        <button class="element-bas" onclick="clickingPrint();" id="print">Imprimer</button>
        <button class="element-bas" onclick="clickingExport();" id="export">Exporter</button>

    </div>

</div>

<div class="can" id="can_bas">
    <canvas id="myChart"></canvas>
</div>

</div>
</body>

</html>


