<?php
		require_once '../config/config.inc.php';
		require_once './function_autoload.php';
		require_once '../view/linkLlibres.php';

		$llibreDAO = new llibreDAO();

		$arrayLlibres = $llibreDAO->veureLlibres();

		require_once '../view/list_llibres.php';

		linkLlibres();
?>
