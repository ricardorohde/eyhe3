<?php

$online = $_GET['online'];
include "conecta.php";

  try{
     $consulta = $conexao->prepare("SELECT * FROM anjos WHERE (online = $online) ORDER BY id DESC");
     $consulta->execute();
     while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
        $vetor[] = array_map('htmlentities', $linha);
     }
     
  }
  catch(PDOException $e){
    echo $e->getMessage();
  }

   
  echo json_encode($vetor, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

?>