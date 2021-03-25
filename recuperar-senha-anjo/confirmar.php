<?php
    $email = $_GET['email'];

    //vou verificar se esse e-mail percentece a nossa base de dados
    //se sim -> envia e-mail com codigo randomico para ele!
    //se nao -> volta pra index da recuperação de senha com mensagem de erro
    include '../painel/engine/conecta.php';

    $contador = 0;
    $consulta = $conexao->query("SELECT email FROM anjos WHERE email = '$email' ");
    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
      $contador++;
    }

    if($contador == 0){
      //nao existe usuario cadastrado com esse email
      //vou redirecionar para index_email_inexistente
      $redirect = "index_email_inexistente.php";
      header("Location: $redirect");

    }else{

      //email existe!
      //vou gerar o codigo de 5 caracteres

      $upper = implode('', range('A', 'Z')); // ABCDEFGHIJKLMNOPQRSTUVWXYZ
      $lower = implode('', range('a', 'z')); // abcdefghijklmnopqrstuvwxyzy
      $nums = implode('', range(0, 9)); // 0123456789

      $alphaNumeric = $upper.$lower.$nums; // ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789
      $string = '';
      $len = 7; // numero de chars
      for($i = 0; $i < $len; $i++) {
          $string .= $alphaNumeric[rand(0, strlen($alphaNumeric) - 1)];
      }
      //echo $string; // ex: q02TAq3

      //adiciono essa requisição na tabela requisicoes-recuperacao-senha, com o email do usuario e o codigo do lado
      #inserindo no banco
      try{
         $stmte2 = $conexao->prepare("INSERT INTO requisicoes_senha (email, eyhecode) VALUES (?,?)");
         $stmte2->bindParam(1, $email , PDO::PARAM_STR);
         $stmte2->bindParam(2, $string , PDO::PARAM_STR);
         $executa2 = $stmte2->execute();

       }catch(PDOException $e){
          echo $e->getMessage();
       }

       //agora vou enviar o e-mail para o abençoado!
       include '../enviaemail.php';

       $msg = '<html>
       <meta name="Viewport" content="width=device-width, initial-scale=1.0">
       <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
       <link href="http://fonts.googleapis.com/css?family=Muli, sans-serif:300,400,700,regular,italic" rel="stylesheet" type="text/css" class="EQWebFont">
       <style>

       </style>
           <table style="width: 98%; max-width: 450px; float: none; margin: auto; box-shadow: -2px 5px 25px rgba(36, 46, 90, .2); border-radius: 4px;">
           <tbody>
               <tr style="text-align: center">
                   <td><img src="http://eyhe.com.br/mailmkt/img/logo_EYHE_email.png" style="max-width: 140px; padding: 40 0;"></td>
               </tr>

               <tr style="text-align: center"><td>
                   <img src="http://eyhe.com.br/mailmkt/img/pp_EYHE_ilustra-homepage2-b.jpg" style="width:100%" "text-align:center"></td>
               </tr>

               <tr>
                   <td><h1 style="font-family:Muli, sans-serif, sans-serif; font-size:30px; font-weight: 700; color:#606060; text-align: center; margin: 20 20 0 20;">Olá, esse é seu EYHECODE:</h1></td>
               </tr>

               <tr>
                   <td><br/><h1 style="font-family:Muli, sans-serif; font-size:30px; font-weight: 700; color:#21d9c9; text-align: center;">'.$string.'</h1></td>
               </tr>


               <tr>
                   <td style="height: 80px"></td>
               </tr>
           </tbody>
           </table>
       </html>';

       EnviarEmail($email, $msg, 'EYHE :: Recupere sua senha!', 'Suporte EYHE');


    }

?>

<html>
    <head>
        <title>EYHE :: Confirme seu eyheCode </title>
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
            <div class="uk-container uk-container-small uk-text-middle uk-text-center" style="width: 60%;">
                <h1>Você receberá um e-mail em alguns minutos..</h1>

                <h2>Ele contém um EYHECODE, que você deve preencher abaixo, caso você não tenha recebido, encaminhe um e-mail para: suporte@eyhe.com.br</h2>
                <br/>
                <form method="get" action="definir_nova_senha.php">
                    <div class="uk-margin uk-text-center">
                        <input type="hidden" name="email" value="<?php echo $email; ?>" />
                        <input class="uk-input" type="text" required name="eyhecode" placeholder="Preencha aqui o código que você recebeu no e-mail. Exemplo: X3K0enD">
                        <span style="font-size: 13px;"><u>Pode ser que o e-mail demore um pouco a chegar ou fique na sua caixa de spam..</u></span>
                    </div>
                <br/>
                <div>
                    <button type="submit" class="uk-button uk-button-default botao_roxo">GERAR NOVA SENHA</button>
                </div>
                <br/>
                <div>
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
                <div><img src="img/logotipo_branca.png" alt="logotipo"/></div>
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
