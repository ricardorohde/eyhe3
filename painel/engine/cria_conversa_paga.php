<?php

  $ids = $_POST['identificador'];
  $quebra = explode("-", $ids);

  $idHeroi = $quebra[0];
  $idAnjo = $quebra[1];
  //$idHeroi = 155;
  //$idAnjo = 155;
  $rand = rand();
  $tabela = 'talk_'.$idHeroi.'_'.$idAnjo.'_'.$rand;

  date_default_timezone_set('America/Sao_Paulo');
  $datainicio = date('Y-m-d H:i:s');
  include "conecta.php";

  //pegando infos do anjo
  $consulta = $conexao->query("SELECT telefone, nome FROM anjos  WHERE id = $idAnjo limit 1");
    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
        $telefone_anjo = $linha['telefone'];
        $telefone_anjo = str_replace("+", "", $telefone_anjo);

        if(substr($telefone_anjo, 0, 2) != '55'){
          $telefone_anjo = '55'.$telefone_anjo;
        }
    }

  //pegando infos do heroi
   $consulta = $conexao->query("SELECT nome FROM tab_usuario  WHERE id = $idHeroi limit 1");
    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
        $nome_heroi = $linha['nome'];
    }

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
  $status = "Em espera";

  try{
     $stmte2 = $conexao->prepare("INSERT INTO conversas (idanjo, idheroi, tabela, datainicio, ultimamsg, session, premium, status) VALUES (?,?,?,?,?,?,?,?)");
     $stmte2->bindParam(1, $idAnjo , PDO::PARAM_STR);
     $stmte2->bindParam(2, $idHeroi , PDO::PARAM_STR);
     $stmte2->bindParam(3, $tabela , PDO::PARAM_STR);
     $stmte2->bindParam(4, $datainicio , PDO::PARAM_STR);
     $stmte2->bindParam(5, $datainicio , PDO::PARAM_STR);
     $stmte2->bindParam(6, $session_id , PDO::PARAM_STR);
     $stmte2->bindParam(7, $premium , PDO::PARAM_STR);
     $stmte2->bindParam(8, $status , PDO::PARAM_STR);
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

   //enviando whatsapp para anjo sobre o atendimento
   $ch = curl_init();

   curl_setopt($ch, CURLOPT_URL, 'https://api.zenvia.com/v2/channels/whatsapp/messages');
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
   curl_setopt($ch, CURLOPT_POST, 1);
   curl_setopt($ch, CURLOPT_POSTFIELDS, "{\n  \"from\": \"554591197570\",\n  \"to\": \"$telefone_anjo\",\n  \"contents\": [{\n    \"type\": \"template\",\n    \"templateId\": \"8d36173d-63f9-46ca-9241-c230f76eb0e8\",\n    \"fields\":{\n     \"nome_heroi\":\"$nome_heroi\"\n  }\n  }]\n}");

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

   echo json_encode($vetor, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);


?>
