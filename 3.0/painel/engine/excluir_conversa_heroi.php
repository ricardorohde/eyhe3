<?php

$id  = $_POST['identificador'];
include ("conecta.php");

$status = 1;

try{

  $stmt = $conexao->prepare('UPDATE conversas
  SET offheroi = :offheroi
  WHERE id = :id');
  $stmt->bindParam(':offheroi', $status);
  $stmt->bindParam(':id', $id);
  $executa = $stmt->execute();

  if(!$executa)
    echo 'Não foi possivel excluir';

  else
   echo 'Conversa excluida com sucesso!';


}
catch(PDOException $e){
  echo $e->getMessage();
}


?>
