<?php
session_start();

// Require da classe de conexão
require 'conexao.php';

// Instancia Conexão PDO
$conexao = Conexao::getInstance();

// Recebe os dados do formulário
$email = (isset($_POST['email'])) ? $_POST['email'] : '' ;
$senha = (isset($_POST['senha'])) ? $_POST['senha'] : '' ;

// Dica 3 - Verifica se o formato do e-mail é válido
if (!filter_var($email, FILTER_VALIDATE_EMAIL)):
    echo "Formato de e-mail inválido!";
	exit();
endif;

// Dica 5 - Válida os dados do usuário com o banco de dados
$sql = 'SELECT id, nome, senha, email FROM tab_usuario WHERE email = ? AND status = ? LIMIT 1';
$stm = $conexao->prepare($sql);
$stm->bindValue(1, $email);
$stm->bindValue(2, 'A');
$stm->execute();
$retorno = $stm->fetch(PDO::FETCH_OBJ);


// Dica 6 - Válida a senha utlizando a API Password Hash
if(!empty($retorno) && password_verify($senha, $retorno->senha)):
	$_SESSION['id'] = $retorno->id;
	$_SESSION['nome'] = $retorno->nome;
	$_SESSION['email'] = $retorno->email;
	$_SESSION['logado'] = 'SIM';
  	$_SESSION['tipo'] = 'heroi';
else:
	$_SESSION['logado'] = 'NAO';
endif;


// Se logado envia código 1, senão retorna mensagem de erro para o login
if ($_SESSION['logado'] == 'SIM'):
	echo "LOGADO";
	exit();
else:	
	echo "Usuário não autorizado!";
	exit();	
endif;
