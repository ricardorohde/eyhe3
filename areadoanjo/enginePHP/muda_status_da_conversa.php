<?php
    //Conectando ao banco de dados
    include "conecta.php";

    $idchamada = $_POST['identificador'];
    $status = $_POST['status'];


    try{

      $stmt = $conexao->prepare("UPDATE conversas
      SET status = :status
      WHERE (id = :id) ");
      $stmt->bindParam(':status', $status);
      $stmt->bindParam(':id', $idchamada);
      $executa = $stmt->execute();

    }
    catch(PDOException $e){
      GeraLog::getInstance()->inserirLog("Erro: Código: " . $e->getCode() . " Mensagem: " . $e->getMessage());
      echo $e->getMessage();
    }


        //PEGANDO INFOS PRA MONTAR URL DO CHAT
       $consulta = $conexao->prepare("SELECT * FROM conversas WHERE (id = $idchamada) ORDER BY id DESC limit 1");
       $consulta->execute();
       while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
          $idheroi = $linha['idheroi'];
          $tabela = $linha['tabela'];
          $session = $linha['session'];
          $idanjo = $linha['idanjo'];
       }

       //PEGANDO TELEFONE DO HEROI
       $consulta = $conexao->prepare("SELECT telefone FROM tab_usuario WHERE (id = $idheroi) limit 1");
       $consulta->execute();
       while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
         $telefone_heroi = $linha['telefone'];
         $telefone_heroi = str_replace("+", "", $telefone_heroi);

         if(substr($telefone_heroi, 0, 2) != '55'){
           $telefone_heroi = '55'.$telefone_heroi;
         }
       }

       //PEGANDO NOME DO ANJO
       $consulta = $conexao->prepare("SELECT nome FROM anjos WHERE (id = $idanjo) limit 1");
       $consulta->execute();
       while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
         $nome_anjo = $linha['nome'];
       }

    $url_chat = 'chat.php?myid='.$idanjo.'&idother='.$idheroi.'&room='.$session.'&where='.$tabela;
    $url_whats_heroi = 'https://eyhe.com.br/chat.php?myid='.$idheroi.'&idanjo='.$idanjo.'&room='.$session.'&where='.$tabela;

    //enviando notificacoes para heroi
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://api.zenvia.com/v2/channels/whatsapp/messages');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, "{\n  \"from\": \"554591197570\",\n  \"to\": \"$telefone_heroi\",\n  \"contents\": [{\n    \"type\": \"template\",\n    \"templateId\": \"516ae9a5-b7fd-4bb0-b1e9-4d2697a15f89\",\n    \"fields\":{\n     \"nome_anjo\":\"$nome_anjo\"\n, \"url_chat\":\"$url_whats_heroi\"\n  }\n  }]\n}");

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


    //retorna url do chat para anjo
    echo $url_chat;

?>
