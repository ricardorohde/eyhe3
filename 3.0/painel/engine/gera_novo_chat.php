<?php

  $idHeroi = $_GET['heroi'];
  $idAnjo = $_GET['anjo'];
  $rand = rand();
  $tabela = 'talk_'.$idHeroi.'_'.$idAnjo.'_'.$rand;

  date_default_timezone_set('America/Sao_Paulo');
  $datainicio = date('Y-m-d H:i:s');
  include "conecta.php";


  //ANTES DE TUDO, SE JÁ EXISTIR CONVERSA ENTRE ESSE ANJO E ESSE HEROI, REDIRECIONO PRA DASHBOARD..
  $qtd = 0;
  $T = $conexao->query("SELECT * FROM conversas WHERE (idanjo = $idAnjo) AND (idheroi = $idHeroi)");
  while ($linhax = $T->fetch(PDO::FETCH_ASSOC)) {
    $qtd++;
    $tbl = $linhax['tabela'];
    $s = $linhax['session'];
  }

  if($qtd != 0){
    $redirect = "../../chat.php?myid=$idHeroi&idanjo=$idAnjo&where=$tbl&room=$s";
    header("Location: $redirect");
  }


  //pausa para pegar o email e nome do anjo para enviar e-mail de notificação
  $consulta = $conexao->query("SELECT nome, email, telefone FROM anjos WHERE id = $idAnjo limit 1");
  while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
    $nomeanjo = $linha['nome'];
    $emailanjo = $linha['email'];
    $telefone = $linha['telefone'];
  }

  //pausa para pegar id de push para enviar notificação pelo Onesignal
  $pushdesktop = '';
  $pushmobile = '';
  $consulta = $conexao->query("SELECT idpushdesktop, idpushmobile FROM pushnotificationsanjo WHERE idanjo = $idAnjo limit 1");
  while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
    $pushdesktop = $linha['idpushdesktop'];
    $pushmobile = $linha['idpushmobile'];
  }

  //pausa para pegar nome do heroi
  $consulta = $conexao->query("SELECT nome FROM tab_usuario WHERE id = $idHeroi limit 1");
  while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
    $nomeheroi = $linha['nome'];
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

  #CADASTRO DA MSG AUTOMATICA DENTRO DA TABELA DE CONVERSAS!
  $remetente = 'a_'.$idAnjo;


   $texto = '[Mensagem automática] Oi! Esta é uma conversa privada e você está seguro aqui. Sinta-se à vontade para falar sobre seus desafios ou sobre como está se sentindo neste momento. Em breve, o Anjo entrará em contato com você, basta enviar o seu primeiro “Olá"!';

   try{
      $stmte2 = $conexao->prepare("INSERT INTO $tabela (remetente, datahora, texto) VALUES (?,?,?)");
      $stmte2->bindParam(1, $remetente , PDO::PARAM_STR);
      $stmte2->bindParam(2, $datainicio , PDO::PARAM_STR);
      $stmte2->bindParam(3, $texto , PDO::PARAM_STR);
      $executa2 = $stmte2->execute();
   }
    catch(PDOException $e){
       echo $e->getMessage();
    }



  #GERAÇÃO DE SESSION_ID
  include "../../tokbox_server/index.php";
  //echo $session_id;

  #registra tudo na tabela conversa!

  try{
     $stmte2 = $conexao->prepare("INSERT INTO conversas (idanjo, idheroi, tabela, datainicio, ultimamsg, session) VALUES (?,?,?,?,?,?)");
     $stmte2->bindParam(1, $idAnjo , PDO::PARAM_STR);
     $stmte2->bindParam(2, $idHeroi , PDO::PARAM_STR);
     $stmte2->bindParam(3, $tabela , PDO::PARAM_STR);
     $stmte2->bindParam(4, $datainicio , PDO::PARAM_STR);
     $stmte2->bindParam(5, $datainicio , PDO::PARAM_STR);
     $stmte2->bindParam(6, $session_id , PDO::PARAM_STR);
     $executa2 = $stmte2->execute();

    if($executa2)
       //se deu boa, vamos enviar um e-mail para o anjo avisando ele sobre essa nova conversa!
       include '../../enviaemail.php';
       $msg =  file_get_contents("../../html_notificacao_anjo.html");
       EnviarEmail($emailanjo, $msg, ' Um Herói está precisando de você!', $nomeanjo);

       if( ($pushdesktop != '') || ($pushmobile != '') ){
         //vamos enviar push
         include '../../OneSignal/envia_push_por_id.php';
         if($pushdesktop != ''){
           $txt = $nomeheroi.' acabou de iniciar um chat com você!';
           sendMessage("$pushdesktop", $txt);
         }
         if($pushmobile != ''){
           $txt = $nomeheroi.' acabou de iniciar um chat com você!';
           sendMessage("$pushmobile", $txt);
         }
       }

       // ENVIO DO SMS!
       $telefone = substr($telefone, 4);
       $quebra = explode("-", $telefone); //vai quebrar a variavel cpf onde ouver ponto, você vai fkar com 3 partes, a ultima contem o traço, intaum
       $telefone = $quebra[0].$quebra[1];
       $quebra = explode(" ", $telefone);
       $telefone = $quebra[0].$quebra[1].$quebra[2];

       $url = 'https://www.paposms.com/webservice/1.0/send/';
       $txt = 'EYHE :) '.$nomeheroi.' acabou de iniciar um chat com você! Acesse a plataforma.';
       $fields = array(
         "user"=>'guilherme@estudiokaa.com.br',
         "pass"=>'900843',
         "numbers"=>"$telefone",
         "message"=>"$txt",
         "return_format"=>"json"
       );

       $postvars = http_build_query($fields);
       $result = file_get_contents($url."?".$postvars);

       // ENVIO DO SMS PARA LEANDRO DE TUDO!
       $url = 'https://www.paposms.com/webservice/1.0/send/';
       $txt = 'CEO EYHE ;) '.$nomeheroi.' acabou de iniciar um chat com o(a) anjo '.$nomeanjo.'! ';
       $fields = array(
         "user"=>'guilherme@estudiokaa.com.br',
         "pass"=>'900843',
         "numbers"=>"4688011011",
         "message"=>"$txt",
         "return_format"=>"json"
       );

       $postvars = http_build_query($fields);
       $result = file_get_contents($url."?".$postvars);



       //echo "boa!";
       //direciona pra tela de chat!
       //passando como referencia, meu id, id do outro, tabela de conversa, sessao
       $redirect = "../../chat.php?myid=$idHeroi&idanjo=$idAnjo&where=$tabela&room=$session_id";
       header("Location: $redirect");

    }
   catch(PDOException $e){
      echo $e->getMessage();
   }




?>
