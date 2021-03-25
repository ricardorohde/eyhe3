<?php

$tabela = $_POST['nome_tabela'];
include 'conecta.php';

$consulta = $conexao->prepare("SELECT * FROM conversas WHERE tabela = :tabela LIMIT 1 ");
$consulta->bindParam(':tabela', $tabela, PDO::PARAM_STR);
$consulta->execute();
while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
  $status = $linha['status'];
  $idanjo = $linha['idanjo'];
  $idheroi = $linha['idheroi'];
  $tabela = $linha['tabela'];
  $session = $linha['session'];
}

$url_chat = 'chat.php?myid='.$idheroi.'&idanjo='.$idanjo.'&room='.$session.'&where='.$tabela;

if($status == 'Em andamento'){
  echo $url_chat;
}else{
  echo $status;
}
 ?>
