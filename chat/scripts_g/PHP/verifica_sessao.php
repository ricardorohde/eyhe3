<?php
session_start();

/*error_reporting(0);
ini_set(“display_errors”, 0 );*/

//atualiza 'ultimo_login' do heroi!
$idheroi = $_SESSION['id'];
date_default_timezone_set('America/Sao_Paulo');
$ultimologin = date('Y-m-d H:i');

include '../painel/engine/conecta.php';

try{
	$stmt = $conexao->prepare("UPDATE tab_usuario
	SET ultimologin = :ultimologin
	WHERE id = :idheroi ");
	$stmt->bindParam(':ultimologin', $ultimologin);
	$stmt->bindParam(':idheroi', $idheroi);
	$executa = $stmt->execute();
}
catch(PDOException $e){
	//echo $e->getMessage();
}


if(!isset($_SESSION['logado'])):
	header("Location: index.php");
endif;
