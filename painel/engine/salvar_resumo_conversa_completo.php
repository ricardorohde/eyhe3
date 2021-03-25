<?php

$tabela = $_POST['tabela'];
$sentimento = $_POST['sentimento'];
$expectativa = $_POST['expectativa'];
$resumo = $_POST['resumo'];
$valor = $_POST['valor_auto_estima'];

if($sentimento == ''){
  $sentimento = 'Neutro';
}
if($expectativa == ''){
  $expectativa = 'Sem expectativas';
}


if($valor > 50){
  $autoestima = 'Alta';
}
if($valor < 50){
  $autoestima = 'Baixa';
}else{
  $autoestima = 'Média';
}


$resumo = 'Olá Anjo, esse é o <b>prontuário</b> do seu Herói: <br/>Sentimento: '.$sentimento.'<br/>Expectativas: '.$expectativa.'<br/>Auto Estima: '.$autoestima.'<br/>Comentários adicionais: '.$resumo;

/*(flags das notificacoes)


*/

include "conecta.php";

try{

  $stmt = $conexao->prepare("UPDATE conversas
  SET resumo = :resumo
  WHERE (tabela = :tabela) ");
  $stmt->bindParam(':resumo', $resumo);
  $stmt->bindParam(':tabela', $tabela);
  $executa = $stmt->execute();

}
catch(PDOException $e){
  echo $e->getMessage();
}

//fim da confiramação de leitura!!
echo "Resumo salvo com sucesso! Seu anjo terá acesso a isso.";

?>
