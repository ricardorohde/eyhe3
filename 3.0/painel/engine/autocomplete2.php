<?php

#----------------------------------------------------
# a ideia aqui é gerar um json com os nomes das tags + nome dos anjos ativos
#----------------------------------------------------

include ('conecta.php');  

// Get search term
$searchTerm = $_GET['term'];

$consulta = $conexao->query("SELECT nome FROM tags  WHERE nome LIKE '%$searchTerm%' ORDER BY nome ASC");
$i = 0;
while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
    $nomes[$i] = array('label' => $linha['nome']);
    $i++;
}

$consulta = $conexao->query("SELECT nome FROM anjos  WHERE nome LIKE '%$searchTerm%' AND status = 1 ORDER BY nome ASC");
while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
    $nomes[$i] = array('label' => $linha['nome']);
    $i++;
}

#concatena os dois resultados

# echo the json data back to the html web page
echo json_encode($nomes);

?>