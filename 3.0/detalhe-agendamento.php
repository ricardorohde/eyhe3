<?php include "assets/includes/header-heroi.php"; ?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Projects Overview | Skote - Responsive Bootstrap 4 Admin Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <?php include "assets/includes/cssgeral.php"; ?>
        <link rel="stylesheet" href="assets/css/guia_style.css" />
        <link rel="stylesheet" href="assets/css/vertical-sidebar.css" />
        <link rel="stylesheet" href="assets/css/footer.css" />
        <link rel="stylesheet" href="assets/css/detalhe-agendamento-anjo.css" />
    </head>
    <div class="main-content agend">
        <div class="page-content agend">
            <div class="container-fluid agend">
                <p class="h5">Detalhes dos Agendamentos</p>
                <div class="row">
                    <div class="card agend">
                        <div class="lane">
                            <p class="h6"><strong>07 Out, 2020</strong></p>
                            <p>Início 13:00 / Término 13:40</p>
                        </div>
                        <div class="lane1 d-flex justify-content-between">
                            <div class="l1">
                                <p class="anjo">Anjo:</p>
                                <p><strong>Leandro Manfroi</strong></p>
                            </div>
                            <div class="l2 d-flex justify-content-end align-items-center">
                                <a class="btn btn-white" href="perfil-anjo.php">Ver perfil</a>
                            </div>
                        </div>
                        <div class="lane2">
                            <p><strong>Status</strong></p>
                            <span class="badge badge-pill badge-soft-success font-size-12">Confirmado</span>
                        </div>
                        <div class="lane3 d-flex justify-content-center">
                            <a class="btn btn-blue" href="#">Deixar mensagem <i class="fas fa-arrow-right"></i></a>
                        </div>
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
        <?php include "assets/includes/javascript-heroi.php"; ?>
        <script src="assets/js/app.js"></script>
</body>
</html>
