<?php

function aviso_anjo($numero,$texto){

    $curl = curl_init();

    $mensagem = $texto;

    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://api-messaging.movile.com/v1/send-sms",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => "{\"destination\": \"$numero\" ,  \"messageText\": \"$mensagem\"}",
      CURLOPT_HTTPHEADER => array(
        "authenticationtoken: 3x93_39cyBmMosRDk7UsHUQQ2c-V9DkV812xnyza",
        "username: eyhe",
        "content-type: application/json"
      ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) echo "cURL Error #:" . $err;
    else echo $response;

}


aviso_anjo($_POST['telefone'], $_POST['texto']);



?>
