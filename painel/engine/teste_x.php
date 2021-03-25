<?php

include 'conecta.php';

$tabela = 'talk_16_28_2093478827';

	  //vamos pegar algumas informações sobre anjo e heroi para envio de push!
	   $consulta = $conexao->prepare('SELECT idheroi,idanjo,session FROM conversas WHERE tabela = :tabela');
	   $consulta->bindParam(':tabela', $tabela, PDO::PARAM_INT);
	   $consulta->execute();

	   while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
	     $idheroi = $linha['idheroi'];
	     $idanjo = $linha['idanjo'];
	     $s = $linha['session'];
	   }

	   echo "ID ANJO: ".$idanjo;

	  $quantidade_msg_heroi = 0;
      $consultay = $conexao->prepare("SELECT remetente FROM $tabela");
      $consultay->execute();
      while ($linhay = $consultay->fetch(PDO::FETCH_ASSOC)) {
        if(substr($linhay['remetente'],0,1) == 'h'){
          $quantidade_msg_heroi++;
        }
      }

      echo "Quantidade: ".$quantidade_msg_heroi;

      //vou enviar sms sobre inicio de chat!
        $consultaz = $conexao->query("SELECT nome, email, telefone FROM anjos WHERE id = $idanjo limit 1");
        while ($linhaz = $consultaz->fetch(PDO::FETCH_ASSOC)) {
          $nomeanjo = $linhaz['nome'];
          $emailanjo = $linhaz['email'];
          $telefone = $linhaz['telefone'];
        }


        echo $telefone;

?>
