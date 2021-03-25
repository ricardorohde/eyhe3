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
    <title>Dashboard do Herói |  Eyhe - Conversas acolhedoras em minutos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Enfrente os Seus Problemas com a Ajuda dos Anjos Eyhe, Você Não Está Sozinho Nessa! Quem Já Viveu o Mesmo Desafio que Você Sabe como Superar e Vai te Contar Como. Acesse Já! Saúde frágil, relações tóxicas, pressão social, depressão, ansiedade. Você precisa de ajuda. Escolha um Anjo Eyhe agora mesmo e confie no poder de um ombro amigo. Temos Pessoas que já Passaram pelo que Você Está Passando e Podem te Ajudar. Conheça quem Já Viveu o Mesmo Desafio que Você Sabe como Superar e Vai te Contar Como. Dê uma Chance para Nós e para Você Mesmo. Tenha a Ajuda que Procura em Nosso Site e Desabafe sem Julgamentos. Faça seu Cadastro!" />
    <meta name="robots" content="index, follow" />
    <meta name="keywords" content="psicólogo online gratuito, ajuda psicológica, conversa online, conversar online, grupo de apoio, desabafo online, +desabafo +online, chat de bate papo, bate papo, bate papo online, site bate papo, quero conversar com alguém, como controlar crise de ansiedade, preciso de ajuda psicológica, como controlar a ansiedade, como acabar com a ansiedade, como dimnuir a ansiedade, como controlar a crise de ansiedade, site de desabafo, crise de ansiedade tem cura, preciso de ajuda emocional, chat ajuda emocional, +conversar +online, controlar a ansiedade, desabafo online auto ajuda, desabafar por chat, preciso de suporte emocional." />
    <meta content="Wilian Gulini" name="author" />
    <?php include "assets/includes/cssgeral.php"; ?>
    <link rel="stylesheet" href="assets/css/vertical-sidebar.css" />
    <link rel="stylesheet" href="assets/css/footer.css" />
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="stylesheet" href="node_modules/intro.js/introjs.css" />
</head>
<?php include "assets/includes/header-heroi.php"; ?>

<?php
//calcula Saldo
    include 'painel/engine/conecta.php';
    $idheroi = $_SESSION['id_heroi'];
    $consulta = $conexao->query("SELECT saldo FROM tab_usuario where id = $idheroi limit 1");
    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
      $saldo = $linha['saldo'];
      if($saldo == ''){
        $saldo = 0.00;
      }
    }

//qualquer quantidade de conversa
$consulta = $conexao->query("SELECT count(id) as qtd FROM conversas where idheroi = $idheroi limit 1");
while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
  $qtd_conversas = $linha['qtd'];
}
 ?>


            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xl-8">
                                <div class="card search">
                                    <div class="text-primary">
                                        <p style="font-size: 18px;"><b> Olá! Sobre o que gostaria de conversar? </b></p>
                                    </div>
                                    <form method="get" action="nossos-anjos.php">
                                        <div class="ls-custom-select d-flex">

                                          <select class="ls-select" id="escolher-categoria" name="c">
                                            <option>Todos os assuntos</option>
                                            <option>Abusos Sexuais</option>
                                            <option>Ansiedade</option>
                                            <option>Depressão</option>
                                            <option>Luto</option>
                                            <option>Problemas de Saúde</option>
                                            <option>Relacionamentos</option>
                                            <option>Violência Doméstica</option>

                                          </select>
                                        </div>
                                    </form>


                                    <div class="text-secondary">

                                                                <?php
                                                                include 'painel/engine/conecta.php';
                                                                $sql = $conexao->prepare('SELECT id FROM anjos WHERE (status = 1)');
                                                                $sql->execute();
                                                                $total = $sql->rowCount();
                                                                ?>

                                                                <?php
                                                                $sql = $conexao->prepare('SELECT id FROM anjos WHERE (status = 1 and online = 1)');
                                                                $sql->execute();
                                                                $totalonline = $sql->rowCount();
                                                                ?>
                                                                <center> Nesse momento
                                                                <p class="green"><strong><?php echo $total;?> Anjos / </strong><?php echo $totalonline;?> online</p></center>
                                    </div>
                                </div>


                                <?php
                                    include "blocks/card-anjo-mini.php";
                                ?>


                            </div>
                            <div class="col-xl-4">
                                <div class="card overflow-hidden">
                                    <div class="bg-soft-primary">
                                        <div class="row">
                                            <div class="col-7">
                                                <div class="text-primary p-3 welcome">
                                                    <h5 class="text-primary">Bem-vindo de volta!</h5>
                                                </div>
                                            </div>
                                            <div class="col-5 align-self-end">
                                                <img src="assets/images/profile-img.png" alt="" class="img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body pt-0">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="avatar-md profile-user-wid mb-4">
                                                    <img src="https://eyhe.com.br/painel/<?php echo $_SESSION['avatar_heroi']; ?>" alt="" class="img-thumbnail rounded-circle">
                                                </div>
                                                <h5 class="font-size-15 text-truncate"><?php echo $_SESSION['nome_heroi']; ?></h5>
                                                <p class="text-muted mb-0 text-truncate"><?php echo $_SESSION['telefone_heroi']; ?></p>
                                            </div>

                                            <div class="col-sm-8">
                                                <div class="pt-4">

                                                    <div class="row">
                                                        <div class="col-6">
                                                            <h5 class="font-size-15"><?php echo $qtd_conversas; ?></h5>
                                                            <p class="text-muted mb-0">Conversas</p>
                                                        </div>
                                                        <div class="col-6 financeiro">
                                                            <h5 class="font-size-15">R$<?php echo $saldo; ?></h5>
                                                            <p class="text-muted mb-0">Saldo</p>
                                                        </div>
                                                    </div>
                                                    <div class="mt-4">
                                                        <a href="editar-perfil.php" class="btn btn-primary btn-blue">Editar Perfil <i class="mdi mdi-arrow-right ml-1"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Últimas Conversas</h4>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <?php include 'blocks/minha_conversas_mini.php'; ?>
                                                <a class="btn btn-primary btn-blue" href="conversas.php"> Ver meu histórico de conversas <i class="mdi mdi-arrow-right ml-1"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card" style="display: none;">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Agendamentos</h4>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="l1">
                                                    <picture>
                                                        <source type="image/png" src="assets/images/users/avatar-1.jpg" />
                                                        <img src="assets/images/users/avatar-1.jpg" />
                                                    </picture>
                                                    <div class="np">
                                                        <p>Silvia Moreira</p>
                                                        <p>06/10/2020</p>
                                                    </div>
                                                    <div class="dropdown">
                                                        <a class="btn btn-primary btn-white dropdown-toggle"href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Opções  <i class="bx bx-chevron-down"></i></a>
                                                        <div class="dropdown-menu" id="editar2" aria-labelledby="dropdownMenuLink">
                                                            <a class="dropdown-item" href="#">Action</a>
                                                            <a class="dropdown-item" href="#">Another action</a>
                                                            <a class="dropdown-item" href="#">Something else here</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="l1">
                                                    <picture>
                                                        <source type="image/png" src="assets/images/users/avatar-1.jpg" />
                                                        <img src="assets/images/users/avatar-1.jpg" />
                                                    </picture>
                                                    <div class="np">
                                                        <p>Silvia Moreira</p>
                                                        <p>06/10/2020</p>
                                                    </div>
                                                    <div class="dropdown">
                                                        <a class="btn btn-primary btn-white dropdown-toggle"href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Opções  <i class="bx bx-chevron-down"></i></a>
                                                        <div class="dropdown-menu" id="editar3" aria-labelledby="dropdownMenuLink">
                                                            <a class="dropdown-item" href="#">Action</a>
                                                            <a class="dropdown-item" href="#">Another action</a>
                                                            <a class="dropdown-item" href="#">Something else here</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <a class="btn btn-primary btn-blue"> Ver agendamentos <i class="mdi mdi-arrow-right ml-1"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                    </div>
                    <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                <!-- Modal -->
                <div class="modal fade exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Order Details</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p class="mb-2">Product id: <span class="text-primary">#SK2540</span></p>
                                <p class="mb-4">Billing Name: <span class="text-primary">Neal Matthews</span></p>

                                <div class="table-responsive">
                                    <table class="table table-centered table-nowrap">
                                        <thead>
                                            <tr>
                                                <th scope="col">Product</th>
                                                <th scope="col">Product Name</th>
                                                <th scope="col">Price</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">
                                                    <div>
                                                        <img src="assets/images/product/img-7.png" alt="" class="avatar-sm">
                                                    </div>
                                                </th>
                                                <td>
                                                    <div>
                                                        <h5 class="text-truncate font-size-14">Wireless Headphone (Black)</h5>
                                                        <p class="text-muted mb-0">$ 225 x 1</p>
                                                    </div>
                                                </td>
                                                <td>$ 255</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">
                                                    <div>
                                                        <img src="assets/images/product/img-4.png" alt="" class="avatar-sm">
                                                    </div>
                                                </th>
                                                <td>
                                                    <div>
                                                        <h5 class="text-truncate font-size-14">Phone patterned cases</h5>
                                                        <p class="text-muted mb-0">$ 145 x 1</p>
                                                    </div>
                                                </td>
                                                <td>$ 145</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    <h6 class="m-0 text-right">Sub Total:</h6>
                                                </td>
                                                <td>
                                                    $ 400
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    <h6 class="m-0 text-right">Shipping:</h6>
                                                </td>
                                                <td>
                                                    Free
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    <h6 class="m-0 text-right">Total:</h6>
                                                </td>
                                                <td>
                                                    $ 400
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end modal -->

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


        <?php include "assets/includes/javascript-heroi.php"; ?>
        <!-- App js -->
        <script src="assets/js/app.js"></script>


        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script src="painel/engineJS/conversas_lado_heroi.js"></script>
        <script>
        $("#escolher-categoria").change(function() {
            var categoria = $(this).val();
            var url_atual = "nossos-anjos.php?c=" + categoria;
            window.location.replace(url_atual);
        });
        </script>

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script src="painel/engineJS/cria_conversa.js"></script>


        <script src="painel/engineZENVIA/SMS_JS/send_sms.js"></script>
        <script src="painel/engineZENVIA/WHATS_JS/send_whats.js"></script>

        <script>
          //envia_sms('554699177534', 'O heroi está lhe chamando');
          //envia_whats_novo_atendimento('554699177534', '*Guilherme Menegussi*');
        </script>

        <!-- TOUR
        <script src="node_modules/intro.js/intro.js"></script>
        <script src="assets/js/tour.js"></script> -->
        
    </body>

</html>
