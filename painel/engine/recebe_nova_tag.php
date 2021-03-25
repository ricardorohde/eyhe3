<?php

	#Conectando..
	include('conecta.php');

  #flag de erro
  $erro = 0;

  #pagando itens do form
  $nome = $_POST['tag_name'];
  $tipo = $_POST['tipo'];

	#inserindo no banco
  try{
     $stmte2 = $conexao->prepare("INSERT INTO tags (nome, tipo) VALUES (?,?)");
     $stmte2->bindParam(1, $nome , PDO::PARAM_STR);
     $stmte2->bindParam(2, $tipo , PDO::PARAM_STR);
     $executa2 = $stmte2->execute();

   if(!$executa2)
       $erro++;
    }
   catch(PDOException $e){
      echo $e->getMessage();
   }


	if($erro == 0){
    	echo "TAG criada com sucesso!";
    }else{
    echo "Ocorreu um erro. Tente novamente. coderro:#".$erro."</p>";
  }

?>
