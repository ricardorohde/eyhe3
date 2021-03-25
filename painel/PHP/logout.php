<?php
	
	session_start(); //iniciando a sessão
	$_SESSION["logado"] = 0;
	session_destroy();

	header('Location: ../index.php');

?>