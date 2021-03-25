<?php

session_cache_expire(7200);
// isso dá 5 dias!

session_start();

/*error_reporting(0);
ini_set(“display_errors”, 0 );*/

//atualiza 'ultimo_login' do heroi!
$idanjo = $_SESSION['idanjo'];
date_default_timezone_set('America/Sao_Paulo');
$ultimologin = date('Y-m-d H:i');


$hostname = 'external-db.s65738.gridserver.com';
$username = 'db65738_gui';
$password = '.68v_eCR_cp';
$database = 'db65738_plataformaeyhe';
/*
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'eyheoficial';*/
try {
    $conexao = new PDO("mysql:host=$hostname;dbname=$database", $username, $password,
  array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
      //echo'Conexao efetuada com sucesso!';
    }
catch(PDOException $e)
    {
      echo $e->getMessage();
    }



try{
	$stmt = $conexao->prepare("UPDATE anjos
	SET ultimologin = :ultimologin
	WHERE id = :idanjo ");
	$stmt->bindParam(':ultimologin', $ultimologin);
	$stmt->bindParam(':idanjo', $idanjo);
	$executa = $stmt->execute();
}
catch(PDOException $e){
	//echo $e->getMessage();
}

if(isset($_COOKIE['logadoId'])){ //verifica o cookie logado e recupera o id do anjo
	$_SESSION['idanjo'] = $_COOKIE['logadoId'];
	$_SESSION['logadoanjo'] = 'SIM';
	$_SESSION['nomeanjo'] = $_COOKIE['nomeanjo'];
	$_SESSION['emailanjo'] = $_COOKIE['emailanjo'];
	$_SESSION['tipo'] = $_COOKIE['tipo'];
	exit();
}

if($_SESSION['logadoanjo'] == 'NAO'):
	header("Location: ../../areadoanjo/index.php");
endif;
