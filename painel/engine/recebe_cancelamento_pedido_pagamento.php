<?php 

	$status = 'recusado';

	include 'conecta.php';

	 try{

      $stmt = $conexao->prepare("UPDATE pagamentos
      SET status = :status
      WHERE (id = :idpagamento) ");
      $stmt->bindParam(':status', $status);
      $stmt->bindParam(':idpagamento', $_POST['idpagamento']);
      $executa = $stmt->execute();

    }
    catch(PDOException $e){
      echo $e->getMessage();
    }

    echo "Você recusou o convite para a conversa premium";



?>