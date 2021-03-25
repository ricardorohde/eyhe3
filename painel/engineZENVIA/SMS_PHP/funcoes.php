<?php
//ref sms: https://zenviasms.docs.apiary.io/

function envio_sms_padrao(){
      $ch = curl_init();

      curl_setopt($ch, CURLOPT_URL, "https://api-rest.zenvia.com/services/send-sms");
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
      curl_setopt($ch, CURLOPT_HEADER, FALSE);

      curl_setopt($ch, CURLOPT_POST, TRUE);

      curl_setopt($ch, CURLOPT_POSTFIELDS, "{
        \"sendSmsRequest\": {
          \"from\": \"EYHE\",
          \"to\": \"5546999177534\",
          \"schedule\": \"2014-08-22T14:55:00\",
          \"msg\": \"Heroi Henrique Soares carregou R$100 no Eyhe por boleto\",
          \"callbackOption\": \"NONE\",
          \"id\": \"0054\",
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

      var_dump($response);
}


function envio_whats(){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://api.zenvia.com/v2/channels/whatsapp/messages');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, "{\n  \"from\": \"beautiful-animantarx\",\n  \"to\": \"5546999177534\",\n  \"contents\": [{\n    \"type\": \"text\",\n    \"text\": \"Some text message\"\n  }]\n}");

    $headers = array();
    $headers[] = 'Content-Type: application/json';
    $headers[] = 'X-Api-Token: cRQFETjQcy-1HhAylSQlu6CF8E_PILpIry6g	';
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $result = curl_exec($ch);
    if (curl_errno($ch)) {
        echo 'Error:' . curl_error($ch);
    }
    curl_close($ch);
  }

  envio_whats();

?>
