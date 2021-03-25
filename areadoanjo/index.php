<?php
    include "../assets/includes/header-anjo.php";
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Área do Anjo  | EYHE - Conversas acolhedoras em minutos</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <?php include "../assets/includes/cssgeralanjos.php"; ?>
        <link rel="shortcut icon" href="../assets/images/favico.png">
        <link rel="stylesheet" href="../assets/css/guia_style.css" />
        <link rel="stylesheet" href="../assets/css/vertical-sidebar.css" />
        <link rel="stylesheet" href="../assets/css/dashboardanjo.css" />
        <link rel="stylesheet" href="../assets/css/footer.css" />
        <link rel="stylesheet" href="../assets/css/animate.css" />
        <link rel="stylesheet" href="../assets/css/pagamentoConfirmadoModal.css" />
        <link rel="stylesheet" href="../node_modules/intro.js/introjs.css" />
    </head>

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid dash-angel">
            <div class="row justify-content-center">
                <div class="col-xl-8">

                    <?php include ('enginePHP/conecta.php');?>

                    <?php include ('blocks/herois_na_sala_de_espera.php');?>

                    <?php include ('blocks/herois_plantao.php');?>

                    <?php include ('blocks/ultimas_conversas_e_agendamentos.php');?>


                </div>
                <div class="col-xl-4">

                    <?php include ('blocks/resumo_atendimentos.php');?>

                    <!--<?php include ('blocks/score.php');?>-->

                    <?php include ('blocks/financeiro_mini.php');?>

                </div>
            </div>
        </div>
    </div>



<?php
    include "../assets/includes/footer.php";
?>
</div>
    <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->
    <?php include "../assets/includes/javascript.php"; ?>
    <?php include "../assets/includes/apexchart.php"; ?>
    <?php include "../assets/includes/appjs.php"; ?>
    <script src="../assets/libs/jquery-knob/jquery.knob.min.js"></script>
    <script src="../assets/js/pages/jquery-knob.init.js"></script>
    <script src="../assets/js/app.js"></script>
    <script src="../assets/js/core.js"></script>
    <script src="../assets/js/charts.js"></script>
    <script src="../assets/js/animated.js"></script>
    <script src="../assets/js/vel.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="engineJS/conversas_lado_anjo.js"></script>

    <script>
      var MEUID  = '<?php echo $_SESSION['id_anjo']; ?>';
    </script>
    <script src="engineJS/detecta_novo_heroi_na_sala_de_espera.js"></script>
    <script src="engineJS/detecta_novo_heroi_uber.js"></script>

    <script src="engineJS/atende_sala_de_espera.js"></script>
    <script src="engineJS/atende_heroi_plantao.js"></script>
    <script>
        $(document).ready(function() {
            if(screen.width < 768) {
                $("#vertical-menu-btn").on("click", function() {
                    $(".vertical-menu").toggle();
                });
            }
        });

    </script>
    <!-- TOUR
    <script src="../node_modules/intro.js/intro-angel.js"></script>
    <script src="../assets/js/tour-anjo.js"></script>-->
</body>

</html>
