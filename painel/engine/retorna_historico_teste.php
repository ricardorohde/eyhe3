<?php
    //Conectando ao banco de dados
    include "conecta.php";

    $tabela = 'talk_1431_21_788394819';

    $consulta = $conexao->query("SELECT * FROM $tabela ORDER BY datahora ASC");
    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
      $vetor[] = array_map('htmlentities', $linha);
    }

    //Passando vetor em forma de json
    echo json_encode($vetor, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

?>
