<?php

#GERAÇÃO DE SESSION_ID
include "../../tokbox_server/index.php";
//echo $session_id;

$ids = $_POST['identificador'];
$quebra = explode("-", $ids);
$idUBER = $quebra[0];
$idAnjo = $quebra[1];
$rand = rand();
$tabela = 'talk_UBER_'.$idUBER.'_'.$idAnjo.'_'.$rand;

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
         try{
            $stmte2 = $conexao->prepare("INSERT INTO conversas (idanjo, idheroi, tabela, datainicio, ultimamsg, session, premium) VALUES (?,?,?,?,?,?,?)");
            $stmte2->bindParam(1, $idAnjo , PDO::PARAM_STR);
            $stmte2->bindParam(2, $idUBER , PDO::PARAM_STR);
            $stmte2->bindParam(3, $tabela , PDO::PARAM_STR);
            $stmte2->bindParam(4, $datainicio , PDO::PARAM_STR);
            $stmte2->bindParam(5, $datainicio , PDO::PARAM_STR);
            $stmte2->bindParam(6, $session_id , PDO::PARAM_STR);
            $stmte2->bindParam(7, $premium , PDO::PARAM_STR);
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
      $link_chat = 'https://www.eyhe.com.br/chat/index.php?myid='.$idUBER.'&idanjo='.$idAnjo.'&room='.$session_id.'&where='.$tabela;

      include '../../enviaemail.php';
      $msg = '
      <html>
      <meta name="Viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      <link href="http://fonts.googleapis.com/css?family=Muli, sans-serif:300,400,700,regular,italic" rel="stylesheet" type="text/css" class="EQWebFont">
      <style>

      </style>
          <table style="width: 98%; max-width: 450px; float: none; margin: auto; box-shadow: -2px 5px 25px rgba(36, 46, 90, .2); border-radius: 4px;">
          <tbody>
              <tr style="text-align: center">
                  <td><img src="'.$avatar.'" style="width: 140px; height: 140px; border-radius: 50%"></td>
              </tr>

              <tr>
                  <td><h1 style="font-family:Muli, sans-serif, sans-serif; font-size:30px; font-weight: 700; color:#606060; text-align: center; margin: 20 20 0 20;">Olá '.$nome_heroi.'. O anjo '.$nome_anjo.' acabou de acolher você.</h1></td>
              </tr>

              <tr>
                  <td>
                  <center><a href="'.$link_chat.'" target="_blank" style="text-decoration: none;box-shadow: 3px 4px 0px 0px #1880f0;
                  background:linear-gradient(to bottom, #007bff 5%, #378de5 100%);
                  background-color:#007bff;
                  border-radius:5px;
                  border:1px solid #007bff;
                  display:inline-block;
                  cursor:pointer;
                  color:#ffffff;
                  font-family:Arial;
                  font-size:17px;
                  font-weight:bold;
                  padding:12px 54px;
                  text-decoration:none;
                  text-shadow:0px 1px 0px #007bff;">
                  IR PARA O CHAT
                  </a><center></td>
              </tr>

              <tr>
                  <td><h3 style="font-family:Muli, sans-serif; font-size:21px; font-weight: 400; color:#606060; text-align: center;">Conversas acolhedoras em minutos</h3></td>
              </tr>

              <tr>
                  <td style="text-align: center; padding: 10 0;"><a href="http://www.instagram.com/eyheoficial" target="_blank"><img src="http://eyhe.com.br/mailmkt/img/icn_instagram_EYHE.png" style="height: 18px;"></a></td>
              </tr>
              <tr>
                  <td style="text-align: center; padding: 10 0;"><a href="http://www.facebook.com/eyheoficial" target="_blank"><img src="http://eyhe.com.br/mailmkt/img/icn_facebook_EYHE.png" style="height: 18px;"></a></td>
              </tr>
              <tr>
                  <td style="height: 80px"></td>
              </tr>
          </tbody>
          </table>
      </html>';
      EnviarEmail($email_heroi, $msg, 'Você acabou de ser acolhido!', $nome_heroi);


      $telefone = str_replace("(", "", $telefone_heroi);
      $telefone = str_replace(")", "", $telefone);
      $telefone = str_replace(" ", "", $telefone);
      $telefone = '55'.$telefone;
      $curl = curl_init();

      $mensagem = '[EYHE] Oi '.$nome_heroi.', o Anjo '.$nome_anjo.' acabou de acolher você.  Acesse nosso chat: '.$link_chat;

      curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api-messaging.movile.com/v1/send-sms",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "{\"destination\": \"$telefone\" ,  \"messageText\": \"$mensagem\"}",
        CURLOPT_HTTPHEADER => array(
          "authenticationtoken: 3x93_39cyBmMosRDk7UsHUQQ2c-V9DkV812xnyza",
          "username: eyhe",
          "content-type: application/json"
        ),
      ));

      $response = curl_exec($curl);
      $err = curl_error($curl);

      curl_close($curl);

      /* PARTE TEMPORARIA DO UBER COM PAGAMENTO ANTES */
      $datasolicitacao = $datainicio;
      $valor = '14';
      $status = 'Pagamento confirmado';
      try{
         $stmte2 = $conexao->prepare("INSERT INTO pagamentos (idanjo, idheroi, datasolicitacao, valor, tabela, status, datastatus)
                                      VALUES (?,?,?,?,?,?,?)");
         $stmte2->bindParam(1, $idAnjo , PDO::PARAM_STR);
         $stmte2->bindParam(2, $idUBER , PDO::PARAM_STR);
         $stmte2->bindParam(3, $datasolicitacao , PDO::PARAM_STR);
         $stmte2->bindParam(4, $valor , PDO::PARAM_STR);
         $stmte2->bindParam(5, $tabela , PDO::PARAM_STR);
         $stmte2->bindParam(6, $status , PDO::PARAM_STR);
         $stmte2->bindParam(7, $datasolicitacao , PDO::PARAM_STR);
         $executa2 = $stmte2->execute();

       }
       catch(PDOException $e){
          echo $e->getMessage();
       }

      echo "sucesso";

   }



 ?>
