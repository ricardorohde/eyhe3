<?php
session_start();

if(!isset($_SESSION['logado_anjo'])){
	header("Location: anjo-login.php");
}

if(empty($_SESSION['id_anjo'])){
	session_destroy();
	header("Location: anjo-login.php");
}

if($_SESSION['id_anjo'] == ''){
	session_destroy();
	header("Location: anjo-login.php");
}

?>
