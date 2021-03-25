<?php
	include 'conecta.php';
	$tabela = $_POST['nome_tabela'];
	$idheroi = $_POST['idheroi'];
	$idanjo = $_POST['idanjo'];


	date_default_timezone_set('America/Belem');
	$datahora_realtime = date('Y-m-d H:i:s');

	//verificando se esta ATIVA ou INATIVA
	$status = 'inativa';
	$datahora_ultima_msg = NULL;
	#pegando datahora da ultima mensagem do chat entre esse heroi e anjo
	$consulta = $conexao->prepare("SELECT datahora FROM $tabela ORDER BY id DESC limit 1");
	$consulta->execute();
	while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
	  $datahora_ultima_msg = $linha['datahora'];
	}

	if($datahora_ultima_msg != NULL){
	    #calculando diferença com a $datahora_realtime
	    $datahora_ultima_msg_ft  = new DateTime($datahora_ultima_msg);
	    $diff = $datahora_ultima_msg_ft->diff(new DateTime($datahora_realtime));

	    //se a diferença entra a ultima mensagem do chat e a datahora_realtime for menos que 30 minutos.
	    if( ($diff->y == 0) &&  ($diff->m == 0) && ($diff->d == 0) && ($diff->h == 0) && ($diff->i <= 30) ){

	        //bom, se estamos aqui é porque a ultima mensagem foi enviado a menos de 30 minutos da hora
	       // exata que esse código está rodando.

	       //agora vamos ver se a diferença entre entre a ultima_msg_heroi e ultima_msg_anjo tem diferença inferior a 2 minutos.
	        $remetente = 'h_'.$idheroi;
	        $consulta = $conexao->prepare("SELECT datahora FROM $tabela WHERE remetente =:remetente ORDER by id DESC limit 1");
	       	$consulta->bindParam(':remetente', $remetente, PDO::PARAM_INT);
	       	$consulta->execute();
	       	while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
	       	  $ultima_msg_heroi = $linha['datahora'];
	       	}

	        $remetente = 'a_'.$idanjo;
	        $ultima_msg_anjo = NULL;
	        $consulta = $conexao->prepare("SELECT datahora FROM $tabela WHERE remetente =:remetente ORDER by id DESC limit 1");
	       	$consulta->bindParam(':remetente', $remetente, PDO::PARAM_INT);
	       	$consulta->execute();
	       	while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
	       	  $ultima_msg_anjo = $linha['datahora'];
	       	}


	        if($ultima_msg_anjo != NULL){
	            $ultima_msg_anjo_ft  = new DateTime($ultima_msg_anjo);
	            $diff = $ultima_msg_anjo_ft->diff(new DateTime($ultima_msg_heroi));

	            if( ($ultima_msg_heroi != null) && ($ultima_msg_anjo != null)  ){
	              if( ($diff->y == 0) &&  ($diff->m == 0) && ($diff->d == 0) && ($diff->h == 0) && ($diff->i <= 4) ){
	                $status = 'ativa';
	              }
	            }
	        }

	    }
	}

	if($status == 'ativa'){

			$i = 0;
			$consulta = $conexao->prepare("SELECT status FROM pagamentos WHERE tabela =:tabela ORDER BY id DESC limit 1");
			$consulta->bindParam(':tabela', $tabela, PDO::PARAM_STR);
			$consulta->execute();

			while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
			  $status = $linha['status'];
				$i++;
			}

			if($i == 0){
		    $status = '10minutos';
		  }

		}

  echo $status;


?>
