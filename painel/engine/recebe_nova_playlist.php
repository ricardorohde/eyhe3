<?php

  #Destino das imagens.
	$pasta = "../capaplaylist";
	#Conectando..
	include('conecta.php');

  #flag de erro
  $erro = 0;

  #pagando itens do form
  $nome = $_POST['nome'];
  $keyword = $_POST['keywords'];
  $avatar = $_FILES["capa"];

  date_default_timezone_set('America/Sao_Paulo');
  $datacriacao = date('Y-m-d H:i:s');

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

    $capa = substr($avatar, 3);
  }else{
    $erro = 1;
    echo "Ocorreu um erro. Tente novamente. coderro:#".$erro."</p>";
    exit();
  }


  try{
     $stmte2 = $conexao->prepare("INSERT INTO playlists (nome, capa, keywords, datacriacao) VALUES (?,?,?,?) ");
     $stmte2->bindParam(1, $nome , PDO::PARAM_STR);
     $stmte2->bindParam(2, $capa , PDO::PARAM_STR);
     $stmte2->bindParam(3, $keyword , PDO::PARAM_STR);
     $stmte2->bindParam(4, $datacriacao , PDO::PARAM_STR);

     $executa2 = $stmte2->execute();

    if(!$executa2)
        $erro = 2;
      }
    catch(PDOException $e){
        echo $e->getMessage();
    }


	if($erro == 0){
    	echo "Playlist criada com sucesso!";
    }else{
    echo "Ocorreu um erro. Tente novamente. coderro:#".$erro."</p>";
  }

?>
