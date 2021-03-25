<?PHP

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


?>



<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calcule seu nível de stress no trabalho | Testes Eyhe</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <meta name="description" content="Converse em nosso chat online. Aqui você se conecta à pessoas de diferentes experiências de vida, preparadas para um diálogo simples, seguro e sem julgamentos.">
    <meta name="keywords" content="me sinto sozinho, como melhorar a ansiedade, como melhorar crise de ansiedade, como lidar com a depressão, preciso desabafar, quero conversar, como lidar com a traição, não tenho amigos, como fazer amigos, insegurança no relacionamento, não sei o que fazer da vida, quero mudar de vida, quero desabafar com alguém, terapia online, chat online, conversas online, conversar com pessoas desconhecidas, quero conversar com alguém, chat anônimo">
    <meta name="robots" content="">
    <meta name="revisit-after" content="1 day">
    <meta name="language" content="pt-BR">
    <meta name="generator" content="N/A">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://www.eyhe.com.br/quiz/nivel-de-stress.php">
    <meta property="og:title" content="Calcule seu nível de stress no trabalho | Testes Eyhe">
    <meta property="og:description" content="Converse em nosso chat online. Aqui você se conecta à pessoas de diferentes experiências de vida, preparadas para um diálogo simples, seguro e sem julgamentos.">
    <meta property="og:image" content="https://metatags.io/assets/meta-tags-16a33a6a8531e519cc0936fbba0ad904e52d35f34a46c97a2c9f6f7dd7d336f2.png">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://www.eyhe.com.br/quiz/nivel-de-stress.php">
    <meta property="twitter:title" content="Calcule seu nível de stress no trabalho | Testes Eyhe">
    <meta property="twitter:description" content="Converse em nosso chat online. Aqui você se conecta à pessoas de diferentes experiências de vida, preparadas para um diálogo simples, seguro e sem julgamentos.">
    <meta property="twitter:image" content="https://metatags.io/assets/meta-tags-16a33a6a8531e519cc0936fbba0ad904e52d35f34a46c97a2c9f6f7dd7d336f2.png">

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
      .imagem-teste{
        border-radius: 5px;
      }
    </style>



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
                    <a class="nav-link pl-0 menu_landing" href="https://eyhe.com.br/index.php">Home
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu_landing" href="https://eyhe.com.br/index.php#comofunciona">Como funciona</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu_landing" href="https://eyhe.com.br/index.php#quemfaz">Quem Faz</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link menu_landing" href="https://eyhe.com.br/index.php#depoimentos">Depoimentos</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu_landing" href="https://eyhe.com.br/index.php#faq">F.A.Q</a>
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


    <div class="container mt-2">
      <div class="row">
        <form class="m-auto" action="action_page.php" method="post">

          <img src="img/paisagem.jpg" class="imagem-teste">

          <!-- Circles which indicates the steps of the form: -->
          <div style="text-align:center;margin-top:40px;margin-bottom: 20px">
            <span class="step"></span>
            <span class="step"></span>
            <span class="step"></span>
            <span class="step"></span>
            <span class="step"></span>
            <span class="step"></span>
            <span class="step"></span>
            <span class="step"></span>
            <span class="step"></span>
            <span class="step"></span>
          </div>
          <!-- One "tab" for each step in the form: -->

          <div class="tab mt-3">
            <h1 class="title">Teste de nível de stress no trabalho do Eyhe ! </h1>
            <center>
              <div class="fb-like" data-href="<?php echo $URL_ATUAL; ?>" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true"></div>

            </center>

            <p style="width: 80%; margin: 0 auto;" align="justify">  <br/> Você tem um trabalho saudável? Muitas pessoas lidam com a realidade de ter um trabalho ou profissão que não
              condiz com o que querem para suas vidas, com um ambiente sem o suporte necessário para desempenharem todo o seu
              talento ou com colegas que as prejudicam emocionalmente. Por esses e tantos outros fatores que as influenciam negativamente,
              podem acabar caindo em um nível de stress que prejudica a vida profissional e a pessoal em proporções catastróficas.  <br/><br/>


              <b><u>Importante: </u>O teste não deve ser encarado como um diagnóstico, apenas como uma orientação dos níveis dos sintomas,
              como um primeiro passo no autoconhecimento. Para diagnósticos, recomendamos uma consulta com um profissional capacitado para
              que você possa realizar uma  avaliação completa e coerente.<br/><br/></b>


            </p>




          </div>


        <div class="tab">
            <div class="m-auto w-75">
              <h1 class="title">Defina seu gênero:</h1>
            </div>

            <div class="buttons">
              <div class="inputGroup">
                <input id="radio28" name="sexo" type="radio"/>
                <label for="radio28" value="masculino">Masculino.</label>
              </div>
              <div class="inputGroup">
                <input id="radio29" name="sexo" type="radio"/>
                <label for="radio29" value="feminino">Feminino.</label>
              </div>
              <div class="inputGroup">
                <input id="radio30" name="sexo" type="radio"/>
                <label for="radio30" value="outro">Outro.</label>
              </div>
            </div>

      </div>


      <div class="tab">
        <h1 class="title">Quando o dia de trabalho chega ao fim, você:</h1>
        <div class="buttons">
          <div class="inputGroup">
            <input id="radio1" name="questao1" type="radio" value="3"/>
            <label for="radio1">Tem a sensação de dever cumprido, apesar do cansaço.</label>
          </div>
          <div class="inputGroup">
            <input id="radio2" name="questao1" type="radio" value="1"/>
            <label for="radio2">Não se sente tão cansado, na maioria das vezes.</label>
          </div>
          <div class="inputGroup">
            <input id="radio3" name="questao1" type="radio" value="5"/>
            <label for="radio3">Sente que seu dia não rendeu quase nada e você está muito cansado.</label>
          </div>
        </div>
      </div>


      <div class="tab">
        <h1 class="title">Como você se sente em relação ao seu trabalho?</h1>
        <div class="buttons">
          <div class="inputGroup">
            <input id="radio4" name="questao2" type="radio" value="5"/>
            <label for="radio4">Não tenho nenhuma perspectiva de ser feliz ou conquistar grandes feitos em meu trabalho.</label>
          </div>
          <div class="inputGroup">
            <input id="radio5" name="questao2" type="radio" value="1"/>
            <label for="radio5">Estou satisfeito! Gosto de acordar e saber que tenho mais um dia de trabalho.</label>
          </div>
          <div class="inputGroup">
            <input id="radio6" name="questao2" type="radio" value="3"/>
            <label for="radio6">Não estou totalmente satisfeito no momento, mas estou caminhando para isso.</label>
          </div>
        </div>
      </div>
      <div class="tab">
        <h1 class="title">Você acha que recebe, dos seus colegas e chefes, todo o reconhecimento que merece?</h1>
       <div class="buttons">
          <div class="inputGroup">
            <input id="radio7" name="questao3" type="radio" value="5"/>
            <label for="radio7">Não, nunca.</label>
          </div>
          <div class="inputGroup">
            <input id="radio8" name="questao3" type="radio" value="3"/>
            <label for="radio8">Algumas vezes sou elogiado.</label>
          </div>
          <div class="inputGroup">
            <input id="radio9" name="questao3" type="radio" value="1"/>
            <label for="radio9">Sim, sempre reconhecem meu trabalho.</label>
          </div>
        </div>
      </div>
      <div class="tab">
        <h1 class="title">Sobre o seu perfil dentro da empresa, você entende seu desempenho como:</h1>
        <div class="buttons">
          <div class="inputGroup">
            <input id="radio10" name="questao4" type="radio" value="3"/>
            <label for="radio10">Tenho potencial, mas, sinto que estou desperdiçando-o na empresa em que trabalho.</label>
          </div>
          <div class="inputGroup">
            <input id="radio11" name="questao4" type="radio" value="5"/>
            <label for="radio11">Não acredito naquilo que faço.</label>
          </div>
          <div class="inputGroup">
            <input id="radio12" name="questao4" type="radio" value="1"/>
            <label for="radio12">Percebo que contribuo para o fluxo da empresa e me sinto bem com isso.</label>
          </div>
        </div>
      </div>
      <div class="tab">
        <h1 class="title">Relacionado ao nível de exigência em seu trabalho:</h1>
        <div class="buttons">
          <div class="inputGroup">
            <input id="radio13" name="questao5" type="radio" value="3"/>
            <label for="radio13">Preciso me esforçar muito para me manter no limite dos resultados exigidos.</label>
          </div>
          <div class="inputGroup">
            <input id="radio14" name="questao5" type="radio" value="1"/>
            <label for="radio14">Consigo atingir as metas propostas dando o meu máximo, porém, sem me desgastar.</label>
          </div>
          <div class="inputGroup">
            <input id="radio15" name="questao5" type="radio" value="5"/>
            <label for="radio15">São objetivos inalcançáveis que levam a falhas inevitáveis, das quais já me acostumei.</label>
          </div>
        </div>
      </div>
      <div class="tab">
        <h1 class="title">Você acredita ter encontrado o equilíbrio entre a vida pessoal e profissional?</h1>
        <div class="buttons">
          <div class="inputGroup">
            <input id="radio16" name="questao6" type="radio" value="3"/>
            <label for="radio16">Não, mas estou bem com a fase que estou vivendo agora.</label>
          </div>
          <div class="inputGroup">
            <input id="radio17" name="questao6" type="radio" value="5"/>
            <label for="radio17">Não.</label>
          </div>
          <div class="inputGroup">
            <input id="radio18" name="questao6" type="radio" value="1"/>
            <label for="radio18">Sim.</label>
          </div>
        </div>
      </div>
      <div class="tab">
        <h1 class="title">Como você administra as cobranças e pressões do trabalho?</h1>
        <div class="buttons">
          <div class="inputGroup">
            <input id="radio19" name="questao7" type="radio" value="1"/>
            <label for="radio19">Lido bem com as cobranças. Busco desenvolver minha inteligência emocional.</label>
          </div>
          <div class="inputGroup">
            <input id="radio20" name="questao7" type="radio" value="3"/>
            <label for="radio20">As vezes preciso me esforçar para manter a calma, outras vezes apenas me mantenho focado no trabalho. </label>
          </div>
          <div class="inputGroup">
            <input id="radio21" name="questao7" type="radio" value="5"/>
            <label for="radio21">Não consigo mais controlar meu nervosismo, fico irritado ou ansioso quando sou cobrado ou recebo um feedback negativo.</label>
          </div>
        </div>
      </div>
      <div class="tab">
        <h1 class="title">Como é a rotina do seu sono e descanso?</h1>
        <div class="buttons">
          <div class="inputGroup">
            <input id="radio22" name="questao8" type="radio" value="5"/>
            <label for="radio22">Não consigo dormir o suficiente para combater meu cansaço.</label>
          </div>
          <div class="inputGroup">
            <input id="radio23" name="questao8" type="radio" value="3"/>
            <label for="radio23">Nem sempre tenho boas noites de sono.</label>
          </div>
          <div class="inputGroup">
            <input id="radio24" name="questao8" type="radio" value="1"/>
            <label for="radio24">De forma geral, consigo repor as energias.</label>
          </div>
        </div>
      </div>
      <div class="tab">
        <h1 class="title">Você se alimenta de forma saudável?</h1>
        <div class="buttons">
          <div class="inputGroup">
            <input id="radio25" name="questao9" type="radio" value="1"/>
            <label for="radio25">Sim, tenho uma rotina alimentar saudável.</label>
          </div>
          <div class="inputGroup">
            <input id="radio26" name="questao9" type="radio" value="5"/>
            <label for="radio26">Meus hábitos alimentares são péssimos.</label>
          </div>
          <div class="inputGroup">
            <input id="radio27" name="questao9" type="radio" value="3"/>
            <label for="radio27">Tento manter minha alimentação equilibrada, mas, nem sempre tenho tempo para isso.</label>
          </div>
        </div>
      </div>
      <div class="m-auto text-center">
        <div>
          <button type="button" class="btn-cadastro" id="prevBtn" onclick="nextPrev(-1)">Voltar</button>
          <button type="button" class="btn-cadastro" id="nextBtn" onclick="nextPrev(1)">Próximo</button>
          <button type="button" class="btn-cadastro" id="finalizar" style="display: none">Finalizar Teste</button>
        </div>
      </div>

      <center>
        <br/>
          <a href="https://eyhe.com.br" target="_blank">
            <img src="https://www.eyhe.com.br/img/banner_vermelho.jpg"  class="imagem-teste"/>
            </br></br></br>
          </a>
      </center>

      </form>


      </div>
    </div>

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

    <script src="../painel/vendor/sweetalert/dist/sweetalert.min.js"></script>
        <script type="text/javascript">
        jQuery(document).ready(function(){
            jQuery('#form-cadastro').submit(function(){


                var dados = jQuery( this ).serialize();
                jQuery.ajax({
                    type: "POST",
                    url: "../painel/engine/recebe_cadastro_heroi_landing.php",
                    data: dados,
                    beforeSend: function() {
                        swal({
                            title: 'Aguarde..!',
                            text: 'Aguarde enquanto trabalhamos..',
                            imageUrl: 'images/avatar.jpg'
                          });
                    },
                    success: function(data)
                    {
                        if(data == 'Cadastro realizado com sucesso!'){
                            swal('Muito bem! Verifique seu e-mail', data, 'success');
                            setTimeout(function(){
                              jQuery.ajax({
                                type: "POST",
                                url: "../scripts_g/PHP/login.php",
                                data: dados,
                                beforeSend: function() {

                                },
                                success: function(data)
                                {
                                  if(data == 'LOGADO'){
                                     window.location.href = "../dashboard.php";
                                  }else{
                                    alert(data);

                                  }
                                },

                              });
                            }, 1500);
                        }else{
                            swal(data, '', 'error');

                        }
                        //alert(data);
                    },

                });
                $("#form-cadastro").trigger("reset");
                return false;
                });
        });
      </script>

      <script>

       $( "#finalizar" ).click(function() {
         alert("entrou aqui");
         const { value: email } =  Swal.fire({
           title: 'Input email address',
           input: 'email',
           inputPlaceholder: 'Enter your email address'
         })

         if (email) {
           Swal.fire('Entered email: ' + email)
         }
       });

      </script>






</body>

</html>
