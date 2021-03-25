<?php include 'PHP/seguranca.php' ; ?>

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
  <!-- endbuild -->
  <!-- page stylesheets -->
 <link rel="stylesheet" href="vendor/sweetalert/dist/sweetalert.css">

 <style>


  .mybox{
    background-color: #1f87f0;
    color: #fff;
  }


  .alert-black{
    background:#000;
    color: #fff;
  }

  .alert-laranja{
    background:#f58634;
    color: #fff;
  }
 </style>

</head>

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
        <div class="page-title">
          <div class="title"><i class="icon-clock"></i>&nbsp;AGENDAMENTO PREMIUM</div>
          <!--<div class="sub-title">Visualize aqui quais as conexões criadas entre heróis e anjos.</div>-->
        </div>
        <div class="card bg-white">
          <div class="card-header">

          <H6><B>Mostrando a lista completa de Agendamentos</B></H6>
          </div>
          <div class="card-block">
            <div class="row m-a-0">
              <div class="col-lg-12">

                <?php

                  include ('engine/conecta.php');

                    $consulta = $conexao->query("SELECT * FROM agendamentos ORDER BY id DESC");
                    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
                      $dataagendamento = date('d/m/Y H:i:s', strtotime($linha['dataagendamento']));
                      $datapedido = date('d/m/Y H:i:s', strtotime($linha['datapedido']));
                      $div =  "
                                <div class='alert alert-info mybox' style='font-size: 15px;'>
                                 Agendamento feito por <b>{$linha['nomeheroi']}</b> com o anjo <b>{$linha['nomeanjo']}</b><br/>
                                 Data agendada para o atendimento <b>{$dataagendamento}</b><br/>
                                 Telefone do herói <b>{$linha['telefoneheroi']}</b><br/>
                                 Confirmação do telefone do herói <b>{$linha['telefoneconfirmacao']}</b><br/>
                                 E-mail do herói <b>{$linha['emailheroi']}</b><br/>

                                 ----------<br/>

                                 <h6>ID do agendamento: #000{$linha['id']}</h6>
                                 <h6>Data da solicitação: {$datapedido}</h6>
                                </div>
                              ";

                     echo $div;

                    }
                ?>


              </div>
            </div>
          </div>
        </div>



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
  <!-- endbuild -->

  <!-- page scripts -->
  <script src="vendor/sweetalert/dist/sweetalert.min.js"></script>



</body>

</html>
