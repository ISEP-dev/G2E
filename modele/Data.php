<?php

/*
 * <?php $data = new Data();
        $data->getAndDecode();
        ?>
*/

class Data
{
    public function getAndDecode()
    {
        $this->setTableData($this->getData());
    }

    public function setTableData($data)
    {
        $data_tab = str_split($data, 33);
        // echo "Données en tableau :<br />";
        // Replace for test with $size
        for ($i = 0, $size = count($data_tab); $i < $size; $i++) {
            // echo "Trame $i: $data_tab[$i]<br />";
            $this->decodeFrame($data_tab);
        }
    }

    public function decodeFrame($data_tab)
    {
        $trame = $data_tab[1];

        echo "Type : " . $typeTrame = ltrim(substr($trame, 0, 1), '0') . "<br>";
        echo "No Objet : " . $noObjet = ltrim(substr($trame, 1, 4), '0') . "<br>";
        echo "Requete : " . $typeRequete = substr($trame, 4, 5) . "<br>";
        echo "Type capteur : " . $typeCapteur = substr($trame, 5, 6) . "<br>";
        echo "No capteur : " . $noCapteur = ltrim(substr($trame, 6, 8), '0') . "<br>";
        echo "Valeur : " . $valeur = substr($trame, 8, 12) . "<br>";
        echo "No Trame : " . $noTrame = substr($trame, 12, 16) . "<br>";
        echo "Checksum : " . $checksum = substr($trame, 16, 18) . "<br>";
        // Datetime ...
        echo "Annee : " . $year = substr($trame, 18, 22) . "<br>";
        echo "Mois : " . $month = substr($trame, 22, 24) . "<br>";
        echo "Jour : " . $date = substr($trame, 24, 26) . "<br>";
        echo "Heure : " . $hour = substr($trame, 26, 28) . "<br>";
        echo "Minute : " . $minute = substr($trame, 28, 30) . "<br>";
        echo "Seconde : " . $second = substr($trame, 30, 32) . "<br><br>";

    }

    public function getData()
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://projets-tomcat.isep.fr:8080/appService?ACTION=GETLOG&TEAM=0001");
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $data = curl_exec($ch);
        curl_close($ch);
        // echo "Données en ligne :<br />";
        return $data;

    }
}