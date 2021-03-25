<?php

  #Destino das imagens.
	$pasta = "../avatares-solicitacoes-anjo";

	#Conectando..
	include('conecta.php');
	include('funcoes-sms.php');

	envia_sms_novo_anjo_cadastrado('554699701366', $_POST['nome']);
  envia_sms_novo_anjo_cadastrado('554688011011', $_POST['nome']);

  #flag de erro
  $erro = 0;

  date_default_timezone_set('America/Sao_Paulo');
  $datacadastro = date('Y-m-d H:i');

  #pagando itens textuais do formulario
  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $estado = $_POST['estado'];
  $cidade = $_POST['cidade'];
  $celular = $_POST['celular'];
  $desafio = $_POST['desafio'];
  $motivo = $_POST['motivo'];
  $celular_confirmado = $_POST['celular_confirmado'];

  #pegando foto do perfil
  $avatar = $_FILES["fotoperfil"];

          #manipulando
          $extensao = @end(explode('.', $avatar["name"]));
          if($extensao != 'php'){
            $tmp = $avatar["tmp_name"];
            $novoNome = rand().".$extensao";
            $avatar = $pasta."/".$novoNome;

            //esse nome já existe?
            while(is_file($avatar)){
              //gera um novo nome;
              $novoNome = rand().".$extensao";
              $avatar = $pasta."/".$novoNome;
            }
            //salvo na pasta
            move_uploaded_file($tmp, $avatar);

            $avatar = substr($avatar, 3);
          }else{
            $erro = 1;
            echo "Ocorreu um erro. Tente novamente. coderro:#".$erro."</p>";
            exit();
          }

  #fim da foto do perfil

  $frente_doc = $_FILES["frente_doc"];

        #manipulando
        $extensao = @end(explode('.', $frente_doc["name"]));
        if($extensao != 'php'){
          $tmp = $frente_doc["tmp_name"];
          $novoNome = rand().".$extensao";
          $frente_doc = $pasta."/".$novoNome;

          //esse nome já existe?
          while(is_file($frente_doc)){
            //gera um novo nome;
            $novoNome = rand().".$extensao";
            $frente_doc = $pasta."/".$novoNome;
          }
          //salvo na pasta
          move_uploaded_file($tmp, $frente_doc);

          $frente_doc = substr($frente_doc, 3);
        }else{
          $erro = 1;
          echo "Ocorreu um erro. Tente novamente. coderro:#".$erro."</p>";
          exit();
        }


  $verso_doc = $_FILES["verso_doc"];

        #manipulando
        $extensao = @end(explode('.', $verso_doc["name"]));
        if($extensao != 'php'){
          $tmp = $verso_doc["tmp_name"];
          $novoNome = rand().".$extensao";
          $verso_doc = $pasta."/".$novoNome;

          //esse nome já existe?
          while(is_file($verso_doc)){
            //gera um novo nome;
            $novoNome = rand().".$extensao";
            $verso_doc = $pasta."/".$novoNome;
          }
          //salvo na pasta
          move_uploaded_file($tmp, $verso_doc);

          $verso_doc = substr($verso_doc, 3);
        }else{
          $erro = 1;
          echo "Ocorreu um erro. Tente novamente. coderro:#".$erro."</p>";
          exit();
        }

	#inserindo no banco
  try{
     $stmte2 = $conexao->prepare("INSERT INTO queroseranjo
     (nome, email, estado, cidade, celular, desafio, motivo, celularconfirmado, fotoperfil, frentedoc, versodoc, datacadastro)
     VALUES (?,?,?,?,?,?,?,?,?,?,?,?)");
     $stmte2->bindParam(1, $nome , PDO::PARAM_STR);
     $stmte2->bindParam(2, $email , PDO::PARAM_STR);
     $stmte2->bindParam(3, $estado , PDO::PARAM_STR);
     $stmte2->bindParam(4, $cidade , PDO::PARAM_STR);
     $stmte2->bindParam(5, $celular , PDO::PARAM_STR);
     $stmte2->bindParam(6, $desafio , PDO::PARAM_STR);
     $stmte2->bindParam(7, $motivo , PDO::PARAM_STR);
     $stmte2->bindParam(8, $celular_confirmado, PDO::PARAM_STR);
     $stmte2->bindParam(9, $avatar , PDO::PARAM_STR);
     $stmte2->bindParam(10, $frente_doc , PDO::PARAM_STR);
     $stmte2->bindParam(11, $verso_doc , PDO::PARAM_STR);
     $stmte2->bindParam(12, $datacadastro , PDO::PARAM_STR);
     $executa2 = $stmte2->execute();

     #recupera o id inserido
     $ultimoid = $conexao->lastInsertId();

    if(!$executa2)
        $erro = 2;
      }
    catch(PDOException $e){
        echo $e->getMessage();
    }


   #Agora vamos enviar o e-mail com o treinamento e link para prova!
   include '../../enviaemail.php';
   $url= 'https://www.eyhe.com.br/provas/novo_anjo.php?id='.$ultimoid;
   $assunto = 'Seja bem-vindo ao Eyhe';


   $mensagem = '
   <html>
   <meta name="Viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
   <link href="http://fonts.googleapis.com/css?family=Muli, sans-serif:300,400,700,regular,italic" rel="stylesheet" type="text/css" class="EQWebFont">
       <link href="https://fonts.googleapis.com/css?family=Lora:700" rel="stylesheet" type="text/css" class="EQWebFont">
   <style>

   </style>
       <table style="width: 98%; max-width: 450px; float: none; margin: auto; box-shadow: -2px 5px 25px rgba(36, 46, 90, .2); border-radius: 4px;">
       <tbody>


           <tr style="text-align: center">
               <td><img src="http://eyhe.com.br/mailmkt/img/logo_EYHE_email.png" style="max-width: 100px; padding: 40 0;"></td>
           </tr>

           <tr>
               <td>
                <center>
                  <h1 style="font-family: Lora, serif; font-size:26px; font-weight: 700; color:#424242; text-align: center; line-height: 42px; margin: 0% 10% 5% 10%;">Seja bem-vindo ao Eyhe</h1>
                </center>
               </td>
           </tr>

           <tr>
               <td><p style="font-family:Muli, sans-serif; font-size:16px; font-weight: 700; color:#424242; text-align: center; width: 82%; float: none; margin: auto;">
                   Estamos muito felizes! Obrigado por realizar seu cadastro, agora você faz parte do nosso time.<br/>
               <br></p></td>
           </tr>

           <tr style="text-align: center"><td>
               <img src="http://eyhe.com.br/mailmkt/img/queroseranjo.jpg" style="width:80%; margin: 0 auto;" "text-align:center"></td>
           </tr>

           <tr>
               <td><p style="font-family:Muli, sans-serif; font-size:16px; font-weight: 300; color:#424242; text-align: center; width: 82%; float: none; margin: auto;">
                   <br/>Para entrar em ação e ajudar pessoas, basta realizar nosso breve treinamento. São apenas 3 módulos, simples e rápidos, que vão te deixar seguro e preparado para ter conversas tranquilas e proveitosas com os Heróis.<br/>
               <br></p></td>
           </tr>

           <tr>
               <td><p style="font-family:Muli, sans-serif; font-size:16px; font-weight: 300; color:#8a00ff; text-align: center; width: 82%; float: none; margin: auto;">
                   <br/>Logo abaixo, você tem acesso aos treinamentos. Ao finalizar a leitura deles, você já pode fazer o teste!<br/>
               </p>
               <br/>
               <center>

                 <a href="https://eyhe.com.br/mailmkt/anexos/treinamento1.pdf" title="Link para o treinamento 1" download style="font-size: 15px;">Baixe o treinamento parte 1</a>
                 <br/>

                 <a href="https://eyhe.com.br/mailmkt/anexos/treinamento2.pdf" title="Link para o treinamento 2" download style="font-size: 15px;">Baixe o treinamento parte 2</a>
                 <br/>

                 <a href="https://eyhe.com.br/mailmkt/anexos/treinamento3.pdf" title="Link para o treinamento 3" download style="font-size: 15px;">Baixe o treinamento parte 3</a>
                 <br/>

               </td>
           </tr>

           <tr>
               <td><br/><a href="'.$url.'" target="_blank" style="text-decoration: none;"><h1 style="font-family:Muli, sans-serif; font-size:16px; font-weight: 400; color:#ffffff; text-align: center; background-color: #8a00ff; width: 200px; float: none; margin: auto; margin-top: 40;margin-bottom: 40;padding: 10px; border-radius: 40px; box-shadow: -1px 8px 25px rgb(36,46,90,.3);">Fazer teste agora</h1></a></td>
           </tr>

           <tr>
               <td><h1 style="font-family:Muli, sans-serif; font-size:21px; font-weight: 400; color:#424242; text-align: center;">Vamos evoluir juntos!</h1></td>
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

   $retorno = EnviarEmailQueroSerAnjo($email, $mensagem, $assunto, $nome);
   if( $retorno != 'enviado'){
     $erro = $retorno;
   }

	if($erro == 0){
    	echo "cadastrado";
    }else{
    echo "Ocorreu um erro. Tente novamente. coderro:#".$erro."</p>";
  }


?>
