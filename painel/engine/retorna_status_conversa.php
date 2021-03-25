<?php
	date_default_timezone_set('America/Sao_Paulo');

	include 'conecta.php';

	$tabela = $_POST['nome_tabela'];
	$idheroi = $_POST['idheroi'];
	//$tabela = 'talk_16_21_660699357';
	//$idheroi = 16;
	$idheroi = 'h_'.$idheroi;



	/* vou olhar na tabela pagamentos, e verificar se nessa tabela tem um status =  pagamento confirmado, se sim, vou conferir se 
	   a diferença de agora para o datastatus é menor que 40 minutos, se sim -> status = inativa. */
	$s = 'Pagamento confirmado';
	
	$consulta = $conexao->prepare("SELECT datastatus FROM pagamentos WHERE tabela =:tabela AND status =:status AND encerrado != '1' ");
	$consulta->bindParam(':tabela', $tabela, PDO::PARAM_INT);
	$consulta->bindParam(':status', $s, PDO::PARAM_INT);
	$consulta->execute();
	while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
	  $datastatus = $linha['datastatus'];
	}
	if($datastatus == ''){
		$status = 'parcialmente ativa';
	}else{
		$agora = date('Y-m-d H:i:s');
		$agora_f = new DateTime($agora);
		$datastatus_f = new DateTim ($datastatus);

		$intervalo_pag= $agora_f->diff($datastatus_f);
		if($intervalo_pag->i <= '45' && $intervalo->d == '0'){
			$status = 'inativa';
		}else{
			$status = 'parcialmente ativa';
		}
	}



	if($status != 'inativa'){
		//pego a ultima msg do anjo
		$consulta = $conexao->prepare("SELECT datahora FROM $tabela WHERE remetente != :idheroi ORDER BY id DESC LIMIT 1 ");
		$consulta->bindParam(':idheroi', $idheroi, PDO::PARAM_INT);
		$consulta->execute();
		while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
		  $data_ultima_msg_anjo = $linha['datahora'];
		}

		//pego a ultima msg do heroi
		$consulta = $conexao->prepare("SELECT datahora FROM $tabela WHERE remetente = :idheroi ORDER BY id DESC LIMIT 1 ");
		$consulta->bindParam(':idheroi', $idheroi, PDO::PARAM_INT);
		$consulta->execute();
		while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
	      $data_ultima_msg_heroi = $linha['datahora'];
		}


		//calculo a diferença de tempo
		$data1 = new DateTime($data_ultima_msg_anjo);
	  	$data2 = new DateTime($data_ultima_msg_heroi);
	  	$intervalo = $data1->diff($data2); 

	  	$dataagora = date('Y-m-d H:i:s');
	  	$data_now = new DateTime($dataagora);
	    $intervalo2= $data_now->diff($data2);


		//se for menor que 1 minuto ->ativa, se nao -> inativa.
		if($intervalo->i <= '2' && $intervalo->d == '0'){
			//beleza, a diferença entre as mensagens é pequena, aparentemente eles tao ali.. mas, 
			//aqui eu vejo se a data da ultima atividade e a data que o usuario está com o chat aberto é perto uma da outra
	        //somente para evitar o caso de o usuario abrir o chat mto tempo depois para ler a conversa e ser disparado pelo pagamento
	        //se ele voltar a conversar com o anjo ->dispara_inicio do atendimento

		    if(($intervalo2->i > '15' && $intervalo2->d == '0') || ($intervalo2->h > '0' && $intervalo2->d == '0') ){
		    	$status = 'inativa';
		    }else{
		        $status = $data_ultima_msg_anjo;
		    }
			
		}else{
			$status = 'inativa';
		}
	}


	echo $status;





?>