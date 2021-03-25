<?php

ini_set("allow_url_fopen", 1);

$hostname = 'external-db.s65738.gridserver.com';
$username = 'db65738_gui';
$password = '.68v_eCR_cp';
$database = 'db65738_plataformaeyhe';

try {
$conexao = new PDO("mysql:host=$hostname;dbname=$database", $username, $password,
array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //echo'Conexao efetuada com sucesso!';
}
catch(PDOException $e)
{
  echo $e->getMessage();
}

date_default_timezone_set('America/Sao_Paulo');
$data_agora = date('Y-m-d H:i:s');
$data_agora = new DateTime($data_agora);

$consulta = $conexao->prepare("SELECT * FROM conversas WHERE status = 'Em espera' ORDER BY id DESC");
$consulta->execute();

while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
  $datainicio = new DateTime($linha['datainicio']);
  $diff = $data_agora->diff($datainicio);
  $idanjo = $linha['idanjo'];
  $idheroi = $linha['idheroi'];
  $idconversa = $linha['id'];

  if($diff->i >= 5){
    $status = 'Perdida';
    $stmt = $conexao->prepare("UPDATE conversas
    SET status = :status WHERE (id = :id) ");
    $stmt->bindParam(':status', $status);
    $stmt->bindParam(':id', $idconversa);
    $executa = $stmt->execute();

    echo 'Conversa '.$idconversa.' teve seu status atualizado para PERDIDA <br/>';

    //pegando telefone do anjo
    $consulta2 = $conexao->prepare("SELECT telefone FROM anjos WHERE (id = $idanjo) limit 1");
    $consulta2->execute();
    while ($linha2 = $consulta2->fetch(PDO::FETCH_ASSOC)) {
      $telefone_anjo = $linha2['telefone'];
      $telefone_anjo = str_replace("+", "", $telefone_anjo);
    }

    //pegando nome heroi
    $consulta3 = $conexao->prepare("SELECT nome FROM tab_usuario WHERE (id = $idheroi) limit 1");
    $consulta3->execute();
    while ($linha3 = $consulta3->fetch(PDO::FETCH_ASSOC)) {
      $nome_heroi = $linha3['nome'];
    }

    //enviando notificacoes para heroi
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.zenvia.com/v2/channels/whatsapp/messages');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "{\n  \"from\": \"554591197570\",\n  \"to\": \"$telefone_anjo\",\n  \"contents\": [{\n    \"type\": \"template\",\n    \"templateId\": \"8e793cd3-d927-4036-8ee7-693e472000a6\",\n    \"fields\":{\n     \"nome_heroi\":\"$nome_heroi\"\n }\n  }]\n}");

        $headers = array();
        $headers[] = 'Content-Type: application/json';
        $headers[] = 'X-Api-Token: H6-DfnQg62Lw-SEZPAxnven5TzcWbvtA-XAj';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }else{
          print_r($result);
        }
        curl_close($ch);
    //fim da notificação

  }
}







?>
