<?php

  $ids = $_POST['identificador'];
  $quebra = explode("-", $ids);

  $idHeroi = $quebra[0];
  $idAnjo = $quebra[1];
  $rand = rand();
  $tabela = 'talk_'.$idHeroi.'_'.$idAnjo.'_'.$rand;

  date_default_timezone_set('America/Sao_Paulo');
  $datainicio = date('Y-m-d H:i:s');
  include "conecta.php";
  include 'funcoes-sms.php';


  /*ANTES DE TUDO, SE JÁ EXISTIR CONVERSA ENTRE ESSE ANJO E ESSE HEROI, REDIRECIONO PRA DASHBOARD..
  $qtd = 0;
  $T = $conexao->query("SELECT * FROM conversas WHERE (idanjo = $idAnjo) AND (idheroi = $idHeroi)");
  while ($linhax = $T->fetch(PDO::FETCH_ASSOC)) {
    $qtd++;
    $tbl = $linhax['tabela'];
    $s = $linhax['session'];
  }

  if($qtd != 0){
    $redirect = "chat.php?myid=$idHeroi&idanjo=$idAnjo&where=$tbl&room=$s";
    echo $redirect;
    exit();
  }*/


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


  //vou enviar as notificações por sms e email
  try {
    $consulta = $conexao->prepare('SELECT nome, telefone, email FROM anjos WHERE id = :id LIMIT 1');
    $consulta->bindParam(':id', $idAnjo, PDO::PARAM_INT);
    $consulta->execute();

    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
        $nomeanjo = $linha['nome'];
        $telefone_anjo = $linha['telefone'];
        $emailanjo = $linha['email'];
    }
  }
    catch(PDOException $e) {
    echo $e->getMessage();//Remove or change message in production code
  }

  try {
    $consulta = $conexao->prepare('SELECT nome FROM tab_usuario WHERE id = :id LIMIT 1');
    $consulta->bindParam(':id', $idHeroi, PDO::PARAM_INT);
    $consulta->execute();

    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
        $nomeheroi = $linha['nome'];
    }
  }
    catch(PDOException $e) {
    echo $e->getMessage();//Remove or change message in production code
  }

  //sms para anjo chamado
  envia_sms_novo_atendimento($telefone_anjo, $nomeanjo, $nomeheroi);
  //sms para maria
  envia_sms_novo_chat('554699701366', $nomeanjo, $nomeheroi);
  //sms para leandro
  envia_sms_novo_chat('554688011011', $nomeanjo, $nomeheroi);

  //vou enviar também um e-mail avisando sobre!
  include '../../enviaemail.php';
  $msg =  file_get_contents("../../html_notificacao_anjo.html");
  EnviarEmail($emailanjo, $msg, ' Um Herói está precisando de você!', $nomeanjo);

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
        //$redirect = "chat.php?myid=$idHeroi&idanjo=$idAnjo&where=$tabela&room=$session_id";
        $array = array('idheroi' => $idHeroi, 'idanjo' => $idAnjo, 'tabela' => $tabela, 'sessao' => $session_id);
        $vetor[] = array_map('htmlentities', $array);
    }
   catch(PDOException $e){
      echo $e->getMessage();
   }

   echo json_encode($vetor, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);


?>
