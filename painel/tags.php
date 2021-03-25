
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
          <div class="title"><i class="icon-tag"></i> TAGS</div>
          <div class="sub-title">Crie, edite e exclua desafios e interesses de anjos e usuários</div>
        </div>
        <div class="card bg-white">
          <div class="card-header">
            Digite o nome da sua tag (categoria, interesse e/ou desafio) e clique em salvar !
          </div>
          <div class="card-block">
            <div class="row m-a-0">
              <div class="col-lg-12">
                <form class="form-horizontal" id="nova_tag" role="form" action="" method="post">

                  <div class="form-group">
                    <label class="col-sm-2 control-label">TAG:</label>
                    <div class="col-sm-4">
                      <input type="text" name="tag_name" class="form-control" required>
                    </div>
                  </div>

                  <div class="form-group">
                   <label class="col-sm-2 control-label">TIPO:</label>
                   <div class="col-sm-2">
                     <select class="form-control" name="tipo">
                       <option value="desafio">Desafio</option>
                       <option value="interesse">Interesse</option>
                       <option value="categoria">Categoria do blog</option>
                     </select>
                   </div>
                   <div class="col-sm-4">
                     <button type="submit" class="btn btn-info">Salvar</button>
                   </div>
                 </div>

                </form>
              </div>
            </div>
          </div>
        </div>

        <div class="card bg-white">
          <div class="card-header">
            Lista de Tags cadastradas
          </div>
          <div class="card-block">
            <div class="row m-a-0">
              <div class="col-lg-12">
                <?php

                  include ('engine/conecta.php');                       
                    $consulta = $conexao->query("SELECT * FROM tags ORDER BY nome ASC");
                      while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
                        echo "<h4><i class='icon-tag'></i> ".$linha['nome']."</h4>";
                        echo "<h6>".$linha['tipo']."</h6>";
                        echo "<a class='excluir' data-id=".$linha['id']."><i class='icon-trash'></i>Excluir</a>";
                        echo "<hr/>";
                                                
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

  <script type="text/javascript">
       jQuery(document).ready(function(){
           jQuery('#nova_tag').submit(function(){
               jQuery.ajax({
                   type: "POST",
                   url: "engine/recebe_nova_tag.php",
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
                     swal('Bom trabalho!', data, 'success');
                     setTimeout(function(){
                        window.location.href = "tags.php"
                     }, 3000);
                   }
               });
               $("#nova_tag").trigger("reset");
               return false;
           });
       });
</script>

 <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


        <script>
          $( ".excluir" ).click(function() {
            var id = jQuery(this).attr("data-id");
            //data: {identificador: id}
            var r = confirm("Tem certeza que deseja excluir essa tag? !\n Clique OK ou Cancele.");
            if (r == true) {
              txt = "You pressed OK!";
               jQuery.ajax({
                   type: "POST",
                   url: "painel/engine/excluir_tag.php",
                   data: {
                       identificador: id
                   },
                   beforeSend: function(){

                     swal({
                            title: 'Aguarde..!',
                            text: 'Estamos trabalhando..',
                            imageUrl: 'painel/images/avatar.jpg'
                          });
                   },
                   success: function(data)
                   {
                     alert(data);
                  }
               });
            } else {

            }

          });
</script>

</body>

</html>
