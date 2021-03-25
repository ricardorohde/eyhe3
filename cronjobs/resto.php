<?php
if(substr($linha2['remetente'],0,1) == 'h'){
  //significa que o heroi mandou e o anjo não recebeu
  //DISPARA PUSH PARA ANJO

  //vou pegar algumas informações sobre o heroi para disparar a push!
  $consultaheroi = $conexao->prepare('SELECT nome FROM tab_usuario WHERE id = :idheroi LIMIT 1');
  $consultaheroi->bindParam(':idheroi', $idheroi, PDO::PARAM_INT);
  while ($linhaheroi = $consultaheroi->fetch(PDO::FETCH_ASSOC)) {
    $nomeheroi = $linhaheroi['nome'];
  }

  //pausa para pegar id de push para enviar notificação pelo Onesignal
  $pushdesktop = '';
  $pushmobile = '';
  $consultapush = $conexao->query("SELECT idpushdesktop, idpushmobile FROM pushnotificationsanjo WHERE idanjo = $idanjo limit 1");
  while ($linha = $consultapush->fetch(PDO::FETCH_ASSOC)) {
    $pushdesktop = $linha['idpushdesktop'];
    $pushmobile = $linha['idpushmobile'];
  }
  if( ($pushdesktop != '') || ($pushmobile != '') ){
    //vamos enviar push
    include '../OneSignal/envia_push_por_id.php';
    if($pushdesktop != ''){
      $txt = $nomeheroi.' acabou de iniciar um chat com você!';
      sendMessage("$pushdesktop", $txt);
      echo '--- notificação desktop enviada para anjo: '.$idnajo.'---';
    }
    if($pushmobile != ''){
      $txt = $nomeheroi.' acabou de iniciar um chat com você!';
      sendMessage("$pushmobile", $txt);
      echo '---- notificação mobile enviada para anjo: '.$idnajo.'---';
    }
  }

}else{
  //significa que o anjo mandou e o heroi não recebeu
  //DISPARA PUSH PARA HEROI

}

?>
