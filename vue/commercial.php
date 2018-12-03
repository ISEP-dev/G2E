<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Statistiques clients</title>
    <link rel="stylesheet" type="text/css" href="vue/css/commercial.css" media="all" >
    <link rel="stylesheet" type="text/css" href="vue/css/style.css" media="all" >
    <script src ="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.js"></script>
    <script src="vue/js/chart1.js" defer></script>

    
    

</head>


<body>
    
    <div>
        <ul>            
            <li><a href="index.php?cible=Commercial&fonction=stat_temp">Statistiques temporelles</a></li>
            <li><a href="index.php?cible=Commercial&fonction=stat_geo">Statistiques géographiques</a></li>
            <li><a href="index.php?cible=Commercial&fonction=accueil">Contact des clients</a></li>
        </ul>
    </div>



    <h1>Statistiques temporelles</h1>
    <div class = "ligne">        

        <div class="col-gauche" >
            <form name="form0" action="index.php?cible=Commercial&fonction=stat_temp" method="post" >
                <div id="haut">
                        <h3>  Personaliser le graphique</h3>
                        <select class="element-haut" name = "ville" id="city">
                            <option value = "false">---</option>
                            <option value="Toulouse">Toulouse</option>
                            <option value="Paris">Paris</option>

                        </select>
                        <h3>   Choisissez votre ordonnée</h3>
                        <select class="element-haut" name = "Yaxis" id="Yaxis">
                            <option value="---" selected="selected">Ordonnées du graphe</option>
                            <option value="clients">Nouveau clients inscrits</option>
                            <option value="clients0">Nombre de clients</option>
                            <option value="maisons">Maisons enregistrées</option>
                            <option value="arroseurs">Arroseurs en service</option>
                        </select>
                        <h3>  Choisissez votre abscisse</h3>
                        <select class="element-haut" name="Xaxis" id="Xaxis">
                            <option value="---" selected="selected">Abscisse du graphe</option>
                            <option value="toujours">Depuis toujours</option>
                            <option value="année">Depuis cette année</option>
                            <option value="mois">Depuis ce mois</option>
                            <option value="semaine">Depuis cette semaine</option>
                            
                        </select>   
                </div>
                <div id ="bas">
                    <button class="element-bas" type="submit"  id="search" >Rafraichir</button>
                    <button class="element-bas" onclick="print();" id="print">Imprimer</button>                    
                    <button class="element-bas" onclick="export();" id="export">Exporter</button>                    
                </div>
            </form>
        </div>    
        <div class="col-droite">
          <canvas style="width:100%; height:100%;" id="myChart"  ></canvas>
        </div>
    </div>

</body>

</html>


<?php

echo "<script type='text/javascript'>";
echo "Xaxis = new Array;";

foreach($graph->getXaxis() as $cle=>$valeur){
    
    echo "Xaxis[$cle] = '$valeur' ;\n";
 
}
 
echo "</script>";
?>

<?php
echo "<script type='text/javascript'>";
echo "Yaxis = new Array;";

foreach($graph->getYaxis() as $cle=>$valeur){
    
    echo "Yaxis[$cle] = '$valeur' ;\n";
 
}
 
echo "</script>";
?>
<?php
echo "<script type='text/javascript'>";
echo "var titre = '";
echo $graph->getTitre();
echo "'";

 
echo " </script>";
?>