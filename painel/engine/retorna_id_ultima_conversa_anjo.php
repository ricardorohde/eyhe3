<?php

include ("conecta.php");
$idanjo = $_POST['id_anjo'];

$consulta = $conexao->prepare("SELECT id FROM conversas WHERE idanjo = :idanjo ORDER BY ultimamsg DESC LIMIT 1 ");
$consulta->bindParam(':idanjo', $idanjo, PDO::PARAM_INT);
$consulta->execute();
while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
  $id_ultima_conversa = $linha['id'];
}

echo $id_ultima_conversa;

?>
