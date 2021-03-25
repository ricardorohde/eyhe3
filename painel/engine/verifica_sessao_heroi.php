<?php
session_start();

if(!isset($_SESSION['logado_heroi'])){
	header("Location: login.php");
}

if(empty($_SESSION['id_heroi'])){
	session_destroy();
	header("Location: login.php");
}

if($_SESSION['id_heroi'] == ''){
	session_destroy();
	header("Location: login.php");
}

?>
