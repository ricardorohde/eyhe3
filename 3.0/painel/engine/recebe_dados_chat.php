<?php

  include 'envia_push.php';
  include 'funcoes-sms.php';

  $myID = $_POST['myID'];
  $mensagem = $_POST['msgTxt'];
  $tabela = $_POST['tabela'];
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
   $consulta = $conexao->prepare('SELECT idheroi,idanjo,session FROM conversas WHERE tabela = :tabela');
   $consulta->bindParam(':tabela', $tabela, PDO::PARAM_INT);
   $consulta->execute();

   while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
     $idheroi = $linha['idheroi'];
     $idanjo = $linha['idanjo'];
     $s = $linha['session'];
   }


   if(substr($myID,0,1) == 'h'){

      //se estamos aqui, é pq o heroi escreveu algo.
      // é a primeira mensagem do heroi ? Se sim -> envia sms para anjo sobre inicio de chat!
      $quantidade_msg_heroi = 0;
      $consultay = $conexao->prepare("SELECT remetente FROM $tabela");
      $consultay->execute();
      while ($linhay = $consultay->fetch(PDO::FETCH_ASSOC)) {
        if(substr($linhay['remetente'],0,1) == 'h') $quantidade_msg_heroi++;
      }

      if($quantidade_msg_heroi == 1){

        //vou enviar sms sobre inicio de chat!
        $consultaz = $conexao->query("SELECT nome, email, telefone FROM anjos WHERE id = $idanjo limit 1");
        while ($linhaz = $consultaz->fetch(PDO::FETCH_ASSOC)) {
          $nomeanjo = $linhaz['nome'];
          $emailanjo = $linhaz['email'];
          $telefone = $linhaz['telefone'];
        }

        //pausa para pegar nome do heroi
        $consulta = $conexao->query("SELECT nome, telefone FROM tab_usuario WHERE id = $idheroi limit 1");
        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
          $nomeheroi = $linha['nome'];         
        }

              

       include '../../enviaemail.php';
       $msg =  file_get_contents("../../html_notificacao_anjo.html");
       $assunto = $nomeheroi. ' acabou de iniciar um chat com você!';

       // QUANDO ACABAR O PERIODO DE TESTE, DESCOMENTAR
       EnviarEmail($emailanjo, $msg, $assunto, $nomeanjo);


      }



     //echo 'vamos enviar notificação para o anjo!';
     //pausa para pegar id de push para enviar notificação pelo Onesignal

     //atualiza 'ultimo_login' do heroi!
     $idheroi = explode('_',$myID);
     $idheroi = $idheroi[1];
     date_default_timezone_set('America/Sao_Paulo');
     $ultimologin = date('Y-m-d H:i:s');

     try{
     	$stmt = $conexao->prepare("UPDATE tab_usuario
     	SET ultimologin = :ultimologin
     	WHERE id = :idheroi ");
     	$stmt->bindParam(':ultimologin', $ultimologin);
     	$stmt->bindParam(':idheroi', $idheroi);
     	$executa = $stmt->execute();
     }
     catch(PDOException $e){
     	//echo $e->getMessage();
     }

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
       $url = 'https://www.eyhe.com.br/chat_a.php?myid='.$idanjo.'&idother='.$idheroi.'&where='.$tabela.'&room='.$s;
       if($pushdesktop != ''){
         $txt = $nomeheroi.' acabou de enviar uma mensagem para você!';
         // QUANDO ACABAR O PERIODO DE TESTE, DESCOMENTAR
         //sendpush("$pushdesktop", $txt, $url);
         echo "push enviada para desktop do anjo!";
       }
       if($pushmobile != ''){
         $txt = $nomeheroi.' acabou de enviar uma mensagem para você!';
         // QUANDO ACABAR O PERIODO DE TESTE, DESCOMENTAR
         //sendpush("$pushmobile", $txt, $url);
         echo "push enviada para mobile do anjo!";
       }
     }

   }else{
     //vamos enviar notificação para o heroi!
     //pausa para pegar id de push para enviar notificação pelo Onesignal
     $pushdesktop = '';
     $pushmobile = '';
     $consultapush = $conexao->query("SELECT idpushdesktop, idpushmobile FROM pushnotificationsheroi WHERE idheroi = $idheroi limit 1");
     while ($linha = $consultapush->fetch(PDO::FETCH_ASSOC)) {
       $pushdesktop = $linha['idpushdesktop'];
       $pushmobile = $linha['idpushmobile'];
     }

     $consultaanjo = $conexao->prepare('SELECT nome FROM anjos WHERE id = :idanjo LIMIT 1');
     $consultaanjo->bindParam(':idanjo', $idanjo, PDO::PARAM_INT);
     $consultaanjo->execute();

     while ($linhaanjo = $consultaanjo->fetch(PDO::FETCH_ASSOC)) {
       $nomeanjo = $linhaanjo['nome'];
     }

     if( ($pushdesktop != '') || ($pushmobile != '') ){
       //vamos enviar push
       $url = 'https://www.eyhe.com.br/chat.php?myid='.$idheroi.'&idother='.$idanjo.'&where='.$tabela.'&room='.$s;
       if($pushdesktop != ''){
         $txt = $nomeanjo.' acabou enviar uma mensagem para você!';
         sendpush("$pushdesktop", $txt, $url);
         echo "push enviada para desktop do heroi!";
       }
       if($pushmobile != ''){
         $txt = $nomeanjo.' acabou enviar uma mensagem para você!';
         sendpush("$pushmobile", $txt, $url);
         echo "push enviada para mobile do heroi!";
       }
     }


   }






   //envio sms para heroi caso for a primeira msg do anjo.
   if(substr($myID,0,1) == 'a'){
      $quantidade_msg_anjo = 0;
      $consultay = $conexao->prepare("SELECT remetente FROM $tabela");
      $consultay->execute();
      while ($linhay = $consultay->fetch(PDO::FETCH_ASSOC)) {
        if(substr($linhay['remetente'],0,1) == 'a') $quantidade_msg_anjo++;
      }

      if($quantidade_msg_anjo == 1){
        //pausa para pegar nome do heroi
        $consulta = $conexao->query("SELECT telefone FROM tab_usuario WHERE id = $idheroi limit 1");
        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
          $telefone = $linha['telefone'];         
        }

        //tratando o telefone
        //(11) 97427-0975
        $telefone = str_replace("(","", $telefone);
        $telefone = str_replace(")","", $telefone);
        $telefone = str_replace(" ","", $telefone);
        $telefone = str_replace("-","", $telefone);
        $telefone = '55'.$telefone;

        //enviando sms sobre o anjo ter respondido pela primeira vez. 
        anjo_respondeu($telefone, $nomeanjo, $nomeheroi);

      }
   }

?>
