<?php include "assets/includes/header-heroi.php"; ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Carregar por Boleto | Eyhe - Conversas acolhedoras em minutos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <?php include "assets/includes/cssgeral.php"; ?>
    <link rel="stylesheet" href="assets/css/guia_style.css" />
    <link rel="stylesheet" href="assets/css/vertical-sidebar.css" />
    <link rel="stylesheet" href="assets/css/footer.css" />
    <link rel="stylesheet" href="assets/css/boleto.css" />
</head>

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid boleto">
            <div class="row flex-column align-items-center">
                <p class="h4"><strong><i class='fas fa-barcode mr-1'></i>Recarga com Boleto Bancário</strong></p>
                <div class="card two" id="card3">
                    <form class="d-flex flex-column" method="POST" action="#" id="form-boleto">
                        <input type="number" name="valor"  step="0.01" min="0" placeholder="Valor que deseja carregar: (R$)" required>
                        <input type="email" name="email" required placeholder="E-mail" value="<?php echo $_SESSION['email_heroi']; ?>"/>
                        <input type="tel" name="telefone" placeholder="Telefone ou Celular" required/>
                        <input type="text" id="cpf" name="cpf" required placeholder="CPF válido" />
                        <input type="hidden" name="nome" required value="<?php echo $_SESSION['nome_heroi']; ?>"/>
                        <input type="hidden" name="id" required value="<?php echo $_SESSION['id_heroi']; ?>"/>
                        <br/>

                        <button class="btn btn-blue" type="submit" style="width: 100%!important">Gerar Boleto</button>
                    </form>
                    <br/>
                    <a href="financeiro.php" class=""><b>Voltar para Financeiro</b></a>
                    <br/>
                </div>
            </div>
        </div>
    </div>

    <?php
        include "assets/includes/footer.php";
    ?>
</div>

</div>
        <!-- END layout-wrapper -->

        <!-- JAVASCRIPT -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>

        <!-- apexcharts -->
        <script src="assets/libs/apexcharts/apexcharts.min.js"></script>

        <!-- Saas dashboard init -->
        <script src="assets/js/pages/saas-dashboard.init.js"></script>

        <script src="assets/js/app.js"></script>
        <script src="assets/js/scriptligthbox.js"></script>



        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
        <script src="painel/engineJS/financeiro_heroi.js"></script>
    </body>
</html>
