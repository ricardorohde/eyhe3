<?php

$id  = $_POST['identificador'];
include ("conecta.php");


try{

  $stmt = $conexao->prepare('DELETE FROM tags WHERE id = :id');
  $stmt->bindParam(':id', $id);
  $executa = $stmt->execute();

  if(!$executa)
    echo 'erro';

}
catch(PDOException $e){
  echo $e->getMessage();
}

else
   echo 'Tag excluida com sucesso!';


?>
