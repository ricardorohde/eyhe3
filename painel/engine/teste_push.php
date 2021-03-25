<?php

  $myID = 'h_16';
  $mensagem = 'olá';
  $tabela = 'talk_16_27_1527792520';
  date_default_timezone_set('America/Sao_Paulo');
  $data_envio = date('Y-m-d H:i:s');

  include ("conecta.php");
  include ("log/log.php");

  $erro = 0;

  //se eu estou enviando, vou parar aqui e atualizar as mensagens lidas!
  $dataleitura = date('Y-m-d H:i');

  try{

    $stmt = $conexao->prepare("UPDATE $tabela
    SET leitura = :dataleitura
    WHERE (remetente != :meuid AND leitura IS NULL ) ");
    $stmt->bindParam(':dataleitura', $dataleitura);
    $stmt->bindParam(':meuid', $myID);
    $executa = $stmt->execute();

  }
  catch(PDOException $e){
    GeraLog::getInstance()->inserirLog("Erro: Código: " . $e->getCode() . " Mensagem: " . $e->getMessage());
    echo $e->getMessage();
  }

  #inserindo no banco
  try{
     $stmte2 = $conexao->prepare("INSERT INTO $tabela (remetente, datahora, texto) VALUES (?,?,?)");
     $stmte2->bindParam(1, $myID , PDO::PARAM_STR);
     $stmte2->bindParam(2, $data_envio , PDO::PARAM_STR);
     $stmte2->bindParam(3, $mensagem , PDO::PARAM_STR);
     $executa2 = $stmte2->execute();

   if(!$executa2)
       $erro++;
    }
   catch(PDOException $e){
      echo $e->getMessage();
   }

   //agora eu atualizado a tabela conversas com a data da ultima mensagem enviada!
   //com isso eu consigo dizer quem é minha ultima conversa mesmo
   //atualizo tbm os offanjo e offheroi, para que se a conversa foi apagada e surgiu uma nova msg, ela reaparece
   try{
     $vazio = null;
     $stmt = $conexao->prepare('UPDATE conversas
     SET ultimamsg = :ultimamsg,
         offheroi = :offheroi,
         offanjo = :offanjo
     WHERE tabela = :tabela');
     $stmt->bindParam(':ultimamsg', $data_envio);
     $stmt->bindParam(':offheroi', $vazio);
     $stmt->bindParam(':offanjo', $vazio);
     $stmt->bindParam(':tabela', $tabela);
     $executa = $stmt->execute();

   }
   catch(PDOException $e){
     echo $e->getMessage();
   }

   /* VAMOS ENVIAR UMA NOTIFICAÇÃO!! */

   //vamos pegar algumas informações sobre anjo e heroi para envio de push!
   $consulta = $conexao->prepare('SELECT idheroi,idanjo FROM conversas WHERE tabela = :tabela');
   $consulta->bindParam(':tabela', $tabela, PDO::PARAM_INT);
   $consulta->execute();

   while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
     $idheroi = $linha['idheroi'];
     $idanjo = $linha['idanjo'];
   }


   if(substr($myID,0,1) == 'h'){
     //echo 'vamos enviar notificação para o anjo!';
     //pausa para pegar id de push para enviar notificação pelo Onesignal
     $pushdesktop = '';
     $pushmobile = '';
     $consultapush = $conexao->query("SELECT idpushdesktop, idpushmobile FROM pushnotificationsanjo WHERE idanjo = $idanjo limit 1");
     while ($linha = $consultapush->fetch(PDO::FETCH_ASSOC)) {
       $pushdesktop = $linha['idpushdesktop'];
       $pushmobile = $linha['idpushmobile'];
     }

     //pausa para pegar nome do HEROI
     $consultaheroi = $conexao->prepare('SELECT nome FROM tab_usuario WHERE id = :idheroi LIMIT 1');
     $consultaheroi->bindParam(':idheroi', $idheroi, PDO::PARAM_INT);
     $consultaheroi->execute();

     while ($linhaheroi = $consultaheroi->fetch(PDO::FETCH_ASSOC)) {
       $nomeheroi = $linhaheroi['nome'];
     }

     if( ($pushdesktop != '') || ($pushmobile != '') ){
       //vamos enviar push
       include '../../OneSignal/envia_push_por_id.php';
       if($pushdesktop != ''){
         $txt = $nomeheroi.' acabou de iniciar enviar uma mensagem para você!';
         sendMessage("$pushdesktop", $txt);
         echo "push enviada para desktop do anjo!";
       }
       if($pushmobile != ''){
         $txt = $nomeheroi.' acabou de iniciar enviar uma mensagem para você!';
         sendMessage("$pushmobile", $txt);
         echo "push enviada para mobile do anjo!";
       }
     }

   }else{
     //vamos enviar notificação para o heroi!
   }



?>
