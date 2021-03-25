<?php

include ("conecta.php");
$id = $_POST['id'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$biografia = $_POST['biografia'];

try{

  $stmt = $conexao->prepare('UPDATE anjos
  SET nome = :nome,
      email = :email,
      telefone  = :telefone,
      biografia = :biografia WHERE id = :id');
  $stmt->bindParam(':nome', $nome);
  $stmt->bindParam(':email', $email);
  $stmt->bindParam(':telefone', $telefone);
  $stmt->bindParam(':biografia', $biografia);
  $stmt->bindParam(':id', $id);
  $executa = $stmt->execute();

  echo 'Informações básicas atualizadas!';

}
catch(PDOException $e){
  echo $e->getMessage();
}


?>
