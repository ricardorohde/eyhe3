<?php

include 'conecta.php';

$idheroi = $_POST['idheroi'];
$idanjo = $_POST['idanjo'];
$tabela = $_POST['tabela'];


  /*informações de teste
  $tabela = 'talk_3009_21_1658605688';
  $idheroi = '3009';
  $idanjo = '21';*/

$consulta = $conexao->prepare("SELECT status, datastatus FROM pagamentos WHERE idanjo =:idanjo AND idheroi =:idheroi AND tabela =:tabela ORDER by id DESC limit 1");
$consulta->bindParam(':idanjo', $idanjo, PDO::PARAM_INT);
$consulta->bindParam(':idheroi', $idheroi, PDO::PARAM_INT);
$consulta->bindParam(':tabela', $tabela, PDO::PARAM_INT);
$consulta->execute();
while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
  $id_pagamento = $linha['id'];
  $status_pagamento = $linha['status'];
  $datahora_ultima_atualizacao_status = $linha['datastatus'];
}

if($status_pagamento == null) {
  $status = '10minutos';
}else{
  $status = $status_pagamento;
}

echo $status;


?>
