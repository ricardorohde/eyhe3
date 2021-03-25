<?php
header('Content-Type: text/plain; charset=utf-8;');
$url = 'http://www.linhadecodigo.com.br/';
$file = file_get_contents('http://4et.us/api.php?url='.$url.'&custom=etus');
print_r(json_decode($file));



 ?>
