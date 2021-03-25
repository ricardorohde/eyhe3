<?php

date_default_timezone_set('America/Sao_Paulo');
$datasolicitacao = date('Y-m-d H:i');
include "conecta.php";
$tabela = $_POST['tabela'];
$valor = 14;
$status = 'aguardando';
$erro = 0;

//extraindo idheroi e idanjo da tabela
$partes = explode("_",$tabela);
$idanjo = $partes[1];
$idheroi = $partes[2];

#inserindo no banco
try{
   $stmte2 = $conexao->prepare("INSERT INTO pagamentos
   (idanjo, idheroi, datasolicitacao, valor, tabela, status) VALUES (?,?,?,?,?,?)");
   $stmte2->bindParam(1, $idanjo , PDO::PARAM_STR);
   $stmte2->bindParam(2, $idheroi , PDO::PARAM_STR);
   $stmte2->bindParam(3, $datasolicitacao , PDO::PARAM_STR);
   $stmte2->bindParam(4, $valor , PDO::PARAM_STR);
   $stmte2->bindParam(5, $tabela , PDO::PARAM_STR);
   $stmte2->bindParam(6, $status , PDO::PARAM_STR);
   $executa2 = $stmte2->execute();

 if(!$executa2)
     $erro++;
  }
 catch(PDOException $e){
    echo $e->getMessage();
 }


 if($erro > 0){
   echo 'erro';
 }else{
   echo 'sucesso';
 }


?>
