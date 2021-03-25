<?php include 'PHP/seguranca.php' ; ?>

<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <title>Novo Anjo :: EYHE - Gerenciamento</title>
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
          <div class="title"> <i class="icon-users"></i>   ANJOS </div>
          <div class="sub-title">Use essa página para cadastar um novo anjo no sistema Eyhe</div>
        </div>
        <div class="card bg-white">
          <div class="card-header">
            Campos com (*) são obrigatórios
          </div>
          <div class="card-block">
            <div class="row m-a-0">

              <div class="col-lg-6 col-md-6 col-xs-12 col-ls-12">
                <form class="form-horizontal" id="novo_anjo" role="form" action="" method="post">     

                    <div class="form-group">
                      <label class="col-sm-4 control-label">* Nome Completo:</label>
                      <div class="col-sm-8">
                        <input type="text" name="nome" class="form-control" required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-4 control-label">* E-mail válido: </label>
                      <div class="col-sm-8">
                        <input type="email" name="email" class="form-control" required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-4 control-label">* Telefone/Celular: </label>
                      <div class="col-sm-8">
                        <input type="tel" name="telefone" class="form-control" required>
                      </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 control-label">* Cidade/UF: </label>
                        <div class="col-sm-8">
                          <input type="text" name="cidade" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-4 control-label">*Data de nascimento </label>
                      <div class="col-sm-8">
                        <input type="date" name="datanasc" class="form-control" required>
                      </div>
                    </div>

                    <div class="form-group">                      
                      <label class="col-sm-4 control-label">Status:</label>
                      <div class="col-sm-8">
                        <select class="form-control" name="status" required>
                          <option value="1">(1) Ativo</option>
                          <option value="2">(2) Inativo</option>
                        </select>
                      </div>                      
                    </div>

                    <div class="form-group">
                     <label class="col-sm-4 control-label">*Avatar (máx: 500x500): </label>
                     <div class="col-sm-8">
                       <input type="file" name="avatar" class="form-control" required>
                     </div>
                    </div>

                    <div class="form-group">

                     <label class="col-sm-4 control-label">Senha: </label>
                     <div class="col-sm-8">
                       <input type="password" name="senha" required class="form-control" value="9128378sadadsadsaa1434">
                     </div>
                    </div>


                
              </div>

              <div class="col-lg-6 col-md-6 col-xs-12 col-ls-12">

                <div class="form-group">                   
                  <label class="col-sm-2 control-label">*Biografia:</label>
                  <div class="col-sm-10">
                    <textarea  class="form-control" style="min-height: 110px; margin-bottom: 15px;" name="biografia" required></textarea>
                  </div>
                </div>
                
                <div class="form-group">
                     <label class="col-sm-2 control-label">Facebook: </label>
                     <div class="col-sm-10">
                       <input type="url" name="facebook" class="form-control" placeholder="Outra rede social também é válido">
                     </div>                    
                </div>

                <div class="form-group" style="margin-top: 20px!important;">
                  
                    <label class="col-sm-2 control-label" style="margin-top:15px;">*Desafios :</label>
                    <div class="col-sm-10">
                      <select name="desafios[]" data-placeholder="Escolha os desafios relacionadas a esse anjo" multiple  class="select2" style="width: 100%;">
                      
                      <?php
                        include ('engine/conecta.php');                       
                        $consulta = $conexao->query("SELECT * FROM tags WHERE tipo = 'desafio' ORDER BY nome ASC");
                          while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
                            echo "<option value='".$linha['nome']."'>".$linha['nome']."</option>";                            
                          }
                      ?>                      
                      </select>
                    </div>
                </div>

                <div class="form-group" style="margin-top: 20px!important;">
                  
                    <label class="col-sm-2 control-label" style="margin-top:15px;">*Interesses: </label>
                    <div class="col-sm-10">
                      <select name="interesses[]" data-placeholder="Escolha os interesses relacionadas a esse anjo" multiple  class="select2" style="width: 100%;">
                        <?php
                          include ('engine/conecta.php');                       
                          $consulta = $conexao->query("SELECT * FROM tags WHERE tipo = 'interesse' ORDER BY nome ASC");
                            while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
                              echo "<option value='".$linha['nome']."'>".$linha['nome']."</option>";                            
                            }
                        ?>  
                      </select>
                    </div>
                </div>

                <div class="col-sm-12">
                     <center><button type="submit" class="btn btn-info" style="margin-top: 50px;"><B>CADASTRAR ANJO</B></button></center>
                </div>
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
  <!-- endbuild -->

  <!-- page scripts -->
  <script src="vendor/sweetalert/dist/sweetalert.min.js"></script>

  <script src="vendor/select2/dist/js/select2.js"></script>

  <script type="text/javascript">
  // Select2 plugin
  $('.select2').select2({ maximumSelectionLength: 3 });
  </script>

  <script type="text/javascript">
       jQuery(document).ready(function(){
           jQuery('#novo_anjo').submit(function(){
               jQuery.ajax({
                   type: "POST",
                   url: "engine/recebe_novo_anjo.php",
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
                    if(data == 'ANJO criada com sucesso!'){
                      swal('Bom trabalho!', data, 'success');
                      setTimeout(function(){
                          window.location.href = "novo_anjo.php"
                      }, 3000);
                    }else{
                      swal('Ops..', data, 'error');
                      /*setTimeout(function(){
                          window.location.href = "novo_anjo.php"
                      }, 3000);*/
                    }
                  }
               });
               $("#novo_anjo").trigger("reset");
               return false;
           });
       });
</script>

</body>

</html>
