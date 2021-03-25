<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Entrar na Área do Anjo | EYHE - Conversas acolhedoras em minutos</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <?php include "../assets/includes/cssgeralanjos.php" ?>
        <link rel="stylesheet" href="../assets/css/auth-login.css" />
        <link rel="stylesheet" href="../assets/css/login-anjo.css" />
    </head>
    <body>
        <div class="home-btn d-none d-sm-block">
            <a href="https://eyhe.com.br" class="text-dark"><i class="fas fa-home h2"></i></a>
        </div>
        <div class="account-pages my-5 pt-sm-5">
            <div class="container anjo">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card overflow-hidden">
                            <div class="bg-soft-primary">
                                <div class="row">
                                    <picture>
                                        <source type="image/webp" src="../assets/images/icone4.webp" />
                                        <source type="image/jpg" src="../assets/images/icone4.jpg" />
                                        <img src="../assets/images/icone4.jpg" />
                                    </picture>
                                    <div class="col-12 angel">

                                        <div class="text-primary p-3 d-flex justify-content-center">
                                            <h5 class="text-primary">Olá Anjo, obrigado por voltar!</h5>
                                            <p style="color:black;">Faça login e continue ajudando dezenas de pessoas todos os dias.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0">

                                <div class="p-2">
                                    <form id="formulario_login_anjo" class="form-horizontal" action="index.html">

                                        <div class="form-group">
                                            <input type="text" class="form-control" name="email" id="username" placeholder="E-mail">
                                        </div>

                                        <div class="form-group">
                                            <input type="password" class="form-control" name="senha" id="userpassword" placeholder="Senha">
                                        </div>

                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customControlInline">
                                            <label class="custom-control-label" for="customControlInline">Lembrar de mim</label>
                                        </div>

                                        <div class="mt-3">
                                            <button id="bt" class="btn btn-primary btn-block waves-effect waves-light" type="submit">Entrar</button>
                                        </div>

                                        <div class="mt-4 text-center">
                                            <a href="../recuperar-senha.php" class="text-muted"><i class="mdi mdi-lock mr-1"></i> Esqueceu a senha?</a>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                        <div class="mt-5 text-center">

                            <div>
                                <p>© Eyhex 2020 Todos os direitos reservados</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <?php include "../assets/includes/javascript.php"; ?>
        <script src="../assets/js/app.js"></script>
        <!-- Sweet Alerts js -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <!-- login -->
        <script src="engineJS/login.js"></script>
    </body>
</html>
