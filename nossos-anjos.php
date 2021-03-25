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
        <title>Nossos Anjos | Eyhe - Conversas acolhedoras em minutos</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Enfrente os Seus Problemas com a Ajuda dos Anjos Eyhe, Você Não Está Sozinho Nessa! Quem Já Viveu o Mesmo Desafio que Você Sabe como Superar e Vai te Contar Como. Acesse Já! Saúde frágil, relações tóxicas, pressão social, depressão, ansiedade. Você precisa de ajuda. Escolha um Anjo Eyhe agora mesmo e confie no poder de um ombro amigo. Temos Pessoas que já Passaram pelo que Você Está Passando e Podem te Ajudar. Conheça quem Já Viveu o Mesmo Desafio que Você Sabe como Superar e Vai te Contar Como. Dê uma Chance para Nós e para Você Mesmo. Tenha a Ajuda que Procura em Nosso Site e Desabafe sem Julgamentos. Faça seu Cadastro!" />
        <meta name="robots" content="index, follow" />
        <meta name="keywords" content="psicólogo online gratuito, ajuda psicológica, conversa online, conversar online, grupo de apoio, desabafo online, +desabafo +online, chat de bate papo, bate papo, bate papo online, site bate papo, quero conversar com alguém, como controlar crise de ansiedade, preciso de ajuda psicológica, como controlar a ansiedade, como acabar com a ansiedade, como dimnuir a ansiedade, como controlar a crise de ansiedade, site de desabafo, crise de ansiedade tem cura, preciso de ajuda emocional, chat ajuda emocional, +conversar +online, controlar a ansiedade, desabafo online auto ajuda, desabafar por chat, preciso de suporte emocional." />
        <meta content="Wilian Gulini" name="author" />
        <?php include "assets/includes/cssgeral.php"; ?>
        <link rel="stylesheet" href="assets/css/guia_style.css" />
        <link rel="stylesheet" href="assets/css/vertical-sidebar.css" />
        <link rel="stylesheet" href="assets/css/footer.css" />
        <link rel="stylesheet" href="assets/css/nossos-anjos.css" />
    </head>
<?php include "assets/includes/header-heroi.php"; ?>

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-xl-8">
                  <div class="card search">
                      <div class="text-primary">
                          <p style="font-size: 18px;"><b> Olá! Sobre o que gostaria de conversar? </b></p>
                      </div>
                      <form method="get" action="nossos-anjos.php">
                          <div class="ls-custom-select d-flex">

                            <select class="ls-select" id="escolher-categoria" name="c">
                              <option>Todos os assuntos</option>
                              <option>Abusos Sexuais</option>
                              <option>Ansiedade</option>
                              <option>Depressão</option>
                              <option>Luto</option>
                              <option>Problemas de Saúde</option>
                              <option>Relacionamentos</option>
                              <option>Violência Doméstica</option>

                            </select>
                          </div>
                      </form>
                      <div class="text-secondary">


                          <?php
                          include 'painel/engine/conecta.php';
                          $sql = $conexao->prepare('SELECT id FROM anjos WHERE (status = 1)');
                          $sql->execute();
                          $total = $sql->rowCount();
                          ?>

                          <?php
                          $sql = $conexao->prepare('SELECT id FROM anjos WHERE (status = 1 and online = 1)');
                          $sql->execute();
                          $totalonline = $sql->rowCount();
                          ?>
                          <center> Nesse momento
                          <p class="green"><strong><?php echo $total;?> Anjos / </strong><?php echo $totalonline;?> online</p></center>
                      </div>
                  </div>

                    <?php
                    if($_GET['c'] != ''){
                      echo "<p style='font-size: 14px;'>Mostrando Anjos que conversam sobre <b>".$_GET['c']."</p>";
                    }

                    ?>
                    <?php

                    include "blocks/card-anjo.php";

                    ?>


                </div>
            </div>
        </div>
    </div>

    <?php

    include "assets/includes/footer.php";

    ?>
</div>

  <!-- Right Sidebar -->
  <div class="right-bar">
            <div data-simplebar class="h-100">
                <div class="rightbar-title px-3 py-4">
                    <a href="javascript:void(0);" class="right-bar-toggle float-right">
                        <i class="mdi mdi-close noti-icon"></i>
                    </a>
                    <h5 class="m-0">Settings</h5>
                </div>

                <!-- Settings -->
                <hr class="mt-0" />
                <h6 class="text-center mb-0">Choose Layouts</h6>

                <div class="p-4">
                    <div class="mb-2">
                        <img src="assets/images/layouts/layout-1.jpg" class="img-fluid img-thumbnail" alt="">
                    </div>
                    <div class="custom-control custom-switch mb-3">
                        <input type="checkbox" class="custom-control-input theme-choice" id="light-mode-switch" checked />
                        <label class="custom-control-label" for="light-mode-switch">Light Mode</label>
                    </div>

                    <div class="mb-2">
                        <img src="assets/images/layouts/layout-2.jpg" class="img-fluid img-thumbnail" alt="">
                    </div>
                    <div class="custom-control custom-switch mb-3">
                        <input type="checkbox" class="custom-control-input theme-choice" id="dark-mode-switch" data-bsStyle="assets/css/bootstrap-dark.min.css" data-appStyle="assets/css/app-dark.min.css" />
                        <label class="custom-control-label" for="dark-mode-switch">Dark Mode</label>
                    </div>

                    <div class="mb-2">
                        <img src="assets/images/layouts/layout-3.jpg" class="img-fluid img-thumbnail" alt="">
                    </div>
                    <div class="custom-control custom-switch mb-5">
                        <input type="checkbox" class="custom-control-input theme-choice" id="rtl-mode-switch" data-appStyle="assets/css/app-rtl.min.css" />
                        <label class="custom-control-label" for="rtl-mode-switch">RTL Mode</label>
                    </div>


                </div>

            </div> <!-- end slimscroll-menu-->
        </div>
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
        <?php include "assets/includes/javascript-heroi.php"; ?>

        <!-- App js -->
        <script src="assets/js/app.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script src="painel/engineJS/cria_conversa.js"></script>

        <script>
        $("#escolher-categoria").change(function() {
            var categoria = $(this).val();
            var url_atual = "nossos-anjos.php?c=" + categoria;
            window.location.replace(url_atual);
        });
        </script>

    </body>

</html>
