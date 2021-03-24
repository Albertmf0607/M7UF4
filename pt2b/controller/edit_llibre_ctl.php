<?php
	require_once '../config/config.inc.php';
	require_once './function_autoload.php';
	require_once '../view/printMsg.php';
	require_once '../view/linkLlibres.php';

	$llibreDAO = new llibreDAO();
	$autorDAO = new autorDAO();

	$arrayAutors = $autorDAO->veureAutors();

	// comprovem si el llibre existeix abans d'editar-lo
	if (isset($_REQUEST['id'])) {
	    $id = $_REQUEST['id'];
			$llibre = $llibreDAO->cercarId($id);
	}

	$msg = null;
	try {

		// si venim de fer submit al formulari, hem de modificar l'objecte llibre i persistir-lo a la BDD
		if (isset($_REQUEST['submit'])) {

	    	if ($llibre != null) {
					if (isset($_REQUEST['titol'])) {
						$llibre->setTitol($_REQUEST['titol']);
					}

					if (!empty($_REQUEST['data_public'])) {
						$llibre->setDataPublic($_REQUEST['data_public']);
					}

					if (isset($_REQUEST['autor'])) {
						$llibre->setAutor($_REQUEST['autor']);
					}

	     		$resultat = $llibreDAO->modificar($llibre);
					if ($resultat) {
						$msg = "Dades modificades correctament!!";
					}

	    	} else {
	     		$msg = "No s'ha pogut modificar. El llibre no existeix";
	    	}

  	// si no venim de fer submit, mostrem el formulari a l'usuari
		} else {
	  	require_once '../view/form_edit_llibre.php';
		}
} catch (Exception $e) {
	$msg = "Error en introduir les dades .$e";
}

if ($msg != null) {
	printMsg($msg);
}

linkLlibres();
?>
