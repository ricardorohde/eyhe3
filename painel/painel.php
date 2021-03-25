<?php include 'PHP/seguranca.php'; ?>

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
  <!-- endbuild -->
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

        <div class="card bg-white">
            <div class="card-header">
              Alguns números gerais sobre nossa plataforma..
            </div>
            <div class="card-block">
              <div class="row m-a-0">
                <div class="col-lg-12">

                  <p><b> Dados gerais: </b><p>

                  <?php
                    include ('engine/conecta.php');
                    $consulta = $conexao->query("SELECT count(*) as qtd FROM tab_usuario");
                      while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
                        $qtd = $linha['qtd'];
                      }

                    $consulta2 = $conexao->query("SELECT count(*) as qtd FROM anjos");
                      while ($linha2 = $consulta2->fetch(PDO::FETCH_ASSOC)) {
                        $qtd2 = $linha2['qtd'];
                      }

                    $consulta3 = $conexao->query("SELECT count(*) as qtd FROM avaliacoes_new");
                      while ($linha3 = $consulta3->fetch(PDO::FETCH_ASSOC)) {
                        $qtd3 = $linha3['qtd'];
                      }

                    $consulta4 = $conexao->query("SELECT count(*) as qtd FROM conversas");
                      while ($linha4 = $consulta4->fetch(PDO::FETCH_ASSOC)) {
                        $qtd4 = $linha4['qtd'];
                      }

                    $consulta5 = $conexao->query("SELECT cliquesvideo FROM infos WHERE id = 1");
                      while ($linha5 = $consulta5->fetch(PDO::FETCH_ASSOC)) {
                        $qtd5 = $linha5['cliquesvideo'];
                      }

                    $consulta6 = $conexao->query("SELECT count(*) as qtd FROM pagamentos ");
                    while ($linha6 = $consulta6->fetch(PDO::FETCH_ASSOC)) {
                      $qtd6 = $linha6['qtd'];
                    }

                    $consulta7 = $conexao->query("SELECT count(*) as qtd FROM pagamentos WHERE status = 'Pagamento confirmado' ");
                    while ($linha7 = $consulta7->fetch(PDO::FETCH_ASSOC)) {
                      $qtd7 = $linha7['qtd'];
                    }

                    $consulta8 = $conexao->query("SELECT count(*) as qtd FROM testestress");
                    while ($linha8 = $consulta8->fetch(PDO::FETCH_ASSOC)) {
                      $qtd8 = $linha8['qtd'];
                    }


                    //consultas de envolvendo o dia atual
                    /*date_default_timezone_set('America/Sao_Paulo');
                    $datahoje = date('Y-m-d');

                    $consulta9 = $conexao->prepare('SELECT id FROM tb_usuario
                                                    WHERE SUBSTRING(datacadastro, 1, 10) =:datahoje  ');
                                                    $consulta9->bindParam(':datahoje', $datahoje, PDO::PARAM_STR);
                                                    $consulta9->execute();
                                                    $qtd9 = $consulta->rowCount();*/


                  ?>



                  <p style="font-size: 20px"><span style="color: #a239ff;"><?php echo $qtd; ?></span> HERÓIS</p>
                  <p style="font-size: 20px;"><span style="color: #a239ff;"><?php echo $qtd2; ?></span> ANJOS</p>
                  <p style="font-size: 20px"><span style="color: #a239ff;"><?php echo $qtd3; ?></span> AVALIAÇÕES</p>
                  <p style="font-size: 20px"><span style="color: #a239ff;"><?php echo $qtd4; ?></span> CONVERSAS</p>

                   <p style="font-size: 20px">
                    <span style="color: #a239ff;"><?php echo $qtd7; ?></span>
                    PAGAMENTO CONFIRMADOS
                  </p>

                  <hr/>

                  <p><b> Dados de hoje: </b><p>


                    <p style="font-size: 15px"><span style="color: #a239ff;"><?php echo 'xx'; ?></span> Heróis cadastrados hoje pelo E-mail </p>
                    <p style="font-size: 15px"><span style="color: #a239ff;"><?php echo 'xx'; ?></span> Heróis cadastrados hoje pelo Facebook </p>
                    <p style="font-size: 15px"><span style="color: #a239ff;"><?php echo 'xx'; ?></span> Heróis cadastrados hoje pelo Google </p>
                    <p style="font-size: 15px"><span style="color: #a239ff;"><?php echo '$qtd9'; ?></span> Heróis cadastrados hoje </p>


                    <hr/>

                    <p style="font-size: 15px"><span style="color: #a239ff;"><?php echo 'xx'; ?></span> Atendimentos requisitados </p>
                    <p style="font-size: 15px"><span style="color: #a239ff;"><?php echo 'xx'; ?></span> Atendimentos efetuados </p>
                    <p style="font-size: 15px"><span style="color: #a239ff;"><?php echo 'xx'; ?></span> Atendimentos perdidos </p>


                    <hr/>

                    <p style="font-size: 15px"><span style="color: #a239ff;"><?php echo 'xx'; ?></span> Anjo com mais atendimento</p>
                    <p style="font-size: 15px"><span style="color: #a239ff;"><?php echo 'xx'; ?></span> Anjo com menos atendimento </p>



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
</body>

</html>
