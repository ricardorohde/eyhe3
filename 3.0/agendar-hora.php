<?php
    include "assets/includes/header-heroi.php";
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Defina dia e horário do seu agendamento | Eyhe - Conversas acolhedoras em minutos</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <?php include "assets/includes/cssgeral.php"; ?>
        <link rel="stylesheet" href="assets/css/agendar-hora.css" />
        <link rel="stylesheet" href="assets/css/guia_style.css" />
        <link rel="stylesheet" href="assets/css/vertical-sidebar.css" />
        <link rel="stylesheet" href="assets/css/footer.css" />
    </head>

    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid agenda">
                <p class="h5 agendar">
                    Agendamentos
                </p>
                <div class="card">
                    <p><strong>Agende seu atendimento com o Anjo Leandro Manfroi</strong></p>
                    <div class="input">
                        <p>Selecione a data</p>
                        <input type="text" name="data" placeholder="dd/mm/aaaa"/>
                        <p>Selecione a hora</p>
                        <input type="text" name="hora" placeholder="19:00" />
                        <p>Confirme o celular</p>
                        <input type="text" name="celular" />
                    </div>
                    <div class="btns">
                        <a href="confirmar-agendamento.php" class="btn btn-blue">Confirmar Agendamento</a>
                        <a href="agendamentos.php" class="btn btn-white">Ver meus agendamentos</a>
                    </div>
                </div>
            </div>
        </div>

        <?php
            include "assets/includes/footer.php";
        ?>
    </div>
    <?php include "assets/includes/javascript-heroi.php"; ?>
    <script src="assets/js/app.js"></script>
</body>

</html>
