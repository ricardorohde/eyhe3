<?php

$myID = $_GET['myid'];
$myID = "h_".$myID;
$idother = $_GET['idanjo'];
$idanjo = "a_".$idother;
$sessao = $_GET['room'];
$tabela =  $_GET['where'];

#pausa para gerar novo token para essa sessão!
include ('tokbox_server/gera_token.php');

#pegando algumas informações do anjo!
include ('painel/engine/conecta.php');
$consulta = $conexao->prepare("SELECT * FROM anjos WHERE id = :idother LIMIT 1");
$consulta->bindParam(':idother', $idother, PDO::PARAM_INT);
$consulta->execute();
while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
  $nomeanjo = $linha['nome'];
  $avataranjo = $linha['avatar'];
  $biografia = $linha['biografia'];
  $telefone = $linha['telefone'];
  $vistoporultimo = $linha['ultimologin'];
  $premium = $linha['premium'];
  $valor = $linha['valor'];
  $desafio1 = $linha['desafio1'];
  $desafio2 = $linha['desafio2'];
  $desafio3 = $linha['desafio3'];
  $status = $linha['online'];
}

$consulta = $conexao->prepare("SELECT nome, avatar FROM tab_usuario WHERE id = :idheroi LIMIT 1");
$consulta->bindParam(':idheroi', $_GET['myid'], PDO::PARAM_INT);
$consulta->execute();
while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
  $avatarheroi = $linha['avatar'];
}

?>

<?php include "assets/includes/header-heroi.php"; ?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Conversando com <?php echo $nomeanjo; ?> | Eyhe - Conversas acolhedoras em minutos</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />

        <?php include "assets/includes/cssgeral.php"; ?>

        <link rel="stylesheet" href="assets/css/guia_style.css" />
        <link rel="stylesheet" href="assets/css/footer.css" />
        <link rel="stylesheet" href="assets/css/chat.css" />
        <link rel="stylesheet" href="assets/css/vertical-sidebar.css"/>

        <!-- CHAT BY TOKBOX  -->
        <script src='assets/js/opentok.min.js'></script>
        <script src="https://cdn.jsdelivr.net/npm/promise-polyfill@7/dist/polyfill.min.js" charset="utf-8"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fetch/2.0.3/fetch.min.js" charset="utf-8"></script>

        <style>
          .right{
            background-color: #2F90FF !important;
            color: #FFF;
          }
          .chat-conversation .conversation-list {
            max-width: 90%;
            margin-left: 10%;
          }
        </style>

    </head>

<div class="main-content">


    <div class="page-content">
        <div class="container-fluid chat">


        <div class="card perfil" id="cardPerfil">
            <div id="close"><i class="fas fa-times"></i></div>
            <picture class="d-flex justify-content-center">
                <source type="image/jpg" src="painel/<?php echo $avataranjo; ?>" />
                <img src="painel/<?php echo $avataranjo; ?>" />
            </picture>
            <div class="text">
                <p class="h2"><?php echo $nomeanjo; ?></p>
                <p>
                    De Fato não podemos controlar as ações das pessoas a nossa volta! Nem se quer cobrarmos algo que deve ser entregue voluntarimente. Em um relacionamento de 07 anos, lutei contra a dependencia quimica da pessoa que escolhi para caminhar!
                </p>
            </div>
            <div class="avaliar d-flex align-items-center justify-content-center">
                <p>(11 avaliações)</p>
                <picture>
                    <source type="image/png" src="assets/images/star.png" />
                    <img src="assets/images/star.png" />
                </picture>
            </div>
            <p class="help">Esse Anjo ja ajudou 42 pessoas</p>
            <div class="theme">
                <p><strong>Este Anjo conversa sobre:</strong></p>
                <div class="theme_one d-flex justify-content-center">
                    <p class="p1">Ansiedade</p>
                    <p>Autoconhecimento</p>
                </div>
                <div class="theme_one d-flex justify-content-center">
                    <p class="p1">Relacionamentos</p>
                    <p>Meditação</p>
                </div>
            </div>
            <a href="#" class="btn btn-blue">Button</a>
        </div>
        <div id="cardMain" class="card main">
            <div id="cardCartao" class="card cartao">
            <div id="close1"><i class="fas fa-times"></i></div>
                <div class="saldo">
                    <p><strong>Saldo</strong></p>
                    <p>R$50,00</p>
                </div>
                <div class="button">
                    <a href="" class="btn btn-blue">Recarregar Saldo</a>
                    <a href="" class="btn btn-blue">Pagar com Saldo</a>
                    <a href="" class="btn btn-blue">Pagar com PIX</a>
                    <a id="pagCred" class="btn btn-blue">Pagar com Cartão de Crédito</a>
                </div>
            </div>
            <div id="cardPag" class="card pag">
            <div id="close2"><i class="fas fa-times"></i></div>
                <form method="POST" action="#">
                    <label>Valor a Pagar:</label>
                    <input type="text" id="money" />
                    <input type="tel" name="number-card" placeholder="Número do Cartão" />
                    <div class="input">
                        <input type="tel" name="validity" placeholder="MM/WW" />
                        <input type="tel" name="CVV" placeholder="CVV" />
                    </div>
                    <input type="text" name="nome" placeholder="Nome do Titular" />
                    <input type="tel" name="cpf" placeholder="CPF do Titular" />
                </form>
                <picture>
                    <source type="image/webp" src="assets/images/band_card.png" />
                    <source type="image/png" src="assets/images/band_card.png" />
                    <img src="assets/images/band_card.png" />
                </picture>
                <a class="btn btn-blue">Confirmar Pagamento</a>
            </div>
        </div>


            <div id="cardChat" class="card chat">
                <div class="p-4 border-bottom ">
                    <div class="row">
                        <div class="col-md-4 col-9">
                            <picture>
                                <source type="image/webp" src="painel/<?php echo $avataranjo; ?>" />
                                <img src="painel/<?php echo $avataranjo; ?>" />
                            </picture>
                            <div class="txt">
                                <h5 class="font-size-15 mb-1"><?php echo $nomeanjo; ?></h5>
                                <p class="text-muted mb-0">Online</p>
                            </div>
                        </div>
                        <div class="col-md-8 col-3">
                            <ul class="list-inline user-chat-nav text-right mb-0">
                                <li class="list-inline-item d-sm-inline-block">
                                    <i class="fas fa-video"></i>
                                </li>
                                <a href="#" class="btn dropdown-toggle" id="dropdownMenuLinkChat" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <li class="list-inline-item">
                                        <i class="bx bx-plus-medical"></i>
                                    </li>
                                </a>
                                <div class="dropdown-menu" id="chatdrop" aria-labelledby="dropdownMenuLinkChat">
                                    <a id="verPerfil" class="dropdown-item" href="#">
                                        <picture>
                                            <source type="image/webp" src="assets/images/user.webp" />
                                            <source type="image/png" src="assets/images/user.png" />
                                            <img src="assets/images/user.png" />
                                        </picture>
                                        Ver Perfil
                                    </a>
                                    <a id="reenviar" class="dropdown-item" href="#">
                                        <picture>
                                            <source type="image/webp" src="assets/images/money.webp" />
                                            <source type="image/png" src="assets/images/money.png" />
                                            <img src="assets/images/money.png" />
                                        </picture>
                                        Reenviar pagamento
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <picture>
                                            <source type="image/webp" src="assets/images/voucher.webp" />
                                            <source type="image/png" src="assets/images/voucher.png" />
                                            <img src="assets/images/voucher.png" />
                                        </picture>
                                        Enviar Cupom
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <picture>
                                            <source type="image/webp" src="assets/images/lamp.webp" />
                                            <source type="image/png" src="assets/images/lamp.png" />
                                            <img src="assets/images/lamp.png" />
                                        </picture>
                                        Situações Difíceis
                                    </a>
                                    <hr>
                                    <a class="dropdown-item red" href="#">
                                        <picture>
                                            <source type="image/webp" src="assets/images/denunciar.webp" />
                                            <source type="image/png" src="assets/images/denunciar.png" />
                                            <img src="assets/images/denunciar.png" />
                                        </picture>
                                        Denunciar
                                    </a>
                                </div>
                            </ul>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="chat-conversation p-3">
                        <ul class="list-unstyled" id="messageBody" data-simplebar style="min-height: 250px; max-height: 470px; overflow-y: auto;">
                        </ul>
                    </div>

                    <form id="input-chat" action="">
                    <div class="p-3 chat-input-section">
                        <div class="row">
                              <div class="col">
                                  <div class="position-relative">
                                      <input id="messageInput"  type="text" class="form-control chat-input" placeholder="Enviar Mensagem...">
                                      <input id="myID" name="myID" type="hidden" value="<?php echo $myID; ?>"/>
                                      <input id="tabela" name="tabela" type="hidden" value="<?php echo $tabela; ?>"/>
                                  </div>
                              </div>
                              <div class="col-auto d-flex justify-content-center align-items-center">
                                  <i class="fas fa-microphone"></i>
                                  <button style="border: none; background-color: white" type="submit" id="btn_submit">
                                    <i class="fab fa-telegram-plane"></i>
                                  </button>
                              </div>
                        </div>
                    </div>
                    </form>



                </div>
            </div>
        </div>
    </div>


    <div class="dica">
            <picture>
                <source type="image/webp" src="assets/images/lampada.webp" />
                <source type="image/png" src=".assets/images/lampada.png" />
                <img src="assets/images/lampada.png" style="width: 40px;" />
            </picture>
            <p>
                Vamos enviar algumas mensagens de dicas para o Anjo conversar, caso não saiba o que dizer.
            </p>
            <i id="timeClose" class="fas fa-times"></i>
    </div>


    <?php include "assets/includes/footer.php"; ?>
</div>
<!-- end main content-->
</div>
<!-- END layout-wrapper -->
    <?php include "assets/includes/javascript-heroi.php"; ?>
    <script src="assets/js/app.js"></script>
    <script src="assets/js/dashanjo.js"></script>

    <script src="assets/libs/inputmask/min/jquery.inputmask.bundle.min.js"></script>
    <script src="assets/js/mask.js"></script>
    <script src="assets/js/chat.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/mustache.js/4.0.1/mustache.min.js"></script>

    <script>
    var SESSION_ID = '<?php echo $sessao; ?>'; var TOKEN = '<?php echo $token; ?>'; var AVATAR_EU = '<?php echo $avatarheroi; ?>'; var AVATAR_ELE = '<?php echo $avataranjo; ?>';
    var MY_ID = '<?php echo $_GET['myid']; ?>'; var TABELA = '<?php echo $_GET['where']; ?>';
    </script>

    <script src="chat-engine/historico.js"></script>
    <script src="chat-engine/script.js"></script>
    <script src="chat-engine/digitando.js"></script>

    <script>
    var myid = 'h_'+MY_ID;
    var tabela = TABELA;


    function convertDate(dateString){
      var p = dateString.split(/\D/g)
      return [p[2],p[1],p[0]].join("/");
    }

    jQuery('#messageBody').empty(); //Limpando a div

    jQuery.ajax({
      type:'post',    //Definimos o método HTTP usado
      dataType: 'json', //Definimos o tipo de retorno
      data: {"nome_tabela": tabela,
             "meuID": myid},
      url: 'painel/engine/retorna_historico_chat.php',//Definindo o arquivo onde serão buscados os dados

      success: function(dados){

        for(var i=0;dados.length>i;i++){

          //vamos arrumar a data? podemos tambem personalizar do tipo: hoje, ontem, fora esses, deixa a data normal.
          var datahora = dados[i].datahora; var dataarray = datahora.split(" "); data = dataarray[0]; var hora = dataarray[1]; data = convertDate(data); datahora = data+' '+hora;

          //Adicionando registros retornados na div
          if(dados[i].texto != ''){
              alert(dados[i].texto);
              if(dados[i].remetente == myid){
                var mensagem = {
                  'texto':  dados[i].texto,
                  'datahora': datahora,
                  'avatar': '../painel/'+avatar_eu
                },
                output = Mustache.render('<li class="right"><div class="conversation-list"><div class="ctext-wrap  right"><p>{{texto}}</p><p class="chat-time mb-0">{{datahora}}</p></div></div></li>', mensagem);
              }else{
                var mensagem = {
                  'texto':  dados[i].texto,
                  'datahora': datahora,
                  'avatar': '../painel/'+avatar_ele
                },
                output = Mustache.render('<li><div class="conversation-list"><div class="ctext-wrap"><p>{{texto}}</p><p class="chat-time mb-0">{{datahora}}</p></div></div></li>', mensagem);
              }

              $('#messageBody'z).append(output);
          }
        }

        var chatHistory = document.getElementById("messageBody");
        chatHistory.scrollTop = chatHistory.scrollHeight;

      }
    });

    </script>


</body>
</html>
