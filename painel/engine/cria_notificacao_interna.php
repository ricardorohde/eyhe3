<?php

	include 'conecta.php';
	date_default_timezone_set('America/Sao_Paulo');
  
	//INFORMAÇÕES DA NOTIFICAÇÃO INTERNA!!
	$tipo = 'configurar-notificacao';
	$AH = 'H';
	$datacriacao = date('Y-m-d H:i:s');
	$texto = 'Configure suas notificações do Eyhe';
	$link = "config_notificacoes.php";


	$consulta = $conexao->query("SELECT id FROM tab_usuario");
    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
        $iddestino = $linha['id'];
        try{
        	   $stmte2 = $conexao->prepare("INSERT INTO notificacoesinternas (tipo, AH, iddestino, datacriacao, texto, link) VALUES (?,?,?,?,?,?)");
		       $stmte2->bindParam(1, $tipo , PDO::PARAM_STR);
		       $stmte2->bindParam(2, $AH , PDO::PARAM_STR);
		       $stmte2->bindParam(3, $iddestino , PDO::PARAM_STR);
		       $stmte2->bindParam(4, $datacriacao , PDO::PARAM_STR);
		       $stmte2->bindParam(5, $texto , PDO::PARAM_STR);
		       $stmte2->bindParam(6, $link , PDO::PARAM_STR);
		       $executa2 = $stmte2->execute();

		       echo "Notificação criada para o heroi {".$iddestino."} do tipo [".$tipo."].<br/>";
        }

        catch(PDOException $e){
          echo $e->getMessage();
        }
    }



      



?>
