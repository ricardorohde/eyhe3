<?php


/*curl "https://api.zenvia.com/v2/channels/whatsapp/messages" \
-H "Content-Type: application/json" \
-H "X-API-TOKEN: H6-DfnQg62Lw-SEZPAxnven5TzcWbvtA-XAj" \
-d '{
  "from": "554591197570",
  "to": "554699177534",
  "contents": [{
    "type": "template",
    "templateId": "d5d52ed1-1c84-4fd9-8989-0c601d2578a7"
  }]
}'*/

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://api.zenvia.com/v2/channels/whatsapp/messages');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "{\n  \"from\": \"554591197570\",\n  \"to\": \"554699177534\",\n  \"contents\": [{\n    \"type\": \"template\",\n    \"templateId\": \"d5d52ed1-1c84-4fd9-8989-0c601d2578a7\"\n  }]\n}");

$headers = array();
$headers[] = 'Content-Type: application/json';
$headers[] = 'X-Api-Token: H6-DfnQg62Lw-SEZPAxnven5TzcWbvtA-XAj';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);

if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close($ch);

print_r($result);


 ?>
