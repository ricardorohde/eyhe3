<?php
  $resultado = $_GET['result'];

  function curPageURL() {
     $pageURL = 'http';
     if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
     $pageURL .= "://";
     if ($_SERVER["SERVER_PORT"] != "80") {
     $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
     } else {
     $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
     }
     return $pageURL;
  }

    $URL_ATUAL= "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

  if($resultado == '1'){
    $flag1 = 'block';
    $flag2 = 'none';
    $flag3 = 'none';
    $img = 'https://images.unsplash.com/photo-1525072124541-6237cc05f4f7?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=811&q=80';
    $title = 'Meu nível de stress no trabalho é: Zero Stress!';
  }else if($resultado == '2'){
    $flag1 = 'none';
    $flag2 = 'block';
    $flag3 = 'none';
    $img = 'https://images.unsplash.com/photo-1516534775068-ba3e7458af70?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=750&q=80';
    $title = 'Meu nível de stress no trabalho é: Na Média';
  }else{
    $flag1 = 'none';
    $flag2 = 'none';
    $flag3 = 'block';
    $img = 'https://images.unsplash.com/photo-1494368308039-ed3393a402a4?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=813&q=80';
    $title = 'Meu nível de stress no trabalho é: Altíssimo';
  }
?>


<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?> | Testes Eyhe </title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <meta name="description" content="Você tem um trabalho saudável? Muitas pessoas lidam com a realidade de ter um trabalho ou profissão que não condiz com o que querem para suas vidas, com um ambiente sem o suporte necessário para desempenharem todo o seu talento ou com colegas que as prejudicam emocionalmente.">
    <meta name="keywords" content="teste de stress, testes de stress, stress no trabalho, teste de stress no trabalho, testes emocionais, como saber se eu sou estressado no trabalho">
    <meta name="robots" content="">
    <meta name="revisit-after" content="1 day">
    <meta name="language" content="pt-BR">
    <meta name="generator" content="N/A">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo $URL_ATUAL;?>">
    <meta property="og:title" content="<?php echo $title; ?>">
    <meta property="og:description" content="Você tem um trabalho saudável? Muitas pessoas lidam com a realidade de ter um trabalho ou profissão que não condiz com o que querem para suas vidas, com um ambiente sem o suporte necessário para desempenharem todo o seu talento ou com colegas que as prejudicam emocionalmente.">
    <meta property="og:image" content="<?php echo $img; ?>">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="<?php echo $URL_ATUAL;?>">
    <meta property="twitter:title" content="<?php echo $title; ?>">
    <meta property="twitter:description" content="Você tem um trabalho saudável? Muitas pessoas lidam com a realidade de ter um trabalho ou profissão que não condiz com o que querem para suas vidas, com um ambiente sem o suporte necessário para desempenharem todo o seu talento ou com colegas que as prejudicam emocionalmente.">
    <meta property="twitter:image" content="<?php echo $img; ?>">

    <!-- bootstrap -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- icofont -->
    <link rel="stylesheet" href="assets/css/fontawesome.5.7.2.css">
    <!-- stylesheet -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- responsive -->
    <link rel="stylesheet" href="assets/css/responsive.css">

    <link rel="stylesheet" href="assets/css/teste.css">

    <link rel="stylesheet" href="css/style.css">

    <style>
        .box-result{
          margin-bottom: 30px;
        }
        .sub-title{
          margin-bottom: 30px;
        }

        .size-image{
          margin-top: 20px;
          margin-bottom: 20px;
        }

        .link{
          padding: 15px;
          height: auto;
          width: auto;
          background-color: #9c07ff;
          color: #fff;
          margin-top: 10px!important;
          margin-bottom: 30px!important;
          border-radius: 5px;
        }

        .link:hover{
          color: #fff;
          font-weight: bold;
        }

    </style>

    <!-- Hotjar Tracking Code for https://www.eyhe.com.br -->
<script>
    (function(h,o,t,j,a,r){
        h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
        h._hjSettings={hjid:1417750,hjsv:6};
        a=o.getElementsByTagName('head')[0];
        r=o.createElement('script');r.async=1;
        r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
        a.appendChild(r);
    })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
</script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-129655425-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-129655425-1');
</script>

</head>
<body>

  <div id="fb-root"></div>
      <script>
          window.fbAsyncInit = function() {
              FB.init({
                  appId      : '286779262000414',
                  xfbml      : true,
                  version    : 'v2.6'
              });
          };

          (function(d, s, id){
               var js, fjs = d.getElementsByTagName(s)[0];
               if (d.getElementById(id)) {return;}
               js = d.createElement(s); js.id = id;
               js.src = "//connect.facebook.net/pt_BR/sdk.js";
               fjs.parentNode.insertBefore(js, fjs);
           }(document, 'script', 'facebook-jssdk'));
      </script>

<!-- navbar area start -->
<nav class="navbar navbar-area navbar-expand-lg navbar-light style-two">

    <div class="container">

        <a class="navbar-brand logo" href="index.html">
            <img src="assets/img/logotipo_azul.png" class="black" alt="logo">
        </a>


        <!-- /.navbar btn wrapper        -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#apptidy" aria-controls="apptidy" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="btn_mobile">
            <button type="button" id="sidebarCollapse" class="btn btn-info">
                <span>Entrar</span>
            </button>
        </div>

        <div class="collapse navbar-collapse" id="apptidy">
            <!-- navbar collapse start -->
            <ul class="navbar-nav menu_landing" id="primary-menu">
                <!-- navbar- nav -->
                <li class="nav-item active">
                    <a class="nav-link pl-0 menu_landing" href="#home">Home
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu_landing" href="#comofunciona">Como funciona</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu_landing" href="#quemfaz">Quem Faz</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link menu_landing" href="#depoimentos">Depoimentos</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu_landing" href="#faq">F.A.Q</a>
                </li>
                <!--
                <li class="nav-item navbar-btn-wrapper">
                    <a class="nav-link boxed-btn blank menu_landing" target="_blank" href="https://eyhe.com.br">Entrar</a>
                </li>
                -->
            </ul>
            <!-- /.navbar-nav -->
        </div>
        <!-- navbar collapse end -->

        <div class="btn_desktop">
            <button type="button" id="sidebarCollapseDesktop" class="btn btn-info">
                <span>Entrar</span>
            </button>
        </div>

    </div>

</nav>
    <!-- navbar area end -->

    <!-- header area start  -->
    <header class="header-area style-five" id="home">

        <!-- Sidebar  -->
        <nav id="sidebar">
            <div id="dismiss">
                <i class="fas fa-arrow-left"></i>
            </div>

                <form class="needs-validation" novalidate>

                    <img src="assets/img/eyhe_branco_02.png">

                    <h3>Entre em sua conta :)</h3>

                    <input type="text" class="estilizarInputs form-control" id="validationCustom01" placeholder="E-mail" required>



                      <input type="password" class="estilizarInputs form-control" id="validationCustom02" placeholder="Senha" required>



                    <div class="pt-3 pb-4 text-center">
                        <button class="estilizarBotao btn col-md-11" type="submit">Entrar</button>
                    </div>

                    <div class="">
                        <label><a id="esqueci-senha" style="" href="https://www.eyhe.com.br/recuperar-senha">Esqueci minha senha</a></label>
                    </div>


                    <h4>Primeira vez por aqui?</h4>

                    <a href="https://www.eyhe.com.br/cadastro_pt1.php" onclick="showApresentacao();" class="chamadas">Se preferir, clique aqui para iniciar uma conta exclusiva Eyhe.</a>


                    <br>
                </form>


        </nav>

    </header>

    <div id="logo-playing" class="m-auto text-center">
      <img src="assets/img/logotipo_azul.png">
    </div>

     <div class="container mt-2" id="estresse-medio" style="display: <?php echo $flag2; ?>">
      <div class="row">
        <div class="col-md-10 m-auto text-center">

          <h2 class="sub-title">Seu nível de stress no trabalho é: <br/></h2>
            <div class="box-result m-auto">
              <p class="text-primary result">Na média</p>
            </div>

            <div class="mt-2">
                <img src="https://images.unsplash.com/photo-1516534775068-ba3e7458af70?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=750&q=80" class="size-image">
              </div>

              <center>
                <div class="fb-like" data-href="<?php echo $URL_ATUAL; ?>" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true"></div>

              </center>
            <div class="desktop text-center mt-2">
              <div class="mt-2 w-75 m-auto">
                <p>
                  Parece que você não tem estado muito bem com o seu trabalho. Apesar do seu nível de estresse estar na média em relação à população brasileira, é hora de começar a prestar atenção enquanto você ainda tem certo controle sobre a situação.
                </p>
                <p>
                  Para começar, perceba quais são os fatores que mais lhe causam desconforto e desgaste emocional no trabalho. Assim você terá um ponto de partida para começar sua busca à evolução pessoal profissional.
                </p>

              </div>
            </div>
            <div class="m-auto">

              <br/>
              <a href="https://eyhe.com.br" target="_blank"class="link">Converse agora sobre stress e outros temas</a>
              <br/><br/>ou <br/>
              <a href="nivel-de-stress.php">Clique aqui para refazer o teste </a>
              <br/><br/><br/>
            </div>

        </div>
      </div>
    </div>

    <div class="container mt-2 mb-2 " id="sem-estresse" style="display: <?php echo $flag1; ?>;">
      <div class="row">
        <div class="col-md-10 m-auto text-center">
          <div>
            <h2 class="sub-title">Seu nível de stress no trabalho é:<br/></h2>
            <div class="box-result m-auto">
              <p class="text-success result">Muito baixo :D</p>
            </div>
          </div>

            <div class="desktop mt-2">
                <img src="https://images.unsplash.com/photo-1525072124541-6237cc05f4f7?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=811&q=80" class="size-image">
              </div>

              <center>
                <div class="fb-like" data-href="<?php echo $URL_ATUAL; ?>" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true"></div>

              </center>


            <div class="desktop text-center mt-2">
              <div class="mt-2 w-75 m-auto">
                <p>
                  Provavelmente você já tem o trabalho que todas as pessoas passam a vida inteira buscando. Claro, nem sempre é um mar de rosas, mas você se mostrou muito capaz de lidar com qualquer adversidade e superá-las!
                </p>

                <div class="m-auto">

                  <br/>
                  <a href="https://eyhe.com.br" target="_blank"class="link">Converse agora sobre stress e outros temas</a>
                  <br/><br/>ou <br/>
                  <a href="nivel-de-stress.php">Clique aqui para refazer o teste </a>
                  <br/><br/><br/>
                </div>

              </div>
            </div>
        </div>
      </div>
    </div>

     <div class="container mt-2 " id="estresse-altissimo" style="display: <?php echo $flag3; ?>;">
      <div class="row">
        <div class="col-md-10 m-auto text-center">
          <h2 class="sub-title">Seu nível de stress no trabalho é: <br/></h2>
            <div class="box-result m-auto">
              <p class="text-danger result"> Altíssimo!</p>
            </div>


            <div class="mt-2">
                <img src="https://images.unsplash.com/photo-1494368308039-ed3393a402a4?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=813&q=80" class="size-image">
              </div>

              <center>
                <div class="fb-like" data-href="<?php echo $URL_ATUAL; ?>" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true"></div>

              </center>
            <div class="desktop text-center mt-2">
              <div class="mt-2 w-75 m-auto">
                <p>
                  Sinal de alerta: é hora de mudar! Seu nível de estresse está altíssimo e afetando não só seu desempenho profissional, mas também sua vida pessoal. Porém, nunca é tarde demais para quem tem vontade de viver melhor.
                </p>
                <p>
                  Para começar, perceba quais são os fatores que mais lhe causam desconforto e desgaste emocional no trabalho, organize sua mente e comece a agir para ter uma vida mais saudável por completo.
                </p>
                <p>
                  Precisando de alguém para conversar sobre isso ?
                </p>
              </div>
            </div>
            <div class="m-auto">

              <br/>
              <a href="https://eyhe.com.br" target="_blank"class="link">Converse agora sobre stress e outros temas</a>
              <br/><br/>ou <br/>
              <a href="nivel-de-stress.php">Clique aqui para refazer o teste </a>
              <br/><br/><br/>
            </div>

        </div>
      </div>
    </div>


    <center>
      <br/>
        <a href="https://eyhe.com.br" target="_blank">
          <img src="https://www.eyhe.com.br/img/banner_vermelho.jpg"  class="imagem-teste"/>
          </br></br></br>
        </a>
    </center>


    <script src="js/quiz.js"></script>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/jquery-validation/dist/jquery.validate.min.js"></script>
    <script src="vendor/jquery-validation/dist/additional-methods.min.js"></script>
    <script src="vendor/jquery-steps/jquery.steps.min.js"></script>
    <script src="js/main.js"></script>

    <!-- jquery -->
    <script src="assets/js/jquery.js"></script>
    <!-- bootstrap -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- owl carousel -->
    <script src="assets/js/owl.carousel.min.js"></script>
    <!-- magnific popup -->
    <script src="assets/js/jquery.magnific-popup.js"></script>
    <!-- contact js-->
    <script src="assets/js/contact.js"></script>
    <!-- wow js-->
    <script src="assets/js/wow.min.js"></script>
    <!-- way points js-->
    <script src="assets/js/waypoints.min.js"></script>
    <!-- counterup js-->
    <script src="assets/js/jquery.counterup.min.js"></script>
    <!-- main -->
    <script src="assets/js/main.js"></script>


    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <!-- jQuery Custom Scroller CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $("#sidebar").mCustomScrollbar({
                theme: "minimal"
            });

            $('#dismiss, .overlay').on('click', function () {
                $('#sidebar').removeClass('active');
                $('.overlay').removeClass('active');
            });

            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').addClass('active');
                $('.overlay').addClass('active');
                $('.collapse.in').toggleClass('in');
                $('a[aria-expanded=true]').attr('aria-expanded', 'false');
            });
            $('#sidebarCollapseDesktop').on('click', function () {
                $('#sidebar').addClass('active');
                $('.overlay').addClass('active');
                $('.collapse.in').toggleClass('in');
                $('a[aria-expanded=true]').attr('aria-expanded', 'false');
            });
        });
    </script>


</body>

</html>
