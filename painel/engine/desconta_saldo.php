<?php
include ('conecta.php');

$idheroi = $_POST['idheroi'];
$idanjo = $_POST['idanjo'];
$valor = $_POST['valor'];

/*atualizando saldo */
$consulta = $conexao->query("SELECT saldo FROM tab_usuario where id = $idheroi limit 1");
while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
  $saldo = $linha['saldo'];
  if($saldo == ''){
    $saldo = 0.00;
  }
}
$saldo = $saldo - $valor;
$stmt = $conexao->prepare("UPDATE tab_usuario
SET saldo = :saldo WHERE (id = :idheroi) ");
$stmt->bindParam(':saldo', $saldo);
$stmt->bindParam(':idheroi', $idheroi);
$executa = $stmt->execute();


// --------------------------------------- //

$consulta = $conexao->query("SELECT nome FROM anjos  WHERE id = $idanjo limit 1");
while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
    $nome = $linha['nome'];
}

date_default_timezone_set('America/Sao_Paulo');
$data_t = date('Y-m-d H:i:s');

$tipo = 'Atendimento pago com Anjo '.$nome;
$formato = "Saldo Eyhe";
$status = 'Confirmado';


$stmte2 = $conexao->prepare("INSERT INTO financeiroH
(idheroi, tipo, formato, data_t, status, valor) VALUES (?,?,?,?,?,?)");
$stmte2->bindParam(1, $idheroi , PDO::PARAM_STR);
$stmte2->bindParam(2, $tipo , PDO::PARAM_STR);
$stmte2->bindParam(3, $formato , PDO::PARAM_STR);
$stmte2->bindParam(4, $data_t , PDO::PARAM_STR);
$stmte2->bindParam(5, $status , PDO::PARAM_STR);
$stmte2->bindParam(6, $valor , PDO::PARAM_STR);
$executa2 = $stmte2->execute();







?>
