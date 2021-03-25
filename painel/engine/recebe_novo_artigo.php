<?php


  //todos os dados que chegarem aqui estão devidamente tratados (extensão e tamanho).
  //include("Resize.class.php");
  include ("conecta.php");
  $pasta = "../galeriaBlog";

  //flag de erro
  /*
    1 - > imagem com extensão php
    2 - >
  */
  $erro = 0;

  //captando dados do form
  $titulo = $_POST['titulo'];
  //$fonte = $_POST['fonte'];
  //$fontefotos = $_POST['fontefotos'];
  $categoria = $_POST['categoria'];
  $conteudo = $_POST['editor'];
  //$legenda = $_POST['legenda'];
  $conteudo = preg_replace('/style=\\"[^\\"]*\\"/', '', $conteudo);
  $conteudo = stripslashes($conteudo);
  $data = $_POST['data'];
  $imagem_destaque = $_FILES["imagem_destaque"];
  $autor = $_POST['autor'];
  $rascunho = $_POST['rascunho'];


  $keywords = $_POST['keywords'];
  $metadescrisao = $_POST['metadescrisao'];
  $altimage = $_POST['altimage'];

  //fim da captação


  //CRIANDO URL AMIGAVEL
  $map = array(
    'á' => 'a',
    'à' => 'a',
    'ã' => 'a',
    'â' => 'a',
    'é' => 'e',
    'ê' => 'e',
    'í' => 'i',
    'ó' => 'o',
    'ô' => 'o',
    'õ' => 'o',
    'ú' => 'u',
    'ü' => 'u',
    'ç' => 'c',
    'Á' => 'A',
    'À' => 'A',
    'Ã' => 'A',
    'Â' => 'A',
    'É' => 'E',
    'Ê' => 'E',
    'Í' => 'I',
    'Ó' => 'O',
    'Ô' => 'O',
    'Õ' => 'O',
    'Ú' => 'U',
    'Ü' => 'U',
    'Ç' => 'C'
);
  $url = $titulo;
  $url = strtr($url, $map); // funciona corretamente
  $url = strtolower($url);
  $url = str_replace(' ', '-', $url);


  //trabalhando com a imagem destaque!
  $extensao = @end(explode('.', $imagem_destaque["name"]));
  if($extensao != 'php'){
    $tmp = $imagem_destaque["tmp_name"];
    $novoNome = rand().".$extensao";
    $imagem_destaque = $pasta."/".$novoNome;

    //esse nome já existe?
    while(is_file($imagem_destaque)){
      //gera um novo nome;
      $novoNome = rand().".$extensao";
      $imagem_destaque = $pasta."/".$novoNome;
    }
    //salvo na pasta!
    move_uploaded_file($tmp, $imagem_destaque);
  }else{
    $erro = 1;
    echo "Erro: Imagem com formato inválido.";
    exit();
  }

  //formando a data de criação e data de liberação
  date_default_timezone_set('America/Sao_Paulo');
  $data_criacao = date('Y-m-d H:i');
  //transformando do modo brasileiro para americano
  $data_liberacao = implode('-', array_reverse(explode('/', $data)));
  //fim da formatação

  try{

     $stmte2 = $conexao->prepare("INSERT INTO blog
       (titulo, categoria, imagem_destaque, conteudo, autor, data_criacao, data_liberacao, rascunho, url, keywords, metadescrisao, altimage)
       VALUES (?,?,?,?,?,?,?,?,?,?,?,?)");
     $stmte2->bindParam(1, $titulo , PDO::PARAM_STR);
      $stmte2->bindParam(2, $categoria , PDO::PARAM_STR);
        $stmte2->bindParam(3, $imagem_destaque , PDO::PARAM_STR);
          $stmte2->bindParam(4, $conteudo , PDO::PARAM_STR);
            $stmte2->bindParam(5, $autor , PDO::PARAM_STR);
              $stmte2->bindParam(6, $data_criacao , PDO::PARAM_STR);
                $stmte2->bindParam(7, $data_liberacao , PDO::PARAM_STR);
                  $stmte2->bindParam(8, $rascunho , PDO::PARAM_STR);
                    $stmte2->bindParam(9, $url , PDO::PARAM_STR);
                        $stmte2->bindParam(10, $keywords , PDO::PARAM_STR);
                        $stmte2->bindParam(11, $metadescrisao , PDO::PARAM_STR);
                        $stmte2->bindParam(12, $altimage , PDO::PARAM_STR);

     $executa2 = $stmte2->execute();

    echo "Artigo criado com sucesso";
  }
   catch(PDOException $e){
      echo $e->getMessage();
   }





 ?>
