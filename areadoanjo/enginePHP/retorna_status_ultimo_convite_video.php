<?php
$tabela = $_POST['nome_tabela'];
$idheroi = $_POST['idheroi'];
$idanjo = $_POST['idanjo'];
include 'conecta.php';

$i = 0;
$consulta = $conexao->prepare("SELECT id,status FROM videochamadas
                              WHERE tabela =:tabela  AND idheroi =:idheroi AND idanjo =:idanjo
                              ORDER by id DESC limit 1");
$consulta->bindParam(':tabela', $tabela, PDO::PARAM_STR);
$consulta->bindParam(':idheroi', $idheroi, PDO::PARAM_INT);
$consulta->bindParam(':idanjo', $idanjo, PDO::PARAM_INT);
$consulta->execute();
while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
  $status = $linha['status'];
  $idvideo = $linha['id'];
  $i++;
}


if($i == 0){
  $status = 'nenhum';
}

echo $status;

 ?>
