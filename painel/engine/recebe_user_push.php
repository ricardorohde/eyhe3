<?php

	#Conectando..
	include('conecta.php');

  #flag de erro
  $erro = 0;

  #pagando itens do form
  $idEYHE = $_POST['idEYHE'];
  $idPUSH = $_POST['idPUSH'];
  $tipo   = $_POST['tipo'];

  date_default_timezone_set('America/Sao_Paulo');
  $datahora = date('Y-m-d H:i');

  if($tipo == 'h'){
    $tabela = 'pushherois';
  }else{
    $tabela = 'pushanjos';
  }

	#inserindo no banco
  try{
     $stmte2 = $conexao->prepare("INSERT INTO $tabela (ideyhe, idpush, datahora) VALUES (?,?,?)");
     $stmte2->bindParam(1, $idEYHE , PDO::PARAM_STR);
     $stmte2->bindParam(2, $idPUSH , PDO::PARAM_STR);
     $stmte2->bindParam(3, $datahora , PDO::PARAM_STR);
     $executa2 = $stmte2->execute();

   if(!$executa2)
       $erro++;
    }
   catch(PDOException $e){
      echo $e->getMessage();
   }


	if($erro == 0){
    	echo "Usuario cadastrado nas notificações Eyhe! ";
    }else{
    echo "Ocorreu um erro. Tente novamente. coderro:#".$erro."</p>";
  }

?>
