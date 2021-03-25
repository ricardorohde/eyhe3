<?php
include "conecta.php";

$idheroi = $_POST['idheroi'];
$idanjo =  $_POST['idanjo'];
$idconversa = $_POST['idconversa'];

$conseguefalar = $_POST['consegue-falar'];
$expectativa = $_POST['expectativa'];
$sentindo = $_POST['sentindo'];
$descrisao = $_POST['conte-sobre-desafio'];


date_default_timezone_set('America/Sao_Paulo');
$dataprontuario = date('Y-m-d H:i');

$erro = 0;
#inserindo no banco
try{
   $stmte2 = $conexao->prepare("INSERT INTO prontuarios (idanjo, idheroi, idconversa, dataprontuario, conseguefalar, expectativa, sentindo, descrisao) VALUES (?,?,?,?,?,?,?,?)");
   $stmte2->bindParam(1, $idanjo , PDO::PARAM_STR);
   $stmte2->bindParam(2, $idheroi , PDO::PARAM_STR);
   $stmte2->bindParam(3, $idconversa , PDO::PARAM_STR);
   $stmte2->bindParam(4, $dataprontuario , PDO::PARAM_STR);
   $stmte2->bindParam(5, $conseguefalar , PDO::PARAM_STR);
   $stmte2->bindParam(6, $expectativa , PDO::PARAM_STR);
   $stmte2->bindParam(7, $sentindo , PDO::PARAM_STR);
   $stmte2->bindParam(8, $descrisao , PDO::PARAM_STR);

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
