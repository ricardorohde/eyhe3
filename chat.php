<?php include "painel/engine/verifica_sessao_heroi.php"; ?>

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

if($status == 1){
  $status  = 'Online';
}else{
  $status = 'Offline';
}


$id = (int)$_GET['idanjo'];
$consulta = $conexao->query("SELECT count(id) as qtdgeral FROM conversas WHERE idanjo = $id");
while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
    $qtdgeral = $linha['qtdgeral'] + 10;
}

$consulta = $conexao->query("SELECT count(id) as qtd_avaliacoes FROM avaliacoes_new WHERE idanjo = $id");
while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
    $qtd_avaliacoes = $linha['qtd_avaliacoes'];
}

$consulta = $conexao->prepare("SELECT nome, avatar FROM tab_usuario WHERE id = :idheroi LIMIT 1");
$consulta->bindParam(':idheroi', $_GET['myid'], PDO::PARAM_INT);
$consulta->execute();
while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
  $avatarheroi = $linha['avatar'];
}
?>


<?php
$idheroi = $_SESSION['id_heroi'];
$consulta = $conexao->query("SELECT saldo FROM tab_usuario where id = $idheroi limit 1");
while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
  $saldo = $linha['saldo'];
  if($saldo == ''){
    $saldo = 0.00;
  }
}

?>


<!doctype html>
<html lang="pt-BR">
    <head>

          <!-- Google Tag Manager -->
          <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
          new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
          j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
          'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
          })(window,document,'script','dataLayer','GTM-MRZVDDW');</script>


        <meta charset="UTF-8">
        <title>Conversando com <?php echo $nomeanjo; ?> | Eyhe - Conversas acolhedoras em minutos</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Enfrente os Seus Problemas com a Ajuda dos Anjos Eyhe, Você Não Está Sozinho Nessa! Quem Já Viveu o Mesmo Desafio que Você Sabe como Superar e Vai te Contar Como. Acesse Já! Saúde frágil, relações tóxicas, pressão social, depressão, ansiedade. Você precisa de ajuda. Escolha um Anjo Eyhe agora mesmo e confie no poder de um ombro amigo. Temos Pessoas que já Passaram pelo que Você Está Passando e Podem te Ajudar. Conheça quem Já Viveu o Mesmo Desafio que Você Sabe como Superar e Vai te Contar Como. Dê uma Chance para Nós e para Você Mesmo. Tenha a Ajuda que Procura em Nosso Site e Desabafe sem Julgamentos. Faça seu Cadastro!" />
    <meta name="robots" content="index, follow" />
    <meta name="keywords" content="psicólogo online gratuito, ajuda psicológica, conversa online, conversar online, grupo de apoio, desabafo online, +desabafo +online, chat de bate papo, bate papo, bate papo online, site bate papo, quero conversar com alguém, como controlar crise de ansiedade, preciso de ajuda psicológica, como controlar a ansiedade, como acabar com a ansiedade, como dimnuir a ansiedade, como controlar a crise de ansiedade, site de desabafo, crise de ansiedade tem cura, preciso de ajuda emocional, chat ajuda emocional, +conversar +online, controlar a ansiedade, desabafo online auto ajuda, desabafar por chat, preciso de suporte emocional." />
        <meta content="Wilian Gulini" name="author" />

        <?php include "assets/includes/cssgeral.php"; ?>

        <link rel="stylesheet" href="assets/css/guia_style.css" />
        <link rel="stylesheet" href="assets/css/footer.css" />
        <link rel="stylesheet" href="assets/css/chat.css" />
        <link rel="stylesheet" href="assets/css/vertical-sidebar.css"/>
        <link href="assets/css/toastr.min.css" rel="stylesheet">


        <!-- CHAT BY TOKBOX  -->
        <script src='assets/js/opentok.min.js'></script>
        <script src="https://cdn.jsdelivr.net/npm/promise-polyfill@7/dist/polyfill.min.js" charset="utf-8"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fetch/2.0.3/fetch.min.js" charset="utf-8"></script>

        <style>
            .chat-input{
                border-radius: 30px;
                background-color: $light !important;
                border-color:  $light !important;
            }
        </style>

    </head>
    <body id="chatBody" class="chatt" data-sidebar="dark">
        <noscript>
          <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MRZVDDW" height="0" width="0" style="display:none;visibility:hidden"></iframe>
        </noscript>
        <!-- Begin page -->
        <div id="layout-wrapper">

            <header id="page-topbar">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box">
                            <a href="index.php" class="logo logo-light">
                                <span class="logo-sm">
                                    <picture>
                                        <source type="image/webp" src="assets/images/logotipo_branca.webp" />
                                        <source type="image/png" src="assets/images/logotipo_branca.png" />
                                        <img src="assets/images/logotipo_branca.png"  />
                                    </picture>
                                </span>
                                <span class="logo-lg">
                                    <picture>
                                        <source type="image/webp" src="assets/images/logotipo_branca.webp" />
                                        <source type="image/png" src="assets/images/logotipo_branca.png" />
                                        <img src="assets/images/logotipo_branca.png" width="85px" alt="logo do Eyhe" />
                                    </picture>
                                </span>
                            </a>
                        </div>

                        <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect" id="vertical-menu-btn">
                            <i class="fa fa-fw fa-bars"></i>
                        </button>

                        <!-- App Search-->


                        <div class="dropdown dropdown-mega d-none d-lg-block ml-2">
                            <a type="button" class="btn btn-white" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">
                                Veja nossos conteúdos
                                <i class="mdi mdi-chevron-down"></i>
                            </a>

                        </div>
                    </div>

                    <div class="d-flex">
                        <form class="app-search d-none d-lg-block" method="get" action="nossos-anjos.php">
                            <div class="position-relative">
                                <input type="text" name="c" class="form-control" placeholder="Procure o Anjo pelo nome">
                                <span class="bx bx-search-alt"></span>
                            </div>
                        </form>
                        <div class="dropdown d-inline-block d-lg-none ml-2">
                            <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="mdi mdi-magnify"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0"
                                aria-labelledby="page-header-search-dropdown">

                                <form class="p-3">
                                    <div class="form-group m-0">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="dropdown d-none d-lg-inline-block ml-1">
                            <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                                <i class="bx bx-fullscreen"></i>
                            </button>
                        </div>

                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-notifications-dropdown"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="bx bx-bell bx-tada"></i>
                                <span class="badge badge-danger badge-pill">3</span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0 notification"
                                aria-labelledby="page-header-notifications-dropdown">
                                <div class="p-3">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h6 class="m-0"> Notificações </h6>
                                        </div>
                                    </div>
                                </div>

                                <div class="p-2 border-top">
                                    <a class="btn btn-blue">Ver mais <i class="mdi mdi-arrow-right ml-1"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="rounded-circle header-profile-user" src="https://eyhe.com.br/painel/<?php echo $_SESSION['avatar_heroi']; ?>"
                                    alt="Header Avatar">
                                <span class="d-none d-xl-inline-block ml-1"><?php echo $_SESSION['nome_heroi']; ?></span>
                                <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <!-- item-->
                                <a class="dropdown-item" href="editar-perfil.php"><i class="bx bx-user font-size-16 align-middle mr-1"></i> Perfil</a>
                                <a class="dropdown-item" href="financeiro.php"><i class="bx bx-wallet font-size-16 align-middle mr-1"></i>Financeiro</a>
                                <a class="dropdown-item d-block" href="conversas.php"><i class="bx bx-wrench font-size-16 align-middle mr-1"></i> Conversas</a>
                                <a class="dropdown-item" href="agendamentos.php"><i class="bx bx-lock-open font-size-16 align-middle mr-1"></i>Agendamentos</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-danger" href="logout.php"><i class="bx bx-power-off font-size-16 align-middle mr-1 text-danger"></i> Sair</a>
                            </div>
                        </div>

                    </div>
                </div>
            </header> <!-- ========== Left Sidebar Start ========== -->
  <div class="vertical-menu">

    <div data-simplebar class="h-100">

      <!--- Sidemenu -->
      <div id="sidebar-menu" style="height: 100%;">
          <!-- Left Menu Start -->
          <ul class="metismenu list-unstyled" id="side-menu">
              <li class="menu-title">Menu</li>
              <li>
                  <a href="index.php" class="waves-effect">
                      <i class="fas fa-home"></i>
                      <span>Dashboard</span>
                  </a>
              </li>
              <li>
                  <a href="javascript: void(0);" class="waves-effect">
                      <i class="fas fa-info-circle"></i>
                      <span>Quem Somos</span>
                  </a>
              </li>
              <li>
                  <a href="nossos-anjos.php" class="waves-effect">
                      <picture>
                          <!--<source type="image/webp" src="assets/images/angel.webp" />-->
                          <source type="image/png" src="assets/images/angel.png" />
                          <img src="assets/images/angel.png" alt="imagem-de-anjo" width="25px"/>
                      </picture>
                      <span>Nossos Anjos</span>
                  </a>
              </li>
              <li>
                  <a href="https://blog.eyhe.com.br/" class="waves-effect">
                      <i class="mdi mdi-cursor-default-click-outline"></i>
                      <span>Blog</span>
                  </a>
              </li>
              <li class="menu-title">Meu Perfil</li>

              <li>
                  <a href="editar-perfil.php">
                      <i class="bx bx-user"></i>
                      <span>Perfil</span>
                  </a>
              </li>

              <li>
                  <a href="financeiro.php" class=" waves-effect">
                      <i class="bx bx-dollar-circle"></i>
                      <span>Financeiro</span>
                  </a>
              </li>

              <li>
                  <a href="conversas.php">
                      <i class="bx bx-chat"></i>
                      <span>Conversas</span>
                  </a>
              </li>

              <li>
                  <a href="agendamentos.php">
                      <i class="far fa-calendar-check"></i>
                      <span>Agendamentos</span>
                  </a>
              </li>

              <li>
                  <a href="logout.php">
                      <i class="mdi mdi-exit-run"></i>
                      <span>Sair</span>
                  </a>
              </li>
      </div>
      <!-- Sidebar -->
    </div>
  </div>
  <!-- Left Sidebar End -->

<div class="main-content">


    <div class="page-content">
        <div class="container-fluid chat">


        <div class="card perfil" id="cardPerfil">
            <div id="close"><i class="fas fa-times"></i></div>
            <picture class="d-flex justify-content-center">
                <source type="image/jpg" src="https://eyhe.com.br/painel/<?php echo $avataranjo; ?>" />
                <img src="https://eyhe.com.br/painel/<?php echo $avataranjo; ?>" />
            </picture>
            <div class="text">
                <p class="h2"><?php echo $nomeanjo; ?></p>
                <p>
                    <?php echo $biografia; ?>
                </p>
            </div>
            <div class="avaliar d-flex align-items-center justify-content-center">
                <p>(<?php echo $qtd_avaliacoes; ?> avaliações)</p>
                <picture>
                    <source type="image/png" src="assets/images/star.png" />
                    <img src="assets/images/star.png" />
                </picture>
            </div>
            <p class="help">Esse Anjo ja ajudou <?php echo $qtdgeral; ?> pessoas</p>
            <div class="theme">
                <p><strong>Este Anjo conversa sobre:</strong></p>
                <div class="theme_one d-flex justify-content-center">
                    <p class="p1"><?php echo $desafio1; ?></p>
                    <p><?php echo $desafio2; ?></p>
                </div>
                <div class="theme_one d-flex justify-content-center">
                    <p class="p1"><?php echo $desafio3; ?></p>

                </div>
            </div>
            <a href="perfil-anjo.php?q=<?php echo $id; ?>" class="btn btn-blue">Ver perfil completo</a>
        </div>
        <div id="cardMain" class="card main">
            <div id="cardCartao" class="card cartao">
                <div id="close1"><i class="fas fa-times"></i></div>

                <img src="assets/images/slide_cartao.png" width="140px;"/>
                <p>Chegou a hora de retribuir seu anjo e garantir mais 40 minutos de atendimento</p>

                <p>Valor a pagar: <b>R$24,90</b></p>
                <hr/>

                <p>Seu saldo atual é: <b>R$<?php echo $saldo; ?></b></p>
                <div class="button">
                    <a href="#" id="pagar-com-saldo" class="btn btn-blue">
                      Pagar com Saldo
                    </a>
                    <br/>
                    <a id="pagCred" class="btn btn-blue">Pagar com Cartão de Crédito</a>
                    <br/>
                    <a id="pagPIX" class="btn btn-blue">Pagar com PIX</a>
                </div>
            </div>
            <div id="cardPag" class="card pag">
                <div id="close2"><i class="fas fa-times"></i></div>

                <form id="payment-form" method="POST" action="#">


                    <input required type="tel" id="numerocartao" name="numero-cartao" placeholder="Número do Cartão" />
                    <div class="input">
                        <input required type="tel" name="expiracao" id="expiracao" placeholder="MM/AAAA" />
                        <input required type="tel" maxlength="7" name="codseguranca" placeholder="Cód. de segurança" />
                    </div>
                    <input required type="text" name="nomecartao" placeholder="Nome do Titular" />
                    <input trequired type="tel" id="cpf" name="cpf" placeholder="CPF do Titular"/>
                    <input required type="hidden" name="idheroi" value="<?php echo $_SESSION['id_heroi'];?>" />
                    <input required type="hidden" name="nomeheroi" value="<?php echo $_SESSION['nome_heroi'];?>" />
                    <input required type="hidden" name="emailheroi" value="<?php echo $_SESSION['email_heroi'];?>" />
                    <picture>
                        <source type="image/webp" src="assets/images/band_card.png" />
                        <source type="image/png" src="assets/images/band_card.png" />
                        <img src="assets/images/band_card.png" width="100%"/>
                    </picture>
                    <br/>
                    <button type="submit" class="btn btn-blue" style="width: 100%">Confirmar Pagamento</button>
                </form>

            </div>
            <div class="card PIX" id="cardPIX">
                <div id="close8"><i class="fas fa-times"></i></div>
                <p>Nesse card vai o conteudo do PIX</p>
            </div>
        </div>
        <div id="cardChat" class="card chat">
                <div class="p-4 border-bottom ">
                    <div class="row">
                        <div class="col-md-4 col-9">
                            <picture>
                                <source type="image/webp" src="https://eyhe.com.br/painel/<?php echo $avataranjo; ?>" />
                                <img src="https://eyhe.com.br/painel/<?php echo $avataranjo; ?>" />
                            </picture>
                            <div class="txt">
                                <h5 class="font-size-15 mb-1"><?php echo $nomeanjo; ?></h5>
                                <p class="text-muted mb-0"><?php echo $status; ?></p>
                            </div>
                        </div>
                        <div class="col-md-8 col-3">
                            <ul class="list-inline user-chat-nav text-right mb-0">
                                <a target="_blank" href="<?php echo $url_video;?>">
                                  <li class="list-inline-item d-sm-inline-block">
                                      <i class="fas fa-video"></i>
                                  </li>
                                </a>
                                <a class="btn dropdown-toggle" id="dropdownMenuLinkChat" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                                        Realizar Pagamento
                                    </a>

                                </div>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="chat-conversation-h">
                    <div class="chat-conversation p-3">
                        <ul class="list-unstyled" id="messageBody" data-simplebar style="max-height: 470px; overflow-y: auto;">
                        </ul>
                    </div>

                    <!-- BARRAS DE STATUS -->
                    <div class="barra-status-sucesso" >
                      <center> Pagamento Confirmado. Aproveite seu atendimento :) </center>
                    </div>
                    <div class="barra-status-aguardando">
                      <center> Pagamento em aguardo. <a class="reenviar" href="javascript:void(0);" style="color: #fff" class="reenviar"><u>CLIQUE AQUI</u></a> para realizar o pagamento.</center>
                    </div>
                    <div class="barra-status-problemas">
                      <center> Pagamento com problemas. Peça ajuda ao seu Anjo.</center>
                    </div>
                    <div class="barra-status-10minutos">
                      <center> Você está utilizando os 10 minutos gratuitos. Logo a solicitação de pagamento aparecerá.</center>
                    </div>

                    <form autocomplete="off" id="input-chat" action="">
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
                                  <!--<i class="fas fa-microphone"></i>-->
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


    <div class="dica" style="display: none;">
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


</div>
<!-- end main content-->
</div>
<!-- END layout-wrapper -->
    <?php include "assets/includes/javascript-heroi.php"; ?>
    <script src="assets/js/app.js"></script>
    <script src="assets/js/dashanjo.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script src="assets/js/chat.js"></script>
    <script src="assets/js/userAgent.js"></script>

    <script>
    $(document).ready(function(){
        $('#expiracao').mask('00/0000');
        $("#cpf").mask("999.999.999-99");
        $('#numerocartao').mask('0000 0000 0000 0000');
    });
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/mustache.js/4.0.1/mustache.min.js"></script>

    <script>
    var SESSION_ID = '<?php echo $sessao; ?>'; var TOKEN = '<?php echo $token; ?>'; var AVATAR_EU = '<?php echo $avatarheroi; ?>'; var AVATAR_ELE = '<?php echo $avataranjo; ?>';
    var MY_ID = '<?php echo $_GET['myid']; ?>'; var TABELA = '<?php echo $_GET['where']; ?>';
    var IDANJO = '<?php echo $_GET['idanjo']; ?>';
    var SALDO = '<?php echo $saldo; ?>';
    var APIKEY = 46211362;
    var SESSION = '<?php echo $sessao; ?>';
    var URL_VIDEO = 'https://eyhe.com.br/video/index.php?apiKey='+APIKEY+'&sessionId='+SESSION_ID+'&token='+TOKEN;
    </script>

    <script src="chat-engine/script.js"></script>
    <script src="chat-engine/historico.js"  charset="utf-8"></script>
    <script src="chat-engine/digitando.js"></script>
    <script src="chat-engine/emite_status.js"></script>


    <script src="assets/js/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="painel/engineJS/pagamento_na_conversa_e_notificacoes.js"></script>
    <script src="painel/engineJS/sensor_de_chamada_de_video.js"></script>

    <script>
    $(".reenviar").on("click", function() {
      $("#cardPerfil").css("display","none");
      $("#cardSituation").css("display","none");
      $("#cardCartao").css("display","block");
      $("#cardMain").toggle();
    });
  </script>


</body>
</html>
