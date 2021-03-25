<?php include 'PHP/seguranca.php' ; ?>

<!doctype html>
<html class="no-js" lang="pt-BR">

<head>
  <meta charset="utf-8">
  <title>Painel de Gerenciamento - Elite FM</title>
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
  <link rel="stylesheet" href="styles/estilo.css">
  <link rel="stylesheet" href="styles/reactor.css">
  <link rel="stylesheet" href="vendor/bootstrap-timepicker/css/bootstrap-timepicker.min.css">
  <link rel="stylesheet" href="vendor/chosen_v1.4.0/chosen.css">
  <link rel="stylesheet" href="vendor/bootstrap-datepicker/dist/css/bootstrap-datepicker3.css">
  <link rel="stylesheet" href="vendor/jquery-labelauty/source/jquery-labelauty.css">

  <!-- editor de texto-->
  <link rel="stylesheet" href="vendor/summernote/dist/summernote.css">
  <link rel="stylesheet" href="styles/alertify.css">
  <link rel="stylesheet" href="estilo/main.css">
  <!-- endbuild -->

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
        <a !-- logo -->
        <a class="brand-logo">
          <span>EYHE</span>
        </a>
        <a href="#" class="small-menu-visible brand-logo">E</a>
        <!-- /logo -->
      </div>

      <?php include('repeat/menu_square.php'); ?>
    <!-- main navigation -->
      <?php include('repeat/nav.php'); ?>
    </div>
    <!-- /sidebar panel -->
    <!-- content panel -->
    <div class="main-panel">
      <!-- top header -->
      <div class="header navbar">
        <div class="brand visible-xs">
          <!-- toggle offscreen menu -->
          <div class="toggle-offscreen">
            <a href="javascript:;" class="hamburger-icon visible-xs" data-toggle="offscreen" data-move="ltr">
              <span></span>
              <span></span>
              <span></span>
            </a>
          </div>
          <!-- /toggle offscreen menu -->
          <!-- logo -->
          <a class="brand-logo">
            <span>E</span>
          </a>
          <!-- /logo -->
        </div>
        <ul class="nav navbar-nav hidden-xs">
          <li>
            <a href="javascript:;" class="small-sidebar-toggle ripple" data-toggle="layout-small-menu">
              <i class="icon-toggle-sidebar icn-md"></i>
            </a>
          </li>

        </ul>
        <ul class="nav navbar-nav navbar-right hidden-xs">


          <li>
            <a href="javascript:;" class="ripple" data-toggle="dropdown">
              <img src="images/avatar.jpg" class="header-avatar img-circle" alt="user" title="user">
              <span>Leandro</span>
              <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
              <li>
                <a href="PHP/logout.php">Sair</a>
              </li>
            </ul>
          </li>

        </ul>
      </div>
      <!-- /top header -->
      <!-- CONTEUDOOOOOOO -->
      <div class="main-content">

        <div class="card bg-white">
            <div class="card-header">
              Novo artigo
            </div>
            <div class="card-block">
              <div class="row m-a-0">
                <form id="novo-artigo" enctype="multipart/form-data" method="post" class="form-horizontal" role="form">

                  <div class="col-lg-8 col-md-8 col-sm-12">

                    <div class="col-sm-12">
                      <p><b>TÍTULO DO ARTIGO</b> </p>
                        <input type="text" class="form-control m-b" required name="titulo" placeholder="Crie textos chamativos e que contenha uma ou mais keywords"/>
                        <br/>
                    </div>

                    <div class="col-sm-12">
                      <p><b>[SEO] <i>Meta Description</i>:</b> </p>
                        <input type="text" class="form-control m-b" placeholder="Entre 200 e 320 caracteres, isso irá aparecer no google a baixo do titulo." required name="metadescrisao" />
                        <h6> Sugestão: Use a keyword principal dentro desse item. Escreva algo que cative o leitor para seu texto. </h6>
                        <br/>
                    </div>

                    <div class="col-sm-12">
                      <p><b>[SEO] <i>Keywords</i>:</b> </p>
                        <input type="text" class="form-control m-b" placeholder="Separadas por virgula e minusculas" required name="keywords" />
                        <h6> Sugestão: Use keywords de causa longa, palavras do titulo deve estar nas keywords, use LSI Keywords</h6>
                        <br/>
                    </div>

                    <div class="col-sm-12">
                      <p><b>IMAGEM DESTAQUE</b> </p>
                        <input id="imagem-destaque" accept="image/png, image/jpeg" type="file" class="form-control m-b" name="imagem_destaque" required/>
                        <br/>
                    </div>

                    <div class="col-sm-12">
                      <p><b>[SEO] <i>Alt Image Destaque</i>:</b> </p>
                        <input type="text" class="form-control m-b" placeholder="Separadas por virgula e minusculas" required name="altimage" />
                        <h6> Sugestão: O alt image deve conter keywords e deve explicar a imagem (como se fosse contar as coisas para um cego)</h6>
                        <br/>
                    </div>
                    <!--<div class="col-sm-12">
                      <p><b>Legenda da imagem destaque:</b> </p>
                        <input type="text" class="form-control m-b" name="legenda" />
                    </div>-->



                    <div class="col-sm-12">

                      <p><b>ARTIGO (Com mais de 2000 palavras de preferencia)</b> </p>

                      <textarea id="editor" name="editor" class="summernote" style="height: 600px;min-height: 600px;"></textarea>
                    </div>

                    <!--<div class="col-sm-12">
                      <p><b>Fonte:</b> </p>
                        <input type="text" class="form-control m-b" placeholder="Esse campo não é obrigatório"  name="fonte" />
                    </div>

                    <div class="col-sm-12">
                      <p><b>Fonte das fotos:</b> </p>
                        <input type="text" class="form-control m-b" placeholder="Esse campo não é obrigatório" name="fontefotos" />
                    </div>

                    <div class="col-sm-12 galeria">
                        <p><b>Galeria de imagens:</b> </p>
                          <input accept="image/png, image/jpeg" type="file" class="form-control m-b" multiple name="galeria[]" />
                    </div>-->

                  </div>

                  <div class="col-lg-4 col-md-4 col-sm-12">

                      <div class="col-sm-10">
                        <p><b>CATEGORIA: </b> </p>
                        <select name="categoria" class="form-control m-b" required style="width: 100%;color: #000;">
                          <?php
                            include ('engine/conecta.php');
                            $consulta = $conexao->query("SELECT * FROM tags WHERE tipo = 'categoria' ORDER BY nome ASC");
                              while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
                                echo "<option value='".$linha['nome']."'>".$linha['nome']."</option>";
                              }
                          ?>

                        </select>
                      </div>

                      <div class="col-sm-10">
                        <p><b>RASCUNHO: </b> </p>
                        <select name="rascunho" class="form-control m-b" required style="width: 100%;color: #000;">
                                <option value="sim">Sim</option>
                                <option value="nao">Não</option>
                        </select>
                      </div>

                      <div class="col-sm-10">
                        <p><b>AUTOR DO ARTIGO:</b> </p>
                          <input type="text" class="form-control m-b" required name="autor" />
                      </div>

                        <div class="col-sm-10">
                          <p><b>AGENDAMENTO: </b> </p>
                            <input type="text" class="form-control m-b datepicker" required name="data" data-provide="datepicker" placeholder=""
                            value="<?php echo date("d/m/Y"); ?>"/>
                        </div>


                        <div class="col-sm-10">
                          <center><button type="submit" name="btn-publicar" class="btn btn-info btn-enviar" style="margin-top: 40px;">Publicar</button></center>
                        </div>


                        <div class="col-sm-12">
                          <br/><br/>
                          <center>
                              <a href="https://neilpatel.com/br/blog/fundamentos-de-seo/" target="_blank>">
                                <img src="images/neil.jpg" width="80%"/>
                              </a>
                          </center>
                        </div>


                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>

      <!-- /main area -->
    </div>
    <!-- /content panel -->
    <!-- bottom footer -->
    <footer class="content-footer">

    </footer>
    <!-- /bottom footer -->

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

  <script src="vendor/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
  <script src="vendor/chosen_v1.4.0/chosen.jquery.min.js"></script>
  <script src="vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
  <script src="vendor/bootstrap-datepicker/js/locales/bootstrap-datepicker.pt-BR.js"></script>
  <script src="vendor/jquery-labelauty/source/jquery-labelauty.js"></script>

  <script src="scripts/alertify.js"></script>

  <!-- editor de texto-->
  <script src="vendor/summernote/dist/summernote.min.js"></script>
  <script src="vendor/summernote/plugin/summernote-ext-video.js"></script>
  <script src="vendor/summernote/lang/summernote-pt-BR.js"></script>

  <script src="vendor/sweetalert/dist/sweetalert.min.js"></script>



  <script>
    $('.datepicker').datepicker({
        format: 'dd/mm/yyyy',
        language: 'pt-BR'
    });
    $('.time-picker').timepicker('setTime', '<?php echo date("h:i A"); ?>');

    // Chosen plugin
    $('.chosen').chosen({
      width: '100%'
    });

    $('.summernote').summernote({
        toolbar: [
          // [groupName, [list of button]]
          ['style', ['bold', 'italic', 'underline', 'clear']],
          ['fullscreen', ['fullscreen']],
          ['insert', ['link', 'video']]
        ]
    });


    $(document).ready(function(){
        $(":checkbox").labelauty();
    });

   //FUNÇÃO PARA IMAGEM DESTAQUE NÃO SER MENOR DO QUE O NECESSÁRIO!
    var _URL = window.URL || window.webkitURL;
    $("#imagem-destaque").change(function(e) {
        var file, img;
        if ((file = this.files[0])) {
            img = new Image();
            img.onload = function() {
                //alert(this.width + " " + this.height);
                var largura = this.width;
                var altura = this.height;
                if( (largura < 920) || (altura < 640)){
                  swal('Ops..', 'Tamanho mínimo de imagem: 920x640. Escolha outra imagem', 'error');
                  //RESETA ESSE INPUT
                  $("#imagem-destaque").val("");
                }
            };
            img.onerror = function() {
                swal('Ops..', "not a valid file: " + file.type, 'error');

            };
            img.src = _URL.createObjectURL(file);
        }
    });



         jQuery(document).ready(function(){
             jQuery('#novo-artigo').submit(function(){
                 jQuery.ajax({
                     type: "POST",
                     url: "engine/recebe_novo_artigo.php",
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
                      if(data == 'Artigo criado com sucesso'){
                        swal('Bom trabalho!', data, 'success');
                        setTimeout(function(){
                            window.location.href = "conteudos.php"
                        }, 3000);
                        $("#novo-artigo").trigger("reset");
                      }else{
                        swal('Ops..', data, 'error');
                      }
                    }
                 });

                 return false;
             });
         });
  </script>








  <!-- endbuild -->
</body>

</html>
