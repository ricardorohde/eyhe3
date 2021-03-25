<?php

$id = $_POST['id_solicitacao'];
include "../engine/conecta.php";


  //pegando infos da solicitação

try{
    $consulta = $conexao->prepare('SELECT * FROM tab_usuario WHERE id = :id LIMIT 1');
    $consulta->bindParam(':id', $id, PDO::PARAM_INT);
    $consulta->execute();

    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
      $idUBER = $linha['id'];
      $talking = $linha['talking'];
      $idconversa = $linha['idconversa'];
      $tabela = $linha['tabela'];
    }

 }catch(PDOException $e){
    echo $e->getMessage();
 }

   //pegando infos do anjo

 try{
     $consulta = $conexao->prepare('SELECT nome, avatar, biografia, textovitrini, desafio1, desafio2, desafio3 FROM anjos WHERE id = :id LIMIT 1');
     $consulta->bindParam(':id', $talking, PDO::PARAM_INT);
     $consulta->execute();

     while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
       $nomeanjo = $linha['nome'];
       $avataranjo = $linha['avatar'];
       $biografiaanjo = $linha['biografia'];
       $textovitrini = $linha['textovitrini'];
       $desafio1 = $linha['desafio1'];
       $desafio2 = $linha['desafio2'];
       $desafio3 = $linha['desafio3'];

     }

  }catch(PDOException $e){
     echo $e->getMessage();
  }

  //pegando infos da conversa

  try{
      $consulta = $conexao->prepare('SELECT session FROM conversas WHERE id = :id LIMIT 1');
      $consulta->bindParam(':id', $idconversa, PDO::PARAM_INT);
      $consulta->execute();

      while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
        $sessao = $linha['session'];
      }

   }catch(PDOException $e){
      echo $e->getMessage();
   }


  //pegando quantidade de atendimentos ja feitos por esse anjo
  try{
      $consulta = $conexao->prepare('SELECT count(id) as qtd FROM conversas WHERE idanjo = :id LIMIT 1');
      $consulta->bindParam(':id', $talking, PDO::PARAM_INT);
      $consulta->execute();

      while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
        $qtdatendimentos = $linha['qtd'];
      }

   }catch(PDOException $e){
      echo $e->getMessage();
   }

   //pegando duas avaliacoes desses anjos
   try{
       $consulta = $conexao->prepare('SELECT comentario FROM avaliacoes_new WHERE ((idanjo = :id) and (comentario IS NOT NULL)) order by id desc LIMIT 2' );
       $consulta->bindParam (':id', $talking, PDO::PARAM_INT);
       $consulta->execute();


       $i = 0;
       while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
         $avaliacao[$i] = $linha['comentario'];
         $i++;
       }

    }catch(PDOException $e){
       echo $e->getMessage();
    }

    $avaliacao1 = $avaliacao[0];
    $avaliacao2 = $avaliacao[1];


 $array = array('iduber' => $idUBER, 'talking' => $talking, 'sessao' => $sessao, 'tabela' => $tabela, 'nomeanjo' => $nomeanjo,
                'avataranjo' => $avataranjo, 'biografiaanjo' => $biografiaanjo, 'textovitrini' => $textovitrini, 'desafio1' => $desafio1,
                 'desafio2' => $desafio2, 'desafio3' => $desafio3, 'qtdatendimentos' => $qtdatendimentos, 'avaliacao1' => $avaliacao1, 'avaliacao2' => $avaliacao2 );
 $vetor[] = array_map('htmlentities',$array);
 echo json_encode($vetor, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

 ?>
