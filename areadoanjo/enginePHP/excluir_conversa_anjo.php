<?php

$id  = $_POST['identificador'];
include ("conecta.php");

$status = 1;

try{

  $stmt = $conexao->prepare('UPDATE conversas
  SET offanjo = :offanjo
  WHERE id = :id');
  $stmt->bindParam(':offanjo', $status);
  $stmt->bindParam(':id', $id);
  $executa = $stmt->execute();

  if(!$executa)
    echo 'erro';

  else
   echo 'Conversa excluida com sucesso!';


}
catch(PDOException $e){
  echo $e->getMessage();
}


?>
