<?php

$email = $_POST['email'];
$eyhecode = $_POST['codigo'];

include 'conecta.php';

$contador = 0;
$consulta = $conexao->query("SELECT * FROM requisicoes_senha WHERE email = '$email' AND eyhecode = '$eyhecode' ");
while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
  $contador++;
}

if($contador == 0){
  echo "Opss... código inválido!";

}
else{
  echo "Código confirmado";
}


 ?>
