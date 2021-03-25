<?php

    #Conectando..
	include('conecta.php');
	include('funcoes-sms.php');


    #flag de erro
    $erro = 0;

    $nome = $_POST['nome_completo'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
		$grupo = $_POST['grupo'];
		$estado = $_POST['estado'];
		$cidade = $_POST['cidade'];
    $status = 'A';
    $online = 0;
    $avatar = 'avatar-herois/avatar.jpg';
		$telefone = $_POST['telefone'];

		$datanasc = $_POST['datanascimento'];

		/*
			antes de tudo, não se pode criar uma conta usando um e-mail que já existe no banco
		*/
		$contador = 0;
		$consulta = $conexao->query("SELECT * FROM tab_usuario WHERE (email = '$email') AND (uber IS NULL)  ");
		while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
			$contador++;
		}

		if($contador != 0){
			echo "Esse e-mail já está em uso :(";
			exit;
			$erro++;
		}


		//qual a data do cadastro ?
		date_default_timezone_set('America/Sao_Paulo');
	    $datacadastro = date('Y-m-d H:i:s');


    #criptografia da senha
    $senha_crip = password_hash($senha, PASSWORD_DEFAULT);

    #inserindo no banco
    try{
        $stmte2 = $conexao->prepare("INSERT INTO tab_usuario (nome, email, senha, status, avatar, online, datanasc, grupo, datacadastro, cidade, estado, telefone) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)");
        $stmte2->bindParam(1, $nome , PDO::PARAM_STR);
        $stmte2->bindParam(2, $email , PDO::PARAM_STR);
        $stmte2->bindParam(3, $senha_crip , PDO::PARAM_STR);
        $stmte2->bindParam(4, $status , PDO::PARAM_STR);
        $stmte2->bindParam(5, $avatar , PDO::PARAM_STR);
        $stmte2->bindParam(6, $online , PDO::PARAM_STR);
        $stmte2->bindParam(7, $datanasc , PDO::PARAM_STR);
				$stmte2->bindParam(8, $grupo , PDO::PARAM_STR);
				$stmte2->bindParam(9, $datacadastro , PDO::PARAM_STR);
				$stmte2->bindParam(10, $cidade , PDO::PARAM_STR);
				$stmte2->bindParam(11, $estado , PDO::PARAM_STR);
				$stmte2->bindParam(12, $telefone , PDO::PARAM_STR);


        $executa2 = $stmte2->execute();

    if(!$executa2)
        $erro++;
    }
    catch(PDOException $e){
        echo $e->getMessage();
    }


    if($erro == 0){

				//envia sms para a Maria
			 envia_sms_novo_cadastro('554699701366', $nome);
			 //envia sms para o Leandro
			 envia_sms_novo_cadastro('554688011011', $nome);
			 //envia sms para Anjo de Plantão
			 envia_sms_novo_cadastro('554699177534', $nome);

				//envia e-mail de confirmação!
				include '../../enviaemail.php';
				$msg =  file_get_contents("../../html_confirmacao_cadastro.html");
				EnviarEmail($email, $msg, 'Seja bem-vindo ao Eyhe !', $nome);
                echo "Cadastro realizado com sucesso!";
    }else{
    echo "Ocorreu um erro. Tente novamente. coderro:#".$erro."</p>";
    }

?>
