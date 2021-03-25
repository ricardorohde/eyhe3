<?php

	#Conectando..
	include('conecta.php');

  #flag de erro
  $erro = 0;

  #pagando itens do form
  $email = $_POST['email'];
  date_default_timezone_set('America/Sao_Paulo');
  $datahora = date('Y-m-d H:i');

	#inserindo no banco
  try{
     $stmte2 = $conexao->prepare("INSERT INTO newsletter (email, datahora) VALUES (?,?)");
     $stmte2->bindParam(1, $email , PDO::PARAM_STR);
     $stmte2->bindParam(2, $datahora , PDO::PARAM_STR);
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
