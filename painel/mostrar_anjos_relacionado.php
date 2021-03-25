<?php include 'PHP/seguranca.php' ; ?>

<?php
    include ('engine/conecta.php');
	$id = (int)$_GET['q'];

	$consulta = $conexao->query("SELECT nome FROM tags WHERE id = '$id' LIMIT 1");
    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
    	$nome = $linha['nome'];
    }
?>
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
          <div class="title">Anjos relacionados com: <b><?php echo $nome; ?></b></div>
          <div class="sub-title"><a href="tags.php">Voltar</a></div>
        </div>
        <div class="card bg-white">
          <div class="card-header">
           Listagem de anjos: 
          </div>
          <div class="card-block">
            <div class="row m-a-0">
              <div class="col-lg-12">
                <?php
                $sql = "SELECT nome FROM anjos a 
                        INNER JOIN relacao_tag_anjo ran
                        ON ran.anjo_id = a.id
                        WHERE ran.tag_id = 10 ";
                echo $sql;
                $consulta = $conexao->query($sql);
                while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
                    $nome = $linha['nome'];
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
