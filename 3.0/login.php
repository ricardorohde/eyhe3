<!doctype html>
<html lang="en">

    <head>

        <meta charset="utf-8" />
        <title>Faça seu login e volte a conversar | Eyhe - Conversas Acolhedoras em Minutos</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- Bootstrap Css -->
        <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="assets/css/auth-login.css" />


        <!-- Sweet Alert-->
        <link href="assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />

    </head>

    <body>
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
                                        <div class="social-btn">
                                            <a href="#" class="btn face">
                                                <i class="fab fa-facebook-f"></i>
                                                <p>Entrar com o Facebook</p>
                                            </a>
                                            <a href="#" class="btn google">
                                                <i class="fab fa-google"></i>
                                                <p>Entrar com o Google</p>
                                            </a>
                                            <p style="font-size: 14px;">Entrar com E-mail</p>
                                        </div>
                                        <div class="text-primary p-3 d-flex justify-content-center">
                                            <h5 class="text-primary">Faça login e volte a conversar </h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0">

                                <div class="p-2">
                                    <form class="form-horizontal" id="formulario_login">

                                        <div class="form-group">
                                            <input type="email" class="form-control" id="email" name="email" placeholder="E-mail" autocomplete="off">
                                        </div>

                                        <div class="form-group">
                                            <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha">
                                        </div>

                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customControlInline">
                                            <label class="custom-control-label" for="customControlInline">Lembrar de mim</label>
                                        </div>

                                        <div class="mt-3">
                                            <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">Entrar</button>
                                        </div>

                                        <div class="mt-4 text-center">
                                            <a href="auth-recoverpw.html" class="text-muted"><i class="mdi mdi-lock mr-1"></i> Esqueceu a senha?</a><br/><br/>
                                            <a href="landing.html" class="text-muted"><u>Voltar para página inicial </u></a>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                        <div class="mt-5 text-center">

                            <div>
                                <p><a href="cadastro.php" class="font-weight-medium text-primary">
                                    <strong>Ainda não tem conta?</strong> Cadastre-se
                                </a> </p>
                                <p>© Eyhex 2020 Todos os direitos reservados</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- JAVASCRIPT -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>

        <!-- App js -->
        <script src="assets/js/app.js"></script>

        <!-- Sweet Alerts js -->
       <script src="assets/libs/sweetalert2/sweetalert2.min.js"></script>

        <!-- login -->
        <script src="painel/engineJS/login.js"></script>


    </body>
</html>
