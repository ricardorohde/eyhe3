<?php include "painel/engine/verifica_sessao_heroi.php"; ?>

<!doctype html>
<html lang="pt-BR">
    <head>
      <!-- Google Tag Manager -->
      <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
      new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
      j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
      'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
      })(window,document,'script','dataLayer','GTM-MRZVDDW');</script>


        <meta charset="utf-8" />
        <title>Sala de Espera | EYHE - Conversa acolhedoras em minutos</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Enfrente os Seus Problemas com a Ajuda dos Anjos Eyhe, Você Não Está Sozinho Nessa! Quem Já Viveu o Mesmo Desafio que Você Sabe como Superar e Vai te Contar Como. Acesse Já! Saúde frágil, relações tóxicas, pressão social, depressão, ansiedade. Você precisa de ajuda. Escolha um Anjo Eyhe agora mesmo e confie no poder de um ombro amigo. Temos Pessoas que já Passaram pelo que Você Está Passando e Podem te Ajudar. Conheça quem Já Viveu o Mesmo Desafio que Você Sabe como Superar e Vai te Contar Como. Dê uma Chance para Nós e para Você Mesmo. Tenha a Ajuda que Procura em Nosso Site e Desabafe sem Julgamentos. Faça seu Cadastro!" />
        <meta name="robots" content="index, follow" />
        <meta name="keywords" content="psicólogo online gratuito, ajuda psicológica, conversa online, conversar online, grupo de apoio, desabafo online, +desabafo +online, chat de bate papo, bate papo, bate papo online, site bate papo, quero conversar com alguém, como controlar crise de ansiedade, preciso de ajuda psicológica, como controlar a ansiedade, como acabar com a ansiedade, como dimnuir a ansiedade, como controlar a crise de ansiedade, site de desabafo, crise de ansiedade tem cura, preciso de ajuda emocional, chat ajuda emocional, +conversar +online, controlar a ansiedade, desabafo online auto ajuda, desabafar por chat, preciso de suporte emocional." />
        <meta content="Wilian Gulini" name="author" />
        <?php include "assets/includes/cssgeral.php"; ?>
        <link rel="stylesheet" href="assets/css/guia_style.css" />
        <link rel="stylesheet" href="assets/css/vertical-sidebar.css" />
        <link rel="stylesheet" href="assets/css/footer.css" />
        <link rel="stylesheet" href="assets/css/nova-espera-style.css" />
        <link rel="stylesheet" href="assets/css/intlTelInput.min.css" />
    </head>
    <?php include "assets/includes/header-heroi.php"; ?>
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid" id="margin">
                    <div class="row diferentona">
                        <div class="card esp2" id="esp2">
                            <div class="txt">
                                <p class="h5">Noticando Anjos de Plantão..</p>
                                <p class="two">Você está em uma <strong>sala de espera virtual</strong> e será rapidamente atendido, aguarde:</p>
                            </div>
                            <picture>
                                <source type="image/webp" src="assets/images/sala/05.webp" />
                                <source type="image/png" src="assets/images/sala/05.png" />
                                <img src="assets/images/sala/05.png" />
                            </picture>
                            <div>
                                <p style="font-size: 20px"><b>Assim que algum Anjo chegar, está tela irá atualizar :)</b></p>
                                <p>Geralmente isso ocorre entre<strong> 30 segundos e 1 minuto.</strong> Você será notificado quando isso acontecer.</p>
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-4" id="md4">
                            <p class="h5" style="margin-bottom: 20px;"><i class="fas fa-search"></i> Uhul!! Você foi atendido! </p>

                            <!--<div class="card d-flex">
                                <div class="info">
                                    <picture>
                                        <source type="image/jpg" src="assets/images/users/avatar-1.jpg" />
                                        <img class="avatar" src="assets/images/users/avatar-1.jpg" />
                                    </picture>
                                    <p class="t1"><strong>Gustavo Santos</strong></p>
                                    <small>
                                        (11 avaliações)
                                        <picture>
                                            <source type="image/png" src="assets/images/star.png" />
                                            <img src="assets/images/star.png" />
                                        </picture>
                                    </small>
                                    <p>Esse Anjo ja ajudou 42 pessoas</p>
                                </div>
                                <div class="texto">
                                    <p>
                                        De Fato não podemos controlar as ações das pessoas a nossa volta! Nem se quer cobrarmos algo que deve ser entregue voluntarimente. Em um relacionamento de 07 anos, lutei contra a dependencia quimica da pessoa que escolhi para caminhar!
                                    </p>
                                </div>
                                <div class="buttons">
                                    <a href="#" class="btn btn-success">Conversar</a>
                                    <a href="perfil-anjo.php" class="btn btn-blue">Ver Perfil</a>
                                </div>
                            </div>-->

                            


                        </div>
                    </div>
                </div>
            </div>
            <?php
                include "assets/includes/footer.php";
            ?>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->
        <?php include "assets/includes/javascript-heroi.php"; ?>
        <script src="assets/js/app.js"></script>
        <script src="assets/js/novo-card.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/mustache.js/4.0.1/mustache.min.js"></script>
        <script> ID_HEROI = '<?PHP echo $_GET['id_requisicao'];?>'; </script>
        <script src="painel/engineJS/eyhex.js"></script>

</body>
</html>
