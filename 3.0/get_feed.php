<?php
//http://blog.eyhe.com.br/wp-json/wp/v2/posts

$json = file_get_contents("http://blog.eyhe.com.br/wp-json/wp/v2/posts");
$data = json_decode($json);

var_dump($data);


?>
