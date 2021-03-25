<?php
 /*
  autor: guilherme menegussi
  data: 04/04/2019 16:42

  objetivo: gerar json com listagem de anjos e quantidade de chats, matchs e não atendimentos de cada um
  objetivo 2: gerar tbm tempo de cada um online e tempo médio de resposta!

 */

 include ('conecta.php');
 $consulta = $conexao->query("SELECT * FROM anjos ORDER BY nome ASC");

  while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
    $nomeanjo = $linha['nome'];
    $idanjo = $linha['id'];
    $qtdnaoatendido = 0;
    $qtdchat = 0;
    $qtdmatch = 0;

    //tendo o id do anjos, vamos para analise na pagina de conversas..
    $consultaconversas = $conexao->query("SELECT tabela FROM conversas WHERE idanjo = $idanjo");
    while ($linha2 = $consultaconversas->fetch(PDO::FETCH_ASSOC)) {
        $tabela = $linha2['tabela'];

        $del = $conexao->prepare('SELECT * FROM '.$tabela.'');
        $del->execute();
        $quantidade = $del->rowCount();



        if($quantidade > 4) {

          $qtd_msg_anjo = 0;
          $qtd_msg_heroi = 0;

          // se existe mais que 4 mensagens na tabela e o anjo só enviou 4 -> ta rolando FALTA DE ATENDIMENTO !
          $consulta4 = $conexao->query('SELECT remetente FROM '.$tabela.'');
          while ($linha4 = $consulta4->fetch(PDO::FETCH_ASSOC)) {
            if(substr($linha4['remetente'],0,1) == 'a'){
               $qtd_msg_anjo++;
            }
          }

          if($qtd_msg_anjo == 4){
              $qtdnaoatendido++;
          }else{
            $qtdchat++;
          }
        }else{
          $qtdmatch++;
        }

    }

    echo $nomeanjo.' possui: '. $qtdchat .' chats, '.$qtdmatch . ' matchs, '.$qtdnaoatendido. ' nao atendidads<br/>';

  }


 ?>
