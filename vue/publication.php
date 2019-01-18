<script src="https://cdn.ckeditor.com/ckeditor5/11.2.0/classic/ckeditor.js"></script>
<body>
<div class="ligne">
    <!-- <div class="col-gauche">
            <div id="formulaire">
                <form action="index.phpt" method="post">
                    <input type="button" value="G" style="font-weight: bold;" onclick="commande('bold');" />
                      <input type="button" value="I" style="font-style: italic;" onclick="commande('italic');" />
                      <input type="button" value="S" style="text-decoration: underline;" onclick="commande('underline');" />
                      <input type="button" value="Lien" onclick="commande('createLink');" />
                      <input type="button" value="Image" onclick="commande('insertImage');" />
                      <select onchange="commande('heading', this.value); this.selectedIndex = 0;">
                    <option value="">Titre</option>
                    <option value="h1">Titre 1</option>
                    <option value="h2">Titre 2</option>
                    <option value="h3">Titre 3</option>
                    <option value="h4">Titre 4</option>
                    <option value="h5">Titre 5</option>
                    <option value="h6">Titre 6</option>
                      </select>
                    <br>
                    <textarea type="Votre message"id="message" name="Message" placeholder="Publiez votre message !"></textarea>
                    </form></div>

            <div id=boutton_publier><button class="boutton_publier" style="vertical-align:middle"><span> Publier </span></button></div>
            <div id=boutton_option><button class="boutton_option" style="vertical-align:middle">... </button></div>
            </div>
    </div> -->
    <div class="col-gauche">
        <form action="index.php?cible=Mairie&fonction=ajouter-publication" method="post" accept-charset="UTF-8"
              enctype="multipart/form-data">
            <h1 class="centre">Nouvelle Publication</h1>
            <hr>
            <label for="titre">Titre &nbsp;</label>
            <input type="text" id="titre-publication" name="titre-publication" placeholder="Titre" required>
            <br><br><br>
            <label for="content-publication">Message</label>
            <textarea name="content-publication" id="content-publication" cols="30" rows="20"></textarea>
            <br><br>
            <div class="droite">
                <input type="submit" name="submit" value="Publier">
            </div>
        </form>
    </div>
    <div class="col-droite">
        <div class="publications">
            <?php $publication = new Publication();
            $allPublications   = $publication->getAllPublications($bdd, $publication->tablePublication);
            foreach ($allPublications as $publication) {
                echo "Titre : " . $publication['titre_pub'] . "\n\nContenu : " . $publication['contenu_pub'];
            } ?>
        </div>
        <div class="footer-publication centre">
            <div class="pagination">
                <a href="#">&laquo;</a>
                <a href="#" class="active">1</a>
                <a href="#">2</a>
                <a href="#">3</a>
                <a href="#">&raquo;</a>
            </div>
        </div>
    </div>
</div>
</body>
