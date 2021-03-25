<?php
$email = $_POST['email'];
$senha = $_POST['novasenha'];

include 'conecta.php';

#criptografia da senha
$senha_crip = password_hash($senha, PASSWORD_DEFAULT);

try{

  $stmt = $conexao->prepare("UPDATE tab_usuario
  SET senha = :senha
  WHERE email = :email ");
  $stmt->bindParam(':senha', $senha_crip);
  $stmt->bindParam(':email', $email);
  $executa = $stmt->execute();

  if($executa){
    echo "Senha atualizada com sucesso!";
  }else{
    echo "Erro!";
  }

}
catch(PDOException $e){
  echo $e->getMessage();
}

 ?>
