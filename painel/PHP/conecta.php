<?php

$hostname = 'external-db.s65738.gridserver.com';
$username = 'db65738_gui';
$password = '.68v_eCR_cp';
$database = 'db65738_plataformaeyhe';
 
try {
    $conexao = new PDO("mysql:host=$hostname;dbname=$database", $username, $password,
  array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
      //echo'Conexao efetuada com sucesso!';
    }
catch(PDOException $e)
    {
      echo $e->getMessage();
    }
?>