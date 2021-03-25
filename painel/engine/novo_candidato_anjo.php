<?php

  $nome = $_POST['name'];
  $email = $_POST['email'];
  $telefone = $_POST['phone'];
  $cidade = $_POST['nasc'];
  $datanascimento = $_POST['day'].'/'.$_POST['month'].'/'.$_POST['year'];

  $pergunta1 = $_POST['pergunta1'];
  $pergunta2 = $_POST['pergunta2'];
  $pergunta3 = $_POST['pergunta3'];
  $pergunta4 = $_POST['pergunta4'];
  $pergunta5 = $_POST['pergunta5'];
  $pergunta6 = $_POST['pergunta6'];

  date_default_timezone_set('America/Sao_Paulo');
  $datacadastro = date('Y-m-d H:i');

  include 'conecta.php';

  $erro = 0;

  #inserindo no banco
  try{
     $stmte2 = $conexao->prepare("INSERT INTO novosanjos2021
                                  (nome,email,telefone,cidade,datanascimento,
                                  pergunta1, pergunta2, pergunta3, pergunta4,
                                  pergunta5, pergunta6,datacadastro)
                                  VALUES (?,?,?,?,?,?,?,?,?,?,?,?)");

     $stmte2->bindParam(1, $nome , PDO::PARAM_STR);
     $stmte2->bindParam(2, $email , PDO::PARAM_STR);
     $stmte2->bindParam(3, $telefone , PDO::PARAM_STR);
     $stmte2->bindParam(4, $cidade , PDO::PARAM_STR);
     $stmte2->bindParam(5, $datanascimento , PDO::PARAM_STR);
     $stmte2->bindParam(6, $pergunta1 , PDO::PARAM_STR);
     $stmte2->bindParam(7, $pergunta2 , PDO::PARAM_STR);
     $stmte2->bindParam(8, $pergunta3 , PDO::PARAM_STR);
     $stmte2->bindParam(9, $pergunta4 , PDO::PARAM_STR);
     $stmte2->bindParam(10, $pergunta5, PDO::PARAM_STR);
     $stmte2->bindParam(11, $pergunta6 , PDO::PARAM_STR);
     $stmte2->bindParam(12, $datacadastro, PDO::PARAM_STR);

     $executa2 = $stmte2->execute();

   if(!$executa2)
       $erro++;
    }
   catch(PDOException $e){
      echo $e->getMessage();
   }


	if($erro == 0){
    	echo "Cadastrado";
    }else{
    echo "Ocorreu um erro. Tente novamente. coderro:#".$erro."</p>";
  }





 ?>
