<?php include "assets/includes/header-heroi.php"; ?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Financeiro do Herói | Eyhe - Conversas acolhedoras em minutos</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <?php include "assets/includes/cssgeral.php"; ?>
        <link rel="stylesheet" href="assets/css/financeiro.css" />
        <link rel="stylesheet" href="assets/css/guia_style.css" />
        <link rel="stylesheet" href="assets/css/vertical-sidebar.css" />
        <link rel="stylesheet" href="assets/css/footer.css" />
    </head>
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

 ?>
<div class="main-content">
    <div class="page-content">
        <div class="container mobile">
            <div class="row d-flex justify-content-center">
                <div class="accordion" id="accordionExample">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h5 class="mb-0">
                                <button class="btn btn-white" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Efetue uma recarga
                                </button>
                            </h5>
                        </div>

                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <div class="card-body accordion" id="accordionInter" >
                                <p class="h4"><strong>Selecione a forma de pagamento:</strong></p>
                                <div class="card-header" id="interno">
                                    <a class="cred btn btn-white" id="credito" href="credito.php">Cartão de Crédito</a>
                                </div>
                                <div class="card-header">
                                    <a class="deb btn btn-white" id="debito" href="debito.php">Cartão de Débito</a>
                                </div>
                                <div class="card-header">
                                    <a class="bol btn btn-white" href="boleto.php">Boleto Bancário</a>
                                </div>
                                <div class="card-header">
                                    <a class="pixx btn btn-white" href="pix.php">PIX</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingTwo">
                        <h5 class="mb-0">
                            <button class="btn btn-white collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Histórico de pagamentos
                            </button>
                        </h5>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Notifications</h4>

                            <div  data-simplebar style="max-height: 310px;">
                                <ul class="verti-timeline list-unstyled">
                                    <li class="event-list">
                                        <div class="event-timeline-dot">
                                            <i class="bx bx-right-arrow-circle font-size-18"></i>
                                        </div>
                                        <div class="media">
                                            <div class="mr-3">
                                                <h5 class="font-size-14">15 Mor <i class="bx bx-right-arrow-alt font-size-16 text-primary align-middle ml-2"></i></h5>
                                            </div>
                                            <div class="media-body">
                                                <div>
                                                    If several languages coalesce of the resulting.
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="event-list">
                                        <div class="event-timeline-dot">
                                            <i class="bx bx-right-arrow-circle font-size-18"></i>
                                        </div>
                                        <div class="media">
                                            <div class="mr-3">
                                                <h5 class="font-size-14">14 Mor <i class="bx bx-right-arrow-alt font-size-16 text-primary align-middle ml-2"></i></h5>
                                            </div>
                                            <div class="media-body">
                                                <div>
                                                    New common language will be more simple and regular than the existing
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="event-list">
                                        <div class="event-timeline-dot">
                                            <i class="bx bx-right-arrow-circle font-size-18"></i>
                                        </div>
                                        <div class="media">
                                            <div class="mr-3">
                                                <h5 class="font-size-14">13 Mor <i class="bx bx-right-arrow-alt font-size-16 text-primary align-middle ml-2"></i></h5>
                                            </div>
                                            <div class="media-body">
                                                <div>
                                                    It will seem like simplified English as a skeptical Cambridge
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="event-list">
                                        <div class="event-timeline-dot">
                                            <i class="bx bx-right-arrow-circle font-size-18"></i>
                                        </div>
                                        <div class="media">
                                            <div class="mr-3">
                                                <h5 class="font-size-14">13 Mor <i class="bx bx-right-arrow-alt font-size-16 text-primary align-middle ml-2"></i></h5>
                                            </div>
                                            <div class="media-body">
                                                <div>
                                                    To achieve this, it would be necessary
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="event-list">
                                        <div class="event-timeline-dot">
                                            <i class="bx bx-right-arrow-circle font-size-18"></i>
                                        </div>
                                        <div class="media">
                                            <div class="mr-3">
                                                <h5 class="font-size-14">12 Mor <i class="bx bx-right-arrow-alt font-size-16 text-primary align-middle ml-2"></i></h5>
                                            </div>
                                            <div class="media-body">
                                                <div>
                                                    Cum sociis natoque penatibus et magnis dis
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="event-list">
                                        <div class="event-timeline-dot">
                                            <i class="bx bx-right-arrow-circle font-size-18"></i>
                                        </div>
                                        <div class="media">
                                            <div class="mr-3">
                                                <h5 class="font-size-14">11 Mor <i class="bx bx-right-arrow-alt font-size-16 text-primary align-middle ml-2"></i></h5>
                                            </div>
                                            <div class="media-body">
                                                <div>
                                                    New common language will be more simple and regular than the existing
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="event-list">
                                        <div class="event-timeline-dot">
                                            <i class="bx bx-right-arrow-circle font-size-18"></i>
                                        </div>
                                        <div class="media">
                                            <div class="mr-3">
                                                <h5 class="font-size-14">10 Mor <i class="bx bx-right-arrow-alt font-size-16 text-primary align-middle ml-2"></i></h5>
                                            </div>
                                            <div class="media-body">
                                                <div>
                                                    It will seem like simplified English as a skeptical Cambridge
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="event-list">
                                        <div class="event-timeline-dot">
                                            <i class="bx bx-right-arrow-circle font-size-18"></i>
                                        </div>
                                        <div class="media">
                                            <div class="mr-3">
                                                <h5 class="font-size-14">09 Mor <i class="bx bx-right-arrow-alt font-size-16 text-primary align-middle ml-2"></i></h5>
                                            </div>
                                            <div class="media-body">
                                                <div>
                                                    To achieve this, it would be necessary
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingThree">
                        <h5 class="mb-0">
                            <button class="btn btn-white collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Solicitar reembolso
                            </button>
                        </h5>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                        <div class="card-body">
                            <p class="title">Sentimos muito por isso :(</p>
                            <p>Conte-nos o motivo de você querer solicitar o reembolso, nossa equipe entrará em contato em até48h após a solicitação.</p>
                            <textarea></textarea>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid financeiro">
            <div class="row">
                <div class="bgbox"></div>
                <div class="divbox" id="divbox">
                    <div class="boxintro">
                        <div class="card one" id="card1">
                            <p class="h4"><strong>Selecione a forma de pagamento:</strong></p>
                            <a class="cred btn btn-white" href="credito.php">Cartão de Crédito</a>
                            <a class="deb btn btn-white" href="debito.php">Cartão de Débito</a>
                            <a class="bol btn btn-white" href="boleto.php">Boleto Bancário</a>
                            <a class="pix btn btn-white" href="pix.php">PIX</a>
                        </div>
                        <div class="card reembolso" id="reembolso">
                            <p class="title">Sentimos muito por isso :(</p>
                            <p>Conte-nos o motivo de você querer solicitar o reembolso, nossa equipe entrará em contato em até 48h após a solicitação.</p>
                            <textarea></textarea>
                        </div>
                    </div>
                    <button class="btn btn-blue" style="width: 100px!important;">Fechar</button>
                </div>
                <div class="col-sm-4 col-md-4 col-lg-4">
                    <div class="card">
                        <p class="h4">Meu Saldo</p>
                        <div class="div d-flex">
                            <div class="saldo">
                                <p class="h2">
                                R$ <?php echo $saldo; ?></p>
                            </div>
                            <div class="recarga">
                                <a class="btn btn-blue lightbox" id="fundos">Efetuar uma Recarga</a>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <p class="h4">Solicitar Reembolso</p>
                        <div class="recarga">
                            <a class="btn btn-white" id="btnR">Solicitar Reembolso</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8 col-md-8 col-lg-8">
                    <div class="card">
                        <div class="card-body" style="padding: 1rem !important;">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="clearfix">
                                        <div class="float-right">
                                            <div class="input-group input-group-sm">
                                                <select class="custom-select custom-select-sm">
                                                    <option selected>Janeiro</option>
                                                    <option value="1">Feveiro</option>
                                                    <option value="2">Março</option>
                                                    <option value="3">Abril</option>
                                                    <option value="4">Maio</option>
                                                    <option value="5">Junho</option>
                                                    <option value="6">Julho</option>
                                                    <option value="7">Agosto</option>
                                                    <option value="8">Setembro</option>
                                                    <option value="9">Outubro</option>
                                                    <option value="10">Novembro</option>
                                                    <option value="11">Dezembro</option>
                                                </select>
                                                <div class="input-group-append">
                                                    <label class="input-group-text">Mês</label>
                                                </div>
                                            </div>
                                        </div>
                                        <h4 class="h5">Histórico de Pagamentos</h4>
                                    </div>
                                    <div class="text-muted">
                                        <div class="mb-4">
                                            <p>Este mês</p>
                                            <h4>R$243.35</h4>
                                        </div>

                                        <div>
                                            <a href="historico-pagamento.php" class="btn btn-white">Histórico de Pagamentos</a>
                                        </div>

                                        <div class="mt-4">
                                            <p class="mb-2">Ultimo mês</p>
                                            <h5>R$221.04</h5>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-lg-8">
                                    <div id="line-chart" class="apex-charts" dir="ltr"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

                <?php
                    include "blocks/historico_financeiro_heroi.php";
                ?>
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

         <!-- form mask -->
        <script src="assets/libs/inputmask/min/jquery.inputmask.bundle.min.js"></script>

        <script src="assets/js/mask.js"></script>
    </body>
</html>
