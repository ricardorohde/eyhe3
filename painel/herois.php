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




  <!-- data table -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">

  <!-- endbuild -->
</head>

<style>
.avatar-anjo{
    width: 150px;
    height: 150px;
    max-width: 150px;
    max-height: 150px;
    border-radius: 50%;
    margin-bottom: 10px;
    object-fit: cover;
    object-position: center;
}

.heroi-sem-img{
  width: 100px;
  height: 100px;
  border-radius: 50%;
  background-color: #0dddda;
  margin-bottom: 10px;
}
.texto{
  color: #fff;
  padding-top: 29%;
  font-size: 30px;
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
              Heróis já cadastrados
            </div>
            <div class="card-block">
              <div class="row m-a-0">
                <div class="col-lg-12">

                    <div class="row">

                      <table id="herois" class="display" style="width:100%">

                        <thead>
                            <tr>
                                <th>Avatar</th>
                                <th>Nº do herói</th>
                                <th>Nome</th>
                                <th>E-mail</th>
                                <th>Telefone</th>
                                <th>Qtd. Conversas</th>
                                <th>Data cadastro</th>
                            </tr>
                        </thead>

                        <tbody>


                    <?php
                        include ('engine/conecta.php');
                        $consulta = $conexao->query("SELECT * FROM tab_usuario ORDER BY id desc limit 1000");
                        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
                            $avatar = $linha['avatar'];
                            $idheroi = $linha['id'];

                            //quantas conversas esse heroi tem?
                            $consulta2 = $conexao->query("SELECT count(*) as qtd FROM conversas WHERE idheroi = $idheroi");
                            while ($linha2 = $consulta2->fetch(PDO::FETCH_ASSOC)) {
                              $qtd_conversas = $linha2['qtd'];
                            }
                    ?>
                        <tr>

                            <td><img src="<?php echo $avatar; ?>" width="30" height="30"></img></td>
                            <td><?php echo $linha['id']; ?></td>
                            <td><?php echo $linha['nome']; ?></td>
                            <td><?php echo $linha['email']; ?></td>
                            <td><?php echo $linha['telefone']; ?></td>
                            <td><center><?php echo $qtd_conversas; ?></center></td>
                            <td><?php echo date('d/m/Y H:i:s', strtotime($linha['datacadastro'])); ?></td>
                        </tr>


                    <?php } ?>
                      </tbody>
                    </table>

                    </div>
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


  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
  <script>
    $(document).ready(function() {
        $('#herois').DataTable({
          "language":{
                      "decimal":        "",
                      "emptyTable":     "Nenhum registro na tabela",
                      "info":           "Mostrando _START_ até _END_ de um total de _TOTAL_ registros",
                      "infoEmpty":      "Mostrando 0 para 0 de 0 registros",
                      "infoFiltered":   "(filtered from _MAX_ total entries)",
                      "infoPostFix":    "",
                      "thousands":      ",",
                      "lengthMenu":     "Mostrar: _MENU_ registros",
                      "loadingRecords": "Carregando...",
                      "processing":     "Processando...",
                      "search":         "Pesquisar:",
                      "zeroRecords":    "Nada foi encontrado :(",
                      "paginate": {
                          "first":      "Primeira",
                          "last":       "Última",
                          "next":       "Próxima",
                          "previous":   "Anterior"
                      },
                      "aria": {
                          "sortAscending":  ": activate to sort column ascending",
                          "sortDescending": ": activate to sort column descending"
                      }
                  }
        });
    });
  </script>
  <!-- endbuild -->
</body>

</html>
