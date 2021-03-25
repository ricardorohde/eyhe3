<?php
	
	session_start(); //iniciando a sessão
	
	if($_SESSION["logado"] != 1 ){
		header('Location: index.php');
	}




?>