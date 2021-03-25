#!/usr/bin/php


<?php
ini_set("allow_url_fopen", 1);

//primeiro setar o fuso horario igual dos scripts do engine e pegar a data e hora e dia exato que esse cronjob está rodando!
date_default_timezone_set('America/Sao_Paulo');
$datacron = date('Y-m-d H:i:s');



//vou varrer a tabela conversa e selecionar os registros que tiverem 'ultima_msg' == $datacron
//Conectando ao banco de dados

$hostname = 'external-db.s65738.gridserver.com';
$username = 'db65738_gui';
$password = '.68v_eCR_cp';
$database = 'db65738_plataformaeyhe';

try {
    $conexao = new PDO("mysql:host=$hostname;dbname=$database", $username, $password,
    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      //echo'Conexao efetuada com sucesso!';
    }
catch(PDOException $e)
    {
      echo $e->getMessage();
    }


$consulta = $conexao->prepare('SELECT * FROM conversas');
//$consulta->bindParam(':datacron', $datacron, PDO::PARAM_INT);
$consulta->execute();

while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
    $data1 = new DateTime($datacron);
    $data2 = new DateTime($linha['ultimamsg']);

    $intervalo = $data1->diff($data2);

    if (($intervalo->d == 0) && ($intervalo->i >= 15) && ($intervalo->i < 30)) {
      //significa que a ultimamsg foi enviada no mesmo dia do cronjobs e com diferença entre 15 e 30minutos

      //vou pegar a tabela e ver se tem leitura == null
      $flaganjo = 0;
      $flagheroi = 0;
      $tabela = $linha['tabela'];
			$room = $linha['session'];
      $idanjo = $linha['idanjo'];
      $idheroi = $linha['idheroi'];


      $query = "SELECT remetente FROM " .$tabela. " WHERE leitura IS NULL";

      $consulta2 = $conexao->prepare($query);
      $consulta2->execute();
      while ($linha2 = $consulta2->fetch(PDO::FETCH_ASSOC)) {
        //echo substr($linha2['remetente'],0,1).'<br/>';
        if(substr($linha2['remetente'],0,1) == 'h'){
          $flaganjo++;
        }else{
          $flagheroi++;
        }
      }

      if($flagheroi > 0){

				//significa que temos mensagens que o heroi nao leu

        $consulta2 = $conexao->query("SELECT nome, email FROM tab_usuario WHERE id = $idheroi limit 1");
        while ($linha2 = $consulta2->fetch(PDO::FETCH_ASSOC)) {
          $nomeheroi = $linha2['nome'];
					$email = $linha2['email'];
        }



        $consulta3 = $conexao->query("SELECT nome, email FROM anjos WHERE id = $idanjo limit 1");
        while ($linha3 = $consulta3->fetch(PDO::FETCH_ASSOC)) {
          $nomeanjo = $linha3['nome'];
          $emailanjo = $linha3['email'];
        }


				//vamos montar a url
				$url = 'https://www.eyhe.com.br/chat.php?myid='.$idheroi.'&idanjo='.$idanjo.'&room='.$room.'&where='.$tabela;

				include '../enviaemail.php';
				$assunto = $nomeanjo.' respondeu você!';

				$mensagem = '
				<html>
				<meta name="Viewport" content="width=device-width, initial-scale=1.0">
				<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
				<link href="http://fonts.googleapis.com/css?family=Muli, sans-serif:300,400,700,regular,italic" rel="stylesheet" type="text/css" class="EQWebFont">
				<style>

				</style>
				    <table style="width: 98%; max-width: 450px; float: none; margin: auto; box-shadow: -2px 5px 25px rgba(36, 46, 90, .2); border-radius: 4px;">
				    <tbody>
				        <tr style="text-align: center">
				            <td><img src="http://eyhe.com.br/mailmkt/img/logo_EYHE_email.png" style="max-width: 140px; padding: 40 0;"></td>
				        </tr>

				        <tr style="text-align: center"><td>
				            <img src="http://eyhe.com.br/mailmkt/img/pp_EYHE_ilustra-homepage2-b.jpg" style="width:100%" "text-align:center"></td>
				        </tr>

				        <tr>
				            <td><h1 style="font-family:Muli, sans-serif, sans-serif; font-size:30px; font-weight: 700; color:#606060; text-align: center; margin: 20 20 0 20;">Olá '.$nomeheroi.'. Seu anjo '.$nomeanjo.' respondeu você. </h1></td>
				        </tr>

				        <tr>
				            <td><h1 style="font-family:Muli, sans-serif; font-size:21px; font-weight: 400; color:#606060; text-align: center;"> <br/>
				</h1></td>
				        </tr>

				        <tr>
				            <td><a href="'.$url.'" target="_blank" style="text-decoration: none;"><h1 style="font-family:Muli, sans-serif; font-size:18px; font-weight: 400; color:#ffffff; text-align: center; background-color: #8a00ff; width: 300; float: none; margin: auto; margin-top: 80;margin-bottom: 80;padding: 10; border-radius: 40px; box-shadow: -1px 8px 25px rgb(36,46,90,.3);">Clique aqui e retome sua conversa</h1></a></td>
				        </tr>

				        <tr>
				            <td><h1 style="font-family:Muli, sans-serif; font-size:21px; font-weight: 400; color:#606060; text-align: center;">Vamos evoluir juntos!</h1></td>
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
				</html>
';

        ECHO 'ENVIANDO EMAIL PARA:'.$email;
				EnviarEmail($email, $mensagem, $assunto, $nomeheroi);

        //echo $result;
      }
    }
}

?>
