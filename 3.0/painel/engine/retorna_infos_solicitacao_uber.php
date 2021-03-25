<?php

$id = $_POST['id_solicitacao'];
include "conecta.php";

try{
    $consulta = $conexao->prepare('SELECT * FROM solicitacoesuber WHERE id = :id LIMIT 1');
    $consulta->bindParam(':id', $id, PDO::PARAM_INT);
    $consulta->execute();

    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
      $array = array('talking' => $linha['talking'], 'idconversa' => $linha['idconversa'], 'tabela' => $linha['tabela'],);
      $vetor[] = array_map('htmlentities', $array);
    }

 }catch(PDOException $e){
    echo $e->getMessage();
 }

 echo json_encode($vetor, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

 ?>
