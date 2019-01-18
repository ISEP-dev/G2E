<script src="https://cdn.ckeditor.com/ckeditor5/11.2.0/classic/ckeditor.js"></script>
<body>
<div class="ligne">
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
