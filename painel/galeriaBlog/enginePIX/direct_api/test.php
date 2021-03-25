<?php
//Desenvolvido pela Consultoria Técnica da Gerencianet
//https://dev.gerencianet.com.br/docs

$config = [
  "certificado" => "https://www.eyhe.com.br/3.0/painel/enginePIX/direct_api/certificado.pem",
  "client_id" => "Client_Id_bb6a635f34783f8fdd2bff64e0f3dafe01994fe7",
  "client_secret" => "Client_Secret_c05fdcd8f209c248c93002c6a974f093a83fad7a﻿"
];
$autorizacao =  base64_encode($config["client_id"] . ":" . $config["client_secret"]);

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api-pix-h.gerencianet.com.br/oauth/token", // Rota base, desenvolvimento ou produção
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

print_r($response);

?>
