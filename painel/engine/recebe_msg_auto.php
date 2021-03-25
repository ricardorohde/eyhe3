<?php

  $idanjo = 5;
  $tabela = $_POST['nome_tabela'];
  $telefone = $_POST['tel'];
  date_default_timezone_set('America/Sao_Paulo');
  $data_envio = date('Y-m-d H:i:s');

  $texto = "Olá! Acabamos de enviar uma notificação ao Anjo que você iniciou uma conversa.
            Pode ser que ele responda imediatamente ou que leve algum tempo. Contudo, o anjo autorizou a
            disponibilizar o contato do WhatsApp dele, que é <b>$telefone</b>.
            Fique a vontade para chama-lo. Nesse meio tempo, continue navegando em nossa plataforma através do nosso
            blog ou se preferir, encontre outro Anjo :) <a target='_blank' href='https://www.eyhe.com.br/blog.php'>www.eyhe.com.br/blog</a>";

  include ("conecta.php");
  include ("log/log.php");


  $erro = 0;

  #inserindo no banco
  try{
     $stmte2 = $conexao->prepare("INSERT INTO $tabela (remetente, datahora, texto) VALUES (?,?,?)");
     $stmte2->bindParam(1, $idanjo , PDO::PARAM_STR);
     $stmte2->bindParam(2, $data_envio , PDO::PARAM_STR);
     $stmte2->bindParam(3, $texto , PDO::PARAM_STR);
     $executa2 = $stmte2->execute();

   if(!$executa2)
       $erro++;
    }
   catch(PDOException $e){
      echo $e->getMessage();
   }


   if($erro = 0){
     echo "Mensagem salva no banco com sucesso!";
   }else{
     echo "Houve um erro no processo de salvar :(";
   }
?>
