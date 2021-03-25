<?php

$telefone = $_POST['telefone'];
$texto = $_POST['texto'];

//$telefone = '554699177534';
//$texto = 'Olá, isso é um teste send_sms do Zenvia+Eyhe3.0';

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

print_r($response);
?>
