<nav class="navbar">
    <ul class="navbar">
        <li class="navitem"><a href="index.php?cible=Commercial&fonction=stat_temp">Statistiques temporelles</a>
        </li>
        <li class="navitem active"><a href="index.php?cible=Commercial&fonction=stat_geo">Statistiques géographiques</a>
        </li>
        <li class="navitem"><a href="index.php?cible=Commercial&fonction=accueil">Informations clients</a></li>
    </ul>
</nav>
<div class="ligne">
    <div class="col-gauche">
        <h1 class="centre">Recherche client</h1>
        <input type="text" id="address" autofocus>
        <input type="submit" id="submit-address">
    </div>
    <div class="col-droite">
        <div id="carte" style="height: 100%;"></div>
    </div>
</div>