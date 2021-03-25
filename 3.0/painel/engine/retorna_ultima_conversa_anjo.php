<?php
    //Conectando ao banco de dados
    include "conecta.php";

    $idanjo = $_POST['idanjo'];
    //$idanjo = $_GET['id'];


    $consulta = $conexao->prepare("SELECT * FROM conversas WHERE ( (idanjo = :idanjo) AND (offanjo IS NULL) ) ORDER BY id DESC LIMIT 1");
    $consulta->bindParam(':idanjo', $idanjo, PDO::PARAM_INT);
    $consulta->execute();   

    /*while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
        $vetor[] = array_map('htmlentities', $linha);
    }

    //Passando vetor em forma de json
    echo json_encode($vetor, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);*/

    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
        $id_ultima_conversa = $linha['id'];
    }

    echo $id_ultima_conversa;

?>
