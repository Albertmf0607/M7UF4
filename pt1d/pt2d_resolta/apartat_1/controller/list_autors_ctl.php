<?php
		require_once '../config/config.inc.php';
		require_once './function_autoload.php';
		require_once '../view/linkAutors.php';

		$autorDAO = new autorDAO();

		$arrayAutors = $autorDAO->veureAutors();

		require_once '../view/list_autors.php';

		linkAutors();
?>
