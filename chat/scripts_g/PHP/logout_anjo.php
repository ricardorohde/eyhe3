<?php
session_start();

include '../../painel/engine/conecta.php';
$idanjo = $_SESSION['idanjo'];
$online = 0;

try{
  $stmt = $conexao->prepare('UPDATE anjos
  SET online = :online
  WHERE id = :idanjo');
  $stmt->bindParam(':online', $online);
  $stmt->bindParam(':idanjo', $idanjo);
  $executa = $stmt->execute();
}
catch(PDOException $e){
  echo $e->getMessage();
}

$_SESSION['logadoanjo'] = 'NAO';
header("Location: ../../areadoanjo/index.php");
