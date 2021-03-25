<?php

$nome = $_POST['nome'];
$email = $_POST['email'];

$corpo = "<b>Nome:</b> ".$nome."<br/>";
$corpo .= "<b>Email:</b> ".$email."<br/>";

include '../../enviaemail.php';

$assunto = $nome." tem interesse em ser anjo!";

EnviarEmail('contato@eyhe.com.br', $corpo, $assunto, $nome);

echo 'enviado';


?>
