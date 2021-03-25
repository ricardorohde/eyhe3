<?php

//primeiro setar o fuso horario igual dos scripts do engine e pegar a data e hora e dia exato que esse cronjob está rodando!
date_default_timezone_set('America/Sao_Paulo');
$datacron = date('Y-m-d H:i');
$datacron = '2019-02-21 09:12';


//vou varrer a tabela conversa e selecionar os registros que tiverem 'ultima_msg' == $datacron
//Conectando ao banco de dados
include "../painel/engine/conecta.php";

$consulta = $conexao->prepare('SELECT tabela,idheroi,idanjo FROM conversas WHERE LEFT(ultimamsg,16) = :datacron ');
$consulta->bindParam(':datacron', $datacron, PDO::PARAM_INT);
$consulta->execute();

while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
    echo $linha['tabela'].'<br/>';
    $tabela = $linha['tabela'];
    $idheroi = $linha['idheroi'];
    $idanjo = $linha['idanjo'];


    //aqui vai estar todas as tabelas de conversa que possuem ultimamsg = datacron (ignorando os segundos!)
    //vamos entrar em cada tabela dessa e verificar se existe alguma confirmacao de leitura == null
    $query = "SELECT remetente FROM " .$tabela. " WHERE leitura IS NULL";

    $consulta2 = $conexao->prepare($query);
    $consulta2->execute();
    while ($linha2 = $consulta2->fetch(PDO::FETCH_ASSOC)) {
      echo substr($linha2['remetente'],0,1).'<br/>';
      if(substr($linha2['remetente'],0,1) == 'h'){
        //significa que o heroi mandou e o anjo não recebeu
        //DISPARA PUSH PARA ANJO

        //vou pegar algumas informações sobre o heroi para disparar a push!
        echo $idheroi.'<br/>';
        $consultaheroi = $conexao->prepare('SELECT nome FROM tab_usuario WHERE id = :idheroi LIMIT 1');
        $consultaheroi->bindParam(':idheroi', $idheroi, PDO::PARAM_INT);
        while ($linhaheroi = $consultaheroi->fetch(PDO::FETCH_ASSOC)) {
          $nomeheroi = $linhaheroi['nome'];
        }
        echo $nomeheroi;


        //pausa para pegar id de push para enviar notificação pelo Onesignal
        $pushdesktop = '';
        $pushmobile = '';
        $consultapush = $conexao->query("SELECT idpushdesktop, idpushmobile FROM pushnotificationsanjo WHERE idanjo = $idanjo limit 1");
        while ($linha = $consultapush->fetch(PDO::FETCH_ASSOC)) {
          $pushdesktop = $linha['idpushdesktop'];
          $pushmobile = $linha['idpushmobile'];
        }
        /*if( ($pushdesktop != '') || ($pushmobile != '') ){
          //vamos enviar push
          include '../OneSignal/envia_push_por_id.php';
          if($pushdesktop != ''){
            $txt = $nomeheroi.' acabou de iniciar um chat com você!';
            sendMessage("$pushdesktop", $txt);
            echo '--- notificação desktop enviada para anjo: '.$idanjo.'---';
          }
          if($pushmobile != ''){
            $txt = $nomeheroi.' acabou de iniciar um chat com você!';
            sendMessage("$pushmobile", $txt);
            echo '---- notificação mobile enviada para anjo: '.$idanjo.'---';
          }
        }*/

      }else{
        //significa que o anjo mandou e o heroi não recebeu
        //DISPARA PUSH PARA HEROI

      }

    }
}

?>
