<?php

class Data extends Database
{
    public static final function beautifyValue($value, int $typeCapteur)
    {
        $returnValue = null;
        switch ($typeCapteur) {
            //   Distance
            case 1:
                $seuilDanger = 1672;    // 20cm
                if ($value > $seuilDanger) {
                    $returnValue = "Attention !";
                } else {
                    $returnValue = "Aucune présence";
                }
                break;
            //    Température
            case 3:
                $returnValue = substr($value, 2, 2);
                $returnValue .= "°C";
                break;
            //    Luminosité
            case 5:
                $seuilNuit = 500;   // Noir
                if ($value < $seuilNuit) {
                    $returnValue = "Nuit";
                } else {
                    $returnValue = "Jour";
                }
                break;
            default:
                break;
        }
        return $returnValue;
    }

    public function getAndDecode(string $teamNumber)
    {
        return $this->setTableData($this->getData($teamNumber));
    }

    public function setTableData($data)
    {
        $data_tab = str_split($data, 33);
        $size     = count($data_tab);
        for ($i = $size - 2; $i > $size - 5; $i--) {
            // echo "Trame $i: $data_tab[$i]<br />";
            json_encode($this->decodeFrame($data_tab[$i]));
            // echo $datas;
            $trame = $data_tab[$i];

            // ltrim(str, '0');

            // Infos Objet
            /*echo "Type trame : "   . */
            $typeTrame = substr($trame, 0, 1);
            /*echo "No Objet : "     . */
            $noObjet = substr($trame, 1, 4);
            /*echo "Requete : "      . */
            $typeRequete = "0" . substr($trame, 5, 1);
            /*echo "Type capteur : " . */
            $typeCapteur = substr($trame, 6, 1);
            /*echo "No capteur : "   . */
            $noCapteur = substr($trame, 2, 2);
            /*echo "Valeur : "       . */
            $valeur = substr($trame, 9, 4);
            /*echo "No Trame : "     . */
            $noTrame = substr($trame, 13, 4);
            /*echo "Checksum : "     . */
            $checksum = substr($trame, 17, 2);
            // Datetime Objet
            /*echo "Annee : "   . */
            $year = substr($trame, 19, 4);
            /*echo "Mois : "    . */
            $month = substr($trame, 23, 2);
            /*echo "Jour : "    . */
            $date = substr($trame, 25, 2);
            /*echo "Heure : "   . */
            $hour = substr($trame, 27, 2);
            /*echo "Minute : "  . */
            $minute = substr($trame, 29, 2);
            /*echo "Seconde : " . */
            $second = substr($trame, 31, 2);


            $horodatage = $year . "-" . $month . "-" . $date . " " . $hour . ":" . $minute . ":" . $second;

            $decodedDatas = array(
                "type_trame_donn"   => $typeTrame,
                "numero_obj_donn"   => $noObjet,
                "type_requete_donn" => $typeRequete,
                "type_cpt_donn"     => $typeCapteur,
                "numero_capt_donn"  => $noCapteur,
                "valeur_donn"       => $valeur,
                // "numero_trame_donn" => $noTrame,
                // "checksum_donn"     => $checksum,
                "horodatage_donn"   => $horodatage
            );
            /*echo '<pre>';
            print_r($decodedDatas);
            echo '</pre>';*/
            // Info : no sensor id comming from this datas ! Impossible to do it so Trame not made for this purpose ...
            $this->storeData($decodedDatas);
        }
    }

    public function decodeFrame($data_tab)
    {

    }

    private function storeData(array $decodedDatas)
    {
        $tableDatas = "donnee";
        $query      = "SELECT horodatage_donn FROM " . $tableDatas . " WHERE type_trame_donn=:type_trame AND numero_obj_donn=:numero_obj AND type_requete_donn=:type_requete AND type_cpt_donn=:type_cpt AND numero_capt_donn=:numero_capt AND valeur_donn=:valeur AND horodatage_donn=:horodatage ORDER BY horodatage_donn DESC";
        $stmt       = $this->bdd->prepare($query);
        $stmt->bindParam(":type_trame", $decodedDatas['type_trame_donn']);
        $stmt->bindParam(":numero_obj", $decodedDatas['numero_obj_donn']);
        $stmt->bindParam(":type_requete", $decodedDatas['type_requete_donn']);
        $stmt->bindParam(":type_cpt", $decodedDatas['type_cpt_donn']);
        $stmt->bindParam(":numero_capt", $decodedDatas['numero_capt_donn']);
        $stmt->bindParam(":valeur", $decodedDatas['valeur_donn']);
        $stmt->bindParam(":horodatage", $decodedDatas['horodatage_donn']);

        $stmt->execute();
        $dateDiff = $stmt->fetch(PDO::FETCH_ASSOC)['horodatage_donn'];

        if ($decodedDatas['horodatage_donn'] != $dateDiff) {
            Database::insert($this->bdd, $tableDatas, $decodedDatas);
        } /*else {
            echo "Erreur insertion";
        }*/
    }

    public function getData(string $teamNumber)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://projets-tomcat.isep.fr:8080/appService/?ACTION=GETLOG&TEAM=" . $teamNumber);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $data = curl_exec($ch);
        curl_close($ch);
        // echo "Données en ligne :<br />";
        return $data;
    }

    public function sendData(string $teamNumber, string $trame)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://projets-tomcat.isep.fr:8080/appService/?ACTION=COMMAND&TEAM=" . $teamNumber . "&TRAME=" . $trame);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);
        return $response;
    }

    public function getDatabaseData(int $typeCpt)
    {
        $stmt = $this->bdd->prepare("SELECT * FROM donnee WHERE type_cpt_donn=:type_cpt ORDER BY horodatage_donn desc limit 1;");
        $stmt->bindParam(":type_cpt", $typeCpt);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC)['valeur_donn'];
    }
}