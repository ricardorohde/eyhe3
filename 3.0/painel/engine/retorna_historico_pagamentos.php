<?php
    //Conectando ao banco de dados
    include "conecta.php";

    $idanjo = $_POST['idanjo'];
    $idheroi = $_POST['idheroi'];

    //$idanjo  = 37;
    //idheroi = 505;

    $consulta = $conexao->query("SELECT * FROM pagamentos WHERE (idanjo = $idanjo) AND (idheroi = $idheroi) ORDER BY id desc");
    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
      $vetor[] = array_map('htmlentities', $linha);
    }

    //Passando vetor em forma de json
    echo json_encode($vetor, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

?>
