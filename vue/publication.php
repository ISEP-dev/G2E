<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Publication</title>
    <link rel="stylesheet" href="css/publication.css">
    <link rel="stylesheet" href="css/style.css">
</head>
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
            <form id="" class="" action="index.html" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
                <h1 class="centre">Nouvelle Publication</h1>
                <hr>
                <label for="titre">Titre &nbsp;</label>
                <input type="text" id="titre" name="titre" placeholder="Titre" required>
                <br><br>
                Message
                <div>
                    <textarea name="content" rows="8" cols="80" placeholder="Ecrivez votre message" required></textarea>
                    <div id="toolbar-editor">
                        <input type="button" value="B" class="strong" onclick="commande('bold');" />
                        <input type="button" value="I" class="italic" onclick="commande('italic');" />
                        <input type="button" value="U" class="underline" onclick="commande('underline');" />
                        <input type="button" value="link" onclick="commande('createLink');" />
                        <input type="button" value="image" onclick="commande('insertImage');" />
                        <select onchange="">
                            <option disabled selected>Titre</option>
                            <option value="h1">Titre taille 1</option>
                            <option value="h2">Titre taille 2</option>
                            <option value="h3">Titre taille 3</option>
                            <option value="h4">Titre taille 4</option>
                            <option value="h5">Titre taille 5</option>
                            <option value="h6">Titre taille 6</option>
                        </select>
                    </div>
                </div>
                <br><br>
                <div class="droite">
                    <input type="submit" name="submit" value="Publier">
                </div>
            </form>
        </div>
        <div class="col-droite">
            <div class="centre">
                <div class="pagination">
                    <a href="#">&laquo;</a>
                    <a href="#">1</a>
                    <a href="#" class="active">2</a>
                    <a href="#">3</a>
                    <a href="#">&raquo;</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
