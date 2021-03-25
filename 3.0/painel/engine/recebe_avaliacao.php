<?php

  $sentimento = $_POST['radio_emocoes'];
  $tempo_resposta = $_POST['radio_estrelas'];
  $observacoes = $_POST['observacoes'];
  $idheroi = $_POST['idheroi'];
  $idconversa = $_POST['idconversa'];

  if(empty($tempo_resposta)){
    echo "Selecione uma opção para o tempo de resposta";
    exit();
  }
  if(empty($sentimento)){
    echo "Selecione uma opção para o como você se sentiu na conversa";
    exit();
  }

  date_default_timezone_set('America/Sao_Paulo');
  $dataavaliacao = date('Y-m-d H:i');

  include "conecta.php";


  //pegar id do anjo baseado no id da idconversa
  $consulta = $conexao->query("SELECT idanjo FROM conversas WHERE id = $idconversa");
  while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
        $idanjo = $linha['idanjo'];
  }

  $erro = 0;
  #inserindo no banco
  try{
     $stmte2 = $conexao->prepare("INSERT INTO avaliacoes (idconversa, idanjo, idheroi, sentimento, tempo, observacoes, dataavaliacao) VALUES (?,?,?,?,?,?,?)");
     $stmte2->bindParam(1, $idconversa , PDO::PARAM_STR);
     $stmte2->bindParam(2, $idanjo , PDO::PARAM_STR);
     $stmte2->bindParam(3, $idheroi , PDO::PARAM_STR);
     $stmte2->bindParam(4, $sentimento , PDO::PARAM_STR);
     $stmte2->bindParam(5, $tempo_resposta , PDO::PARAM_STR);
     $stmte2->bindParam(6, $observacoes , PDO::PARAM_STR);
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
     echo 'sucesso';
   }



?>
