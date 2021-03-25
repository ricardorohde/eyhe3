<?php include 'PHP/seguranca.php' ; ?>

<?php
  $id = (int)$_GET['id'];

  include ('engine/conecta.php');
  $consulta = $conexao->query("SELECT * FROM anjos  WHERE id = $id limit 1");
    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
        $nome = $linha['nome'];
        $email = $linha['email'];
        $avatar = $linha['avatar'];
        $textovitrini = $linha['textovitrini'];
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

  <link rel="stylesheet" href="vendor/sweetalert/dist/sweetalert.css">

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

#vitrini{
  padding: none;
  margin: none;
  text-align: left;
  min-height: 100px;
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
              Anjos já cadastrados
            </div>
            <div class="card-block">
              <div class="row m-a-0">
                <div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
                   
                            <center>
                              <img class="avatar-anjo" src="<?php echo $avatar; ?>" />
                              <h1 class="nomeanjo" ><b><?php echo $nome; ?></b></h1><br/>

                              <form id="editar-perfil-anjo" method="post" action="" class="form-horizontal">
                                <input type="email" name="email" value="<?php echo $email;?>" class="form-control" />
                                <input type="hidden" name="id" value="<?php echo $id;?>" />

                                <br/><br/>

                                <p><b>Texto da Vitrini</b></p>
                                <textarea name="textovitrini" class="form-control" id="vitrini">
                                    <?php echo $textovitrini; ?>                                    
                                </textarea>

                                <br/>

                                <center><button type="submit"> Salvar </button></center>
                              </form>
                              <br/><br/>
                            </center>                      

                    </div>
                </div>
              </div>
            </div>

            <?php

              include ('engine/conecta.php');
                $consulta = $conexao->query("SELECT * FROM avaliacoes WHERE idanjo = $id ORDER BY id ASC");
                  while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
                    $idheroi = $linha['idheroi'];

                    $consulta2 = $conexao->query("SELECT nome FROM tab_usuario WHERE id = $idheroi LIMIT 1");
                      while ($linha2 = $consulta2->fetch(PDO::FETCH_ASSOC)) {
                        $nomeheroi = $linha2['nome'];
                      }

            ?>
                  <div class="card bg-white">
                    <div class="card-header">
                        Avaliação #<?php echo $linha['id']; ?>
                    </div>
                    <div class="card-block">
                      <div class="row m-a-0">
                        <div class="col-lg-12">
                          <p><b>Nome do herói:</b> <?php echo $nomeheroi; ?></p>
                          <p><b>Avaliação feita em:</b> <?php echo date('d/m/Y H:i:s', strtotime($linha['dataavaliacao'])); ?></p>
                          <p><b>Como o herói se sentiu durante a conversa:</b> <?php echo $linha['sentimento']; ?></p>
                          <p><b>Sobre o tempo de resposta:</b> <?php echo $linha['tempo']; ?></p>
                          <p><b>Observações: </b> <?php echo $linha['observacoes']; ?></p>
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



  <script type="text/javascript">
       jQuery(document).ready(function(){
           jQuery('#editar-perfil-anjo').submit(function(){
               jQuery.ajax({
                   type: "POST",
                   url: "engine/editar_perfil_anjo.php",
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
                    if(data == 'Anjo atualizado com sucesso!'){
                      swal('Bom trabalho!', data, 'success');
                      setTimeout(function(){
                        location.reload();
                      }, 3000);
                    }else{
                      swal('Ops..', data, 'error');
                      /*setTimeout(function(){
                          window.location.href = "novo_anjo.php"
                      }, 3000);*/
                    }
                  }
               });
               $("#editar_perfil_anjo").trigger("reset");
               return false;
           });
       });

  </script>
  <!-- endbuild -->
</body>

</html>
