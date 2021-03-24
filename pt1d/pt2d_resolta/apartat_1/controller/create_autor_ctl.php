<?php
	require_once '../config/config.inc.php';
	require_once './function_autoload.php';
	require_once '../view/printMsg.php';
	require_once '../view/linkAutors.php';

	$autorDAO = new autorDAO();

	$msg = null;
	try {

// si venim de fer submit al formulari, hem de crear l'objecte autor i persistir-lo a la BDD
		if (isset($_REQUEST['submit'])) {
			  // anem a crear un autor
			  // inicialment tots els seus paràmetres són null
			  // després li assignarem els valors rebuts del formulari
				$autor = new autor(null, null);

	  		if (isset($_REQUEST['nom'])) {
	    		$autor->setNom($_REQUEST['nom']);
	    	}

	    	if (isset($_REQUEST['cognoms'])) {
					$autor->setCognoms($_REQUEST['cognoms']);
	    	}

				$resultat = $autorDAO->inserir($autor);
				// el mètode inserir retorna false en cas d'error
				// el missatge d'error es mostra en el mètode consulta de la classe db
				if ($resultat) {
					$msg = "Dades introduides correctament!!";
				}

// si no venim de fer submit, mostrem el formulari a l'usuari
		} else {
	  	require_once '../view/form_create_autor.php';
		}
} catch (Exception $e) {
	$msg = "Error en introduir les dades .$e";
}

if ($msg != null) {
	printMsg($msg);
}

linkAutors();
?>
