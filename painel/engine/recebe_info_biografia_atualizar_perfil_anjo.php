<?php

include ("conecta.php");
include ("log/log.php");

$id = $_POST['id'];
$historia = $_POST['historia'];

try{

  $stmt = $conexao->prepare('UPDATE anjos
  SET biografia = :historia
  WHERE id = :id');
  $stmt->bindParam(':historia', $historia);
  $stmt->bindParam(':id', $id);
  $executa = $stmt->execute();

  echo 'Atualizado!';

}
catch(PDOException $e){
  GeraLog::getInstance()->inserirLog("Erro: Código: " . $e->getCode() . " Mensagem: " . $e->getMessage());
  echo $e->getMessage();
}


?>
