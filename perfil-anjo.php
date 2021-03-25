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
        <link rel="stylesheet" href="assets/css/perfil-anjo.css" />

        <style>
        #colorGreen{
            max-width: 10px;
            min-width: 10px;
            max-height: 10px;
            min-height: 10px;
            width: 10px;
            height: 10px;
            border-radius: 50%;
            margin-right: 10px;
            background-color: #31D372;
          }

          #colorRed{
            max-width: 10px;
            min-width: 10px;
            max-height: 10px;
            min-height: 10px;
            width: 10px;
            height: 10px;
            border-radius: 50%;
            margin-right: 10px;
            background-color: #F46A6A;
          }

          .main-content .page-content .container-fluid .row .col-lg-8 .card.desktop .c-1 .text .line h3 {
          margin-bottom: 0;
          }
          .main-content .page-content .container-fluid .row .col-lg-8 .card.desktop .c-1 .text .line {
              margin-bottom: 5px;
          }
        </style>
    </head>
<?php include "assets/includes/header-heroi.php"; ?>

<?php

$id = (int)$_GET['q'];
include ('painel/engine/conecta.php');

$consulta = $conexao->query("SELECT count(id) as qtdgeral FROM conversas WHERE idanjo = $id");
while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
    $qtdgeral = $linha['qtdgeral'] + 10;
}

$consulta = $conexao->query("SELECT count(id) as qtd_avaliacoes FROM avaliacoes_new WHERE idanjo = $id");
while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
    $qtd_avaliacoes = $linha['qtd_avaliacoes'];
}

$consulta = $conexao->query("SELECT * FROM anjos  WHERE id = $id limit 1");
  while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {

      $nome = $linha['nome'];
      $email = $linha['email'];
      $telefone = $linha['telefone'];
      $biografia = $linha['biografia'];
      $online = $linha['online'];
      $desafio1 = $linha['desafio1'];
      $desafio2 = $linha['desafio2'];
      $desafio3 = $linha['desafio3'];
      $video = $linha['video'];
      $online = $linha['online'];
      $avatar_anjo = $linha['avatar'];

      if($linha['online'] == 1){
        $classe = 'iniciar-atendimento';
        $classe_status = 'colorGreen';
      }
      else{
        $classe = 'anjo-indisponivel';
        $classe_status = 'colorRed';
      }
  }

  $ids = $_SESSION['id_heroi'].'-'.$id;

?>
        <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="card desktop">
                                    <div class="c-1">
                                        <picture class="avatar">
                                            <source type="image/jpg" src="https://eyhe.com.br/painel/<?php echo $avatar_anjo;?>" />
                                            <img src="https://eyhe.com.br/painel/<?php echo $avatar_anjo;?>"/>
                                        </picture>
                                        <div class="text">
                                          <div class="line d-flex justify-content-start align-items-center">
                                            <div id="<?php echo $classe_status; ?>"></div>
                                            <h3><?php echo $nome; ?></h3>
                                          </div>
                                            <p>
                                                (<?php echo $qtd_avaliacoes;?> avaliações)
                                                <picture>
                                                    <source type="image/png" src="assets/images/star.png" />
                                                    <img src="assets/images/star.png" />
                                                </picture>
                                            </p>
                                            <p>Esse Anjo ja ajudou <?php echo $qtdgeral;?> pessoas</p>
                                        </div>
                                    </div>
                                    <div class="c-2">
                                        <div class="talk d-flex">
                                            <p>Converse por:</p>
                                            <div class="foto">
                                                <picture>
                                                    <source type="image/png" src="assets/images/audio.png" />
                                                    <img src="assets/images/audio.png" />
                                                </picture>
                                                <picture>
                                                    <source type="image/png" src="assets/images/video.png" />
                                                    <img src="assets/images/video.png" />
                                                </picture>
                                                <picture>
                                                    <source type="image/png" src="assets/images/texto.png" />
                                                    <img src="assets/images/texto.png" />
                                                </picture>
                                            </div>
                                        </div>
                                        <div class="theme">
                                            <p><strong>Este Anjo conversa sobre:</strong></p>
                                            <div class="theme_one d-flex">
                                                <p class="p1" id="greyTag"><?php echo $desafio1;?></p>
                                                <p id="greyTag"><?php echo $desafio2;?></p>
                                            </div>
                                            <div class="theme_one d-flex">
                                                <p class="p1" id="greyTag"><?php echo $desafio3;?></p>
                                            </div>
                                        </div>
                                        <div class="buttons">
                                          <a class="btn btn-primary btn-blue <?php echo $classe; ?>" data-id="<?php echo $ids; ?>">Quero conversar agora!</a>
                                          <a class="btn btn-primary agend" href="agendar-hora.php?idanjo=<?php echo $id;?>">Quero agendar um horário</a>
                                        </div>
                                        <div class="value">
                                          <p style="font-size: 17px;"><strong>R$24,90</strong> / 40 minutos + </p>
                                          <p  class="strong"><strong><u>10 minutos grátis no ínicio da conversa</u></strong></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card desktop">
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <h3>Minha História</h3>
                                        <p style='font-size: 15px;'>
                                            <?php echo $biografia;?>
                                        </p>
                                    </div>
                                </div>
                                <div class="card desktop">
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <h3>Meu Vídeo</h3>
                                        <?php
                                          if($video == ''){
                                            echo "<p> <b> Esse Anjo ainda não possui vídeo cadastrado </b></p>";
                                          }else{
                                            $video = explode('=', $video);
                                            $video = $video[1];
                                          ?>
                                          <iframe width="100%" height="415" src="https://www.youtube.com/embed/<?php echo $video;?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                        <?php  }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->

                            <div class="col-lg-4">
                                <div class="card"  style="display: none;">
                                    <div class="card-body">
                                        <div class="books">
                                            <p>
                                                <strong>Alguns livros que recomendo:</strong><br>
                                                <small>Separei alguns conteúdos para te ajudar</small>
                                            </p>
                                            <div class="book-img d-flex">
                                                <picture class="picture right">
                                                    <source type="image/webp" src="assets/images/book.webp" />
                                                    <img src="assets/images/book.webp" />
                                                </picture>
                                                <picture class="picture right">
                                                    <source type="image/webp" src="assets/images/book.webp" />
                                                    <img src="assets/images/book.webp" />
                                                </picture>
                                                <picture class="picture">
                                                    <source type="image/webp" src="assets/images/book.webp" />
                                                    <img src="assets/images/book.webp" />
                                                </picture>
                                            </div>
                                            <div class="book-img d-flex">
                                                <picture class="picture right">
                                                    <source type="image/webp" src="assets/images/book.webp" />
                                                    <img src="assets/images/book.webp" />
                                                </picture>
                                                <picture class="picture right">
                                                    <source type="image/webp" src="assets/images/book.webp" />
                                                    <img src="assets/images/book.webp" />
                                                </picture>
                                                <picture class="picture">
                                                    <source type="image/webp" src="assets/images/book.webp" />
                                                    <img src="assets/images/book.webp" />
                                                </picture>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card desktop">
                                    <div class="avaliation">
                                        <div class="reviews">
                                            <p style="font-size: 15px;"><strong>Algumas avaliações que recebi!</strong></p>
                                        </div>
                                        <div class="coments">
                                          <?php
                                            $consulta = $conexao->query("SELECT comentario, dataavaliacao FROM `avaliacoes_new` WHERE (idanjo = $id) AND (comentario != '') order by id desc LIMIT 10");
                                            while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
                                          ?>
                                            <div class="coments_one">
                                                <picture>
                                                    <source type="image/png" src="assets/images/star.png" />
                                                    <img src="assets/images/star.png" />
                                                </picture>
                                                <p style='font-size: 14px;'>
                                                  " <?php echo $linha['comentario']; ?> "<br/>
                                                  <span style="font-size: 12px;">
                                                    <i><?php echo date('d/m/Y', strtotime($linha['dataavaliacao'])); ?></i>
                                                  <span>
                                                </p>
                                            </div>
                                         <?php } ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->

                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->


                <?php
                    include "assets/includes/footer.php";
                ?>
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

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
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>

        <!-- apexcharts -->
        <script src="assets/libs/apexcharts/apexcharts.min.js"></script>

        <script src="assets/js/pages/project-overview.init.js"></script>

        <script src="assets/js/app.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script src="painel/engineJS/cria_conversa.js"></script>
    </body>
</html>
