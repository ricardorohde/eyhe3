<?php
session_start();

include 'conecta.php';

$email = $_POST['email'];
$senha_digitada = $_POST['senha'];

$qtd = 0;
$query = "SELECT id, nome, email, avatar, senha, telefone FROM tab_usuario WHERE (email = '$email') limit 1";
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
    $_SESSION['id_heroi'] = $heroi_id;
    $_SESSION['nome_heroi'] = $heroi_nome;
    $_SESSION['email_heroi'] = $email;
    $_SESSION['avatar_heroi'] = $heroi_avatar;
    $_SESSION['logado_heroi'] = 'SIM';
    $_SESSION['tipo'] = 'heroi';
    $_SESSION['telefone_heroi'] = $telefone;
  }else{
    $_SESSION['logado_heroi'] = 'NAO';
  }
}


if ($_SESSION['logado_heroi'] == 'SIM'):
	echo "LOGADO";
	exit();
else:
	echo "Senha incorreta.";
	exit();
endif;
