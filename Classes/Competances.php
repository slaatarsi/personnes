<?php
class Competance{
    public $IdCompetance;
    public $IntituleCompetance;
    public $IdPersonne;

    public function __construct($IdCompetance,$IntituleCompetance,$IdPersonne){
        $this->IdCompetance = $IdCompetance;
        $this->IntituleCompetance = $IntituleCompetance;
        $this->IdPersonne = $IdPersonne;

    }
}

?>