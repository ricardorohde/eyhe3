<?php

$resumo = $_POST['resumo'];
$tabela = $_POST['tabela'];

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
