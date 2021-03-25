<?php include "assets/includes/header-invisivel.php"; ?>

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
        </div>
    </div>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Click aqui</button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content" id="salaEspera">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"><strong>Tem certeza que deseja sair da sala de espera?</strong></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Você <u>não poderá chamar outro Anjo</u> enquanto estiver na Sala de Espera.</p>
                <picture>
                    <source type="image/webp" src="assets/images/sala/time.webp" />
                    <source type="image/png" src="assets/images/sala/time.png" />
                    <img src="assets/images/sala/time.png" />
                </picture>
                <p>Ela ficará pequena no canto da sua tela, mostrando o tempo restante de espera.</p>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button type="button" class="btn btn-blue" data-dismiss="modal">Ok, entendi</button>
            </div>
            </div>
        </div>
    </div>
        <div id="app"></div>
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
        <script src="assets/js/invisivel.js"></script>

    </body>
</html>
