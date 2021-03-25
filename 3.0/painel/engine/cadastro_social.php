<?php
#Conectando..
include('conecta.php');
include('funcoes-sms.php');

#flag de erro
$erro = 0;

#configuração de data
date_default_timezone_set('America/Sao_Paulo');
$datacadastro = date('Y-m-d H:i:s');

/*dados vindo do formulario de cadastro */
$nome = $_POST['nome_completo'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$senha_crip = password_hash($senha, PASSWORD_DEFAULT);
$status = 'A';
$online = 0;
$telefone = $_POST['telefone'];
$facebook_id = $_POST['facebook_id'];
$google_id = $_POST['google_id'];


/* ----- PARADA PARA CONFERIR E-MAIL DUPLICADO ------ */
$contador = 0;
$consulta = $conexao->query("SELECT * FROM tab_usuario WHERE email = '$email' ");
while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
  $contador++;
}

if($contador != 0){
  echo "Esse e-mail já está em uso :(";
  exit;
  $erro++;
}
/* ----- FIM DA PARADA  ------ */


/* tratamento da vinda ou não do avatar */
if(empty($_POST['avatar'])){
  $avatar = 'avatar-herois/avatar.jpg';
}else{
  $avatar = $_POST['avatar'];
  //precisamos salvar a imagem no banco e retornar um link para salvar no banco
  $url = $avatar;
  $ch = curl_init($url);
  $link = '../avatar-herois/'.rand().'.jpg';
  while(is_file($link)){
    //gera um novo nome;
    $link = '../avatar-herois/'.rand().'.jpg';
  }
  $fp = fopen($link, 'wb');
  curl_setopt($ch, CURLOPT_FILE, $fp);
  curl_setopt($ch, CURLOPT_HEADER, 0);
  curl_exec($ch);
  curl_close($ch);
  fclose($fp);

  $avatar = substr($link, 3);
}

#inserindo no banco
try{
    $stmte2 = $conexao->prepare("INSERT INTO tab_usuario (nome, email, senha, status, avatar, online, datacadastro, telefone, facebookid, googleid) VALUES (?,?,?,?,?,?,?,?,?,?)");
    $stmte2->bindParam(1, $nome , PDO::PARAM_STR);
    $stmte2->bindParam(2, $email , PDO::PARAM_STR);
    $stmte2->bindParam(3, $senha_crip , PDO::PARAM_STR);
    $stmte2->bindParam(4, $status , PDO::PARAM_STR);
    $stmte2->bindParam(5, $avatar , PDO::PARAM_STR);
    $stmte2->bindParam(6, $online , PDO::PARAM_STR);
    $stmte2->bindParam(7, $datacadastro , PDO::PARAM_STR);
    $stmte2->bindParam(8, $telefone , PDO::PARAM_STR);
    $stmte2->bindParam(9, $facebook_id , PDO::PARAM_STR);
    $stmte2->bindParam(10, $google_id , PDO::PARAM_STR);
    $executa2 = $stmte2->execute();

if(!$executa2)
    $erro++;
}
catch(PDOException $e){
    echo $e->getMessage();
}

/* -------- RESUMO DO SCRIPT ---*/
if($erro == 0){
    //envia sms para o Guilherme
    if( empty($facebook_id) && empty($google_id) ){
      envia_sms_novo_cadastro('554699177534', $nome);
    }

    if(!empty($facebook_id)){
      envia_sms_novo_cadastro_fb('554699177534', $nome);
    }

    if(!empty($google_id)){
      envia_sms_novo_cadastro_google('554699177534', $nome);
    }

    //envia e-mail de confirmação!
    include '../../enviaemail.php';
    $msg =  file_get_contents("../../html_confirmacao_cadastro.html");
    EnviarEmail($email, $msg, 'Seja bem-vindo ao Eyhe !', $nome);

    echo "Cadastro realizado com sucesso!";
}else{
  echo "Ocorreu um erro. Tente novamente. coderro:#".$erro."</p>";
}





?>
