<?php
	require_once '../config/config.inc.php';
	require_once './function_autoload.php';
	require_once '../view/printMsg.php';
	require_once '../view/linkLlibres.php';

	$llibreDAO = new llibreDAO();

  // comprovem si el llibre existeix abans d'eliminar-lo
	if (isset($_REQUEST['id'])) {
	    $id = $_REQUEST['id'];
			$llibre = $llibreDAO->cercarId($id);
	}

	$msg = null;
	try {

		if ($llibre != null) {
			$resultat = $llibreDAO->eliminar($id);
			if ($resultat) {
				$msg = "Dades eliminades correctament!!";
			}

		} else {
			$msg = "No s'ha pogut eliminar. El llibre no existeix";
		}

} catch (Exception $e) {
	$msg = "Error en eliminar les dades .$e";
}

if ($msg != null) {
	printMsg($msg);
}

linkLlibres();
?>
