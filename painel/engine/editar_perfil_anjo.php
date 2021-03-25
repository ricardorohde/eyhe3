<?php

include ("conecta.php");
include ("log/log.php");

$id = $_POST['id'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$biografia = $_POST['biografia'];
$status = $_POST['status'];
$online = $_POST['online'];
$telefone = $_POST['telefone'];
$textovitrini = $_POST['textovitrini'];

$desafios = $_POST["desafios"];
if(count($desafios) == 3){
  $desafio1 = $desafios[0];
  $desafio2 = $desafios[1];
  $desafio3 = $desafios[2];
}

if(count($desafios) == 2){
  $desafio1 = $desafios[0];
  $desafio2 = $desafios[1];
  $desafio3 = "";
}

if(count($desafios) == 1){
  $desafio1 = $desafios[0];
  $desafio2 = "";
  $desafio3 = "";
}

try{

  $stmt = $conexao->prepare('UPDATE anjos SET nome = :nome, email = :email, biografia = :biografia, status = :status, online = :online, telefone = :telefone,
                            textovitrini = :textovitrini, desafio1 = :desafio1, desafio2 = :desafio2, desafio3 = :desafio3 WHERE id = :id');
  $stmt->bindParam(':nome', $nome);
  $stmt->bindParam(':email', $email);
  $stmt->bindParam(':biografia', $biografia);
  $stmt->bindParam(':status', $status);
  $stmt->bindParam(':online', $online);
  $stmt->bindParam(':telefone', $telefone);
  $stmt->bindParam(':textovitrini', $textovitrini);

    $stmt->bindParam(':desafio1', $desafio1);
    $stmt->bindParam(':desafio2', $desafio2);
    $stmt->bindParam(':desafio3', $desafio3);

  $stmt->bindParam(':id', $id);
  $executa = $stmt->execute();

  echo 'Anjo atualizado com sucesso!';

}
catch(PDOException $e){
  GeraLog::getInstance()->inserirLog("Erro: Código: " . $e->getCode() . " Mensagem: " . $e->getMessage());
  echo $e->getMessage();
}


?>
