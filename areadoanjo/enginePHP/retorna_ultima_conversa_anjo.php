<?php

include ("conecta.php");
$idanjo = $_POST['idanjo'];
$status = 'Em espera';
$consulta = $conexao->prepare("SELECT id FROM conversas WHERE idanjo = :idanjo and status = :status ORDER BY id DESC LIMIT 1 ");
$consulta->bindParam(':idanjo', $idanjo, PDO::PARAM_INT);
$consulta->bindParam(':status', $status, PDO::PARAM_STR);

$consulta->execute();
while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
  $id_ultima_conversa = $linha['id'];
}

echo $id_ultima_conversa;

?>
