<?php include "assets/includes/header-heroi.php"; ?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Recarregue com cartão de crédito | Eyhe - Conversas acolhedoras em minutos</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <?php include "assets/includes/cssgeral.php"; ?>
        <link rel="stylesheet" href="assets/css/guia_style.css" />
        <link rel="stylesheet" href="assets/css/vertical-sidebar.css" />
        <link rel="stylesheet" href="assets/css/footer.css" />
        <link rel="stylesheet" href="assets/css/credito.css" />
    </head>
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid credito">
            <div class="row flex-column align-items-center">
            <p class="h4"><strong><i class='fab fa-cc-mastercard mr-1'></i> Recarga com Cartão de Crédito</strong></p>
                <div class="card two" id="card2">
                    <form method="POST" action="" id="form-cartao-credito">
                        Valor que deseja carregar: (R$)
                        <input type="number" name="valor"  step="0.01" min="0" required>

                        <input required type="tel" id="numerocartao" name="numerocartao" placeholder="Número do Cartão" />
                        <div class="input">
                            <input required type="tel" name="dataexpiracao" id="dataexpiracao" placeholder="Vencimento MM/AAAA" />
                            <input required type="tel" maxlength="7" name="codigo" placeholder="Código de segurança" />
                        </div>
                        <input required type="text" name="nome" placeholder="Nome do Titular" />
                        <input required type="tel" id="cpf" name="cpf" placeholder="CPF do Titular" />
                        <input required type="hidden" name="idheroi" value="<?php echo $_SESSION['id_heroi'];?>" />
                        <input required type="hidden" name="nomeheroi" value="<?php echo $_SESSION['nome_heroi'];?>" />
                        <input required type="hidden" name="emailheroi" value="<?php echo $_SESSION['email_heroi'];?>" />

                        <br/>
                        <picture>
                            <source type="image/webp" src="assets/images/band_card.png" />
                            <source type="image/png" src="assets/images/band_card.png" />
                            <img src="assets/images/band_card.png" />
                        </picture>
                        <br/>
                        <button type="submit" style="width:100%!important" class="btn btn-blue">Confirmar Recarga</button>
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
