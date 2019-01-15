<?php

class Model
{
	private $connexion;

	function __construct()
	{
		$servername = "localhost";
		$username = "root";
		$password = "root";

		try {
		    $conn = new PDO("mysql:host=$servername;dbname=g2e", $username, $password);
		    // set the PDO error mode to exception
		    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		    $this->connexion=$conn;
		  //<<  echo "Connected successfully";
	    }
		catch(PDOException $e)
	    {
	    	echo "Connection failed: " . $e->getMessage();
	    }

    }

    function getGraph($Xaxis,$Yaxis){
        $annee = ["2017","2018","2019"];
        $jour = ["lundi","mardi","mercredi","jeudi","vendredi"];
        $mois =  ["janvier","février","mars","avril","mai","juin","juillet","aout","septembre","ocobre","novembre","decembre"];
        $semaine = ["semaine 1 ", "semaine 2", "semaine 3", "semaine 4"];

        switch ($Yaxis) {
            case 'clients':
                $titre = "Nombre de clients inscrits";
                break;
            case 'arroseurs':
                $titre = "Arroseurs paramétrés";
                break;

            default:
                $titre = "Nombre de clients inscrits";
                break;
        }

        switch ($Xaxis) {
            case 'année':
                $x = $mois;
                break;
            case 'toujours':
                $x = $annee;
                break;
            case 'mois':
                $x = $semaine;
                break;
            case 'semaine':
                $x = $jour;
                break;
            default:
                $x = $mois;
                break;
        }


        include_once "modele/graph.php";





        $y = [5,8,9,12,6,7,8,9,10,11,12];
        $graph = new Graph($x,$y,$titre);
        /*echo("je suis la ");*/
        /*echo($graph->getXaxis());*/
        return $graph;

    }

		//par josephbsslt
	function getInfo($nom,$prenom,$ville,$numtel)   {//conn = PDO

		if (empty($nom)&&empty($prenom)&&empty($ville)&&empty($numtel))
				return;

			$sql = 'SELECT * FROM utilisateur ';

			if(!empty($nom) || !empty($prenom) || !empty($numtel)){
					$sql = $sql . " WHERE ";
			}

			if (!empty($nom)){
					$sql = $sql . " nom_util = '".$nom."'";
			}

			if (!empty($prenom)){
					if(!empty($nom)){
							$sql = $sql . " AND ";
					}
					$sql = $sql . " prenom_util = '".$prenom."'";
			}

			if (!empty($numtel)){
					if(!empty($nom) || !empty($prenom)){
							$sql = $sql . " AND ";
					}
					$sql = $sql . " tel_util = '".$numtel."'";
			}

			if (!empty($ville)){
					$sql = $sql . " INNER JOIN habitation_utilisateur ON utilisateur.id_util = habitation_utilisateur.id_util
					INNER JOIN habitation ON habitation_utilisateur.id_habit = habitation.id_habit
					WHERE habitation.order_habit = 1 AND ville_habit = '".$ville."'";
			}

//        echo $sql;

			$req = $this->connexion->query($sql);
			$rows = $req->fetchAll();


//        '
//                INNER JOIN habitation_utilisateur AS hu
//                    ON u.id_util = hu.id_util
//                INNER JOIN habitation AS h
//                    ON h.id_habit = hu.id_habit
//                WHERE h.order_habit = 1';
//        /*echo "qdsdqsd<br/>";
//
//        print_r($this->connexion);
//        //echo "qdsdqs1d<br/>";
//    */
//        $rows = $this->connexion->query($sql);
//        echo"<script>
//                document.getElementById('ResDeRecherche').innerHTML =' ";
//        echo $rows;
//        echo "';
//             </script>";
			return $rows;
	}

//"'.$mail.'"'

	function getInfoParID($id){
			$sql = 'SELECT * FROM utilisateur WHERE id_util ="'.$id.'"' ;
			$req = $this->connexion->query($sql);
			$rep = $req->fetch();

			return $rep;
	}
}

?>

?>
