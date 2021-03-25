<?php

$telefone_heroi = '554699177534';
$url_chat = 'https://eyhe.com.br/areadoanjo/chat.php?myid=21&idother=1431&room=2_MX40NjIxMTM2Mn5-MTYxNDEzMTEwOTA3NX5JUkw3OGx4UUkzemFzQ1o3OEZRMzNpM2N-fg&where=talk_1431_21_1896810236';
$nome_anjo = "Leandro Manfroi";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.zenvia.com/v2/channels/whatsapp/messages');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "{\n  \"from\": \"554591197570\",\n  \"to\": \"$telefone_heroi\",\n  \"contents\": [{\n    \"type\": \"template\",\n    \"templateId\": \"516ae9a5-b7fd-4bb0-b1e9-4d2697a15f89\",\n    \"fields\":{\n     \"nome_anjo\":\"$nome_anjo\"\n, \"url_chat\":\"$url_chat\"\n  }\n  }]\n}");

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
