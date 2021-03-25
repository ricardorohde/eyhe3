<?php

#Destino das imagens.
$pasta = "../../painel/avatar-anjos";
#Conectando..
include ('conecta.php');

#flag de erro
$erro = 0;

$id = $_POST['idanjo'];
$imagem = $_POST["imagem"];

$novoNome = rand().".jpeg";
$foto = $pasta."/".$novoNome;

//esse nome já existe?
while(is_file($foto)){
  //gera um novo nome;
  $novoNome = rand().".$extensao";
  $foto = $pasta."/".$novoNome;
 }

$rt_64 = file_get_contents($imagem);
file_put_contents($foto, $rt_64);

$foto = substr($foto, 3);

//agora vou atualizar o campo avatar do cliente :)
try{

  $stmt = $conexao->prepare('UPDATE anjos
  SET avatar = :avatar
  WHERE id = :id');
  $stmt->bindParam(':avatar', $foto);
  $stmt->bindParam(':id', $id);
  $executa = $stmt->execute();

  echo 'Foto Atualizada!';

}
catch(PDOException $e){
  echo $e->getMessage();
}



?>
