<?php include 'PHP/seguranca.php' ; ?>

<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <title>EYHE - Gerenciamento</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1">
  <!-- build:css({.tmp,app}) styles/app.min.css -->
  <link rel="stylesheet" href="styles/webfont.css">
  <link rel="stylesheet" href="styles/climacons-font.css">
  <link rel="stylesheet" href="vendor/bootstrap/dist/css/bootstrap.css">
  <link rel="stylesheet" href="styles/font-awesome.css">
  <link rel="stylesheet" href="styles/card.css">
  <link rel="stylesheet" href="styles/sli.css">
  <link rel="stylesheet" href="styles/animate.css">
  <link rel="stylesheet" href="styles/app.css">
  <link rel="stylesheet" href="styles/app.skins.css">

  <link rel="stylesheet" href="vendor/sweetalert/dist/sweetalert.css">

  <!-- endbuild -->
</head>

<style>
.avatar-anjo{
    width: 150px;
    border-radius: 50%;
    border: solid 2px #0dddda;
    margin-bottom: 10px;
}

.nomeanjo{
    font-size: 16px;
    padding: 0px;
    margin: 0px;
}
</style>

<body class="page-loading">
  <!-- page loading spinner -->
  <div class="pageload">
    <div class="pageload-inner">
      <div class="sk-rotating-plane"></div>
    </div>
  </div>
  <!-- /page loading spinner -->
  <div class="app layout-fixed-header">
    <!-- sidebar panel -->
    <div class="sidebar-panel offscreen-left">
      <div class="brand">
        <!-- toggle small sidebar menu -->
        <a href="javascript:;" class="toggle-apps hidden-xs" data-toggle="quick-launch">
          <i class="icon-grid"></i>
        </a>
        <!-- /toggle small sidebar menu -->
        <!-- toggle offscreen menu -->
        <div class="toggle-offscreen">
          <a href="javascript:;" class="visible-xs hamburger-icon" data-toggle="offscreen" data-move="ltr">
            <span></span>
            <span></span>
            <span></span>
          </a>
        </div>
        <!-- /toggle offscreen menu -->
        <!-- logo -->
        <a class="brand-logo">
          <span>EYHE</span>
        </a>
        <a href="#" class="small-menu-visible brand-logo">E</a>
        <!-- /logo -->
      </div>
      <?php include('repeat/menu_square.php'); ?>
      <!-- main navigation -->
        <?php include('repeat/nav.php'); ?>
      <!-- /main navigation -->
    </div>
    <!-- /sidebar panel -->
    <!-- content panel -->
    <div class="main-panel">
      <!-- top header -->
        <?php include('repeat/top-header.php'); ?>
      <!-- /top header -->

      <!-- main area -->
      <div class="main-content">


            <?php

              include ('engine/conecta.php');
                $consulta = $conexao->query("SELECT * FROM novosanjos2021 ORDER BY datacadastro desc");
                  while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {

            ?>
                  <div class="card bg-white">
                    <div class="card-header">
                        SOLICITA????O <b> <?php echo $linha['nome']; ?> </b>
                    </div>
                    <div class="card-block">
                      <div class="row m-a-0">
                        <div class="col-lg-12">
                          <p><b>Nome do anjo:</b> <?php echo $linha['nome']; ?></p>
                          <p><b>Data da solicita????o:</b> <?php echo date('d/m/Y H:i:s', strtotime($linha['datacadastro'])); ?></p>
                          <p><b>Data Nascimento:</b> <?php echo $linha['datanascimento']; ?></p>
                          <p><b>E-mail:</b> <?php echo $linha['email']; ?></p>
                          <p><b>Telefone celular:</b> <?php echo $linha['telefone']; ?></p>
                          <p><b>Onde nasceu:</b> <?php echo $linha['cidade']; ?></p>
                          <p><b>Fale brevemente como voc?? vive hoje:</b><br/> <?php echo $linha['pergunta1']; ?></p>
                          <p><b>Qual o maior e mais dif??cil desafio voc?? teve que enfrentar e como superou isso?</b><br/> <?php echo $linha['pergunta2']; ?></p>
                          <p><b>Cite os momentos que mais te deixam feliz no dia a dia:</b><br/> <?php echo $linha['pergunta3']; ?></p>
                          <p><b>Qual o papel que a f?? desempenha em sua vida?</b><br/> <?php echo $linha['pergunta4']; ?></p>
                          <p><b>Qual ?? o valor/princ??pio pessoal mais importante para voc???</b><br/> <?php echo $linha['pergunta5']; ?></p>
                          <p><b>Porque voc?? gostaria de ser um anjo Eyhe? </b><br/> <?php echo $linha['pergunta6']; ?></p>

                        </div>
                      </div>
                    </div>
                  </div>
          <?php } ?>




        </div>

      <!-- /main area -->

    </div>
    <!-- /content panel -->
    <!-- bottom footer -->
      <?php include('repeat/footer.php'); ?>
    <!-- /bottom footer -->
    <!-- chat -->
      <?php include('repeat/chat.php'); ?>
    <!-- /chat -->
  </div>
  <!-- build:js({.tmp,app}) scripts/app.min.js -->
  <script src="scripts/helpers/modernizr.js"></script>
  <script src="vendor/jquery/dist/jquery.js"></script>
  <script src="vendor/bootstrap/dist/js/bootstrap.js"></script>
  <script src="vendor/fastclick/lib/fastclick.js"></script>
  <script src="vendor/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
  <script src="scripts/helpers/smartresize.js"></script>
  <script src="scripts/constants.js"></script>
  <script src="scripts/main.js"></script>

  <script src="vendor/sweetalert/dist/sweetalert.min.js"></script>



  <!-- endbuild -->
</body>

</html>
