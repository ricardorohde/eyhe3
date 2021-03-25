<?php

	include 'conecta.php';
	date_default_timezone_set('America/Sao_Paulo');
  
	$idanjo = (int)$_POST['idanjo'];
	$valor = $_POST['valor'];
	$idheroi = (int)$_POST['idheroi'];
	$tabela = $_POST['tabela'];

	//vamos pegar a data da solicitação
	$datasolicitacao = date('Y-m-d H:i:s');

	$status = 'aguardando';
	$encerrado = 1;


	// QUANDO UM ANJO ENVIA UMA NOVA SOLICITAÇÃO DE PARA O MESMO HEROI
	// TODOS OS OUTROS PEDIDOS DE ORÇAMENTO SÃO ATUALIZADOS PARA ENCERRADOS = TRUE;
	 try{

      $stmt = $conexao->prepare("UPDATE pagamentos
      SET encerrado = :encerrado
      WHERE (idanjo = :idanjo AND idheroi = :idheroi) ");
      $stmt->bindParam(':encerrado', $encerrado);
      $stmt->bindParam(':idanjo', $idanjo);
      $stmt->bindParam(':idheroi', $idheroi);
      $executa = $stmt->execute();

    }
    catch(PDOException $e){     
      echo $e->getMessage();
    }


	//salvar essa solicitacao na tabela pagamentos
	   try{
        	   $stmte2 = $conexao->prepare("INSERT INTO pagamentos (idanjo, idheroi, datasolicitacao, valor, status, tabela) VALUES (?,?,?,?,?,?)");
		       $stmte2->bindParam(1, $idanjo , PDO::PARAM_STR);
		       $stmte2->bindParam(2, $idheroi , PDO::PARAM_STR);
		       $stmte2->bindParam(3, $datasolicitacao , PDO::PARAM_STR);
		       $stmte2->bindParam(4, $valor , PDO::PARAM_STR);
		       $stmte2->bindParam(5, $status , PDO::PARAM_STR);
		       $stmte2->bindParam(6, $tabela , PDO::PARAM_STR);				   
		       $executa2 = $stmte2->execute();

		       //echo "Solicitação de pagamento enviada com sucesso! Status do pagamento: AGUARDANDO..";
		       //preciso retornar o id recem inserido
		       $id = $conexao->lastInsertId();
		       echo $id;
        }

        catch(PDOException $e){
          echo $e->getMessage();
        }


?>