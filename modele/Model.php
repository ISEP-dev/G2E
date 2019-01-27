<?php

require_once "fonctions.php";

class Model
{
    private $bdd;

    function __construct(PDO $bdd)
    {
        $this->bdd = $bdd;
    }

    function getMaisonsFromUserId($id)
    {
        $query = "SELECT nom_habit FROM habitation 
        INNER JOIN habitation_utilisateur ON habitation_utilisateur.id_habit = habitation.id_habit
       INNER JOIN utilisateur ON utilisateur.id_util = habitation_utilisateur.id_util 
       WHERE utilisateur.id_util =" . $id;
        //echo($query);
        //$result = $this->connexion->query($query)->fetch(PDO::FETCH_ASSOC);
        $stmt = $this->bdd->prepare($query, array(PDO::ATTR_CURSOR, PDO::CURSOR_SCROLL));
        $stmt->execute();
        $data = array();
        while ($row = $stmt->fetch(PDO::FETCH_BOTH)) {

            array_push($data, $row[0]);
        }
        return $data;
    }


    function getZonesFromMaison($nom, $id)
    {
        $query = "SELECT nom_zone FROM zone
        INNER JOIN habitation ON habitation.id_habit = zone.id_habit
        INNER JOIN habitation_utilisateur ON habitation_utilisateur.id_habit = habitation.id_habit
        INNER JOIN utilisateur ON utilisateur.id_util = habitation_utilisateur.id_util
        WHERE utilisateur.id_util =" . $id . " AND habitation.nom_habit= '" . $nom . "'";
        $stmt  = $this->bdd->prepare($query, array(PDO::ATTR_CURSOR, PDO::CURSOR_SCROLL));
        $stmt->execute();
        $data = array();
        while ($row = $stmt->fetch(PDO::FETCH_BOTH)) {

            array_push($data, $row[0]);
        }
        return $data;

    }

    function getArroseursFromZone($nom, $id)
    {
        $query = "SELECT nom_arr FROM
        arroseur
        INNER JOIN zone ON zone.id_zone = arroseur.id_zone
        INNER JOIN habitation ON habitation.id_habit = zone.id_habit
        INNER JOIN habitation_utilisateur ON habitation_utilisateur.id_habit = habitation.id_habit
        INNER JOIN utilisateur ON utilisateur.id_util = habitation_utilisateur.id_util
        WHERE utilisateur.id_util =" . $id . " AND zone.nom_zone= '" . $nom . "'";
        $stmt  = $this->bdd->prepare($query, array(PDO::ATTR_CURSOR, PDO::CURSOR_SCROLL));
        $stmt->execute();
        $data = array();
        while ($row = $stmt->fetch(PDO::FETCH_BOTH)) {

            array_push($data, $row[0]);
        }
        return $data;
    }

    function getGraph($Xaxis, $Yaxis)
    {
        $annee   = ["2017", "2018", "2019"];
        $jour    = ["lundi", "mardi", "mercredi", "jeudi", "vendredi"];
        $mois    = ["janvier", "février", "mars", "avril", "mai", "juin", "juillet", "aout", "septembre", "ocobre", "novembre", "decembre"];
        $semaine = ["semaine 1 ", "semaine 2", "semaine 3", "semaine 4"];
        $y       = [];
        $tab_dat = [];
        $date1   = "";
        $date2   = "";
        $anneeC  = date('Y');
        $moisC   = date('m');


        switch ($Xaxis) {
            case 'année':
                $x = $mois;
                $i = 1;
                for ($a = 0; $a < 24; $a = $a + 2) {
                    $date1           = $anneeC . "-" . $i . "-01";
                    $date2           = $anneeC . "-" . $i . "-31";
                    $date1           = "'$date1'";
                    $date2           = "'$date2'";
                    $tab_dat[$a]     = $date1;
                    $tab_dat[$a + 1] = $date2;
                    $i++;
                }
                break;
            case 'toujours':
                $x   = $annee;
                $ind = 0;
                for ($a = 0; $a < 6; $a = $a + 2) {
                    $i               = $ind + 2017;
                    $date1           = $i . "-01-01";
                    $date1           = "'$date1'";
                    $date2           = $i . "-12-31";
                    $date2           = "'$date2'";
                    $tab_dat[$a]     = $date1;
                    $tab_dat[$a + 1] = $date2;
                    $ind             = $ind + 1;
                }
                break;
            case 'mois':
                $x = $semaine;
                $i = 0;
                for ($a = 0; $a < 8; $a = $a + 2) {
                    $jour1           = 7 * $i + 1;
                    $jour2           = $jour1 + 6;
                    $date1           = $anneeC . "-" . $moisC . "-" . $jour1;
                    $date2           = $anneeC . "-" . $moisC . "-" . $jour2;
                    $date1           = "'$date1'";
                    $date2           = "'$date2'";
                    $tab_dat[$a]     = $date1;
                    $tab_dat[$a + 1] = $date2;
                    $i++;
                }
                break;
            case 'semaine':
                $x = $jour;
                break;
            default:
                $x = $mois;
                break;
        }

        $query_arroseur    = 'SELECT COUNT(id_arr) FROM arroseur WHERE date_ajout_arr BETWEEN ' . $date1 . ' AND ' . $date2;
        $query_utilisateur = 'SELECT COUNT(id_util) FROM utilisateur WHERE type_util = "Utilisateur" AND creee_a_util BETWEEN ' . $date1 . ' AND ' . $date2;
        $query_habitation  = 'SELECT COUNT(id_habit) FROM habitation WHERE date_ajout_habit BETWEEN ' . $date1 . ' AND ' . $date2;
        /*echo($Yaxis);
        echo($Xaxis);*/
        switch ($Yaxis) {
            case 'clients':
                $titre = "Nouveaux clients inscrits";
                $ind   = 0;
                for ($i = 0; $i < count($tab_dat); $i = $i + 2) {

                    $query = 'SELECT COUNT(id_util) FROM utilisateur WHERE type_util = 1 AND creee_a_util BETWEEN ' . $tab_dat[$i] . ' AND ' . $tab_dat[$i + 1];
                    //echo($query);
                    $result  = $this->bdd->query($query)->fetch(PDO::FETCH_ASSOC);
                    $y[$ind] = (int)$result['COUNT(id_util)'];
                    //echo($y[$ind]);
                    $ind++;
                }
                break;

            case 'stat_arroseur':
                $titre = "Consommation d'un arroseur";
                $data  = array();
                for ($i = 0; $i < count($tab_dat); $i = $i + 2) {

                    $query = 'SELECT date_debut_prog,date_fin_prog,intensite_prog,iteration_prog 
                    FROM programme
                    INNER JOIN mode_programme ON mode_programme.id_prog = programme.id_prog
                    INNER JOIN arroseur_mode ON arroseur_mode.id_mode = mode_programme.id_mode
                    INNER JOIN arroseur ON arroseur_mode.id_arr = arroseur.id_arr
                    INNER JOIN zone ON zone.id_zone = arroseur.id_zone
                    INNER JOIN habitation ON habitation.id_habit = zone.id_habit
                    INNER JOIN habitation_utilisateur ON habitation_utilisateur.id_habit = habitation.id_habit
                    INNER JOIN utilisateur ON utilisateur.id_util = habitation_utilisateur.id_util
                    WHERE utilisateur.id_util =1 AND programme.date_debut_prog BETWEEN "2017-12-01" AND "2018-12-01" AND arroseur.nom_arr = "petunia droite"';
                    $stmt  = $this->bdd->prepare($query, array(PDO::ATTR_CURSOR, PDO::CURSOR_SCROLL));
                    $stmt->execute();
                    while ($row = $stmt->fetch(PDO::FETCH_BOTH)) {
                        array_push($data, $row[0]);
                    };
                }
                return $data;
            case 'arroseurs':
                $titre = "Arroseurs paramétrés";
                $ind   = 0;
                for ($i = 0; $i < count($tab_dat); $i = $i + 2) {

                    $query = $query_arroseur = 'SELECT COUNT(id_arr) FROM arroseur WHERE date_ajout_arr BETWEEN ' . $tab_dat[$i] . ' AND ' . $tab_dat[$i + 1];
                    //echo($query);
                    $result  = $this->bdd->query($query)->fetch(PDO::FETCH_ASSOC);
                    $y[$ind] = (int)$result['COUNT(id_arr)'];
                    //echo($y[$ind]);
                    $ind++;
                }
                break;
            case 'maisons':
                $titre = "habitations ajoutés";
                $ind   = 0;
                for ($i = 0; $i < count($tab_dat); $i = $i + 2) {

                    $query = $query_arroseur = 'SELECT COUNT(id_habit) FROM habitation WHERE date_ajout_habit BETWEEN ' . $tab_dat[$i] . ' AND ' . $tab_dat[$i + 1];
                    /*echo($query);*/
                    $result  = $this->bdd->query($query)->fetch(PDO::FETCH_ASSOC);
                    $y[$ind] = (int)$result['COUNT(id_habit)'];
                    //echo($y[$ind]);
                    $ind++;
                }

                break;
            /*case 'modes':
                $titre = "modes programés";
                $ind = 0;
                for ($i=0; $i <count($tab_dat) ; $i = $i+2) { 
                    
                    $query = $query_arroseur = 'SELECT COUNT(id_mode) FROM mode WHERE date_debut_mode BETWEEN '.$tab_dat[$i].' AND ' .$tab_dat[$i+1];
                    echo($query);
                    $result = $this->connexion->query($query)->fetch(PDO::FETCH_ASSOC);
                    $y[$ind] =  (int) $result['COUNT(id_mode)'];
                    echo($y[$ind]);
                    $ind++;
                }
                break;*/

            default:
                $titre = "Nombre de clients inscrits";
                $query = $query_utilisateur;
                break;
        }


        include_once "Graph.php";

        /* $y = [5,8,9,12,6,7,8,9,10,11,12];*/
        $graph = new Graph($x, $y, $titre);
        //echo("je suis la ");
        /*echo($graph->getXaxis());*/
        return $graph;

    }

    //par josephbsslt
    function getInfo($nom, $prenom, $ville, $numtel)
    {//conn = PDO

        if (empty($nom) && empty($prenom) && empty($ville) && empty($numtel)) {
            return;
        }

        $sql = 'SELECT * FROM utilisateur ';

        if (!empty($nom) || !empty($prenom) || !empty($numtel)) {
            $sql = $sql . " WHERE ";
        }

        if (!empty($nom)) {
            $sql = $sql . " nom_util = '" . $nom . "'";
        }

        if (!empty($prenom)) {
            if (!empty($nom)) {
                $sql = $sql . " AND ";
            }
            $sql = $sql . " prenom_util = '" . $prenom . "'";
        }

        if (!empty($numtel)) {
            if (!empty($nom) || !empty($prenom)) {
                $sql = $sql . " AND ";
            }
            $sql = $sql . " tel_util = '" . $numtel . "'";
        }

        if (!empty($ville)) {
            $sql = $sql . " INNER JOIN habitation_utilisateur ON utilisateur.id_util = habitation_utilisateur.id_util
					INNER JOIN habitation ON habitation_utilisateur.id_habit = habitation.id_habit
					WHERE habitation.order_habit = 1 AND ville_habit = '" . $ville . "'";
        }

        $req = $this->bdd->query($sql);
        return $req->fetchAll();
    }


    function getInfoParID($id)
    {
        $sql = 'SELECT * FROM utilisateur WHERE id_util ="' . $id . '"';
        $req = $this->bdd->query($sql);
        return $req->fetch();
    }
}