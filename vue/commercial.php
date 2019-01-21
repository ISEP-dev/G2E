<script src="vue/js/chart1.js" defer></script>
<div>
    <ul>
        <li><a href="index.php?cible=Commercial&fonction=stat_temp">Statistiques temporelles</a></li>
        <li><a href="index.php?cible=Commercial&fonction=stat_geo">Statistiques géographiques</a></li>
        <li><a href="index.php?cible=Commercial&fonction=accueil">Informations clients</a></li>
    </ul>
</div>
<br>

<div id="can_haut" class="can">
    <form name="form0" action="index.php?cible=Commercial&fonction=stat_temp" method="post">
        <div id="haut">            

            
            <label for="Yaxis"><h3 id="labelh"> Choisissez votre ordonnée</h3></label>
            <select class="element-haut" name="Yaxis" id="Yaxis" >
                <option value="---" >Ordonnées du graphe</option>
                <option value="clients">Nouveau clients inscrits</option>
                <option value="maisons">Maisons enregistrées</option>
                <option value="arroseurs">Arroseurs en service</option>
            </select>
            <label for="Xaxis"><h3> Choisissez votre abscisse</h3></label>
            <select class="element-haut" name="Xaxis" id="Xaxis" >
                <option value="---" >Abscisse du graphe</option>
                <option value="toujours">Depuis toujours</option>
                <option value="année">Depuis cette année</option>
                <option value="mois">Depuis ce mois</option>
                <option value="semaine">Depuis cette semaine</option>

            </select>
        </div>
    </form>
        <div id="bas">
            <button class="element-bas" id="refresh" onclick="clickingRefresh();">Rafraichir</button>
            <button class="element-bas" onclick="clickingPrint();" id="print">Imprimer</button>
            <button class="element-bas"  id="export" onclick="clickingExport();">Exporter</button>
            

        </div>
    
</div>

<div id="can_bas" class="can">
    <canvas id="myChart"></canvas>
</div>



</body>


</html>
