<?php

class db {

	private $server;
	private $username;
	private $password;
	private $dbname;
	private $link;


	public function __construct(){
		$this->setServer($GLOBALS['server']);
		$this->setUsername($GLOBALS['USER']);
		$this->setPassword($GLOBALS['PASS']);
		$this->setDbname($GLOBALS['bd']);
	}

	public function getServer(){
		return $this->server;
	}

	public function setServer($value){
		$this->server = $value;
	}

	public function getUsername(){
		return $this->username;
	}

	public function setUsername($value){
		$this->username = $value;
	}

	public function getPassword(){
		return $this->password;
	}

	public function setPassword($value){
		$this->password = $value;
	}

	public function getDbname(){
		return $this->dbname;
	}

	public function setDbname($value){
		$this->dbname = $value;
	}

	public function connect()	{

		$this->link=new mysqli($this->getServer(),$this->getUsername(),$this->getPassword(), $this->getDbname());
		if ($this->error()) {
			die('Error, could not connect: ' . $this->error());
		}
		return $this->link;
	}

	public function close()	{
		return $this->link->close();
	}

	public function error()	{
		return $this->link->connect_error;
	}

	public function consulta($query){
		$con= $this->connect();

		// el mètode query retorna false en cas d'error
		if (!$resultat=$con->query($query)) {
			// mostrem el missatge d'error de MySQLi
			echo "Error, query failed: " . $con->error;
		}

		return $resultat;
	}
}
?>
