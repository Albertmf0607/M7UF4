<?php

class llibre {
    public $id;
    public $titol;
    public $dataPublic;
    public $autor;

    public function __construct($titol, $dataPublic, $autor){
		$this->setId(null);
		$this->setTitol($titol);
    $this->setDataPublic($dataPublic);
		$this->setAutor($autor);
	}

	public function getId(){
		return $this->id;
	}

	public function setId($value){
		$this->id = $value;
	}

	public function getTitol(){
		return $this->titol;
	}

	public function setTitol($value){
		$this->titol = $value;
	}

  public function getDataPublic(){
		return $this->dataPublic;
	}

	public function setDataPublic($value){
		$this->dataPublic = $value;
	}

	public function getAutor(){
		return $this->autor;
	}

	public function setAutor($value){
		$this->autor = $value;
	}

/*
  public function toString(){
    return $this->getTitol();
  }
*/

  public function __toString(){
    return $this->getTitol();
  }

  public function getNomCognomsAutor(){
    $autorDAO = new autorDAO();
    $autor = $autorDAO->cercarId($this->getAutor());

    // si l'autor no es nul, mostrem el seu nom i cognoms
    if ($autor) {
      $nomCognoms = $autor->getNom() . ' ' . $autor->getCognoms();
    } else {
      // si es nul, retornem cadena buida
      $nomCognoms = '';
    }

    return $nomCognoms;
  }

}
 ?>
