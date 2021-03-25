<?php

date_default_timezone_set('America/Belem');
$datahora_realtime = date('Y-m-d H:i:s');

#conexao com o banco de dados
include 'conecta.php';

#recebendo dados da requisição
$tabela = $_POST['nome_tabela'];
$idheroi = $_POST['idheroi'];
$idanjo = $_POST['idanjo'];


//echo "IDHEROI: ".$idheroi.'- IDANJO: '.$idanjo.'- TABELA: '.$tabela;
#dados para simulação do código

/*
  $tabela = 'talk_3009_21_1658605688';
  $idheroi = '3009';
  $idanjo = '21';
*/


/*
 tipos de retornos

  "obriga-inicio": Criado para evitar o caso do heroi que sai e entra do chat para utilizar mais os 10 mininutos
                   Se o tempo entre o agora e a primeira mensagem do heroi no chat é mais que 15min, é dispado isso.

  "mostrao-botao-mais-mensagens": caso onde é o primeiro atendimento do heroi, ainda nao existe
                                  registros na tabela  de pagamentos entre heroi e anjo, vai disparar
                                  lá no chat as mensagens temporizidas e automaticamente um registro na tabela de pagamentos.

  "mostra-nada": o chat fica livre realmente, de botoes e interferencias relativas ao pagamentos
                 quando o status de pagamento == 'Pagamento confirmado'  &&
                 a diferença entre a datastatus e datahora_realtime menor ou igual a 40.

  de resto, fica definido o "mostra-botao", que abrange todos os outros casos.
                            aqui seria legal retornar o id do pagamento, para nao precisar criar mais registros

         __entradas necessarias para dar o retorno: { __idHeroi, __idAnjo, __ }

  isso tudo só é feito, calculado, averigado, quando existe uma ~conversa ativa~ rolando tá?
  tipo, 1)
          se a diferença entra a ultima mensagem do chat e a datahora_realtime for menos que 30 minutos. (?)
        2)
          se a diferença entre a mensagem do anjo e do heroi for menos que 4 minutos.

         __entradas necessarias para dizer se é ativa ou inativa: { __tabela }
*/

$status = 'inativa';
$datahora_ultima_msg = NULL;
#pegando datahora da ultima mensagem do chat entre esse heroi e anjo
$consulta = $conexao->prepare("SELECT datahora FROM $tabela ORDER BY id DESC limit 1");
$consulta->execute();
while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
  $datahora_ultima_msg = $linha['datahora'];
}


if($datahora_ultima_msg != NULL){
    #calculando diferença com a $datahora_realtime
    $datahora_ultima_msg_ft  = new DateTime($datahora_ultima_msg);
    $diff = $datahora_ultima_msg_ft->diff(new DateTime($datahora_realtime));

    //se a diferença entra a ultima mensagem do chat e a datahora_realtime for menos que 30 minutos.
    if( ($diff->y == 0) &&  ($diff->m == 0) && ($diff->d == 0) && ($diff->h == 0) && ($diff->i <= 30) ){

        //bom, se estamos aqui é porque a ultima mensagem foi enviado a menos de 30 minutos da hora
       // exata que esse código está rodando.

       //agora vamos ver se a diferença entre entre a ultima_msg_heroi e ultima_msg_anjo tem diferença inferior a 2 minutos.
        $remetente = 'h_'.$idheroi;
        $ultima_msg_heroi = NULL;
        $consulta = $conexao->prepare("SELECT datahora FROM $tabela WHERE remetente =:remetente ORDER by id DESC limit 1");
       	$consulta->bindParam(':remetente', $remetente, PDO::PARAM_INT);
       	$consulta->execute();
       	while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
       	  $ultima_msg_heroi = $linha['datahora'];
       	}

        $remetente = 'a_'.$idanjo;
        $ultima_msg_anjo = NULL;
        $consulta = $conexao->prepare("SELECT datahora FROM $tabela WHERE remetente =:remetente ORDER by id DESC limit 1");
       	$consulta->bindParam(':remetente', $remetente, PDO::PARAM_INT);
       	$consulta->execute();
       	while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
       	  $ultima_msg_anjo = $linha['datahora'];
       	}


        if($ultima_msg_anjo != NULL && $ultima_msg_heroi != NULL){
            $ultima_msg_anjo_ft  = new DateTime($ultima_msg_anjo);
            $diff = $ultima_msg_anjo_ft->diff(new DateTime($ultima_msg_heroi));

            if( ($ultima_msg_heroi != NULL) && ($ultima_msg_anjo != NULL)  ){
              if( ($diff->y == 0) &&  ($diff->m == 0) && ($diff->d == 0) && ($diff->h == 0) && ($diff->i <= 4) ){
                $status = 'ativa';
              }
            }
        }

    }
}


if($status == 'ativa'){
  $status_pagamento = null;
  $consulta = $conexao->prepare("SELECT id, status, datastatus FROM pagamentos WHERE idanjo =:idanjo AND idheroi =:idheroi AND tabela =:tabela ORDER by id DESC limit 1");
  $consulta->bindParam(':idanjo', $idanjo, PDO::PARAM_INT);
  $consulta->bindParam(':idheroi', $idheroi, PDO::PARAM_INT);
  $consulta->bindParam(':tabela', $tabela, PDO::PARAM_STR);
  $consulta->execute();
  while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
    $id_pagamento = $linha['id'];
    $status_pagamento = $linha['status'];
    $datahora_ultima_atualizacao_status = $linha['datastatus'];
  }

  if($status_pagamento == null){
    $retorno = 'mostrao-botao-mais-mensagens';

    //vou verificar se o tempo entre primeira mensagem do heroi e o horario de agora é maior que 9min
    //se for, vou obrigar a ser mostrado o pagamento.
    $remetente = 'h_'.$idheroi;
    $consulta = $conexao->prepare("SELECT datahora FROM $tabela WHERE remetente =:remetente ORDER by id ASC limit 1");
    $consulta->bindParam(':remetente', $remetente, PDO::PARAM_INT);
    $consulta->execute();
    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
      $primeira_msg_heroi = $linha['datahora'];
    }

    #calculando diferença com a $datahora_realtime
    $primeira_msg_heroi_ft  = new DateTime($primeira_msg_heroi);
    $diff = $primeira_msg_heroi_ft->diff(new DateTime($datahora_realtime));

    if( ($diff->y == 0) &&  ($diff->m == 0) && ($diff->d == 0) && ($diff->h == 0) && ($diff->i <= 9) ) {
      //antes de realmente dar esses 10min grátis, será que esse heroi ja usou os 10min com esse anjo ?
      //se sim, vou obrigar aparecer o pagamento
      $consulta = $conexao->prepare("SELECT id, status, datastatus FROM pagamentos WHERE idanjo =:idanjo AND idheroi =:idheroi ORDER by id DESC limit 1");
      $consulta->bindParam(':idanjo', $idanjo, PDO::PARAM_INT);
      $consulta->bindParam(':idheroi', $idheroi, PDO::PARAM_INT);
      $consulta->execute();
      $cont = 0;
      while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
        $cont++;
      }
      if($cont > 0){
        $retorno = 'obriga-inicio';
      }
    }else{
      $retorno = 'obriga-inicio';
    }

  }
  else{
    if($status_pagamento == 'Pagamento confirmado'){
      /*"mostra-nada": o chat fica livre realmente, de botoes e interferencias relativas ao pagamentos
                     quando o status de pagamento == 'Pagamento confirmado'  &&
                     a diferença entre a datastatus e datahora_realtime menor ou igual a 40. */

       $datahora_ultima_atualizacao_status_ft  = new DateTime($datahora_ultima_atualizacao_status);
       $diff = $datahora_ultima_atualizacao_status_ft->diff(new DateTime($datahora_realtime));

       if( ($diff->y == 0) &&  ($diff->m == 0) && ($diff->d == 0) && ($diff->h == 0) && ($diff->i <= 40) ) {
         $retorno = 'atendimento-pago-rolando';
       }else{
         $retorno = 'mostra-re-atendimento';
       }

    }else{
      $retorno = 'mostra-botao-'.$id_pagamento;
    }
  }

}else{
  $retorno = 'mostra-nada';
}




echo $retorno;

?>
