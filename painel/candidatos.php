<?php include 'PHP/seguranca.php' ; ?>

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

              include ('engine/conecta.php');
                $consulta = $conexao->query("SELECT * FROM queroseranjo ORDER BY datacadastro desc");
                  while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {

            ?>
                  <div class="card bg-white">
                    <div class="card-header">
                        Candidato nº<b> <?php echo $linha['id']; ?> </b>
                    </div>
                    <div class="card-block">
                      <div class="row m-a-0">

                        <div class="col-lg-2 col-sm-12 col-md-4">
                            <img src="<?php echo $linha['fotoperfil']; ?>" class="avatar-anjo" />
                            <br/><br/>
                            <?php
                              $idcanditado = $linha['id'];
                              $contador = 0;
                              $consulta2 = $conexao->query("SELECT * FROM provadosanjos  WHERE idanjo = $idcanditado limit 1");
                                while ($linha2 = $consulta2->fetch(PDO::FETCH_ASSOC)) {
                                  $contador++;
                                }

                                if($contador > 0){

                            ?>
                                <a href="ver_prova.php?idcandidato=<?php echo $idcanditado;?>" target="_blank" class="btn btn-success btn-sm btn-icon mr5">
                                    <i class="icon-cloud-upload"></i>
                                    <span>Prova disponível</span>
                                </a>

                            <?php } ?>
                            <br/><br/>
                        </div>

                        <div class="col-lg-10 col-sm-12 col-md-8">
                          <p><b>Nome do candidato:</b> <?php echo $linha['nome']; ?></p>
                          <p><b>Data do cadastro:</b> <?php echo date('d/m/Y H:i:s', strtotime($linha['datacadastro'])); ?></p>

                          <p><b>E-mail:</b> <?php echo $linha['email']; ?></p>
                          <p><b>Telefone celular:</b> <?php echo $linha['celular']; ?></p>
                          <p><b>Confirmação celular:</b> <?php echo $linha['celularconfirmado']; ?></p>
                          <p><b>Cidade/UF:</b> <?php echo $linha['cidade']; ?> - <?php echo $linha['estado']; ?></p>
                          <p><b>Desafio:</b> <?php echo $linha['desafio']; ?> </p>
                          <p><b>Porque:</b> <?php echo $linha['motivo']; ?> </p>

                          <br/>
                          <p><u>Documentos</u></p>
                          <a href="https://eyhe.com.br/painel/<?php echo $linha['frentedoc']; ?>" target="_blank" class="btn btn-info btn-xs">Frente do documento</a>
                          <br/><br/>
                          <a href="https://eyhe.com.br/painel/<?php echo $linha['versodoc']; ?>" target="_blank" class="btn btn-info btn-xs">Verso do documento</a>


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
