<?php
session_start();

include 'conecta.php';

$email = $_POST['email'];
$senha_digitada = $_POST['senha'];

$qtd = 0;
$query = "SELECT id, nome, email, avatar, senha, telefone FROM anjos WHERE (email = '$email') limit 1";
$consulta = $conexao->query($query);
while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
  $qtd++;
  $senha_banco = $linha['senha'];
  $heroi_id = $linha['id'];
  $heroi_nome = $linha['nome'];
  $heroi_avatar = $linha['avatar'];
  $telefone = $linha['telefone'];
}


if($qtd == 0 ){
  //nao existe cadastro com o e-mail
  echo "Não encontramos nenhum cadastro com esse e-mail.";
	exit();
}else{
  //existe cadastro, vamos verificar a senha?
  if(password_verify($senha_digitada, $senha_banco)){
    $_SESSION['id_anjo'] = $heroi_id;
    $_SESSION['nome_anjo'] = $heroi_nome;
    $_SESSION['email_anjo'] = $email;
    $_SESSION['avatar_anjo'] = $heroi_avatar;
    $_SESSION['logado_anjo'] = 'SIM';
    $_SESSION['tipo'] = 'heroi';
    $_SESSION['telefone_anjo'] = $telefone;
  }else{
    $_SESSION['logado_anjo'] = 'NAO';
  }
}


if ($_SESSION['logado_anjo'] == 'SIM'):
	echo "LOGADO";
	exit();
else:
	echo "Senha incorreta.";
	exit();
endif;
