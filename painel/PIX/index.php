<?php

$config = [
  "certificado" => "certificado-pix.pem",
  "client_id" => "Client_Id_f36e771d1b4097e77d08ce8d728dfa49bb2f5fd3",
  "client_secret" => "Client_Secret_b820a1335cd899f1c1ff7fbe3ee6ab26d031c0d8"
];
$autorizacao =  base64_encode($config["client_id"] . ":" . $config["client_secret"]);

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api-pix.gerencianet.com.br/oauth/token", // Rota base, homologação ou produção
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => '{"grant_type": "client_credentials"}',
    CURLOPT_SSLCERT => $config["certificado"], // Caminho do certificado
    CURLOPT_SSLCERTPASSWD => "",
    CURLOPT_HTTPHEADER => array(
        "Authorization: Basic $autorizacao",
        "Content-Type: application/json"
    ),
));

$response = curl_exec($curl);

curl_close($curl);

echo "<pre>";
echo $response;
echo "</pre>";