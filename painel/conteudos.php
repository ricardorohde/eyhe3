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

  <!-- data table -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">  


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

.capa-blog{
  max-width: 100%;
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
              Artigos cadastrados
            </div>
            <div class="card-block">
              <div class="row m-a-0">
                <div class="col-lg-12">
                    <div class="row">
                       <table id="conteudos" class="display" style="width:100%">

                        <thead>
                            <tr>
                                <th>Imagem</th>
                                <th>Nº do artigo</th>
                                <th>Titulo</th>
                    
                                <th>Data de publicação</th>
                                <th>Excluir</th>
                                <th>Editar</th>
                            </tr>
                        </thead>

                        <tbody>
                    <?php
                        include ('engine/conecta.php');
                        $consulta = $conexao->query("SELECT * FROM blog ORDER BY id desc ");
                        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {

                    ?>


                              <tr>
                                  <td><img width="120" height="70" src="painel/<?php echo $linha['imagem_destaque']; ?>" /></td>
                                  <td><center><?php echo $linha['id']; ?></center></td>
                                  <td><b><?php echo $linha['titulo']; ?></b></td>                                  
                                  <td><center><?php echo date('d/m/Y ', strtotime($linha['data_liberacao'])); ?></center></td>
                                  <td><center><a class='excluir-artigo' data-id='<?php echo $linha['id']; ?>'><img src="images/excluir.png" width="40" height="40"></img></a><center></td>
                                  <td><center><a href="editar_artigo.php?r=<?php echo $linha['url'];?>&q=<?php echo $linha['id'];?>"><img src="images/link.png" width="40" height="40"></a></center></td>
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
  <!-- endbuild -->

  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
  <script>
    $(document).ready(function() {
        $('#conteudos').DataTable({
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

   <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


        <script>
          $( ".excluir-artigo" ).click(function() {
            var id = jQuery(this).attr("data-id");
            // confirm dialog

            swal("Tem certeza que deseja excluir esse artigo?", {
              buttons: {
                cancel: "Não",
                catch: {
                  text: "Sim, pode excluir!",
                  value: "catch",
                },
                defeat: false,
              },
            })
            .then((value) => {
              switch (value) {

                case "catch":
                  jQuery.ajax({
                      type: "POST",
                      url: "engine/excluir_artigo_blog.php",
                      data: {
                          identificador: id
                      },

                      success: function(data)
                      {
                        swal("Feito!", data, "success");
                        setTimeout(function(){
                           window.location.reload();
                        }, 1000);

                      },

                  });
                  break;



                default:

              }
            });

          });
        </script>

</body>

</html>
