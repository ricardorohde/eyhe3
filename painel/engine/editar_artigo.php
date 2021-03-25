<?php


  //todos os dados que chegarem aqui estão devidamente tratados (extensão e tamanho).
  //include("Resize.class.php");
  include ("conecta.php");
  include ("log/log.php");
  $pasta = "../galeriaBlog";

  //flag de erro
  /*
    1 - > imagem com extensão php
    2 - >
  */
  $erro = 0;

  //captando dados do form
  $id = $_POST['id'];
  $titulo = $_POST['titulo'];
  $categoria = $_POST['categoria'];
  $conteudo = $_POST['editor'];
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

  //transformando do modo brasileiro para americano
  $data_liberacao = implode('-', array_reverse(explode('/', $data)));
  //fim da formatação

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


  if($imagem_destaque["size"] == 0){
    //ou seja, não preciso atualizar imagem destaque
    try{

      $stmt = $conexao->prepare('UPDATE blog
      SET titulo = :titulo,
          categoria = :categoria,
          conteudo  = :conteudo,
          data_liberacao = :data_liberacao,
          autor = :autor,
          rascunho = :rascunho,
          keywords = :keywords,
          metadescrisao = :metadescrisao,
          altimage = :altimage
      WHERE id = :id');
      $stmt->bindParam(':id', $id);
      $stmt->bindParam(':titulo', $titulo);
      $stmt->bindParam(':categoria', $categoria);
      $stmt->bindParam(':conteudo', $conteudo);
      $stmt->bindParam(':data_liberacao', $data_liberacao);
      $stmt->bindParam(':autor', $autor);
      $stmt->bindParam(':rascunho', $rascunho);
      $stmt->bindParam(':keywords', $keywords);
      $stmt->bindParam(':metadescrisao', $metadescrisao);
      $stmt->bindParam(':altimage', $altimage);
      $executa = $stmt->execute();

      echo 'Artigo atualizado com sucesso!';

    }
    catch(PDOException $e){
      GeraLog::getInstance()->inserirLog("Erro: Código: " . $e->getCode() . " Mensagem: " . $e->getMessage());
      echo $e->getMessage();
    }

  }else{
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
      GeraLog::getInstance()->inserirLog("Mensagem: Tentantiva de upload de arquivo PHP");

      $erro = 1;
      echo "Erro: Imagem com formato inválido.";
      exit();
    }

    //atualizo o artigo no banco
    try{

      $stmt = $conexao->prepare('UPDATE blog
      SET titulo = :titulo,
          categoria = :categoria,
          conteudo  = :conteudo,
          data_liberacao = :data_liberacao,
          autor = :autor,
          rascunho = :rascunho,
          imagem_destaque = :imagem_destaque,
          keywords = :keywords,
          metadescrisao = :metadescrisao,
          altimage = :altimage
      WHERE id = :id');
      $stmt->bindParam(':id', $id);
      $stmt->bindParam(':titulo', $titulo);
      $stmt->bindParam(':categoria', $categoria);
      $stmt->bindParam(':conteudo', $conteudo);
      $stmt->bindParam(':data_liberacao', $data_liberacao);
      $stmt->bindParam(':autor', $autor);
      $stmt->bindParam(':rascunho', $rascunho);
      $stmt->bindParam(':imagem_destaque', $imagem_destaque);
      $stmt->bindParam(':keywords', $keywords);
      $stmt->bindParam(':metadescrisao', $metadescrisao);
      $stmt->bindParam(':altimage', $altimage);
      $executa = $stmt->execute();

      echo 'Artigo atualizado com sucesso!';

    }
    catch(PDOException $e){
      echo $e->getMessage();
      GeraLog::getInstance()->inserirLog("Erro: Código: " . $e->getCode() . " Mensagem: " . $e->getMessage());

    }


  }














 ?>
