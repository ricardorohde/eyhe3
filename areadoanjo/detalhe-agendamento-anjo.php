<!doctype html>
<html lang="en">
    <head>
    <?php include "../tagmanagerhead.php"; ?>
        <meta charset="utf-8" />
        <title>header anjo</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="../assets/images/favicon.ico">
        <?php include "../assets/includes/cssgeralanjos.php"; ?>
        <link rel="stylesheet" href="../assets/css/guia_style.css" />
        <link rel="stylesheet" href="../assets/css/vertical-sidebar.css" />
        <link rel="stylesheet" href="../assets/css/detalhe-agendamento-anjo.css" />
        <link rel="stylesheet" href="../assets/css/footer.css" />
    </head>
<?php 
    include "../assets/includes/header-anjo.php";
?>
    <div class="main-content agend detalhe">
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
                                <p class="anjo">Herói:</p>
                                <p><strong>Leandro Manfroi</strong></p>
                            </div>
                            <div class="l2 d-flex justify-content-end align-items-center">
                                <a class="btn btn-white" href="perfil-do-anjo.php">Ver perfil</a>
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
            include "../assets/includes/footer-anjo.php";
        ?>
    </div>
            <!-- end main content-->
    </div>
        <!-- END layout-wrapper -->
        <?php include "../assets/includes/javascript.php"; ?>
        <?php include "../assets/includes/appjs.php"; ?>
</body>
</html>