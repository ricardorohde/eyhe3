<?php

  $nome = $_POST['nome'];
  $email = $_POST['email'];

  $q1 = $_POST['questao1'];
  $q2 = $_POST['questao2'];
  $q3 = $_POST['questao3'];
  $q4 = $_POST['questao4'];
  $q5 = $_POST['questao5'];
  $q6 = $_POST['questao6'];
  $q7 = $_POST['questao7'];
  $q8 = $_POST['questao8'];
  $q9 = $_POST['questao9'];


  $soma = $q1 + $q2 + $q3 + $q4 + $q5 + $q6 + $q7 + $q8 + $q9;

  if($soma <= 15){
    $resultado = 'Nível de estresse e ansiedade muito abaixo da média';
    echo 1;
  }else if($soma > 15 && $soma <= 30){
    $resultado = 'Nível de estresse de médio - padrão habitual';
    echo 2;
  }else{
    $resultado = 'Nível de estresse e ansiedade acima do normal';
    echo 3;
  }


  //salvando resultados no banco !

  include "conecta.php";

  date_default_timezone_set('America/Sao_Paulo');
  $datateste = date('Y-m-d H:i');

  try{
     $stmte2 = $conexao->prepare("INSERT INTO testestress (nome, email, datateste, resultado) VALUES (?,?,?,?)");
     $stmte2->bindParam(1, $nome , PDO::PARAM_STR);
     $stmte2->bindParam(2, $email , PDO::PARAM_STR);
     $stmte2->bindParam(3, $datateste , PDO::PARAM_STR);
     $stmte2->bindParam(4, $resultado , PDO::PARAM_STR);

     $executa2 = $stmte2->execute();

   }
   catch(PDOException $e){
      echo $e->getMessage();
   }


?>
