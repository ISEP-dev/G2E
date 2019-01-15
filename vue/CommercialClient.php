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
        <form id="" class="" action="index.php?cible=Commercial&fonction=accueil" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
            <h1 class="centre test" id="titreChamps">Chercher un client</h1>

<!--            <div style="display:none;" class="champs1" id="champs">-->
                <div class="champs1" id="champs">
            <label for="Nom"> &nbsp;</label>
            <input type="text" id="Nom" name="Nom" placeholder="Nom">
            <label for="Prenom"> &nbsp;</label>
            <input type="text" id="Prenom" name="Prenom" placeholder="Prénom" >
            <label for="NumTel"> &nbsp;</label>
            <input type="text" id="NumTel" name="NumTel" placeholder="Numéro téléphone" >
            <label for="Ville"> &nbsp;</label>
            <input type="text" id="Ville" name="Ville" placeholder="Ville" >
          </div>
                <div>
                    <?php
                    if(isset($rows)) {
                        foreach ($rows as $row){ ?>
                            <br/>
                            <a href="index.php?cible=Commercial&fonction=accueil&id=<?php echo $row['id_util'];?>">
                                <?php echo $row['nom_util'];
                                echo " ";
                                echo $row['prenom_util'];?>
                            </a><br/>
                            <?php
                        }
                    }
                    ?>
                </div>
            <br><br>

            <div>
<!--                <textarea name="content" rows="8" cols="80" placeholder="Résultat recherches" required></textarea>-->
                <div id="rechercher">

                    <div id=boutton_rechercher>

                        <button class="rechercher" style="vertical-align:middle">
<!--                                onclick="makeRequest('http://localhost/G2E/index.php?cible=CommercialClient')" -->
                            <span>Rechercher</span>
                        </button>
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
        <div id="ResDeRecherche">
            <?php
                if (isset($infos)) {
                    echo "<br/>
                    <h3>".$infos['nom_util']." ".$infos['prenom_util']."</h3>
                    <br/>mail : ".$infos['email_util']."<br/>telephone : ".$infos['tel_util']."<br/>
                    Inscrit depuis le : ".$infos['creee_a_util']."";
                }
                    ?>
<!--                    <br/>-->
<!--                    <h3>-->
<!--                        --><?// echo "".$infos['nom_util']." ".$infos['prenom_util'].""; ?>
<!--                    </h3>-->
<!--                    <br/>-->
<!--                    mail : --><?// echo "".$infos['email_util'].""; ?>
<!--                    <br/>-->
<!--                    telephone : --><?// echo "".$infos['tel_util'].""; ?>
<!--                    <br/>-->
<!--                    Inscrit depuis le : --><?// echo "".$infos['creee_a_util'].""; ?>
        </div>
    </div>
</div>

<script>

    $('#titreChamps').click(function(){
        $('#champs').toggle('fast')
    });

</script>
