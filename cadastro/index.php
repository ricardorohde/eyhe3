
<!doctype html>
<html lang="en">

    <head>
      <!-- Google Tag Manager -->
      <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
      new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
      j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
      'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
      })(window,document,'script','dataLayer','GTM-MRZVDDW');</script>
        <meta charset="utf-8" />
        <title>Cadastra-se | EYHE - Conversas acolhedoras em minutos</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="../assets/images/favicon.ico">

        <!-- Bootstrap Css -->
        <link href="../assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="../assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="../assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="../assets/css/auth-login.css" />
        <link rel="stylesheet" href="../assets/css/intlTelInput.min.css" />

    </head>

    <body>
      <noscript>
        <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MRZVDDW" height="0" width="0" style="display:none;visibility:hidden"></iframe>
      </noscript>
        <div class="home-btn d-none d-sm-block">
            <a href="index.html" class="text-dark"><i class="fas fa-home h2"></i></a>
        </div>
        <div class="account-pages my-5 pt-sm-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card overflow-hidden">
                            <div class="bg-soft-primary">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="social-btn" style="display: none!important;">
                                            <a href="<?php echo $url_login_facebook;?>" class="btn face">
                                                <i class="fab fa-facebook-f"></i>
                                                <p>Entrar com o Facebook</p>
                                            </a>
                                            <a href="<?php echo $url_login_google;?>" class="btn google">
                                                <i class="fab fa-google"></i>
                                                <p>Entrar com o Google</p>
                                            </a>
                                            <p>Ou, preencha os dados:</p>
                                        </div>
                                        <div class="text-primary p-3 d-flex justify-content-center">
                                            <h5 class="text-primary">Digite seus dados para realizar o seu cadastro.</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <div class="p-2">
                                    <form id="form-cadastro" class="form-horizontal" action="">

                                        <div class="form-group">
                                            <input required type="text" name="nome_completo" class="form-control" id="username" placeholder="Nome">
                                        </div>

                                        <div class="form-group">
                                            <input required type="email"name="email"  class="form-control" id="useremail" placeholder="E-mail">
                                        </div>

                                        <div class="form-group" >
                                            <input type="tel" name="telefone" class="form-control" id="phone" placeholder="Telefone" pattern="[0-9]{2}[0-9]{2}[0-9]{5}[0-9]{4}">
                                            <small>formato aceito: 5511988013535</small>
                                        </div>

                                        <div class="form-group">
                                            <input required type="password" name="senha" class="form-control" id="userpassword" placeholder="Senha">
                                        </div>

                                        <input type="hidden" name="facebook_id" value="">
                                        <input type="hidden" name="google_id" value="">

                                        <div class="custom-control custom-checkbox">
                                            <input required type="checkbox" class="custom-control-input" id="customControlInline">
                                            <label class="custom-control-label" for="customControlInline">Tenho <strong>mais de 18 anos</strong> e concordo c/ Termos de <a href="eyhe-politica-de-privacidade.pdf" download>Política de Privacidade</a></label>
                                        </div>

                                        <div class="mt-4">
                                            <button id="finalizar_cadastro" class="btn btn-primary btn-block waves-effect waves-light" type="submit">Finalizar</button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                        <div class="mt-5 text-center">

                            <div>
                                <p><a href="../login.php" class="font-weight-medium text-primary">
                                    <strong>Já tem uma conta?</strong> Faça o Login
                                </a> </p>
                                <p>© Eyhe <span id="year"></span> Todos os direitos reservados</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- JAVASCRIPT -->
        <script src="../assets/libs/jquery/jquery.min.js"></script>
        <script src="../assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="../assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="../assets/libs/simplebar/simplebar.min.js"></script>
        <script src="../assets/libs/node-waves/waves.min.js"></script>

        <!-- App js -->
        <script src="../assets/js/app.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script src="../painel/engineJS/cadastro.js"></script>
        <script> document.getElementById("year").innerHTML = new Date().getFullYear(); </script>
        <script src="../assets/js/intlTelInput-jquery.min.js"></script>
        <script>
            $("#phone").intlTelInput({
                nationalMode: false,
                initialCountry: "br",
                preferredCountries: ["br"],
                autoHideDialCode: false
            });
        </script>
    </body>
</html>
