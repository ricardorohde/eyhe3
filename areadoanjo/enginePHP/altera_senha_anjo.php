<?php

include ("conecta.php");

$id = $_POST['id'];
$senha_atual = $_POST['senha_antiga'];
$nova_senha = $_POST['senha_nova'];

//antes de tudo!, o usuario colocou a senha certa ?!
//vamos pegar a senha do banco
try {
    $consulta = $conexao->prepare('SELECT senha FROM anjos WHERE id = :id LIMIT 1');
    $consulta->bindParam(':id', $id, PDO::PARAM_INT);
    $consulta->execute();

    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
      $senha_banco = $linha['senha'];

    }
} catch(PDOException $e) {
      echo $e->getMessage();//Remove or change message in production code
}

//elas são iguais ?
if(password_verify($senha_atual, $senha_banco)){
  $senha_crip = password_hash($nova_senha, PASSWORD_DEFAULT);
  try{

    $stmt = $conexao->prepare('UPDATE anjos
    SET senha = :senha
    WHERE id = :id');
    $stmt->bindParam(':senha', $senha_crip);
    $stmt->bindParam(':id', $id);
    $executa = $stmt->execute();

    echo 'Senha atualizada!';

  }
  catch(PDOException $e){
    GeraLog::getInstance()->inserirLog("Erro: Código: " . $e->getCode() . " Mensagem: " . $e->getMessage());
    echo $e->getMessage();
  }
}else{
  echo "Senha atual está incorreta :/";
}


?>
