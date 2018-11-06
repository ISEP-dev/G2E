<?php
    $mysqli = new mysqli("localhost", "root", "", "g2e");

    $arroseurQuery = $mysqli->query("SELECT * FROM arroseur WHERE id_habit = 3;");
    while ($arroseur = $arroseurQuery->fetch_assoc())    
    {
    ?>
    <div class="arroseur">
        <div class="space-between">
            <div class="nom-arroseur">
                <?= $arroseur['nom_arr'] ?>
            </div>
            <div class="toggle-button">
                <input id="<?= "maison".$arroseur['id_habit']."-arroseur".$arroseur['id_arr']; ?>" type="checkbox" class="arroseur-checkbox" name="button" checked></input>
                <label class="arroseur-label" for="<?= "maison".$arroseur['id_habit']."-arroseur".$arroseur['id_arr']; ?>">
                    <span class="arroseur-inner"></span>
                    <span class="arroseur-slider"></span>
                </label>
            </div>
        </div>
        <div class="progress">
            <progress value="50" max="100" class="progress-bar"></progress>
            <div class="progress-value strong">{{progress.value}}%</div>
        </div>
        <div class="space-between">
            <svg class="arroseur-status">
            <?php if ($arroseur['etat_arr'] == 0)
            { ?>
                <circle cx="15" cy="10" r="10" fill="red" />
            <?php
            } else {
            ?>
                <circle cx="15" cy="10" r="10" fill="green"/>
            <?php
            }
            ?>
            </svg>
            <img src="../vue/images/info.png" alt="" width="30" height="30">
        </div>
    </div>
    <?php
    }

?>
