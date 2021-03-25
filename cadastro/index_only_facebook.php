<?php
session_start();

require __DIR__ . "/vendor/autoload.php";

$provider = new \League\OAuth2\Client\Provider\Facebook([
  'clientId'          => '817559725401900',
  'clientSecret'      => '2d68897ab7c19a2b1663fd84cde3f511',
  'redirectUri'       => 'https://eyhe.com.br/cadastro',
  'graphApiVersion'   => 'v6.0',
]);

// SE NAO TEMOS O CODIGO, VAMOS GERAR LINK PRO BOTAO E MOSTRAR BOTAO.
if (!isset($_GET['code'])) {
    $class = 'block'; $type="text";$type2="email";
    // If we don't have an authorization code then get one
    $authUrl = $provider->getAuthorizationUrl([
        'scope' => ['email'],
    ]);
    $_SESSION['oauth2state'] = $provider->getState();

    //echo '<a href="'.$authUrl.'">CADASTRAR COM FACEBOOK!</a>';
    //exit;

// Check given state against previously stored one to mitigate CSRF attack
} elseif (empty($_GET['state']) || ($_GET['state'] !== $_SESSION['oauth2state'])) {
    unset($_SESSION['oauth2state']);
    header('Location: https://www.eyhe.com.br/cadastro/');
    exit;
}

//se temos o codigo, vamos pegar as informações do usuario.
if (isset($_GET['code'])){
  $class = 'none'; $type="hidden";$type2="hidden";
  $token = $provider->getAccessToken('authorization_code', [
      'code' => $_GET['code']
  ]);

  // Optional: Now you have a token you can look up a users profile data
  try {

      // We got an access token, let's now get the user's details
      $user = $provider->getResourceOwner($token);
      //var_dump($user);
      $_SESSION['status'] = 'ativo';
      $_SESSION['facebook_id'] = $user->getId();
      $_SESSION['nome'] = $user->getName();
      $_SESSION['email'] = $user->getEmail();
      $_SESSION['avatar'] = $user->getPictureUrl();


  } catch (\Exception $e) {
      // Failed to get user details
      exit('Oh dear...');
  }

}



?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EYHE :: Cadastre-se de forma gratuita</title>

    <link rel="stylesheet" href="../css/uikit.min.css" />
    <link rel="stylesheet" href="../css/style_teste.css" />
    <link rel="shortcut icon" href="favicon/pp_EYHE_favicon_180px.png" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

    <script src="../js/uikit.min.js"></script>
    <script src="../js/uikit-icons.min.js"></script>

    <link href="https://fonts.googleapis.com/css2?family=Muli:wght@300;400;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-159443746-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-159443746-1');
    </script>

    <!-- Hotjar Tracking Code for https://www.eyhe.com.br -->
    <script>
        (function(h, o, t, j, a, r) {
            h.hj = h.hj || function() {
                (h.hj.q = h.hj.q || []).push(arguments)
            };
            h._hjSettings = {
                hjid: 1417750,
                hjsv: 6
            };
            a = o.getElementsByTagName('head')[0];
            r = o.createElement('script');
            r.async = 1;
            r.src = t + h._hjSettings.hjid + j + h._hjSettings.hjsv;
            a.appendChild(r);
        })(window, document, 'https://static.hotjar.com/c/hotjar-', '.js?sv=');
    </script>
    <!-- Facebook Pixel Code -->
    <script>
        ! function(f, b, e, v, n, t, s) {
            if (f.fbq) return;
            n = f.fbq = function() {
                n.callMethod ?
                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq) f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = '2.0';
            n.queue = [];
            t = b.createElement(e);
            t.async = !0;
            t.src = v;
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window, document, 'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '1262047540602680');
        fbq('track', 'PageView');
    </script>
    <noscript>
    <img height="1" width="1"
    src="https://www.facebook.com/tr?id=1262047540602680&ev=PageView
    &noscript=1"/>
    </noscript>


<link rel="stylesheet prefetch" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" />
<style type="text/css">
#global-login-form{
width: 50%;
margin: 0 auto;
#login-form{
    ul{
    list-style-type: none;
    padding-left: 0;
    li{
        position: relative;
        margin-bottom: 1em;
        button{
        &#show_password{
            position: absolute;
            bottom: 2px;
            right: 0;
            border: none;
            background-color: transparent;
            font-size: 30px;
        }
        &[type=submit]{
            margin-top: 1em;
        }
        }
    }
    }
}
}
.texto-modal{
        height: 300px;
        max-height: 300px;
        overflow: auto;
        }
@media only screen and (max-width: 768px) {
    .senha {
    max-width: 80%;
    margin: auto;
    }
    input{
    max-width: 90%;
    margin: auto;
     }
     h2{
        font-size:20px !important;
    }
    #pergunta_nome{
        max-width: 95%;
        margin: auto;
    }
 }

.botao-cadastro{
    border-radius:30px !important;
    font-weight: bold;
    min-height: 50px;
}

h2{
    font-size: 23px;
    margin-bottom: 15px;
    font-weight: 700;
}
body{
    font-family: 'Muli', sans-serif;
}
input:focus::-webkit-input-placeholder {
    color: transparent;
}
input:focus:-moz-placeholder { /* Firefox 18- */
color: transparent;
}
input:focus::-moz-placeholder {  /* Firefox 19+ */
color: transparent;
}
input:focus:-ms-input-placeholder {
color: transparent;
}
.custom-control-input{
    width: 18px !important;
    height: 18px !important;
}

.botao-google{
  background-color: #dd4b39;
  border: #dd4b39;
}

.botao-google:hover{
  background-color: #b33828;
  border: #b33828;
}

.botao-facebook, .botao-google{
  font-size: 14px;
  padding-left: 0px;
}

.img-facebook{
  width: 120px;
  border-radius: 50%;
  -webkit-box-shadow: 10px 13px 14px -4px rgba(0,0,0,0.24);
  -moz-box-shadow: 10px 13px 14px -4px rgba(0,0,0,0.24);
  box-shadow: 10px 13px 14px -4px rgba(0,0,0,0.24);
}


</style>
</head>



<body>






<div class="container" id="pergunta_nome">


<div class="row d-flex justify-content-center">
<div class="col-md-8 order-md-1">
  <div class="py-3 text-center">
      <a href="index.php"><img class="d-block mx-auto mb-4" src="../img/logotipo_azul.png" alt="" width="100" height="100"></a>
      <?php if (!isset($_GET['code'])) {
        echo "<h2 class='text-center'>Olá, cadastre-se para conversar :)</h2>";
      }else{
        echo "
              <center><img src='{$_SESSION['avatar']}' class='img-facebook' /></center><br/>
              <p>Oi <b>{$_SESSION['nome']}</b>, favor completar <u>celular</u> e <u>senha</u>
              </p";
      }
      ?>
  </div>
<form class="resposta_pergunta needs-validation" id="form-cadastro" method="post" action="none">
            <div class="row">

                <?php if (!isset($_GET['code'])) { ?>

                      <div class="col-md-6 mb-3">
                        <a href='<?php echo $authUrl ; ?>' class="btn btn-primary btn-block botao-facebook"><i class="fa fa-facebook"></i>&nbsp;&nbsp;Cadastrar usando Facebook</a>
                      </div>

                      <div class="col-md-6 mb-3">
                        <a href='#' class="btn btn-primary btn-block botao-facebook botao-google"><i class="fa fa-google"></i>&nbsp; Cadastrar usando Google </a>
                      </div>

                <?php } ?>

                <div class="col-md-12 mb-3">
                    <center><p style="display: <?php echo $class;?>">Ou, preencha nosso formulário </p></center>
                    <input placeholder="Qual é seu nome?" class="form-control text-center" type="<?php echo $type;?>" name="nome_completo" required value="<?php echo $_SESSION['nome'];?>">
                </div>

                <div class="col-md-12 mb-3">
                    <input placeholder="Qual é seu e-mail?" autocomplete="off" class="form-control text-center" type="<?php echo $type2;?>" name="email" required value="<?php echo $_SESSION['email'];?>">
                </div>

                <div class="col-md-12 mb-3">
                    <input type="hidden" name="avatar" value="<?php echo $_SESSION['avatar']; ?>">
                    <input type="hidden" name="facebook_id" value="<?php echo $_SESSION['facebook_id']; ?>">
                    <input placeholder="Celular" class="form-control text-center" onkeyup="mascara( this, mtel );" type="tel" required name="telefone">
                </div>

                <div class="col-md-12 mb-3">
                <input placeholder="Digite sua senha"
                      class="form-control text-center"
                      aria-describedby="show_password"
                      type="password" required name="senha" id="senha" autocomplete="off">
                </div>

            </div>

            <hr class="mb-4">
            <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" id="politica" required type="checkbox">
                      <label class="custom-control-label" for="politica" >
                        Tenho mais de 18 anos e concordo com os <a href="../termos.php" target="_blank"><u>Termos de uso</u></a> e
                        <a href="../privacidade.php" target="_blank"><u>Políticas de Privacidade</u></a> Eyhe.
                      </label>
            </div>

            <div class="row justify-content-center" style="margin-bottom: 80px; margin-top:50px">
            <div class="col-md-6 mb-3 justify-content-center">
            <button type="submit" id="enviar" class="btn btn-primary btn-block botao-cadastro" style="padding-top:5px !important">Finalizar cadastro</button>
            </div>
            <div class="col-md-6 mb-3 justify-content-center">
            <a class="btn btn-outline-primary btn-block botao-cadastro" style="padding-top:10px !important" href="index.php">Voltar</a>
            </div>

            </div>






            <!--
            <p class="legendas" style="margin-bottom: 40px;">
                Já possui uma conta Eyhe?
                <br/>
            <a href="#login-escondido" uk-toggle>Clique aqui</a> para fazer seu login.

            </p>
        -->
</form>
</div>

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
                    <button type="submit" class="uk-button uk-button-default botao_branco" id="entrar">Entrar</button>
                </div>
            </form>
        </div>
        <h4>Primeira vez por aqui?</h4>
        <a href="" class="chamadas">Se preferir, clique aqui para iniciar uma conta exclusiva Eyhe.</a>
    </div>
</div>
<div id="concluindo-cadastro" class="uk-flex-top" uk-modal>
<div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">

    <center>
      <p style="font-size: 24px;"><b>Aguarde...</b></p>
      <p>Estamos criando seu perfil como Herói Eyhe. Parabéns pela iniciativa de conversar sobre sua dor. </p>
      <img src="../img/loading.gif"  width="80px;" />
    </center>

</div>
</div>


</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script type="text/javascript" src="../scripts_g/js/index.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


<!-- AQUI VAI SER APLICADO O NOSSO JQUERY -->
<script type="text/javascript">

jQuery(document).ready(function($) {

$('#show_password').hover(function(e) {
    e.preventDefault();
    if ( $('#senha').attr('type') == 'password' ) {
    $('#senha').attr('type', 'text');
    $('#show_password').attr('class', 'fa fa-eye');
    } else {
        $('#senha').attr('type', 'password');
        $('#show_password').attr('class', 'fa fa-eye-slash');
    }
});

});


$('#show_password2').hover(function(e) {
    e.preventDefault();
    if ( $('#senha_repeat').attr('type') == 'password' ) {
    $('#senha_repeat').attr('type', 'text');
    $('#show_password2').attr('class', 'fa fa-eye');
    } else {
        $('#senha_repeat').attr('type', 'password');
        $('#show_password2').attr('class', 'fa fa-eye-slash');
    }
});



</script>




        <!--<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>-->
        <!--<script src="painel/vendor/sweetalert/dist/sweetalert.min.js"></script>-->
        <script type="text/javascript">
        jQuery(document).ready(function(){
            jQuery('#form-cadastro').submit(function(){
                //alert("form de cadastro enviado");
                var dados = jQuery( this ).serialize();
                //alert(dados);
                jQuery.ajax({
                    type: "POST",
                    url: "../painel/engine/cadastro_social.php",
                    data: dados,
                    beforeSend: function() {
                        UIkit.modal("#concluindo-cadastro").show();
                    },
                    success: function(data)
                    {
                        if(data == 'Cadastro realizado com sucesso!'){
                            UIkit.modal("#concluindo-cadastro").hide();
                            swal('Muito bem!', data, 'success',{buttons: false, timer: 3000, });
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
                                    window.location.href = "../bem-vindo.php";
                                }else{
                                    alert(data);

                                }
                                },

                            });
                            }, 1500);
                        }else{
                            UIkit.modal("#concluindo-cadastro").hide();
                            swal('Ops..', data, 'error');
                            setTimeout(function(){
                              window.location.href = "https://www.eyhe.com.br/cadastro/index.php";
                            }, 2000);


                        }
                        //alert(data);
                    },

                });
                $("#form-cadastro").trigger("reset");
                return false;
                });
        });



    </script>



    <script language="JavaScript" type="text/javascript" charset="utf-8">

    /* Máscaras ER */
        function mascara(o,f){
            v_obj=o
            v_fun=f
            setTimeout("execmascara()",1)
        }
        function execmascara(){
            v_obj.value=v_fun(v_obj.value)
        }
        function mtel(v){
            v=v.replace(/\D/g,"");             //Remove tudo o que não é dígito
            v=v.replace(/^(\d{2})(\d)/g,"($1) $2"); //Coloca parênteses em volta dos dois primeiros dígitos
            v=v.replace(/(\d)(\d{4})$/,"$1-$2");    //Coloca hífen entre o quarto e o quinto dígitos
            return v;
        }
    </script>

    <script>

      $( ".botao-google" ).click(function() {
        alert("Ainda estamos implementando essa função, por gentileza, utilize o cadastro com Facebook ou preencha nosso formulário");
      });
    </script>


</body>
</html>
