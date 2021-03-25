<?php


function anjo_respondeu($numero, $nomeanjo, $nomeheroi){

    $curl = curl_init();

    $mensagem = 'SEU ANJO RESPONDEU! '.$nomeanjo.' acabou de responder você. Acesse o Eyhe e retome sua conversa';

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

    //if ($err) echo "cURL Error #:" . $err;
    //else echo $response;

}

function envia_sms_novo_atendimento($numero, $nomeanjo, $nomeheroi){

    $curl = curl_init();

    $mensagem = 'NOVO ATENDIMENTO! '.$nomeheroi.' acabou de iniciar um atendimento com você. Acesse o Eyhe e responda em até 4 minutos. http://bit.ly/area-do-anjo';

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

    //if ($err) echo "cURL Error #:" . $err;
    //else echo $response;

}

function envia_sms_novo_chat($numero, $nomeanjo, $nomeheroi){

    $curl = curl_init();

    $mensagem = 'NOVO CHAT! '.$nomeheroi.' acabou de iniciar um chat com o Anjo '.$nomeanjo;

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

    //if ($err) echo "cURL Error #:" . $err;
    //else echo $response;

}

function envia_sms_novo_agendamento($numero, $nomeanjo, $nomeheroi){

    $curl = curl_init();

    $mensagem = 'NOVO AGENDAMENTO! '.$nomeheroi.' acabou de solicitar um agendamento com o Anjo '.$nomeanjo.', favor verificar o painel.';

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

    //if ($err) echo "cURL Error #:" . $err;
    //else echo $response;

}

function envia_sms_novo_cadastro($numero, $nomeheroi){

    $curl = curl_init();

    $mensagem = 'NOVO CADASTRO! '.$nomeheroi.' acabou de se cadastrar';

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

    //if ($err) echo "cURL Error #:" . $err;
    //else echo $response;

}

function envia_sms_novo_cadastro_fb($numero, $nomeheroi){

    $curl = curl_init();

    $mensagem = 'NOVO CADASTRO! '.$nomeheroi.' acabou de se cadastrar usando o Facebook';

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

    //if ($err) echo "cURL Error #:" . $err;
    //else echo $response;

}

function envia_sms_novo_cadastro_google($numero, $nomeheroi){

    $curl = curl_init();

    $mensagem = 'NOVO CADASTRO! '.$nomeheroi.' acabou de se cadastrar usando o Google';

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

    //if ($err) echo "cURL Error #:" . $err;
    //else echo $response;

}

function envia_sms_novo_anjo_cadastrado($nome){

    $curl = curl_init();

    $mensagem = 'UM NOVO ANJO SE CADASTROU! Nome: '.$nome;

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

    //if ($err) echo "cURL Error #:" . $err;
    //else echo $response;

}

function envia_notificacao_uber($nome, $numero){

    $curl = curl_init();

    $mensagem = 'UM HEROI PRECISA SER ACOLHIDO! '.$nome.' acabou de solicitar atendimento. Acesse o Eyhe [https://eyhe.com.br/areadoanjo/solicitacoes.php] e acolha esse heroi.';

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

    //if ($err) echo "cURL Error #:" . $err;
    //else echo $response;

}

function envia_notificacao_manager_uber($nome, $tipo, $numero){

    $curl = curl_init();

    $mensagem = "[EYHE UBER] ".$nome." acabou de solicitar um ".$tipo;

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

    //if ($err) echo "cURL Error #:" . $err;
    //else echo $response;

}
?>
