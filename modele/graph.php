<?php

class Graph
{
    private $Xaxis;
    private $Yaxis;
    private $titre;


    function __construct($Xaxis, $Yaxis, $titre)
    {

        $this->Xaxis = $Xaxis;
        $this->Yaxis = $Yaxis;
        $this->titre = $titre;
    }

    public function getXaxis()
    {
        return $this->Xaxis;
    }

    function setXaxis($Xaxis)
    {
        $this->Xaxis = $Xaxis;
    }

    function getYaxis()
    {
        return $this->Yaxis;
    }

    function setYaxis($Yaxis)
    {
        $this->Yaxis = $Yaxis;
    }

    public function getTitre()
    {
        return $this->titre;
    }

    function setTitre($titre)
    {
        $this->titre = $titre;
    }


}