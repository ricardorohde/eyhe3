<?php

	include 'conecta.php';

	date_default_timezone_set('America/Sao_Paulo');
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


    echo "Status do pagamento #".$_POST['idpagamento'].": ".$_POST['status'];
?>
