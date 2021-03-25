<?php
$id = (int)$_POST['identificador'];
$imagem = '';
include 'conecta.php';
try{

  $stmt = $conexao->prepare('UPDATE blog SET imagem_destaque = :imagem WHERE id = :id');
  $stmt->bindParam(':id', $id);
  $stmt->bindParam(':imagem', $set_imagem);
  $executa = $stmt->execute();
  echo 'Imagem destaque excluida!';

}
catch(PDOException $e){
  echo $e->getMessage();
}

?>
