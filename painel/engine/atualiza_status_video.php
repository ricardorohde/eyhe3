<?php
    //Conectando ao banco de dados
    include "conecta.php";

    $idchamada = $_POST['idchamada'];
    $status = $_POST['status_resposta'];

    date_default_timezone_set('America/Belem');
    $dataresposta = date('Y-m-d H:i');


    try{

      $stmt = $conexao->prepare("UPDATE videochamadas
      SET status = :status, dataaceitacao = :dataresposta
      WHERE (id = :id) ");
      $stmt->bindParam(':status', $status);
      $stmt->bindParam(':dataresposta', $dataresposta);
      $stmt->bindParam(':id', $idchamada);
      $executa = $stmt->execute();

    }
    catch(PDOException $e){
      GeraLog::getInstance()->inserirLog("Erro: Código: " . $e->getCode() . " Mensagem: " . $e->getMessage());
      echo $e->getMessage();
    }

    //fim da confiramação de leitura!!
    echo "atualizado";

?>
