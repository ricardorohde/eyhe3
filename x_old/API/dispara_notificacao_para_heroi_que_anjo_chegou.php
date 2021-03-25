<?php

$id = $_POST['id_solicitacao'];
$link_chat = $_POST['link_chat'];
$link_chat = str_replace("%20", "", $link_chat);
$link_chat = str_replace(" ", "", $link_chat);



//$id = 4876;
//$link_chat = 'https://www.eyhe.com.br/chat/index.php?myid=1431&idanjo=21&room=2_MX40NjIxMTM2Mn5-MTU5NTkzNjE2Nzg5N35ISTVqN0tVQThaR1lRYWNrQ1pIcm5TNDV-fg&where=talk_1431_21_557818966';

// 0) Conexão com o DataBase + Funções
      include '../../painel/engine/conecta.php';

// 1) usando o id da solicitação vou recuperar dados como: nome do heroi,tema, tipo
      $consulta = $conexao->prepare("SELECT nome, talking, telefone, email  FROM tab_usuario WHERE (id = :id) ORDER BY id DESC LIMIT 1");
      $consulta->bindParam(':id', $id, PDO::PARAM_INT);
      $consulta->execute();
      while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
          $nome_heroi = $linha['nome'];
          $talking_id = $linha['talking'];
          $telefone = $linha['telefone'];
          $email = $linha['email'];
      }

      //pegando nome do anjo
      $consulta = $conexao->prepare("SELECT nome, avatar FROM anjos WHERE (id = :id) ORDER BY id DESC LIMIT 1");
      $consulta->bindParam(':id', $talking_id, PDO::PARAM_INT);
      $consulta->execute();
      while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
          $nome_anjo = $linha['nome'];
          $avatar  = 'https://eyhe.com.br/painel/'.$linha['avatar'];
      }



// 2) ENVIO DE E-MAIL NOTIFICANDO com botão pro chat
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
      EnviarEmail($email, $msg, 'Você acabou de ser acolhido!', $nome_heroi);


// 3) ENVIO DE SMS NOTIFICANDO com link encurtado pra chat
      $telefone = str_replace("(", "", $telefone);
      $telefone = str_replace(")", "", $telefone);
      $telefone = str_replace(" ", "", $telefone);
      $telefone = '55'.$telefone;
      $link_chat = str_replace("&idjo", "&idanjo", $link_chat);
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

      //if ($err) echo "cURL Error #:" . $err;
      //else echo $response;


?>
