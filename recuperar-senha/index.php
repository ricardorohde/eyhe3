<html>
    <head>
        <title>EYHE :: Recupere sua senha</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../css/uikit.min.css" />
        <link rel="stylesheet" href="../css/style_teste.css" />
        <link rel="shortcut icon" href="../favicon/pp_EYHE_favicon_180px.png" />

        <script src="../js/uikit.min.js"></script>
        <script src="../js/uikit-icons.min.js"></script>
    </head>
    <body>


      <!-- MENU -->

      <!-- Global site tag (gtag.js) - Google Analytics -->
      <script async src="https://www.googletagmanager.com/gtag/js?id=UA-129655425-1"></script>
      <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-129655425-1');
      </script>
      <link rel="shortcut icon" href="favicon/pp_EYHE_favicon_32px.png" />
      <div uk-sticky="animation: uk-animation-slide-top; sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky; cls-inactive: uk-navbar-transparent; top: 200">
        <nav class="uk-navbar-container meu-menu" uk-navbar>
          <a href="https://www.eyhe.com.br" class="uk-navbar-item uk-logo"><img src="../img/logotipo_azul.png" alt="logotipo"/></a>
          <div class="uk-navbar-right">
              <ul class="uk-navbar-nav uk-visible@m">
                  <li class="uk-active"><a class="menuFonte" href="../sobre.php">Sobre</a></li>
                  <li><a class="menuFonte" href="../blog.php">Blog</a></li>
                  <li><a class="menuFonte" href="../areadoanjo/index.php">Área do Anjo</a></li>
                  <li style="margin-top: 16px;"><a class="uk-button botao" style="padding-top:0px !important;" href="#login-escondido" uk-toggle>Entrar</a></li>
              </ul>
                  <a href="#menu-escondido" uk-toggle uk-navbar-toggle-icon class="uk-hidden@m meu-toggle"></a>
          </div>
      </nav>
      </div>

      <div id="menu-escondido" uk-offcanvas="flip: true; overlay: true">
          <div class="uk-offcanvas-bar">
              <button class="uk-offcanvas-close" type="button" uk-close></button>
              <ul class="uk-nav uk-nav-default">
                  <li class="uk-active"><a class="menuFonte" href="index.php">Sobre</a></li>
                  <li><a class="menuFonte" href="../blog.php">Blog</a></li>
                  <li><a class="menuFonte" href="../areadoanjo/index.php">Área do Anjo</a></li>
                  <li style="margin-top: 12x;"><a class="uk-button botao" style="padding-top: 0px; max-width: 50%;" href="#login-escondido" uk-toggle="">Entrar</a></li>
              </ul>
          </div>
      </div>




        <!-- CONTEUDO -->
        <div class="uk-section uk-section-default uk-animation-fade" style="display: block;" id="pergunta_idade">
            <div class="uk-container uk-container-small uk-text-middle uk-text-center bloco_recuperar_senha">
                <h1>Poxa, é muito chato perder a senha..</h1>
                <h2>Sorte que o processo de recuperação é bem simples, preencha o e-mail que você usou no cadastro:</h2>
                <form method="get" action="confirmar.php">

                    <div class="uk-text-left">
                      <input class="uk-input input_redefinir_senha" type="email" required name="email" placeholder="E-mail válido utilizado no cadastro">
                    </div>
               
                    <div>
                       
                        <button type="submit" class="uk-button uk-button-default botao_roxo">RECUPERAR SENHA</button>
                    </div>
             
   
                </form>
            </div>
        </div>


<!--

        <div class="uk-section uk-section-default">
            <div class="uk-container uk-position-center uk-text-middle uk-text-center">

                <h3 class="titulo">Lugar de inspiração, conexão e evolução pessoal.</h3>
                <h4 class="pergunta">Vamos conversar?</h4>
                <br/>
                <div>
                    <a class="uk-button uk-button-default botao" href="">Sim</a>
                    <a class="uk-button uk-button-default botao" href="">Saber Mais</a>
                </div>

            </div>
        </div> -->

        <!-- TELA LOGIN ESCONDIDA -->

        <div id="login-escondido" uk-offcanvas>
            <div class="uk-offcanvas-bar uk-text-middle uk-text-center">
                <button class="uk-offcanvas-close" type="button" uk-close></button>
                <div><img src="../img/logotipo_branca.png" alt="logotipo"/></div>
                <br/>
                <br/>
                <div class="meu-formulario">
                    <form id="login-form">
                        <legend class="uk-legend subtitulo">Entre em sua conta :)</legend>
                        <div class="uk-margin uk-text-left">
                            <input class="uk-input" type="email" placeholder="E-mail" name="email">
                        </div>
                        <div class="uk-margin uk-text-left">
                            <input class="uk-input" type="password" placeholder="Senha" name="senha">
                        </div>
                        <div class="uk-margin uk-text-left">
                            <label><a href="">Esqueci minha senha</a></label>
                        </div>
                        <div class="uk-margin">
                            <button type="submit" class="uk-button uk-button-default botao_branco">Entrar</button>
                        </div>
                    </form>
                </div>
                <h4>Primeira vez por aqui?</h4>
                <a href="" class="chamadas">Se preferir, clique aqui para iniciar uma conta exclusiva Eyhe.</a>
            </div>
        </div>

        <div class="footer_inicial"></div>


        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script type="text/javascript" src="../scripts_g/js/index.js"></script>

    </body>
</html>
