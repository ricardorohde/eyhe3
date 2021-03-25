<?php

  #Destino das imagens.
	$pasta = "../avatar-anjos";

	#Conectando..
	include('conecta.php');

  #flag de erro
  $erro = 0;

  #pagando itens do form
  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $telefone = $_POST['telefone'];
  $cidade = $_POST['cidade'];
  $datanasc = $_POST['datanasc'];
  $status = $_POST['status'];
  $biografia = $_POST['biografia'];
  $senha = $_POST['senha'];
	#criptografia da senha
	$senha_crip = password_hash($senha, PASSWORD_DEFAULT);
  $facebook = $_POST['facebook'];
  $avatar = $_FILES["avatar"];

  #manipulando imagem do anjo
  $extensao = @end(explode('.', $avatar["name"]));
  if($extensao != 'php'){
    $tmp = $avatar["tmp_name"];
    $novoNome = rand().".$extensao";
    $avatar = $pasta."/".$novoNome;

    //esse nome já existe?
    while(is_file($avatar)){
      //gera um novo nome;
      $novoNome = rand().".$extensao";
      $avatar = $pasta."/".$novoNome;
    }
    //salvo na pasta
    move_uploaded_file($tmp, $avatar);

    $avatar = substr($avatar, 3);
  }else{
    $erro = 1;
    echo "Ocorreu um erro. Tente novamente. coderro:#".$erro."</p>";
    exit();
  }

  $desafios = $_POST["desafios"];
  if(count($desafios) == 3){
    $desafio1 = $desafios[0];
    $desafio2 = $desafios[1];
    $desafio3 = $desafios[2];
  }

  if(count($desafios) == 2){
    $desafio1 = $desafios[0];
    $desafio2 = $desafios[1];
    $desafio3 = "";
  }

  if(count($desafios) == 1){
    $desafio1 = $desafios[0];
    $desafio2 = "";
    $desafio3 = "";
  }

  $interesses = $_POST["interesses"];
  if(count($interesses) == 3){
    $interesse1 = $interesses[0];
    $interesse2 = $interesses[1];
    $interesse3 = $interesses[2];
  }

  if(count($interesses) == 2){
    $interesse1 = $interesses[0];
    $interesse2 = $interesses[1];
    $interesse3 = "";
  }

  if(count($interesses) == 1){
    $interesse1 = $interesses[0];
    $interesse2 = "";
    $interesse3 = "";
  }

  $online = 0;
	#inserindo no banco
  try{
     $stmte2 = $conexao->prepare("INSERT INTO anjos
     (nome, email, telefone, cidade, datanasc, status, biografia, senha, avatar, online, desafio1, desafio2, desafio3, interesse1, interesse2, interesse3)
     VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
     $stmte2->bindParam(1, $nome , PDO::PARAM_STR);
     $stmte2->bindParam(2, $email , PDO::PARAM_STR);
     $stmte2->bindParam(3, $telefone , PDO::PARAM_STR);
     $stmte2->bindParam(4, $cidade , PDO::PARAM_STR);
     $stmte2->bindParam(5, $datanasc , PDO::PARAM_STR);
     $stmte2->bindParam(6, $status , PDO::PARAM_STR);
     $stmte2->bindParam(7, $biografia , PDO::PARAM_STR);
     $stmte2->bindParam(8, $senha_crip, PDO::PARAM_STR);
     $stmte2->bindParam(9, $avatar , PDO::PARAM_STR);
     $stmte2->bindParam(10, $online , PDO::PARAM_STR);
     $stmte2->bindParam(11, $desafio1 , PDO::PARAM_STR);
     $stmte2->bindParam(12, $desafio2 , PDO::PARAM_STR);
     $stmte2->bindParam(13, $desafio3 , PDO::PARAM_STR);
     $stmte2->bindParam(14, $interesse1 , PDO::PARAM_STR);
     $stmte2->bindParam(15, $interesse2 , PDO::PARAM_STR);
     $stmte2->bindParam(16, $interesse3 , PDO::PARAM_STR);
     $executa2 = $stmte2->execute();

    if(!$executa2)
        $erro = 2;
      }
    catch(PDOException $e){
        echo $e->getMessage();
    }


	if($erro == 0){
    	echo "ANJO criada com sucesso!";
    }else{
    echo "Ocorreu um erro. Tente novamente. coderro:#".$erro."</p>";
  }

?>
