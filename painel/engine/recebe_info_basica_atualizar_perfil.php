<?php

include ("conecta.php");
include ("log/log.php");

$id = $_POST['id'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
//data de nascimento
$dia = $_POST['dia'];
$mes = $_POST['mes'];
$ano = $_POST['ano'];

$datanasc = $ano.'-'.$mes.'-'.$dia;

try{

  $stmt = $conexao->prepare('UPDATE tab_usuario
  SET nome = :nome,
      email = :email,
      telefone  = :telefone,
      datanasc = :datanasc
  WHERE id = :id');
  $stmt->bindParam(':nome', $nome);
  $stmt->bindParam(':email', $email);
  $stmt->bindParam(':telefone', $telefone);
  $stmt->bindParam(':datanasc', $datanasc);
  $stmt->bindParam(':id', $id);
  $executa = $stmt->execute();

  echo 'Atualizado!';

}
catch(PDOException $e){
  GeraLog::getInstance()->inserirLog("Erro: Código: " . $e->getCode() . " Mensagem: " . $e->getMessage());
  echo $e->getMessage();
}


?>
