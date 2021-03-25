<?php

	include 'conecta.php';

	date_default_timezone_set('America/Belem');
	$datastatus = date('Y-m-d H:i');


	 try{

      $stmt = $conexao->prepare("UPDATE pagamentos
      SET status = :status, datastatus = :datastatus
      WHERE (id = :idpagamento) ");
      $stmt->bindParam(':status', $_POST['status']);
			$stmt->bindParam(':datastatus', $datastatus);
      $stmt->bindParam(':idpagamento', $_POST['idpagamento']);
      $executa = $stmt->execute();

    }
    catch(PDOException $e){
      echo $e->getMessage();
    }

		//se o status é confirmado, vou atualizar saldo do anjo e tabela do financeiro
		if($_POST['status'] == 'Pagamento confirmado'){

			$id = $_POST['idpagamento'];
			$consulta = $conexao->query("SELECT idanjo, idheroi FROM pagamentos where id = $id limit 1");
			while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
				$idanjo = $linha['idanjo'];
				$idheroi= $linha['idheroi'];

			}

			$consulta = $conexao->query("SELECT nome FROM tab_usuario where id = $idheroi limit 1");
			while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
				$nome_heroi = $linha['nome'];
			}

			//atualiza Saldo
			$consulta = $conexao->query("SELECT saldo FROM anjos where id = $idanjo limit 1");
			while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
				$saldo= $linha['saldo'];
			}

			$saldo_new = $saldo + 24.9;
			$stmt = $conexao->prepare("UPDATE anjos
      SET saldo = :saldo
      WHERE (id = :id) ");
      $stmt->bindParam(':saldo', $saldo_new);
      $stmt->bindParam(':id', $idanjo);
      $executa = $stmt->execute();

			$valor = 24.9;
			$tipo = 'Conversa paga com o Herói '.$nome_heroi;
			$status = 'Confirmado';
			//adiciona na tabela financeiroA
			$stmte2 = $conexao->prepare("INSERT INTO financeiroA (idanjo, tipo, data_t, status, valor) VALUES (?,?,?,?,?)");
			$stmte2->bindParam(1, $idanjo , PDO::PARAM_STR);
			$stmte2->bindParam(2, $tipo , PDO::PARAM_STR);
			$stmte2->bindParam(3, $datastatus , PDO::PARAM_STR);
			$stmte2->bindParam(4, $status , PDO::PARAM_STR);
			$stmte2->bindParam(5, $valor , PDO::PARAM_STR);

			$executa2 = $stmte2->execute();

		}


    echo "Status do pagamento #".$_POST['idpagamento'].": ".$_POST['status'];
?>
