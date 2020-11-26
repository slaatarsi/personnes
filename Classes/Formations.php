<?php
class Formation{
    public $IdFormation;
    public $IntituleFormation;
    public $Ecole;
    public $DateDebut;
    public $DateFin;
    public $IdPersonne;

    public function __construct($IdFormation,$IntituleFormation,$Ecole,$DateDebut,$DateFin,$IdPersonne){
        $this->IdFormation = $IdFormation;
        $this->IntituleFormation = $IntituleFormation;
        $this->Ecole = $Ecole;
        $this->DateDebut = $DateDebut;
        $this->DateFin = $DateFin;
        $this->IdPersonne = $IdPersonne;
      }

      
}

?>