<br><br>
<div>
        <ul>
            <li><a href="#news">Statistiques temporelles</a></li>
            <li><a href="#contact">Statistiques géographiques</a></li>
            <li><a href="#about">Informations clients</a></li>
        </ul>
</div>
<br><br>
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
                <h1 class="centre">Chercher un client</h1>
                <hr>
                <label for="Nom"> &nbsp;</label>
                <input type="text" id="Nom" name="Nom" placeholder="Nom" required>
                <label for="Prénom" &nbsp;</label>
                <input type="text" id="Prénom" name="Prénom" placeholder="Prénom" required>
              
                <label for="Numéro téléphone"> &nbsp;</label>
                <input type="text" id="Numéro téléphone" name="Numéro téléphone" placeholder="Numéro téléphone" required>
                <br><br>
                Résultat recherche
                <div>
                    <textarea name="content" rows="8" cols="80" placeholder="Résultat recherches" required></textarea>
                    <div id="toolbar-editor">
                    </select>
                    </div>
                </div>
                <br><br>
                <div class="droite">
                <h2>
                <bouton class="rechercher" style="vertical-align:middle"><span>Rechercher </span></button>
                </div>
            </form>
        </div>
        <div class="col-droite">
            <div class="centre">
                <h3>
                //  A FAIRE POUR LES BOUTONS EXPORTER ET IMPRIMER
                </div>
                <div class="droite">
                    <input type="submit" name="submit" value="Exporter">
                      <input type="submit" name="submit" value="Imrpimer">

                </div>
            </div>
        </div>
    </div>
</body>
