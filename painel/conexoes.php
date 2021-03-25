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
  <!-- endbuild -->

  <!-- page stylesheets -->
 <link rel="stylesheet" href="vendor/sweetalert/dist/sweetalert.css">


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
          <div class="title"><i class="icon-umbrella"></i> CONEXÕES</div>
          <!--<div class="sub-title">Visualize aqui quais as conexões criadas entre heróis e anjos.</div>-->
        </div>
        <div class="card bg-white">
          <div class="card-header">

          <H6><B>Mostrando apenas as 100 últimas conexões entre heróis e anjos.</B></H6>
          </div>
          <div class="card-block">
            <div class="row m-a-0">
              <div class="col-lg-12">

                <?php
                  include ('engine/conecta.php');

                  $consulta = $conexao->query("SELECT * FROM conversas WHERE (premium is NULL) ORDER BY datainicio DESC LIMIT 100");
                    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {

                        $idanjo = $linha['idanjo'];
                        $idheroi = $linha['idheroi'];
                        $tabela = $linha['tabela'];         

                        //  QUANTAS MALDITAS MENSAGENS TEM DENTRO DE CADA TABELA DESSA ?

                        $query = 'SELECT count(id) as qtd FROM '.$tabela;
                        $consultaqtd = $conexao->query($query);
                        while ($linhaqtd = $consultaqtd->fetch(PDO::FETCH_ASSOC)) {
                          $quantidade = $linhaqtd['qtd'];
                        }              

                                                
                        $consulta2 = $conexao->query("SELECT nome FROM anjos WHERE id = $idanjo limit 1");
                        while ($linha2 = $consulta2->fetch(PDO::FETCH_ASSOC)) {
                          $nomeanjo = $linha2['nome'];
                        }

                        $consulta3 = $conexao->query("SELECT nome FROM tab_usuario WHERE id = $idheroi limit 1");
                        while ($linha3 = $consulta3->fetch(PDO::FETCH_ASSOC)) {
                          $nomeheroi = $linha3['nome'];
                        }

                      
                        
                        if($quantidade > 1) {

                          $qtd_msg_anjo = 0;
                          // se existe mais que 1 mensagens na tabela e o anjo só enviou 1 -> ta rolando FALTA DE ATENDIMENTO !
                          $consulta4 = $conexao->query('SELECT remetente FROM '.$tabela.'');
                          while ($linha4 = $consulta4->fetch(PDO::FETCH_ASSOC)) {
                            if(substr($linha4['remetente'],0,1) == 'a'){
                               $qtd_msg_anjo++;
                            }
                          }

                          if($qtd_msg_anjo > 1){
                            $tipo = 'CHAT';
                            $div =  '<div class="alert alert-success" style="font-size: 15px;">
                                      <i class="icon-bubbles"></i> O herói <b>'.$nomeheroi.'</b> está em CHAT com o anjo <b>'.$nomeanjo.'</b> desde
                                      <u>'.date('d/m/Y H:i:s', strtotime($linha['datainicio'])).'</u>
                                    </div>';
                          }else{
                            $tipo = 'FALTA DE ATENDIMENTO';
                            $div =  '<div class="alert alert-danger" style="font-size: 15px;">
                                      <i class="icon-flag"></i> O herói <b>'.$nomeheroi.'</b> ainda não foi atendido pelo anjo <b>'.$nomeanjo.'</b>.
                                      <u>'.date('d/m/Y H:i:s', strtotime($linha['datainicio'])).'</u>
                                    </div>';
                          }
                        }
                        else{

                          $tipo = 'MATCH';
                          $div =  '<div class="alert alert-warning" style="font-size: 15px;">
                                    <i class="icon-size-actual"></i> O herói <b>'.$nomeheroi.'</b> deu MATCH com o anjo <b>'.$nomeanjo.'</b> em
                                    <u>'.date('d/m/Y H:i:s', strtotime($linha['datainicio'])).'</u>
                                  </div>';
                        }

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
