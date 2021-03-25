<?php include "painel/engine/verifica_sessao_heroi.php"; ?>

<!doctype html>
<html lang="pt-BR">
    <head>
      <!-- Google Tag Manager -->
      <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
      new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
      j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
      'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
      })(window,document,'script','dataLayer','GTM-MRZVDDW');</script>
      
        <meta charset="utf-8" />
        <title>Editar Perfil do Herói | Eyhe - Conversas acolhedoras em minutos</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Enfrente os Seus Problemas com a Ajuda dos Anjos Eyhe, Você Não Está Sozinho Nessa! Quem Já Viveu o Mesmo Desafio que Você Sabe como Superar e Vai te Contar Como. Acesse Já! Saúde frágil, relações tóxicas, pressão social, depressão, ansiedade. Você precisa de ajuda. Escolha um Anjo Eyhe agora mesmo e confie no poder de um ombro amigo. Temos Pessoas que já Passaram pelo que Você Está Passando e Podem te Ajudar. Conheça quem Já Viveu o Mesmo Desafio que Você Sabe como Superar e Vai te Contar Como. Dê uma Chance para Nós e para Você Mesmo. Tenha a Ajuda que Procura em Nosso Site e Desabafe sem Julgamentos. Faça seu Cadastro!" />
        <meta name="robots" content="index, follow" />
        <meta name="keywords" content="psicólogo online gratuito, ajuda psicológica, conversa online, conversar online, grupo de apoio, desabafo online, +desabafo +online, chat de bate papo, bate papo, bate papo online, site bate papo, quero conversar com alguém, como controlar crise de ansiedade, preciso de ajuda psicológica, como controlar a ansiedade, como acabar com a ansiedade, como dimnuir a ansiedade, como controlar a crise de ansiedade, site de desabafo, crise de ansiedade tem cura, preciso de ajuda emocional, chat ajuda emocional, +conversar +online, controlar a ansiedade, desabafo online auto ajuda, desabafar por chat, preciso de suporte emocional." />
        <meta content="Wilian Gulini" name="author" />
        <?php include "assets/includes/cssgeral.php"; ?>
        <link rel="stylesheet" href="assets/css/guia_style.css" />
        <link rel="stylesheet" href="assets/css/vertical-sidebar.css" />
        <link rel="stylesheet" href="assets/css/footer.css" />
        <link rel="stylesheet" href="assets/css/editar-perfil.css" />
        <link rel="stylesheet" href="assets/css/intlTelInput.min.css" />
    </head>
    <?php include "assets/includes/header-heroi.php"; ?>


<?php
    $id = $_SESSION['id_heroi'];

    include 'painel/engine/conecta.php';

    $consulta = $conexao->prepare('SELECT * FROM tab_usuario  WHERE id = :id LIMIT 1');
    $consulta->bindParam(':id', $id, PDO::PARAM_INT);
    $consulta->execute();
    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
        $nome = $linha['nome'];
        $email = $linha['email'];
        $avatar = $linha['avatar'];
        $historia = $linha['historia'];
        $telefone =  $linha['telefone'];
    }
?>
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid editar-perfil">
            <p class="h5">Meu Perfil</p>
            <div class="row">
                <div class="card">
                    <div class="foto d-flex align-items-center flex-column">
                        <p class="h4">Bem-vindo ao seu cantinho no Eyhe!</p>
                        <br>
                        <input type="file" name="imagem" id="upload"  />
        				<img id="img" src="https://eyhe.com.br/painel/<?php echo $avatar; ?>" />
                        <br>
                        <span style="font-size: 11px;">Clique em cima da imagem para alterar</span>
        		    </div>
                    <!--<picture>
                        <source type="image/png" src="assets/images/users/avatar-1.jpg" />
                        <img src="assets/images/users/avatar-1.jpg" />
                    </picture>-->
                    <form method="POST" action="#">
                        <input type="text" name="nome" value="<?php echo $nome; ?>" placeholder="Nome" />
                        <input type="email" name="email" value="<?php echo $email; ?>"placeholder="E-mail" />
                        <input id="telefone" type="tel" name="tel" value="<?php echo $telefone; ?>"placeholder="Telefone" />
                    </form>
                    <div class="history">
                        <p class="h6"><strong>Minha História</strong></p>
                        <p class="p2">Agora, para ficarmos ainda mais próximos, conte-nos um pouco sobre você!</p>
                        <textarea><?php echo $historia; ?></textarea>
                    </div>
                    <a class="btn btn-blue" href="#">Salvar Alterações de Perfil</a><br/><br/>
                    <div class="password">
                        <p class="h6"><strong>Trocar Senha:</strong></p>
                        <p class="p2">Mantenha seus dados sempre atualizados e protegidos por uma senha segura. Sugerimos a utilização de letras minúsculas, maiúsculas e números.</p>
                        <form method="POST" action="#">
                            <input type="password" name="pass" placeholder="Senha atual" />
                            <input type="password" name="passNew" placeholder="Nova senha" />
                            <input type="password" name="confirm-pass" placeholder="Confirmar nova senha" />
                        </form>
                    </div>
                    <a class="btn btn-blue" href="#">Alterar Senha</a>
                </div>
            </div>
        </div>
    </div>
    <?php
        include "assets/includes/footer.php";
    ?>

</div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        <!-- Right Sidebar -->
        <div class="right-bar">
            <div data-simplebar class="h-100">
                <div class="rightbar-title px-3 py-4">
                    <a href="javascript:void(0);" class="right-bar-toggle float-right">
                        <i class="mdi mdi-close noti-icon"></i>
                    </a>
                    <h5 class="m-0">Settings</h5>
                </div>

                <!-- Settings -->
                <hr class="mt-0" />
                <h6 class="text-center mb-0">Choose Layouts</h6>

                <div class="p-4">
                    <div class="mb-2">
                        <img src="assets/images/layouts/layout-1.jpg" class="img-fluid img-thumbnail" alt="">
                    </div>
                    <div class="custom-control custom-switch mb-3">
                        <input type="checkbox" class="custom-control-input theme-choice" id="light-mode-switch" checked />
                        <label class="custom-control-label" for="light-mode-switch">Light Mode</label>
                    </div>

                    <div class="mb-2">
                        <img src="assets/images/layouts/layout-2.jpg" class="img-fluid img-thumbnail" alt="">
                    </div>
                    <div class="custom-control custom-switch mb-3">
                        <input type="checkbox" class="custom-control-input theme-choice" id="dark-mode-switch" data-bsStyle="assets/css/bootstrap-dark.min.css" data-appStyle="assets/css/app-dark.min.css" />
                        <label class="custom-control-label" for="dark-mode-switch">Dark Mode</label>
                    </div>

                    <div class="mb-2">
                        <img src="assets/images/layouts/layout-3.jpg" class="img-fluid img-thumbnail" alt="">
                    </div>
                    <div class="custom-control custom-switch mb-5">
                        <input type="checkbox" class="custom-control-input theme-choice" id="rtl-mode-switch" data-appStyle="assets/css/app-rtl.min.css" />
                        <label class="custom-control-label" for="rtl-mode-switch">RTL Mode</label>
                    </div>


                </div>

            </div> <!-- end slimscroll-menu-->
        </div>
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>

        <!-- apexcharts -->
        <script src="assets/libs/apexcharts/apexcharts.min.js"></script>

        <script src="assets/js/pages/project-overview.init.js"></script>

        <script src="assets/js/app.js"></script>
         <!-- form mask -->
        <script src="assets/libs/inputmask/min/jquery.inputmask.bundle.min.js"></script>

        <!-- form mask init -->
        <script src="assets/js/pages/form-mask.init.js"></script>
        <script src="assets/js/main.js"></script>
        <script src="assets/js/intlTelInput-jquery.min.js"></script>
        <script src="assets/js/flag.js"></script>
    </body>
</html>
