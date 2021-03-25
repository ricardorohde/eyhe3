<?php

$telefone = $_POST['telefone'];
$nome_heroi = $_POST['nome_heroi'];

//$telefone = '554699177534';
//$nome_heroi = 'Alceu Valença';

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://api.zenvia.com/v2/channels/whatsapp/messages');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "{\n  \"from\": \"554591197570\",\n  \"to\": \"$telefone\",\n  \"contents\": [{\n    \"type\": \"template\",\n    \"templateId\": \"8d36173d-63f9-46ca-9241-c230f76eb0e8\",\n    \"fields\":{\n     \"nome_heroi\":\"$nome_heroi\"\n  }\n  }]\n}");

$headers = array();
$headers[] = 'Content-Type: application/json';
$headers[] = 'X-Api-Token: H6-DfnQg62Lw-SEZPAxnven5TzcWbvtA-XAj';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}else{
  print_r($result);
}
curl_close($ch);


?>
