<?php

$url = 'https://platform-lookaside.fbsbx.com/platform/profilepic/?asid=10216584560781801&height=200&width=200&ext=1589661481&hash=AeQBAewVP5zHjnTk';

$ch = curl_init($url);

$fp = fopen('../avatar-herois/teste-avatar.jpg', 'wb');

curl_setopt($ch, CURLOPT_FILE, $fp);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_exec($ch);
curl_close($ch);
fclose($fp);

?>
