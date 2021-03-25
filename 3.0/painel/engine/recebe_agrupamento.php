<?php

include 'conecta.php';

/*
  cada variavel dessa é um vetor cheio de tags..
*/

$relacionamento = $_POST['relacionamento'];
$espiritualidade = $_POST['espiritualidade'];
$saudebemestar = $_POST['saudebemestar'];
$financeiro = $_POST['financeiro'];

//print_r($financeiro);


$tagsrelacionamento = implode(",", $relacionamento);
$tagsespiritualidade = implode(",", $espiritualidade);
$tagssaudebemestar = implode(",", $saudebemestar);
$tagsfinanceiro = implode(",", $financeiro);

try{
	  $grupo = 'relacionamento';
      $stmt = $conexao->prepare("UPDATE agrupamento
      SET tags = :tags WHERE grupo = :grupo ");
      $stmt->bindParam(':tags', $tagsrelacionamento);
      $stmt->bindParam(':grupo', $grupo);
      $executa = $stmt->execute();

    }
catch(PDOException $e){      
      echo $e->getMessage();
    }


try{
	  $grupo = 'espiritualidade';
      $stmt = $conexao->prepare("UPDATE agrupamento
      SET tags = :tags WHERE grupo = :grupo ");
      $stmt->bindParam(':tags', $tagsespiritualidade);
      $stmt->bindParam(':grupo', $grupo);
      $executa = $stmt->execute();

    }
catch(PDOException $e){      
      echo $e->getMessage();
    }

try{
	  $grupo = 'saude';
      $stmt = $conexao->prepare("UPDATE agrupamento
      SET tags = :tags WHERE grupo = :grupo ");
      $stmt->bindParam(':tags', $tagssaudebemestar);
      $stmt->bindParam(':grupo', $grupo);
      $executa = $stmt->execute();

    }
catch(PDOException $e){      
      echo $e->getMessage();
    }

try{
	  $grupo = 'financeiro';
      $stmt = $conexao->prepare("UPDATE agrupamento
      SET tags = :tags WHERE grupo = :grupo ");
      $stmt->bindParam(':tags', $tagsfinanceiro);
      $stmt->bindParam(':grupo', $grupo);
      $executa = $stmt->execute();

    }
catch(PDOException $e){      
      echo $e->getMessage();
    }


echo "Sucesso";







?>
