<?php include 'PHP/seguranca.php' ; ?>

<?php
  $id = (int)$_GET['id'];

  include ('engine/conecta.php');
  $consulta = $conexao->query("SELECT * FROM anjos  WHERE id = $id limit 1");
    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {

        $nome = $linha['nome'];
        $email = $linha['email'];
        $telefone = $linha['telefone'];
        $biografia = $linha['biografia'];
        $status = $linha['status'];
        $online = $linha['online'];
        $textovitrini = $linha['textovitrini'];

        $desafio1 = $linha['desafio1'];
        $desafio2 = $linha['desafio2'];
        $desafio3 = $linha['desafio3'];
    }
?>


<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <title>Editar Anjo <?php echo $nome; ?> :: EYHE - Gerenciamento</title>
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
          <div class="title"> <i class="icon-users"></i>   EDITAR ANJO <?php echo $nome; ?> </div>
          <div class="sub-title">Use essa página para editar o Anjo no sistema Eyhe</div>
        </div>

        <div class="card bg-white">
          <div class="card-header">
            Campos com (*) são obrigatórios
          </div>
          <div class="card-block">
            <div class="row m-a-0">

              <div class="col-lg-6 col-md-6 col-xs-12 col-ls-12">
                <form class="form-horizontal" id="editar_anjo" role="form" action="" method="post">

                    <div class="form-group">
                      <label class="col-sm-4 control-label">* Nome Completo:</label>
                      <div class="col-sm-8">
                        <input type="text" name="nome" class="form-control" required value="<?php echo $nome; ?>">
                        <input type="hidden" name="id" class="form-control" required value="<?php echo $id; ?>">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-4 control-label">* E-mail válido: </label>
                      <div class="col-sm-8">
                        <input type="email" name="email" class="form-control" required value="<?php echo $email; ?>">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-4 control-label">* Telefone/Celular: </label>
                      <div class="col-sm-8">
                        <input type="tel" name="telefone" class="form-control" required value="<?php echo $telefone; ?>">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-4 control-label">Status:</label>
                      <div class="col-sm-8">
                        <select class="form-control" name="status" required>
                          <option value="1" <?php if($status == 1) echo 'selected'; ?>>Ativo</option>
                          <option value="0" <?php if($status == 0) echo 'selected'; ?>>Inativo</option>
                        </select>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-4 control-label">Online:</label>
                      <div class="col-sm-8">
                        <select class="form-control" name="online" required>
                          <option value="1" <?php if($online == 1) echo 'selected'; ?>>Online / Disponivel</option>
                          <option value="0" <?php if($online == 0) echo 'selected'; ?>>Offiline / Indisponivel </option>
                        </select>
                      </div>
                    </div>



              </div>

              <div class="col-lg-6 col-md-6 col-xs-12 col-ls-12">

                <div class="form-group">
                  <label class="col-sm-2 control-label">*Biografia:</label>
                  <div class="col-sm-10">
                    <textarea  class="form-control" style="min-height: 250px; margin-bottom: 15px;" name="biografia" required><?php echo $biografia; ?></textarea>
                  </div>
                </div>

                <div class="form-group" style="margin-top: 20px!important;">

                    <label class="col-sm-2 control-label" style="margin-top:15px;">*Desafios :</label>
                    <div class="col-sm-10">
                      <select name="desafios[]" data-placeholder="Escolha os desafios relacionadas a esse anjo" multiple  class="select2" style="width: 100%;">

                      <?php
                        include ('engine/conecta.php');


                          if($tag == $desafio1  || $tag == $desafio2  || $tag == $desafio3){ echo 'selected="selected"';}


                        $consulta = $conexao->query("SELECT * FROM tags WHERE tipo = 'desafio' ORDER BY nome ASC");
                          while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
                            if($linha['nome'] == $desafio1  || $linha['nome'] == $desafio2  || $linha['nome'] == $desafio3){
                              echo "<option selected='selected' value='".$linha['nome']."'>".$linha['nome']."</option>";
                            }else{
                              echo "<option value='".$linha['nome']."'>".$linha['nome']."</option>";
                            }
                          }
                      ?>
                      <!--<option selected="selected">orange</option>
                       <option>white</option>
                       <option>purple</option>-->
                      </select>
                    </div>
                </div>

                <div class="form-group"  style="margin-top: 20px!important;">
                  <label class="col-sm-2 control-label"><br><br>*Texto Vitrini:</label>
                  <div class="col-sm-10">
                    <br><br>
                    <textarea  class="form-control" style="min-height: 80px; margin-bottom: 15px;" name="textovitrini" required><?php echo $textovitrini; ?></textarea>
                  </div>
                </div>




                <div class="col-sm-12">
                     <center><button type="submit" class="btn btn-info" style="margin-top: 50px;"><B>ATUALIZAR ANJO</B></button></center>
                </div>
                </form>

          </div>
        </div>
        </div>


        <div class="card bg-white">
          <div class="card-header">
            Criar avaliação
          </div>
          <div class="card-block">
            <div class="row m-a-0">

              <form class="form-horizontal" id="avaliacao" role="form" action="" method="post">
                <div class="col-sm-8">
                  <input type="text" name="comentario" class="form-control" required>
                  <input type="hidden" name="idanjo" value="<?php echo $id; ?>" class="form-control" required>
                  <input type="hidden" name="idheroi" value="0" class="form-control" required>
                  <input type="hidden" name="tabela" value="tb_fk" class="form-control" required>
                  <input type="hidden" name="sentimento" value="Acolhido e seguro" class="form-control" required>
                  <input type="hidden" name="definicao" value="Rápido e me fez muito bem" class="form-control" required>
                  <button type="submit" class="btn btn-info" style="margin-top: 10px;"><B>Criar avaliação</B></button>
                </div>
              </form>


            </div>
          </div>
        </div>

        <div class="card bg-white">
          <div class="card-header">
            Avaliações
          </div>
          <div class="card-block">
            <div class="row m-a-0">

              <?php
                include ('engine/conecta.php');
                $consulta = $conexao->query("SELECT * FROM avaliacoes_new WHERE (comentario != '') AND (idanjo = $id) ORDER BY id desc");
                while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {

                  $idheroi = $linha['idheroi'];
                  if($idheroi == 0){
                    $nomeheroi = 'Sistema Eyhe';
                  }else{
                    $consulta_heroi = $conexao->query("SELECT nome FROM tab_usuario WHERE id = $idheroi");
                    while ($linha_h = $consulta_heroi->fetch(PDO::FETCH_ASSOC)) {
                      $nomeheroi = $linha_h['nome'];
                    }
                  }
              ?>
                <blockquote class="card-blockquote">
                 <p><?php echo $linha['comentario']; ?></p>
                 <footer>Avaliação do herói <cite title="Source Title"><?php echo $nomeheroi; ?></cite>
                 </footer>
               </blockquote>
               <br/><br/>
              <?php } ?>


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
           jQuery('#editar_anjo').submit(function(){
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
                          window.location.href = "editar_anjo.php?id=<?php echo $id;?>";
                      }, 1000);
                    }else{
                      swal('Ops..', data, 'error');
                      /*setTimeout(function(){
                          window.location.href = "novo_anjo.php"
                      }, 3000);*/
                    }
                  }
               });
               $("#editar_anjo").trigger("reset");
               return false;
           });
       });
</script>

<script>

    // gerencia formulario de pagamento
    jQuery(document).ready(function(){
       jQuery('#avaliacao').submit(function(){
          var dados = $('#avaliacao').serialize();
          //alert(dados);
          jQuery.ajax({
               type: "POST",
               url: "engine/recebe_nova_avaliacao.php",
               data: dados,
               beforeSend: function(){

               },
               success: function(data)
               {
                if(data == 'salvo'){
                    alert("Avaliação Criada com Sucesso! ");
                    setTimeout(function(){ location.reload(); }, 1000);
                }else{
                  alert(data);
                }
               }
           });

          return false;

       });
    });

</script>


</body>

</html>
