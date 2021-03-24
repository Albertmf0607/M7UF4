<?php

class autor {
    public $id;
    public $nom;
    public $cognoms;

    public function __construct($nom, $cognoms){
		$this->setId(null);
		$this->setNom($nom);
    $this->setCognoms($cognoms);
	}

	public function getId(){
		return $this->id;
	}

	public function setId($value){
		$this->id = $value;
	}

	public function getNom(){
		return $this->nom;
	}

	public function setNom($value){
		$this->nom = $value;
	}

  public function getCognoms(){
		return $this->cognoms;
	}

	public function setCognoms($value){
		$this->cognoms = $value;
	}

/*
  public function toString(){
    return $this->getNom() . ' ' . $this->getCognoms();
  }
*/

  public function __toString(){
    return $this->getNom() . ' ' . $this->getCognoms();
  }

}
 ?>
