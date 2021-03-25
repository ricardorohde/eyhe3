<?php

  date_default_timezone_set('America/Sao_Paulo');
  $data_do_pedido = date('Y-m-d H:i');
  include "conecta.php";
  include 'funcoes-sms.php';


  $idheroi = $_POST['idheroi'];
  $idanjo = $_POST['idanjo'];
  $data = $_POST['data'];
  $hora = $_POST['hora'];
  $datahora_agendamento = $data.' '.$hora.':00';
  $celular_confirm = $_POST['celular'];

  //vou pegar alguns dados do heroi como telefone, email, nome.
  $consulta = $conexao->query("SELECT telefone, email, nome FROM tab_usuario WHERE id = $idheroi");
  while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
        $telefone_heroi = $linha['telefone'];
        $email_heroi = $linha['email'];
        $nome_heroi = $linha['nome'];
  }

  //vou pegar alguns dados do anjo como nome.
  $consulta = $conexao->query("SELECT nome FROM anjos WHERE id = $idanjo");
  while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
        $nome_anjo = $linha['nome'];
  }


  /*
     `idheroi`, `idanjo`, `datapedido`, `dataagendamento`,
      `nomeheroi`, `nomeanjo`, `telefoneheroi`, `telefoneconfirmacao`, `emailheroi`
  */
  $erro = 0;
  #inserindo no banco
  try{
     $stmte2 = $conexao->prepare("INSERT INTO agendamentos
     (idheroi, idanjo, datapedido, dataagendamento, nomeheroi, nomeanjo, telefoneheroi,
     telefoneconfirmacao, emailheroi) VALUES (?,?,?,?,?,?,?,?,?)");
     $stmte2->bindParam(1, $idheroi , PDO::PARAM_STR);
     $stmte2->bindParam(2, $idanjo , PDO::PARAM_STR);
     $stmte2->bindParam(3, $data_do_pedido , PDO::PARAM_STR);
     $stmte2->bindParam(4, $datahora_agendamento , PDO::PARAM_STR);
     $stmte2->bindParam(5, $nome_heroi , PDO::PARAM_STR);
     $stmte2->bindParam(6, $nome_anjo , PDO::PARAM_STR);
     $stmte2->bindParam(7, $telefone_heroi , PDO::PARAM_STR);
     $stmte2->bindParam(8, $celular_confirm , PDO::PARAM_STR);
     $stmte2->bindParam(9, $email_heroi , PDO::PARAM_STR);

     $executa2 = $stmte2->execute();

   if(!$executa2)
       $erro++;
    }
   catch(PDOException $e){
      echo $e->getMessage();
   }

   envia_sms_novo_agendamento('554699177534', $nome_anjo, $nome_heroi);
   envia_sms_novo_agendamento('554699247368', $nome_anjo, $nome_heroi);


   if($erro > 0){
     echo 'erro';
   }else{
     echo 'sucesso';
   }



?>
