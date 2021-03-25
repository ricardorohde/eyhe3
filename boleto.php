<?php include "painel/engine/verifica_sessao_heroi.php"; ?>

<!doctype html>
<html lang="pt-BR">
<head>

      <!-- Google Tag Manager -->
      <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
      new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
      j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
      'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
      })(window,document,'script','dataLayer','GTM-MRZVDDW');</script>

    <meta charset="utf-8" />
    <title>Carregar por Boleto | Eyhe - Conversas acolhedoras em minutos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Enfrente os Seus Problemas com a Ajuda dos Anjos Eyhe, Você Não Está Sozinho Nessa! Quem Já Viveu o Mesmo Desafio que Você Sabe como Superar e Vai te Contar Como. Acesse Já! Saúde frágil, relações tóxicas, pressão social, depressão, ansiedade. Você precisa de ajuda. Escolha um Anjo Eyhe agora mesmo e confie no poder de um ombro amigo. Temos Pessoas que já Passaram pelo que Você Está Passando e Podem te Ajudar. Conheça quem Já Viveu o Mesmo Desafio que Você Sabe como Superar e Vai te Contar Como. Dê uma Chance para Nós e para Você Mesmo. Tenha a Ajuda que Procura em Nosso Site e Desabafe sem Julgamentos. Faça seu Cadastro!" />
    <meta name="robots" content="index, follow" />
    <meta name="keywords" content="psicólogo online gratuito, ajuda psicológica, conversa online, conversar online, grupo de apoio, desabafo online, +desabafo +online, chat de bate papo, bate papo, bate papo online, site bate papo, quero conversar com alguém, como controlar crise de ansiedade, preciso de ajuda psicológica, como controlar a ansiedade, como acabar com a ansiedade, como dimnuir a ansiedade, como controlar a crise de ansiedade, site de desabafo, crise de ansiedade tem cura, preciso de ajuda emocional, chat ajuda emocional, +conversar +online, controlar a ansiedade, desabafo online auto ajuda, desabafar por chat, preciso de suporte emocional." />
    <meta content="Wilian Gulini" name="author" />
    <?php include "assets/includes/cssgeral.php"; ?>
    <link rel="stylesheet" href="assets/css/guia_style.css" />
    <link rel="stylesheet" href="assets/css/vertical-sidebar.css" />
    <link rel="stylesheet" href="assets/css/footer.css" />
    <link rel="stylesheet" href="assets/css/boleto.css" />
</head>

<?php include "assets/includes/header-heroi.php"; ?>
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid boleto">
            <div class="row flex-column align-items-center">
                <p class="h4"><strong><i class='fas fa-barcode mr-1'></i>Recarga com Boleto Bancário</strong></p>
                <div class="card two" id="card3">
                    <form class="d-flex flex-column" method="POST" action="#" id="form-boleto">
                        <input type="number" name="valor"  step="0.01" min="0" placeholder="Valor que deseja carregar: (R$)" required>
                        <input type="email" name="email" required placeholder="E-mail" value="<?php echo $_SESSION['email_heroi']; ?>"/>
                        <input type="tel" name="telefone" placeholder="Telefone ou Celular" required/>
                        <input type="text" id="cpf" name="cpf" required placeholder="CPF válido" />
                        <input type="hidden" name="nome" required value="<?php echo $_SESSION['nome_heroi']; ?>"/>
                        <input type="hidden" name="id" required value="<?php echo $_SESSION['id_heroi']; ?>"/>
                        <br/>

                        <button class="btn btn-blue" type="submit" style="width: 100%!important">Gerar Boleto</button>
                    </form>
                    <br/>
                    <a href="financeiro.php" class=""><b>Voltar para Financeiro</b></a>
                    <br/>
                </div>
            </div>
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



        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
        <script src="painel/engineJS/financeiro_heroi.js"></script>
    </body>
</html>
