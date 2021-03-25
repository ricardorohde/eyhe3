<?php
$email = $_POST['email'];

include 'conecta.php';

$contador = 0;
$consulta = $conexao->query("SELECT email, telefone FROM anjos WHERE email = '$email' ");
while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
  $contador++;
  $telefone = $linha['telefone'];
}

if($contador == 0){

   echo 'Email inexistente :(';

}else{

  //email existe!
  //vou gerar o codigo de 5 caracteres

  $upper = implode('', range('A', 'Z')); // ABCDEFGHIJKLMNOPQRSTUVWXYZ
  $lower = implode('', range('a', 'z')); // abcdefghijklmnopqrstuvwxyzy
  $nums = implode('', range(0, 9)); // 0123456789

  $alphaNumeric = $upper.$lower.$nums; // ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789
  $string = '';
  $len = 7; // numero de chars
  for($i = 0; $i < $len; $i++) {
      $string .= $alphaNumeric[rand(0, strlen($alphaNumeric) - 1)];
  }
  //echo $string; // ex: q02TAq3

  //adiciono essa requisição na tabela requisicoes-recuperacao-senha, com o email do usuario e o codigo do lado
  #inserindo no banco
  try{
     $stmte2 = $conexao->prepare("INSERT INTO requisicoes_senha (email, eyhecode) VALUES (?,?)");
     $stmte2->bindParam(1, $email , PDO::PARAM_STR);
     $stmte2->bindParam(2, $string , PDO::PARAM_STR);
     $executa2 = $stmte2->execute();

   }catch(PDOException $e){
      echo $e->getMessage();
   }


   //vou enviar um sms com o Código
   $texto = 'Código de recuperação de senha: '.$string;
   $id = rand(1, 100000000);
   $ch = curl_init();

   curl_setopt($ch, CURLOPT_URL, "https://api-rest.zenvia.com/services/send-sms");
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
   curl_setopt($ch, CURLOPT_HEADER, FALSE);

   curl_setopt($ch, CURLOPT_POST, TRUE);

   curl_setopt($ch, CURLOPT_POSTFIELDS, "{
     \"sendSmsRequest\": {
       \"from\": \"EYHE\",
       \"to\": \"$telefone\",
       \"schedule\": \"2014-08-22T14:55:00\",
       \"msg\": \"$texto\",
       \"callbackOption\": \"NONE\",
       \"id\": \"$id\",
       \"aggregateId\": \"1111\",
       \"flashSms\": false
     }
   }");

   curl_setopt($ch, CURLOPT_HTTPHEADER, array(
     "Content-Type: application/json",
     "Authorization: Basic ZXloZS5zbXM6dkpZYjd3ZGhCUg==",
     "Accept: application/json"
   ));

   $response = curl_exec($ch);
   curl_close($ch);


    echo 'Código enviado!';



}

?>
