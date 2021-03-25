<?php
function sendpush($id, $msg, $url){
  $content = array(
    "en" => $msg
    );


  $fields = array(
    'app_id' => "baf829cb-4211-4edf-a29d-40a2c6a3c8cd",
    'include_player_ids' => array($id),
    'data' => array("foo" => "bar"),
    'url' => $url,
    'contents' => $content
  );

  $fields = json_encode($fields);
    //print("\nJSON sent:\n");
    //print($fields);

  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
  curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8'));
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
  curl_setopt($ch, CURLOPT_HEADER, FALSE);
  curl_setopt($ch, CURLOPT_POST, TRUE);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

  $response = curl_exec($ch);
  curl_close($ch);

  //return $response;
}

?>
