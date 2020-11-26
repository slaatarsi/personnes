<?php
class Personne{
    public $IdPersonne;
    public $Nom;
    public $Prenom;
    public $Adresse;
    public $DateN;
    public $tel;
    public $Email;
    public $IdNiveau;

    public function __construct($IdPersonne,$Nom,$Prenom,$Adresse,$DateN,$tel,$Email,$IdNiveau){
        $this->IdPersonne = $IdPersonne;
        $this->Nom = $Nom;
        $this->Prenom = $Prenom;
        $this->Adresse = $Adresse;
        $this->DateN = $DateN;
        $this->tel = $tel;
        $this->Email = $Email;
        $this->IdNiveau = $IdNiveau;
      }

      
}

?>