<?php


// strip_tags(mysqli_real_escape_string($link, $string_to_escape));


/**
 * Classe Maison pour créer, modifier, récupérer et supprimer
 */
class House
{

    // Récupérer la(les) maison(s) d'un utilisateur
    public static function getHouses(/*$idUser*/)
    {
        $mysqli = new mysqli("localhost", "root", "", "g2e_test");
        // Requête SQL
        // // WARNING: Changer requête pour afficher celles de l'utilisateur
        $housesQuery = $mysqli->query("SELECT * FROM habitation WHERE id_util = 1;");

        while ( ($houses = $housesQuery->fetch_assoc()) !== null )
        {
            ?>
            <div class="col-gauche maison">
                <div class="maison">
                    <div class="sticky-header-maison">
                        <h2><?= $houses['nom_habit']; ?></h2>
                        <a id="add-arr-<?= $houses['id_habit'] ?>">
                            <img class="ajout-arroseur" src="./images/btn-add.png" alt="../images/btn-add.png">
                        </a>
                    </div>
                    <?php include('process_arroseur.php'); ?>
                </div>
            </div>
            <?php
        } # End of while
    }
    
}


?>
