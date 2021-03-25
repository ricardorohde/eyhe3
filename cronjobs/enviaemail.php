<?php


require_once("PHPMailer/class.phpmailer.php");
require_once("PHPMailer/class.smtp.php");

# Inicia a classe PHPMailer
function EnviarEmail($destino, $mensagem, $assunto, $nome){
  $mail = new PHPMailer();

  # Define os dados do servidor e tipo de conexão
  $mail->IsSMTP(); // Define que a mensagem será SMTP
  $mail->Host = "localhost"; # Endereço do servidor SMTP, na WebHS basta usar localhost caso a conta de email esteja na mesma máquina de onde esta a correr este código, caso contrário altere para o seu desejado ex: mail.nomedoseudominio.pt
  $mail->Port = 587; // Porta TCP para a conexão
  $mail->SMTPAutoTLS = false; // Utiliza TLS Automaticamente se disponível
  $mail->SMTPAuth = true; # Usar autenticação SMTP - Sim
  $mail->Username = 'send@eyhe.com.br'; # Login de e-mail
  $mail->Password = '9{gK[gf{9Rt'; // # Password do e-mail
  # Define o remetente (você)
  $mail->From = "send@eyhe.com.br"; # Seu e-mail
  $mail->FromName = "Plataforma Eyhe :)"; // Seu nome
  # Define os destinatário(s)
  $mail->AddAddress($destino, $nome); # Os campos podem ser substituidos por variáveis

  $mail->IsHTML(true); # Define que o e-mail será enviado como HTML
  $mail->CharSet = "UTF-8";
  # Define a mensagem (Texto e Assunto)
  $mail->Subject = $assunto; # Assunto da mensagem
  $mail->Body = $mensagem;
  $mail->AltBody = "Este é o corpo da mensagem de teste, somente Texto! \r\n :)";

  # Define os anexos (opcional)
  #$mail->AddAttachment("c:/temp/documento.pdf", "documento.pdf"); # Insere um anexo
  # Envia o e-mail
  $enviado = $mail->Send();

  # Limpa os destinatários e os anexos
  $mail->ClearAllRecipients();
  $mail->ClearAttachments();

  # Exibe uma mensagem de resultado (opcional)
  if (!$enviado)
    echo $mail->ErrorInfo;
}
?>
