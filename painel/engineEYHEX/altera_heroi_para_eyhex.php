<?php

   //Conexão com o DataBase
   include '../engine/conecta.php';

   //Registrando solicitação e retornando o id da solicitacao
   $talking = 0;
   $uber = 1;

   $id_heroi = $_POST['identificador'];


    try{
         $stmt = $conexao->prepare("UPDATE tab_usuario
         SET uber = :uber, talking = :talking
         WHERE id = :id_heroi");
         $stmt->bindParam(':uber', $uber);
         $stmt->bindParam(':talking', $talking);
         $stmt->bindParam(':id_heroi', $id_heroi);
         $executa = $stmt->execute();

     }
     catch(PDOException $e){
       echo $e->getMessage();
     }

     $consulta = $conexao->query("SELECT nome FROM tab_usuario  WHERE id = $id_heroi limit 1");
     while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
        $nome_heroi = $linha['nome'];
     }
     //vou enviar notificação para todos os anjos online!
     $consulta = $conexao->query("SELECT telefone FROM anjos  WHERE online = 1");
     while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
         $telefone_anjo = $linha['telefone'];
         $telefone_anjo = str_replace("+", "", $telefone_anjo);

         if(substr($telefone_anjo, 0, 2) != '55'){
           $telefone_anjo = '55'.$telefone_anjo;
         }

         $ch = curl_init();

         curl_setopt($ch, CURLOPT_URL, 'https://api.zenvia.com/v2/channels/whatsapp/messages');
         curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
         curl_setopt($ch, CURLOPT_POST, 1);
         curl_setopt($ch, CURLOPT_POSTFIELDS, "{\n  \"from\": \"554591197570\",\n  \"to\": \"$telefone_anjo\",\n  \"contents\": [{\n    \"type\": \"template\",\n    \"templateId\": \"0e2c58dc-fc90-4aa1-bfd8-fb0b4508cf92\",\n    \"fields\":{\n     \"nome_heroi\":\"$nome_heroi\"\n  }\n  }]\n}");

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
     }


?>
