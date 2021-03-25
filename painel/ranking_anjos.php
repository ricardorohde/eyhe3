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

  <link rel="stylesheet" href="ranking/css.min/datatable.min.css">
  <link rel="stylesheet" href="ranking/css.min/bootstrap-table.min.css">



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


        <div class="card bg-white">
          <div class="card-header">
              RANKING DE ANJOS
          </div>
          <div class="card-block">
            <div class="row m-a-0">
              <div class="col-lg-12">

                <!-- aqui vai a tabela -->

                <table id="dynamic-table-1" class="table"
                     data-id-field="code"
                     data-sort-name="value1"
                     data-sort-order="desc"
                     data-show-chart="false"
                     data-pagination="false"
                     data-show-pagination-switch="false">
                  <thead>
                      <tr>
                          <th data-field="code" data-sortable="true">Nome do Anjo</th>
                          <th data-field="geral" data-sortable="true">Chamadas</th>
                          <th data-field="chats" data-sortable="true">Conversou</th>
                          <th data-field="matchs" data-sortable="true">Atrasou</th>
                          <th data-field="naoatendidas" data-sortable="true">Não atendeu</th>
                          <th data-field="avaliacoes" data-sortable="true">Avaliações</th>

                  </thead>
                  <tbody>

                    <?php
                     /*
                      autor: guilherme menegussi
                      data: 04/04/2019 16:42

                      objetivo: gerar json com listagem de anjos e quantidade de chats, matchs e não atendimentos de cada um
                      objetivo 2: gerar tbm tempo de cada um online e tempo médio de resposta!

                     */

                     include ('engine/conecta.php');
                     $consulta = $conexao->query("SELECT * FROM anjos WHERE status = 1 ORDER BY nome ASC");

                      while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
                        $nomeanjo = $linha['nome'];
                        $idanjo = $linha['id'];
                        $qtdnaoatendido = 0;
                        $qtdchat = 0;
                        $qtdmatch = 0;
                        $qtdgeral = 0;

                        $consulta_interna = $conexao->query("SELECT count(id) as qtdgeral, tabela FROM conversas WHERE idanjo = $idanjo");
                        while ($linha_interna = $consulta_interna->fetch(PDO::FETCH_ASSOC)) {
                            $qtdgeral = $linha_interna['qtdgeral'];
                        }

                        $consulta_avaliacoes = $conexao->query("SELECT count(id) as qtd FROM avaliacoes_new WHERE idanjo = $idanjo");
                        while ($linha_avaliacao = $consulta_avaliacoes->fetch(PDO::FETCH_ASSOC)) {
                            $qtd_avaliacoes = $linha_avaliacao['qtd'];
                        }

                        echo "<tr>
                              <td><b>$nomeanjo</b></td>
                              <td>$qtdgeral</td>
                              <td>$qtdchat</td>
                              <td>$qtdmatch</td>
                              <td>$qtdnaoatendido</td>
                              <td>$qtd_avaliacoes</td>
                              </tr>";
                      }





                     ?>



                  </tbody>
              </table>

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

  <script type="text/javascript" src="ranking/js.min/datatable.min.js"></script>
  <script type="text/javascript" src="ranking/js.min/bootstrap-table.min.js"></script>
  <script type="text/javascript" src="ranking/js.min/Chart.bundle.min.js"></script>
  <script type="text/javascript" src="ranking/js.min/moment.min.js"></script>

  <script type="text/javascript">
        // https://toni-heittola.github.io/js-datatable/
        $( document ).ready(function() {
            $('#dynamic-table-1').datatable({});
        });
</script>



  <!-- endbuild -->
</body>

</html>
