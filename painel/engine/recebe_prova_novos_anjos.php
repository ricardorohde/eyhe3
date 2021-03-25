<?php

include 'conecta.php';
$idanjo = $_POST['idnovoanjo'];

date_default_timezone_set('America/Sao_Paulo');
$dataprova = date('Y-m-d H:i');

$prova = json_encode($_POST);

$erro = 0;

try{
   $stmte2 = $conexao->prepare("INSERT INTO provadosanjos (idanjo, prova, dataprova) VALUES (?,?,?)");
   $stmte2->bindParam(1, $idanjo , PDO::PARAM_STR);
   $stmte2->bindParam(2, $prova , PDO::PARAM_STR);
   $stmte2->bindParam(3, $dataprova , PDO::PARAM_STR);

   $executa2 = $stmte2->execute();

 if(!$executa2)
     $erro++;
  }
 catch(PDOException $e){
    echo $e->getMessage();
 }


 if($erro == 0){
   echo 'provacadastrada';
 }else{
   echo 'erro';
 }



?>
