<?php
	include 'conecta.php';
	$tabela = $_POST['nome_tabela'];
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


  echo $status;





?>
