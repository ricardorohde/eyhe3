<?php

  $ids = $_POST['identificador'];
  $quebra = explode("-", $ids);

  $idHeroi = $quebra[0];
  $idAnjo = $quebra[1];
  //$idHeroi = 155;
  //$idAnjo = 13;
  $rand = rand();
  $tabela = 'talk_'.$idHeroi.'_'.$idAnjo.'_'.$rand;

  date_default_timezone_set('America/Sao_Paulo');
  $datainicio = date('Y-m-d H:i:s');
  include "conecta.php";

  #CRIAÇÃO DA TABELA QUE CONTEM AS MENSAGENS!
  try {
       $sql ="CREATE table $tabela(
       id int(11) AUTO_INCREMENT PRIMARY KEY,
       remetente varchar(20) NOT NULL,
       datahora datetime NOT NULL,
       texto text NOT NULL,
       leitura DATETIME NULL DEFAULT NULL);" ;
       $conexao->exec($sql);
       //print("Created $tabela Table.\n");

  } catch(PDOException $e) {
      echo $e->getMessage();//Remove or change message in production code
  }

  #GERAÇÃO DE SESSION_ID
  include "../../tokbox_server/index.php";

  #registra tudo na tabela conversa!
  $premium = 1;

  try{
     $stmte2 = $conexao->prepare("INSERT INTO conversas (idanjo, idheroi, tabela, datainicio, ultimamsg, session, premium) VALUES (?,?,?,?,?,?,?)");
     $stmte2->bindParam(1, $idAnjo , PDO::PARAM_STR);
     $stmte2->bindParam(2, $idHeroi , PDO::PARAM_STR);
     $stmte2->bindParam(3, $tabela , PDO::PARAM_STR);
     $stmte2->bindParam(4, $datainicio , PDO::PARAM_STR);
     $stmte2->bindParam(5, $datainicio , PDO::PARAM_STR);
     $stmte2->bindParam(6, $session_id , PDO::PARAM_STR);
     $stmte2->bindParam(7, $premium , PDO::PARAM_STR);
     $executa2 = $stmte2->execute();

     $idconversa = $conexao->lastInsertId();

    if($executa2)
       //$redirect = "chat.php?myid=$idHeroi&idanjo=$idAnjo&where=$tabela&room=$session_id";
       $array = array('idheroi' => $idHeroi, 'idanjo' => $idAnjo, 'tabela' => $tabela, 'sessao' => $session_id, 'idconversa' => $idconversa);
       $vetor[] = array_map('htmlentities', $array);

    }
   catch(PDOException $e){
      echo $e->getMessage();
   }

   echo json_encode($vetor, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);


?>
