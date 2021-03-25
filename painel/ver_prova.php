<?php header('Content-Type: text/html; charset=utf-8');  include 'PHP/seguranca.php' ; ?>

<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <title>Candidatos a Anjo - Eyhe</title>
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
    min-width: 150px;
    max-width: 150px;
    height: auto;
    -webkit-box-shadow: 6px 9px 5px 0px rgba(199,193,199,1);
  -moz-box-shadow: 6px 9px 5px 0px rgba(199,193,199,1);
  box-shadow: 6px 9px 5px 0px rgba(199,193,199,1);
    margin-bottom: 10px;
    object-fit: cover;
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
              $idcandidato = $_GET['idcandidato'];
              include ('engine/conecta.php');
                $consulta = $conexao->query("SELECT * FROM queroseranjo WHERE id = $idcandidato");
                  while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
                      $nome = $linha['nome'];
                      $prova = $linha['prova'];
                      $dataprova  = $linha['dataprova'];
                  }

              ?>
                  <div class="card bg-white">
                    <div class="card-header">
                        Prova do candidato <u><?php echo $nome; ?></u> </b>
                    </div>
                    <div class="card-block">
                      <div class="row m-a-0">


                        <div class="col-lg-10 col-sm-12 col-md-8">
                          <?php

                            $consulta2 = $conexao->query("SELECT * FROM provadosanjos WHERE idanjo = $idcandidato");
                              while ($linha2 = $consulta2->fetch(PDO::FETCH_ASSOC)) {
                                  $prova = json_encode($linha2['prova'], JSON_UNESCAPED_UNICODE);
                                  $dataprova  = $linha2['dataprova'];
                              }

                              $pedacos = explode('\"', $prova);
                          ?>



                          <p>Data da realização da prova: <u><?php echo date('d/m/Y', strtotime($dataprova));?></u></p>
                          <br/>
                          <p><b>1) Em uma conversa, qual o seu nível de responsabilidade?</b> <?php echo $pedacos[7]; ?></p></br>
                          <p><b>2) Selecione as alternativas que você considerar verdadeiras?</b> <?php echo $pedacos[11]; ?></p></br>
                          <p><b>3) Selecione as alternativas que você considera fazer parte do conceito de escuta ativa:</b> <?php echo $pedacos[15]; ?></p></br>
                          <p><b>4) O que é a empatia?</b> <?php echo $pedacos[19]; ?></p></br>
                          <p><b>5) Quando for falar sobre a experiência, o que você deve evitar?</b> <?php echo $pedacos[23]; ?></p></br>
                          <p><b>6) De acordo com a necessidade de preservar sua saúde mental, o que é mais importante em uma conversa?</b> <?php echo $pedacos[27]; ?></p></br>
                          <p><b>7) Em relação à pessoas com orientação sexual diferente da sua, você considera que:</b> <?php echo $pedacos[31]; ?></p></br>
                          <p><b>8) Em relação à pessoas de diferentes etnias, imigrantes refugiados ou pessoas que não tem a mesma origem que a sua, você acredita que:</b> <?php echo $pedacos[35]; ?></p></br>
                          <p><b>9) Em relação às diferenças de gênero, você considera que: </b> <?php echo $pedacos[39]; ?></p></br>
                          <p><b>10) Dia para ligação </b> <?php echo date('d/m/Y', strtotime($pedacos[43])); ?></p></br>
                          <p><b>11) Hora para ligação </b> <?php echo $pedacos[47]; ?></p></br>

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

  <script src="vendor/sweetalert/dist/sweetalert.min.js"></script>



  <!-- endbuild -->
</body>

</html>
