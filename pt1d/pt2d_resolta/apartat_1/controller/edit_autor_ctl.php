<?php
	require_once '../config/config.inc.php';
	require_once './function_autoload.php';
	require_once '../view/printMsg.php';
	require_once '../view/linkAutors.php';

	$autorDAO = new autorDAO();

	// comprovem si l'autor existeix abans d'editar-lo
	if (isset($_REQUEST['id'])) {
	    $id = $_REQUEST['id'];
			$autor = $autorDAO->cercarId($id);
	}

	$msg = null;
	try {

		// si venim de fer submit al formulari, hem de modificar l'objecte autor i persistir-lo a la BDD
		if (isset($_REQUEST['submit'])) {

	    	if ($autor != null) {
					if (isset($_REQUEST['nom'])) {
						$autor->setNom($_REQUEST['nom']);
					}

					if (isset($_REQUEST['cognoms'])) {
						$autor->setCognoms($_REQUEST['cognoms']);
					}

	     		$resultat = $autorDAO->modificar($autor);
					if ($resultat) {
						$msg = "Dades modificades correctament!!";
					}

	    	} else {
	     		$msg = "No s'ha pogut modificar. L'autor no existeix";
	    	}

  	// si no venim de fer submit, mostrem el formulari a l'usuari
		} else {
	  	require_once '../view/form_edit_autor.php';
		}
} catch (Exception $e) {
	$msg = "Error en introduir les dades .$e";
}

if ($msg != null) {
	printMsg($msg);
}

linkAutors();
?>
