<?php

#Destino das imagens.
$pasta = "../avatar-herois";
#Conectando..
include ('conecta.php');
include ("log/log.php");

#flag de erro
$erro = 0;

$id = $_POST['id'];
$foto = $_FILES["foto"];

$extensao = @end(explode('.', $foto["name"]));
if($extensao != 'php'){
  $tmp = $foto["tmp_name"];
  $novoNome = rand().".$extensao";
  $foto = $pasta."/".$novoNome;

  //esse nome já existe?
  while(is_file($foto)){
    //gera um novo nome;
    $novoNome = rand().".$extensao";
    $foto = $pasta."/".$novoNome;
  }
  //salvo na pasta
  move_uploaded_file($tmp, $foto);
  $foto = substr($foto, 3);

}else{
  $erro = 1;
  echo "Ocorreu um erro. Tente novamente. coderro:#".$erro."</p>";
  exit();
}

//agora vou atualizar o campo avatar do cliente :)
try{

  $stmt = $conexao->prepare('UPDATE tab_usuario
  SET avatar = :avatar
  WHERE id = :id');
  $stmt->bindParam(':avatar', $foto);
  $stmt->bindParam(':id', $id);
  $executa = $stmt->execute();

  echo 'Atualizado!';

}
catch(PDOException $e){
  GeraLog::getInstance()->inserirLog("Erro: Código: " . $e->getCode() . " Mensagem: " . $e->getMessage());
  echo $e->getMessage();
}



?>
