<?php
// Hôte, nom d'utilisateur, mot de passe, nom base de donnée

// Connexion à la base de donnée à effectuer

// echo '
// <div class="col-gauche maison">
//     <div class="maison">
//         <div class="sticky-header-maison">
//             <h2>'.$houseName .'</h2>
//             <a id="add-arr-'.$houseName.'">
//                 <img class="ajout-arroseur" src="../vue/images/btn-add.png" alt="../vue/images/btn-add.png">
//             </a>
//         </div>
//     </div>
// </div>
// ';
// strip_tags(mysqli_real_escape_string($link, $string_to_escape));

/**
 * Classe Maison pour créer, modifier, récupérer et supprimer
 */
class House
{

    // Récupérer la(les) maison(s) d'un utilisateur
    public static function getHouses(/*$idUser*/)
    {
        $mysqli = new mysqli("localhost", "root", "", "g2e");
        // Requête SQL
        // // WARNING: Changer requête pour afficher celles de l'utilisateur
        $housesQuery = $mysqli->query("SELECT * FROM habitation WHERE id_util = 1;");

        while ($houses = mysqli_fetch_assoc($housesQuery))
        {
            ?>
            <div class="col-gauche maison">
                <div class="maison">
                    <div class="sticky-header-maison">
                        <h2><?= $houses['nom_habit']; ?></h2>
                        <a id="add-arr-<?= $houses['id_habit'] ?>">
                            <img class="ajout-arroseur" src="../vue/images/btn-add.png" alt="../vue/images/btn-add.png">
                        </a>
                    </div>
                    <?php include('process_arroseur.php'); ?>
                </div>
            </div>
            <?php
        } # End of while
    }

    // Fonction de visualisation d'informations de la maison

    // Ajouter une nouvelle maison
    public static function addHouse()
    {
        $houseName       = $_POST['house-name'];
        $houseNumber     = $_POST['house-number'];
        $houseRoute      = $_POST['house-route'];
        $houseCity       = $_POST['house-city'];
        $housePostalCode = $_POST['house-postal'];
        $houseCountry    = $_POST['house-country'];

        ?>
        <div class="col-gauche maison">
            <div class="maison">
                <div class="sticky-header-maison">
                    <h2><?= $houseName; ?></h2>
                    <a id="add-arr-<?= $houseName; ?>">
                        <img class="ajout-arroseur" src="../vue/images/btn-add.png" alt="../vue/images/btn-add.png">
                    </a>
                </div>
            </div>
        </div>
        <?php
        // Requête SQL
        $addHouseQuery = mysqli_query($link, "INSERT INTO TABLE_NAME() VALUES ...;");
    }
    // Supprimer une maison existante
    public static function removeHouse($idHome)
    {
        $removeHouseQuery = mysqli_query($link, "DELETE FROM TABLE_NAME WHERE 'Home.id' = $idHome;");
    }
    // Modifier une maison déjà enregistrée
    public static function modifyHouse($idHome, $name)
    {
        $modifiyHouseQuery = mysqli_query($link, "UPDATE TABLE_NAME SET value = ... WHERE 'Home.id' = $idHome;");
    }
}


?>
