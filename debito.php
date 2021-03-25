<?php include "assets/includes/header.php"; ?>

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid credito">
            <div class="row flex-column align-items-center">
                <p class="h4"><strong>Cartão de Débito</strong></p>
                <div class="card two" id="card3">
                    <form method="POST" action="#">
                        <input type="text" id="money" />
                        <br>
                        <input type="tel" name="number-card" placeholder="Número do Cartão" />
                        <div class="input">
                            <input type="tel" name="validity_deb" placeholder="MM/WW" />
                            <input type="tel" name="CVV_deb" placeholder="CVV" />
                        </div>
                        <input type="text" name="nome_deb" placeholder="Nome do Titular" />
                        <input type="tel" name="cpf_deb" placeholder="CPF do Titular" />
                    </form>
                    <picture>
                        <source type="image/webp" src="assets/images/band_card.png" />
                        <source type="image/png" src="assets/images/band_card.png" />
                        <img src="assets/images/band_card.png" />
                    </picture>
                    <a class="btn btn-blue">Confirmar Pagamento</a>
                </div>
            </div>
        </div>
    </div>

    <?php
        include "assets/includes/footer-confirm.php";
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

         <!-- form mask -->
        <script src="assets/libs/inputmask/min/jquery.inputmask.bundle.min.js"></script>


        <script src="assets/js/mask.js"></script>
    </body>
</html>
