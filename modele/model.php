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

function getInfo()   {//conn = PDO

	$sql = 'SELECT * FROM utilisateur';
	/*echo "qdsdqsd<br/>";

	print_r($this->connexion);
	//echo "qdsdqs1d<br/>";
*/
	foreach ($this->connexion->query($sql) as $row) {
		print $row['prenom_util'];
	}


}
}

?>
