<?php

#GERAÇÃO DE SESSION_ID
include "../../tokbox_server/index.php";
//echo $session_id;

$ids = $_POST['ids'];
$quebra = explode("-", $ids);
$idUBER = $quebra[0];
$idAnjo = $quebra[1];
$rand = rand();
$tabela = 'talk_PLANTAO_'.$idUBER.'_'.$idAnjo.'_'.$rand;

date_default_timezone_set('America/Sao_Paulo');
$datainicio = date('Y-m-d H:i:s');
include "conecta.php";

  //vou pegar avatar e nome do anjo
  $consulta = $conexao->prepare('SELECT avatar, nome FROM anjos WHERE id = :id LIMIT 1');
  $consulta->bindParam(':id', $idAnjo, PDO::PARAM_INT);
  $consulta->execute();
  while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
    $avatar =  'https://eyhe.com.br/painel/'.$linha['avatar'];
    $nome_anjo = $linha['nome'];
  }


   //vou ver se esse heroi já foi acolhido
   $consulta = $conexao->prepare('SELECT talking, nome, telefone, email FROM tab_usuario WHERE id = :id LIMIT 1');
   $consulta->bindParam(':id', $idUBER, PDO::PARAM_INT);
   $consulta->execute();
   while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
     $talking = $linha['talking'];
     $nome_heroi = $linha['nome'];
     $telefone_heroi = $linha['telefone'];
     $email_heroi = $linha['email'];
     $telefone_heroi = str_replace("+", "", $telefone_heroi);
     if(substr($telefone_heroi, 0, 2) != '55'){
       $telefone_heroi = '55'.$telefone_heroi;
     }
   }

   if($talking != 0){
     //ok, alguem anjo ja acolheu ele!
     echo "erro";
   }else{
     //ok, vamos acolher!

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

         #registra tudo na tabela conversa!
         $premium = 1;
         $status = 'Em andamento';
         try{
            $stmte2 = $conexao->prepare("INSERT INTO conversas (idanjo, idheroi, tabela, datainicio, ultimamsg, session, premium, status) VALUES (?,?,?,?,?,?,?,?)");
            $stmte2->bindParam(1, $idAnjo , PDO::PARAM_STR);
            $stmte2->bindParam(2, $idUBER , PDO::PARAM_STR);
            $stmte2->bindParam(3, $tabela , PDO::PARAM_STR);
            $stmte2->bindParam(4, $datainicio , PDO::PARAM_STR);
            $stmte2->bindParam(5, $datainicio , PDO::PARAM_STR);
            $stmte2->bindParam(6, $session_id , PDO::PARAM_STR);
            $stmte2->bindParam(7, $premium , PDO::PARAM_STR);
            $stmte2->bindParam(8, $status , PDO::PARAM_STR);
            $executa2 = $stmte2->execute();
            $idconversa = $conexao->lastInsertId();

          }
          catch(PDOException $e){
             echo $e->getMessage();
          }

          //ATUALIZANDO INFORMAÇÕES NA TABELA DO UBER!
          try{
             $stmt = $conexao->prepare("UPDATE tab_usuario
             SET talking = :idanjo, idconversa = :idconversa, tabela = :tabela
             WHERE (id = :iduber) ");
             $stmt->bindParam(':idanjo', $idAnjo);
             $stmt->bindParam(':idconversa', $idconversa);
             $stmt->bindParam(':tabela', $tabela);
             $stmt->bindParam(':iduber', $idUBER);
             $executa = $stmt->execute();

           }
           catch(PDOException $e){
             echo $e->getMessage();
           }

      /* ENVIANDO NOTIFICAÇÃO POR SMS E EMAIL PARA O HEROI SOBRE O ACOLHIMENTO */
      $link_chat_heroi = 'https://www.eyhe.com.br/chat.php?myid='.$idUBER.'&idanjo='.$idAnjo.'&room='.$session_id.'&where='.$tabela;
      $link_chat_anjo = 'chat.php?myid='.$idAnjo.'&idother='.$idUBER.'&room='.$session_id.'&where='.$tabela;

      //enviando notificacoes para heroi
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, 'https://api.zenvia.com/v2/channels/whatsapp/messages');
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_POST, 1);
      curl_setopt($ch, CURLOPT_POSTFIELDS, "{\n  \"from\": \"554591197570\",\n  \"to\": \"$telefone_heroi\",\n  \"contents\": [{\n    \"type\": \"template\",\n    \"templateId\": \"516ae9a5-b7fd-4bb0-b1e9-4d2697a15f89\",\n    \"fields\":{\n     \"nome_anjo\":\"$nome_anjo\"\n, \"url_chat\":\"$link_chat_heroi\"\n  }\n  }]\n}");

      $headers = array();
      $headers[] = 'Content-Type: application/json';
      $headers[] = 'X-Api-Token: H6-DfnQg62Lw-SEZPAxnven5TzcWbvtA-XAj';
      curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

      $result = curl_exec($ch);
      if (curl_errno($ch)) {
          //echo 'Error:' . curl_error($ch);
      }else{
        //print_r($result);
      }
      curl_close($ch);
      //fim da notificação

      echo $link_chat_anjo;

   }



 ?>
