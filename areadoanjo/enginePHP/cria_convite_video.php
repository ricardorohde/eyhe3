<?php

date_default_timezone_set('America/Belem');
$dataconvite = date('Y-m-d H:i:s');
include 'conecta.php';

$idheroi = $_POST['idheroi'];
$idanjo = $_POST['idanjo'];
$tabela = $_POST['tabela'];
$status = 'Em aguardo';

$stmte2 = $conexao->prepare("INSERT INTO videochamadas (idheroi, idanjo, status, tabela, dataconvite) VALUES (?,?,?,?,?)");
$stmte2->bindParam(1, $idheroi , PDO::PARAM_STR);
$stmte2->bindParam(2, $idanjo , PDO::PARAM_STR);
$stmte2->bindParam(3, $status , PDO::PARAM_STR);
$stmte2->bindParam(4, $tabela , PDO::PARAM_STR);
$stmte2->bindParam(5, $dataconvite , PDO::PARAM_STR);

$executa2 = $stmte2->execute();

echo "Convite criado";


?>
