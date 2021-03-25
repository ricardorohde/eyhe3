<?php
include 'painel/engine/conecta.php';

date_default_timezone_set('America/Sao_Paulo');
$data_agora = date('Y-m-d H:i:s');

try{

  $stmt = $conexao->prepare("UPDATE conversas SET status = 'Perdida'
                            WHERE ((minute(datainicio) - minute($data_agora) > 8)) AND (status = 'Em espera') ");
  $executa = $stmt->execute();

}
catch(PDOException $e){
  echo $e->getMessage();
}



?>
