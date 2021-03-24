<?php
	require_once '../config/config.inc.php';
	require_once './function_autoload.php';
	require_once '../view/printMsg.php';
	require_once '../view/linkAutors.php';

	$autorDAO = new autorDAO();

  // comprovem si l'autor existeix abans d'eliminar-lo
	if (isset($_REQUEST['id'])) {
	    $id = $_REQUEST['id'];
			$autor = $autorDAO->cercarId($id);
	}

	$msg = null;
	try {

		if ($autor != null) {
			$resultat = $autorDAO->eliminar($id);
			if ($resultat) {
				$msg = "Dades eliminades correctament!!";
			}

		} else {
			$msg = "No s'ha pogut eliminar. L'autor no existeix";
		}

} catch (Exception $e) {
	$msg = "Error en eliminar les dades .$e";
}

if ($msg != null) {
	printMsg($msg);
}

linkAutors();
?>
