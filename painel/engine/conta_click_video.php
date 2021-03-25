<?php

  //Conectando ao banco de dados
  include "conecta.php";

  //pega quantidade atual
    $consulta = $conexao->query("SELECT cliquesvideo FROM infos WHERE id = 1");
    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
          $qtd_atual = $linha['cliquesvideo'];
    }

    $qtd = $qtd_atual + 1;


        try{

          $stmt = $conexao->prepare("UPDATE infos
          SET cliquesvideo = :cliquesvideo
          WHERE id = 1");
          $stmt->bindParam(':cliquesvideo', $qtd);
          $executa = $stmt->execute();

        }

        catch(PDOException $e){
          GeraLog::getInstance()->inserirLog("Erro: Código: " . $e->getCode() . " Mensagem: " . $e->getMessage());
          echo $e->getMessage();
        }


 ?>
