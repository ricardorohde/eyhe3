<?php include "assets/includes/header-heroi.php"; ?>

<!doctype html>
<html lang="pt-BR">
    <head>
        <?php include "tagmanagerhead.php"; ?>
        <meta charset="utf-8" />
        <title>Projects Overview | Skote - Responsive Bootstrap 4 Admin Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Enfrente os Seus Problemas com a Ajuda dos Anjos Eyhe, Você Não Está Sozinho Nessa! Quem Já Viveu o Mesmo Desafio que Você Sabe como Superar e Vai te Contar Como. Acesse Já! Saúde frágil, relações tóxicas, pressão social, depressão, ansiedade. Você precisa de ajuda. Escolha um Anjo Eyhe agora mesmo e confie no poder de um ombro amigo. Temos Pessoas que já Passaram pelo que Você Está Passando e Podem te Ajudar. Conheça quem Já Viveu o Mesmo Desafio que Você Sabe como Superar e Vai te Contar Como. Dê uma Chance para Nós e para Você Mesmo. Tenha a Ajuda que Procura em Nosso Site e Desabafe sem Julgamentos. Faça seu Cadastro!" />
        <meta name="robots" content="index, follow" />
        <meta name="keywords" content="psicólogo online gratuito, ajuda psicológica, conversa online, conversar online, grupo de apoio, desabafo online, +desabafo +online, chat de bate papo, bate papo, bate papo online, site bate papo, quero conversar com alguém, como controlar crise de ansiedade, preciso de ajuda psicológica, como controlar a ansiedade, como acabar com a ansiedade, como dimnuir a ansiedade, como controlar a crise de ansiedade, site de desabafo, crise de ansiedade tem cura, preciso de ajuda emocional, chat ajuda emocional, +conversar +online, controlar a ansiedade, desabafo online auto ajuda, desabafar por chat, preciso de suporte emocional." />
        <meta content="Wilian Gulini" name="author" />
        <?php include "assets/includes/cssgeral.php"; ?>
        <link rel="stylesheet" href="assets/css/guia_style.css" />
        <link rel="stylesheet" href="assets/css/vertical-sidebar.css" />
        <link rel="stylesheet" href="assets/css/confirmar-agendamento.css" />
        <link rel="stylesheet" href="assets/css/footer.css" />
    </head>

<div class="main-content conf-agend">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
            <div class="bgbox" id="bgbox2"></div>
            <div class="divbox" id="divbox2">
                <div class="boxintro" id="boxintro">
                    <div class="card one" id="card-one">
                        <p class="h4"><strong>Selecione a forma de pagamento:</strong></p>
                            <a class="cred btn btn-white" href="credito.php">Cartão de Crédito</a>
                            <a class="deb btn btn-white" href="debito.php">Cartão de Débito</a>
                            <a class="bol btn btn-white" href="boleto.php">Boleto Bancário</a>
                            <a class="pix btn btn-white" href="pix.php">PIX</a>
                    </div>
                </div>
                <button class="btn btn-blue" style="width: 100px!important;">Fechar</button>
            </div>
                <div class="card">
                    <div class="div d-flex">
                        <div class="saldo">
                            <p class="h4">Você está pagando:</p>
                            <p class="h2">R$ 24,90</p>
                        </div>
                        <div class="recarga-cartao">
                            <a href="#" class="btn btn-white" id="rec">Efetue uma Recarga</a>
                            <a href="credito.php" class="btn btn-white" id="credito2">Cartão de Crédito</a>
                        </div>
                        <div class="confirm">
                            <a href="detalhe-agendamento.php" class="btn btn-blue">Confirmar Pagamento</a>
                        </div>
                    </div>
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
    <?php include "assets/includes/javascript-heroi.php"; ?>

        <script src="assets/js/app.js"></script>
        <script src="assets/js/scriptligthbox.js"></script>
    </body>
</html>
