#!/usr/bin/php

<?php
ini_set("allow_url_fopen", 1);

//primeiro setar o fuso horario igual dos scripts do engine e pegar a data e hora e dia exato que esse cronjob está rodando!
date_default_timezone_set('America/Sao_Paulo');
$datacron = date('Y-m-d H:i:s');


function my_file_get_contents($site_url){
		$ch = curl_init();
		$timeout = 5; // set to zero for no timeout
		curl_setopt ($ch, CURLOPT_URL, $site_url);
		curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
		ob_start();
		curl_exec($ch);
		curl_close($ch);
		$file_contents = ob_get_contents();
		ob_end_clean();
		return $file_contents;
	}


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

    if (($intervalo->d == 0) && ($intervalo->i >= 5) && ($intervalo->i < 30)) {
      //significa que a ultimamsg foi enviada no mesmo dia do cronjobs e com diferença entre 15 e 30minutos

      //vou pegar a tabela e ver se tem leitura == null
      $flaganjo = 0;
      $flagheroi = 0;
      $tabela = $linha['tabela'];
      $idanjo = $linha['idanjo'];
      $idheroi = $linha['idheroi'];

      echo $tabela."<br/>";

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

      if($flaganjo > 0){
        //vou pegar telefone do anjo e nome do heroi!


        $consulta2 = $conexao->query("SELECT nome FROM tab_usuario WHERE id = $idheroi limit 1");
        while ($linha2 = $consulta2->fetch(PDO::FETCH_ASSOC)) {
          $nomeheroi = $linha2['nome'];

        }


        $consulta2 = $conexao->query("SELECT nome, email, telefone FROM anjos WHERE id = $idanjo limit 1");
        while ($linha2 = $consulta2->fetch(PDO::FETCH_ASSOC)) {
          $nomeanjo = $linha2['nomeanjo'];
          $emailanjo = $linha2['email'];
          $telefone = $linha2['telefone'];
        }


        $telefone = substr($telefone, 4);
        $quebra = explode("-", $telefone); //vai quebrar a variavel cpf onde ouver ponto, você vai fkar com 3 partes, a ultima contem o traço, intaum
        $telefone = $quebra[0].$quebra[1];
        $quebra = explode(" ", $telefone);
        $telefone = $quebra[0].$quebra[1].$quebra[2];

        ECHO $telefone;


        $url = 'https://www.paposms.com/webservice/1.0/send/';
        $txt = 'ALERTA EYHE '.$nomeheroi.' está esperando por uma resposta a mais de 15 minutos.';
        //ECHO "<BR/>".$txt;
        $fields = array(
          "user"=>'guilherme@estudiokaa.com.br',
          "pass"=>'900843',
          "numbers"=>"$telefone",
          "message"=>"$txt",
          "return_format"=>"json"
        );
        $postvars = http_build_query($fields);
        $result = my_file_get_contents($url."?".$postvars);

        echo $result;
      }
    }
}

?>
