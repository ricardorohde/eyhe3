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
  <link rel="stylesheet" href="vendor/multiselect/css/multi-select.css">
  <!-- endbuild -->

  <!-- page stylesheets -->
 <link rel="stylesheet" href="vendor/sweetalert/dist/sweetalert.css">
 <link rel="stylesheet" href="vendor/select2/dist/css/select2.css">



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
          <div class="title"><i class="icon-tag"></i> AGRUPAR TAGS</div>
          <div class="sub-title">Cadastre as tags dentro de grupos! Isso irá fortalecer nosso match :D</div>
        </div>
        <div class="card bg-white">
          <div class="card-header">
            Selecione as tags que melhor encaixar nos temas:
          </div>
          <div class="card-block">
            <div class="row m-a-0">
              <div class="col-lg-12">

                <form method="post" action="" id="agrupamento">
                  <p>Agrupamento: <b>RELACIONAMENTO</b></p>
                  <div class="form-group" style="margin-top: 5px!important; margin-bottom: 10px!important;">
                      <div class="col-sm-12" style="margin-bottom: 30px;">
                        <select multiple class="multiselect" name="relacionamento[]">
                         <?php
                                include ('engine/conecta.php');

                                //vou criar um array com todas as tags de relacionamento e ver se cada option pertence ao aray

                                $consulta = $conexao->query("SELECT * FROM agrupamento WHERE grupo = 'relacionamento' ");
                                while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
                                  $tags = $linha['tags'];
                                  $tags = explode(",", $tags);

                                }
                                $consulta = $conexao->query("SELECT * FROM tags WHERE tipo = 'desafio' || tipo = 'interesse' ORDER BY nome ASC");
                                  while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
                                    if (in_array($linha['nome'], $tags)){
                                       echo "<option value='".$linha['nome']."' selected>".$linha['nome']."</option>";
                                    }else{                               
                                      echo "<option value='".$linha['nome']."'>".$linha['nome']."</option>";
                                    }
                                  }
                               ?>
                        </select>
                      </div>
                  </div>

                  <hr/>

                  <p>Agrupamento: <b>ESPIRITUALIDADE</b></p>
                  <div class="form-group" style="margin-top: 5px!important; margin-bottom: 10px!important;">
                      <div class="col-sm-12" style="margin-bottom: 30px;">
                        <select multiple class="multiselect" name="espiritualidade[]">
                         <?php
                                include ('engine/conecta.php');
                                $consulta = $conexao->query("SELECT * FROM agrupamento WHERE grupo = 'espiritualidade' ");
                                while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
                                  $tags = $linha['tags'];
                                  $tags = explode(",", $tags);

                                }
                                $consulta = $conexao->query("SELECT * FROM tags WHERE tipo = 'desafio' || tipo = 'interesse' ORDER BY nome ASC");
                                  while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
                                    if (in_array($linha['nome'], $tags)){
                                       echo "<option value='".$linha['nome']."' selected>".$linha['nome']."</option>";
                                    }else{                               
                                      echo "<option value='".$linha['nome']."'>".$linha['nome']."</option>";
                                    }
                                  }
                               ?>
                        </select>
                      </div>
                  </div>

                  <hr/>

                  <p>Agrupamento: <b>SAÚDE/BEM-ESTAR</b></p>
                  <div class="form-group" style="margin-top: 5px!important; margin-bottom: 10px!important;">
                      <div class="col-sm-12" style="margin-bottom: 30px;">
                        <select multiple class="multiselect" name="saudebemestar[]">
                         <?php
                                include ('engine/conecta.php');
                                $consulta = $conexao->query("SELECT * FROM agrupamento WHERE grupo = 'saude' ");
                                while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
                                  $tags = $linha['tags'];
                                  $tags = explode(",", $tags);

                                }
                                $consulta = $conexao->query("SELECT * FROM tags WHERE tipo = 'desafio' || tipo = 'interesse' ORDER BY nome ASC");
                                  while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
                                    if (in_array($linha['nome'], $tags)){
                                       echo "<option value='".$linha['nome']."' selected>".$linha['nome']."</option>";
                                    }else{                               
                                      echo "<option value='".$linha['nome']."'>".$linha['nome']."</option>";
                                    }
                                  }
                               ?>
                        </select>
                      </div>
                  </div>

                  <hr/>

                  <p>Agrupamento: <b>FINANCEIRO</b></p>
                  <div class="form-group" style="margin-top: 5px!important; margin-bottom: 10px!important;">
                      <div class="col-sm-12" style="margin-bottom: 30px;">
                        <select multiple class="multiselect" name="financeiro[]">
                         <?php
                                include ('engine/conecta.php');
                                $consulta = $conexao->query("SELECT * FROM agrupamento WHERE grupo = 'financeiro' ");
                                while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
                                  $tags = $linha['tags'];
                                  $tags = explode(",", $tags);

                                }
                                $consulta = $conexao->query("SELECT * FROM tags WHERE tipo = 'desafio' || tipo = 'interesse' ORDER BY nome ASC");
                                  while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
                                    if (in_array($linha['nome'], $tags)){
                                       echo "<option value='".$linha['nome']."' selected>".$linha['nome']."</option>";
                                    }else{                               
                                      echo "<option value='".$linha['nome']."'>".$linha['nome']."</option>";
                                    }
                                  }
                               ?>
                        </select>
                      </div>
                  </div>

                  <button type="submit" class="btn btn-info">Salvar agrupamento</button>
                </form>

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
  <script src="vendor/multiselect/js/jquery.multi-select.js"></script>

  <!-- endbuild -->

  <!-- page scripts -->
  <script src="vendor/sweetalert/dist/sweetalert.min.js"></script>

  <script type="text/javascript"> 
    $('.multiselect').multiSelect();
  </script>

  <script type="text/javascript">
       jQuery(document).ready(function(){
           jQuery('#agrupamento').submit(function(){
               jQuery.ajax({
                   type: "POST",
                   url: "engine/recebe_agrupamento.php",
                   data: new FormData(this),
                   processData: false,
                   contentType: false,
                   beforeSend: function(){
                     swal({
                            title: 'Aguarde..!',
                            text: 'Aguarde enquanto trabalhamos..',
                            imageUrl: 'images/avatar.jpg'
                          });
                   },
                   success: function(data)
                   {
                     swal('Bom trabalho!', 'Agrupamento salvo com sucesso.', 'success');
                     setTimeout(function(){
                        window.location.href = "agrupar.php"
                     }, 6000);
                     
                   }
               });
           });
       });
</script>

</body>

</html>
