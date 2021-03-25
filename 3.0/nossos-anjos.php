<?php include "assets/includes/header-heroi.php"; ?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Nossos Anjos | Eyhe - Conversas acolhedoras em minutos</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <?php include "assets/includes/cssgeral.php"; ?>
        <link rel="stylesheet" href="assets/css/guia_style.css" />
        <link rel="stylesheet" href="assets/css/vertical-sidebar.css" />
        <link rel="stylesheet" href="assets/css/footer.css" />
        <link rel="stylesheet" href="assets/css/nossos-anjos.css" />
    </head>

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-xl-8">
                  <div class="card search">
                      <div class="text-primary">
                          <p style="font-size: 18px;"><b> Olá! Sobre o que gostaria de conversar? </b></p>
                      </div>
                      <form method="POST" action="">
                          <div class="ls-custom-select d-flex">
                              <select class="ls-select">
                                  <option selected>Todos os assuntos</option>
                                  <option>Ansiedade/Depressão</option>
                                  <option>Vícios/Dependência</option>
                                  <option>Violência doméstica/Abuso</option>
                                  <option>Relacionamento</option>
                                  <option>Problema de saúde</option>
                                  <option>Orientação sexual</option>
                              </select>
                          </div>
                      </form>
                      <div class="text-secondary">
                          <center> Nesse momento
                          <p class="green"><strong>45 Anjos /</strong> 5 online</p></center>
                      </div>
                  </div>


                    <?php

                    include "blocks/card-anjo.php";

                    ?>


                </div>
            </div>
        </div>
    </div>

    <?php

    include "assets/includes/footer.php";

    ?>
</div>

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
        <?php include "assets/includes/javascript-heroi.php"; ?>

        <!-- App js -->
        <script src="assets/js/app.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script src="painel/engineJS/cria_conversa.js"></script>

    </body>

</html>
