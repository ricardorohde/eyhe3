<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>header anjo</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <?php include "../assets/includes/cssgeralanjos.php"; ?>
        <link rel="stylesheet" href="../assets/css/guia_style.css" />
        <link rel="stylesheet" href="../assets/css/vertical-sidebar.css" />
        <link rel="stylesheet" href="../assets/css/footer.css" />
        <link rel="stylesheet" href="../assets/css/animate.css" />
        <link rel="stylesheet" href="../assets/css/configuracoes.css" />
    </head>
<?php
    include "../assets/includes/header-anjo.php";
?>
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid config">
            <div class="row flex-column align-items-center">
                <p class="h5"><strong>Configurações</strong></p>
                <div class="col-sm-7 col-md-7">
                    <p><strong>Gerencia suas notificações</strong></p>
                    <p class="text">Selecione onde deseja receber suas notificações. Altere sempre que precisar</p>
                    <div class="email">
                        <p>Email</p>
                        <ul>
                            <li id="Verde" class="verde"></li>
                            <li id="Vermelho" class="vermelho"></li>
                        </ul>
                    </div>
                    <div class="sms">
                        <p>SMS</p>
                        <ul>
                            <li id="Verde1" class="verde"></li>
                            <li id="Vermelho1" class="vermelho"></li>
                        </ul>
                    </div>
                    <div class="whats">
                        <p>WhatsApp</p>
                        <ul>
                            <li id="Verde2" class="verde"></li>
                            <li id="Vermelho2" class="vermelho"></li>
                        </ul>
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
    <script src="../assets/js/config.js"></script>
</body>

</html>