<?php

  $sentimento = $_POST['sentimento'];
  $definicao = $_POST['definicao'];
  $comentario = $_POST['comentario'];
  $idheroi = $_POST['idheroi'];
  $tabela = $_POST['tabela'];
  $idanjo = $_POST['idanjo'];



  date_default_timezone_set('America/Sao_Paulo');
  $dataavaliacao = date('Y-m-d H:i');

  include "conecta.php";


  $erro = 0;
  #inserindo no banco
  try{
     $stmte2 = $conexao->prepare("INSERT INTO avaliacoes_new (tabela, idanjo, idheroi, sentimento, definicao, comentario, dataavaliacao) VALUES (?,?,?,?,?,?,?)");
     $stmte2->bindParam(1, $tabela , PDO::PARAM_STR);
     $stmte2->bindParam(2, $idanjo , PDO::PARAM_STR);
     $stmte2->bindParam(3, $idheroi , PDO::PARAM_STR);
     $stmte2->bindParam(4, $sentimento , PDO::PARAM_STR);
     $stmte2->bindParam(5, $definicao , PDO::PARAM_STR);
     $stmte2->bindParam(6, $comentario , PDO::PARAM_STR);
     $stmte2->bindParam(7, $dataavaliacao , PDO::PARAM_STR);

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
     echo 'salvo';
   }



?>
