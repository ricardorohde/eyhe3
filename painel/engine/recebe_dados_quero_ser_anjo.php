<?php

  $nome = $_POST['nome'];
  $idade = $_POST['idade'];
  $email = $_POST['email'];
  $telefone = $_POST['telefone'];
  $ondenasceu = $_POST['ondenasceu'];
  $pontos = $_POST['pontos'];
  $fale = $_POST['fale'];
  $familia = $_POST['familia'];
  $desafio = $_POST['desafio'];
  $feliz = $_POST['feliz'];
  $fe = $_POST['fe'];
  $valor = $_POST['valor'];
  $experiencia = $_POST['experiencia'];
  $licao = $_POST['licao'];

    //ENVIA SMS PARA LEANDRO SOBRE NOVO CHAT
       $url = 'https://www.paposms.com/webservice/1.0/send/';
       $txt = 'CEO EYHE ;) '.$nome.' acabou de enviar uma solicitação para ser anjo.  ';
       $fields = array(
         "user"=>'guilherme@estudiokaa.com.br',
         "pass"=>'900843',
         "numbers"=>"4688011011",
         "message"=>"$txt",
         "return_format"=>"json"
       );

       $postvars = http_build_query($fields);
       $result = file_get_contents($url."?".$postvars);

  //data
  date_default_timezone_set('America/Sao_Paulo');
  $datacadastro = date('Y-m-d H:i');

  include 'conecta.php';

  $erro = 0;

  #inserindo no banco
  try{
     $stmte2 = $conexao->prepare("INSERT INTO novosanjos
                                  (nome,idade,email,telefone,ondenasceu,pontos,fale,familia,
                                  desafio,feliz,fe,valor,experiencia,licao,datacadastro)
                                  VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

     $stmte2->bindParam(1, $nome , PDO::PARAM_STR);
     $stmte2->bindParam(2, $idade , PDO::PARAM_STR);
     $stmte2->bindParam(3, $email , PDO::PARAM_STR);
     $stmte2->bindParam(4, $telefone , PDO::PARAM_STR);
     $stmte2->bindParam(5, $ondenasceu , PDO::PARAM_STR);
     $stmte2->bindParam(6, $pontos , PDO::PARAM_STR);
     $stmte2->bindParam(7, $fale , PDO::PARAM_STR);
     $stmte2->bindParam(8, $familia , PDO::PARAM_STR);
     $stmte2->bindParam(9, $desafio , PDO::PARAM_STR);
     $stmte2->bindParam(10, $feliz, PDO::PARAM_STR);
     $stmte2->bindParam(11, $fe , PDO::PARAM_STR);
     $stmte2->bindParam(12, $valor, PDO::PARAM_STR);
     $stmte2->bindParam(13, $experiencia, PDO::PARAM_STR);
     $stmte2->bindParam(14, $licao, PDO::PARAM_STR);
     $stmte2->bindParam(15, $datacadastro , PDO::PARAM_STR);


     $executa2 = $stmte2->execute();

   if(!$executa2)
       $erro++;
    }
   catch(PDOException $e){
      echo $e->getMessage();
   }


	if($erro == 0){
    	echo "enviado";
    }else{
    echo "Ocorreu um erro. Tente novamente. coderro:#".$erro."</p>";
  }





 ?>
