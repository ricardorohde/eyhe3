<?php
    //Conectando ao banco de dados
    include "conecta.php";

    $consulta = $conexao->prepare("SELECT * FROM tab_usuario ORDER BY id DESC LIMIT 1000");
    $consulta->execute();

    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
        echo $linha['email'].'<br/>';
    }

?>
