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
        $mysqli = new mysqli("localhost", "root", "", "g2e_test");
        // Requête SQL
        // // WARNING: Changer requête pour afficher celles de l'utilisateur
        $housesQuery = $mysqli->query("SELECT * FROM habitation WHERE id_util = 1;");

        while ($houses = $housesQuery->fetch_assoc())
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
    
    // Fonction de visualisation d'informations de la maison

    // Ajouter une nouvelle maison
    public static function addHouse()
    {
        $mysqli = new mysqli("localhost", "root", "", "g2e");

        $houseName       = $_POST['house-name'];
        $houseNumber     = $_POST['house-number'];
        $houseRoute      = $_POST['house-route'];
        $houseCity       = $_POST['house-city'];
        $housePostalCode = $_POST['house-postal'];
        $houseCountry    = $_POST['house-country'];

        // Requête SQL
        $addHouseQuery = $mysqli->query("INSERT INTO habitation(nom_habit, numero_habit, rue_habit, ville_habit, code_postal_habit, pays_habit, id_util)
        VALUES('$houseName', '$houseNumber', '$houseRoute', '$houseCity', '$housePostalCode', '$houseCountry', '1');");
        if (!$addHouseQuery) {
            // Erreur d'ajout d'une maison
            die("Une erreur est survenue lors de l'ajout de votre maison, veuillez ré-essayer \n" .$mysqli->error);
        }
        else {
            // Tout s'est bien passé on redirige où on veut
            header("Location: ../arrosage.php");
        }

    }
    // Supprimer une maison existante
    public static function removeHouse($idHome)
    {
//        $removeHouseQuery = $bdd->query("DELETE FROM habitation WHERE nom_habit = $idHome;");
    }
    // Modifier une maison déjà enregistrée
    public static function modifyHouse($idHome, $name)
    {
//        $modifiyHouseQuery = $bdd->query("UPDATE habitation SET VALUE nom_habit WHERE nom_habit = $idHome;");
    }
}


?>
