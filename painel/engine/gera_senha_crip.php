 <?php

 	$senha = $_GET['senha'];

 	echo "SENHA SEM CRIP: ".$senha;
	$senha_crip = password_hash($senha, PASSWORD_DEFAULT);
	echo "<br/><br/>SENHA COM CRIP: ".$senha_crip;


?>
