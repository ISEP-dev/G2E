<?php

require_once "Database.php";

class Capteur extends Database
{
    public $tableCapteur     = "capteur";
    public $tableTypeCapteur = "type_capteur";

    public function checkCapteurStatus(string $table, int $idArr, int $idCapt)
    {
        return $this->bdd->query("SELECT COUNT(1) FROM " . $table . " WHERE id_arr=" . $idArr . " AND type_capt=" . $idCapt . " ")->fetch(PDO::FETCH_ASSOC);
    }

    public function getCapteurType()
    {
        return $this->bdd->query("SELECT * FROM type_capteur");
    }

    public function getAllCapteurFromArroseur(int $idArr)
    {
        return $this->bdd->query("SELECT * FROM " . $this->tableCapteur . " WHERE id_arr=" . $idArr);
    }

    public function getCapteurTypeName(int $idCapt): string
    {
        $stmt = $this->bdd->prepare("SELECT * FROM " . $this->tableTypeCapteur . " WHERE id_type_capteur=:id_capt");
        $stmt->bindParam(":id_capt", $idCapt);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC)['nom_type_capteur'];
    }

    public function beautifyBlockNameCapteur(int $typeCapt, $nameCapt, int $numberCapt)
    {
        if ($nameCapt == null) {
            $returnName = $this->getCapteurTypeName($typeCapt);
        } else {
            $returnName = $nameCapt;
        }
        if ($numberCapt < 10) {
            $leadingZero = " 0";
        } else {
            $leadingZero = " ";
        }
        return ucfirst($returnName) . $leadingZero . $numberCapt;
    }

    public function deleteCapteur(int $idArr, int $numberCapt, int $typeCapt)
    {
        Database::delete($this->bdd, $this->tableCapteur, "id_arr=" . $idArr . " AND type_capt=" . $typeCapt . " AND number_capt=" . $numberCapt);
    }

    public function getCapteurNumber(int $idArr, int $typeCapt)
    {
        $stmt = $this->bdd->prepare("SELECT * FROM " . $this->tableCapteur . " WHERE id_arr=:id_arr AND type_capt=:type_capt ORDER BY number_capt DESC LIMIT 1");
        $stmt->bindParam(":id_arr", $idArr);
        $stmt->bindParam(":type_capt", $typeCapt);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['number_capt'];
    }
}