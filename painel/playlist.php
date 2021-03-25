<?php include 'PHP/seguranca.php' ; ?>
<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <title>EYHE - Playlists</title>
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
          <div class="title"><i class="icon-music-tone-alt"></i> PLAYLISTS</div>
          <div class="sub-title">Crie, edite e exclua playlists que irão incentivar e inspirar nossos heróis!</div>
        </div>
        <div class="card bg-white">
          <div class="card-header">
            Digite o nome da sua Playlist e escolha uma bela capa, depois é só clicar em Salvar !
          </div>
          <div class="card-block">
            <div class="row m-a-0">
              <div class="col-lg-12">
                <form class="form-horizontal" id="nova_playlist" role="form" action="" method="post" enctype="multipart/form-data">

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Nome da Playlist:</label>
                    <div class="col-sm-4">
                      <input type="text" name="nome" class="form-control" required placeholder="Ex: Playlist para meditação">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Capa da Playlist:</label>
                    <div class="col-sm-4">
                      <input type="file" name="capa" class="form-control" required>
                    </div>
                    <h6>Use uma imagem de boa qualidade e com grande apelo emocional ;) </h6>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Keywords:</label>
                    <div class="col-sm-4">
                      <input type="text" name="keywords" class="form-control" required placeholder="Preencha as keywords separadas por virgula">
                    </div>
                  </div>


                   <div class="col-sm-4">
                     <button type="submit" class="btn btn-info">Cadastrar</button>
                   </div>
                 </div>

                </form>
              </div>
            </div>
          </div>
        </div>

        <div class="card bg-white">
          <div class="card-header">
            Lista de playlists cadastradas
          </div>
          <div class="card-block">
            <div class="row m-a-0">

              <?php

                include ('engine/conecta.php');
                  $consulta = $conexao->query("SELECT * FROM playlists ORDER BY id desc");
                    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {

              ?>
                      <div class="col-sm-4">
                        <div class="card bg-white">
                          <img class="card-img-top img-responsive" src="<?php echo $linha['capa']; ?>" alt="Card image cap">
                          <div class="card-block">
                            <h4 class="card-title"><?php echo $linha['nome']; ?></h4>
                            <p class="card-text"><?php echo $linha['keywords']; ?></p>

                            <div class="row">
                              <div class="col-sm-6">
                                <button class="btn btn-info">Gerenciar músicas</button>
                              </div>
                              <div class="col-sm-6">
                                <button class="btn btn-danger">Excluir playlist</button>
                              </div>
                            </div>

                            </p>
                          </div>
                        </div>
                      </div>

                <?php } ?>


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
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <script type="text/javascript">
       jQuery(document).ready(function(){
           jQuery('#nova_playlist').submit(function(){
               jQuery.ajax({
                   type: "POST",
                   url: "engine/recebe_nova_playlist.php",
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
                        window.location.href = "playlist.php"
                     }, 3000);
                   }
               });
               $("#nova_playlist").trigger("reset");
               return false;
           });
       });
</script>



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
