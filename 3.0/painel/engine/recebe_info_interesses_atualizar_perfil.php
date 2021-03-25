<?php

include ("conecta.php");
include ("log/log.php");

$id = $_POST['id'];
$interesse1 = $_POST['interesse1'];
$interesse2 = $_POST['interesse2'];
$interesse3 = $_POST['interesse3'];

try{

  $stmt = $conexao->prepare('UPDATE tab_usuario
  SET interesse1 = :interesse1,
      interesse2 = :interesse2,
      interesse3 = :interesse3
  WHERE id = :id');
  $stmt->bindParam(':interesse1', $interesse1);
  $stmt->bindParam(':interesse2', $interesse2);
  $stmt->bindParam(':interesse3', $interesse3);
  $stmt->bindParam(':id', $id);
  $executa = $stmt->execute();

  echo 'Atualizado!';

}
catch(PDOException $e){
  GeraLog::getInstance()->inserirLog("Erro: Código: " . $e->getCode() . " Mensagem: " . $e->getMessage());
  echo $e->getMessage();
}


?>
