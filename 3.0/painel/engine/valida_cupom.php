<?php

$cupom = $_POST['cupom'];
include "conecta.php";

$consulta = $conexao->prepare('SELECT desconto FROM cupom WHERE nome = :nome LIMIT 1');
$consulta->bindParam(':nome', $cupom, PDO::PARAM_STR);
$consulta->execute();
while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
  $desconto = $linha['desconto'];
}

if($desconto == ''){
  $retorno = 'invalido' ;
}else{
  $retorno = $desconto;
}

echo $retorno;
 ?>
