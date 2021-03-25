<?php
    //Conectando ao banco de dados
    include "conecta.php";

    $consulta = $conexao->query("SELECT tabela FROM conversas");
    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
      $tabela = $linha['tabela'];
      $stmt = $conexao->prepare('DROP TABLE '.$tabela.' ');
      $executa = $stmt->execute();
    }


?>
