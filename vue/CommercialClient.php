<script type="text/javascript" src="vue/js/CommercialClient.js"></script>
<nav class="navbar">
    <ul class="navbar">
        <li class="navitem"><a href="index.php?cible=Commercial&fonction=stat_temp">Statistiques temporelles</a></li>
        <li class="navitem"><a href="">Statistiques géographiques</a></li>
        <li class="navitem active"><a href="index.php?cible=Commercial&fonction=accueil">Informations clients</a></li>
    </ul>
</nav>
<br>
<div class="ligne">
    <div class="col-gauche">
        <form id="" class="" action="index.php?cible=Commercial&fonction=accueil" method="post" accept-charset="UTF-8"
              enctype="multipart/form-data">
            <div class="centre titre-recherche" id="titreChamps">Chercher un client</div>
            <div class="champs centre">
                <label for="Nom"></label>
                <input type="text" id="Nom" name="Nom" placeholder="Nom">
                <label for="Prenom"></label>
                <input type="text" id="Prenom" name="Prenom" placeholder="Prénom">
                <label for="NumTel"></label>
                <input type="text" id="NumTel" name="NumTel" placeholder="Numéro téléphone">
                <label for="Ville"></label>
                <input type="text" id="Ville" name="Ville" placeholder="Ville">
            </div>
            <?php
            if (isset($rows)) {
                foreach ($rows as $row) { ?>
                    <br/>
                    <a href="index.php?cible=Commercial&fonction=accueil&id=<?php echo $row['id_util']; ?>">
                        <?php echo $row['nom_util'];
                        echo " ";
                        echo $row['prenom_util']; ?>
                    </a><br/>
                <?php }
            } ?>
            <br><br>
            <button class="rechercher">
                <span>Rechercher</span>
            </button>
    </div>
    <div class="col-droite">
        <div class="droite">
            <input type="submit" name="submitExport" value="Exporter">
            <input type="submit" name="submitPrint" value="Imrpimer">
        </div>
        <div id="ResDeRecherche">
            <?php
            if (isset($infos)) {
                echo "<br>"
                    . "<h2>" . $infos['nom_util'] . " " . $infos['prenom_util'] . "</h2><br>"
                    . "<span class='b'>mail : </span>" . $infos['email_util'] . "<br><br>"
                    . "<span class='b'>telephone : </span>" . $infos['tel_util'] . "<br><br>"
                    . "<span class='b'>Inscrit depuis le : </span>" . $infos['creee_a_util'] . "";
            }
            ?>
        </div>
    </div>
</div>
<script>
    let csvContent = "data:text/csv;charset=utf-8,";
    rows.forEach(function (rowArray) {
        let row = rowArray.join(",");
        csvContent += row + "\r\n";
    });


    function imprimer_bloc(titre, objet) {
        // Définition de la zone à imprimer
        var zone = document.getElementById("ResDeRecherche").innerHTML;

        // Ouverture du popup
        var fen = window.open("", "", "height=500, width=600,toolbar=0, menubar=0, scrollbars=1, resizable=1,status=0, location=0, left=10, top=10");

        // style du popup
        fen.document.body.style.color           = '#000000';
        fen.document.body.style.backgroundColor = '#FFFFFF';
        fen.document.body.style.padding         = "20px";

        // Ajout des données a imprimer
        fen.document.title = Informations;
        fen.document.body.innerHTML += " " + zone + " ";

        // Impression du popup
        fen.window.print();

        //Fermeture du popup
        fen.window.close();
        return true;
    }

</script>
