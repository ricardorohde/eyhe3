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
        <title>Recarregue com cartão de crédito | Eyhe - Conversas acolhedoras em minutos</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Enfrente os Seus Problemas com a Ajuda dos Anjos Eyhe, Você Não Está Sozinho Nessa! Quem Já Viveu o Mesmo Desafio que Você Sabe como Superar e Vai te Contar Como. Acesse Já! Saúde frágil, relações tóxicas, pressão social, depressão, ansiedade. Você precisa de ajuda. Escolha um Anjo Eyhe agora mesmo e confie no poder de um ombro amigo. Temos Pessoas que já Passaram pelo que Você Está Passando e Podem te Ajudar. Conheça quem Já Viveu o Mesmo Desafio que Você Sabe como Superar e Vai te Contar Como. Dê uma Chance para Nós e para Você Mesmo. Tenha a Ajuda que Procura em Nosso Site e Desabafe sem Julgamentos. Faça seu Cadastro!" />
        <meta name="robots" content="index, follow" />
        <meta name="keywords" content="psicólogo online gratuito, ajuda psicológica, conversa online, conversar online, grupo de apoio, desabafo online, +desabafo +online, chat de bate papo, bate papo, bate papo online, site bate papo, quero conversar com alguém, como controlar crise de ansiedade, preciso de ajuda psicológica, como controlar a ansiedade, como acabar com a ansiedade, como dimnuir a ansiedade, como controlar a crise de ansiedade, site de desabafo, crise de ansiedade tem cura, preciso de ajuda emocional, chat ajuda emocional, +conversar +online, controlar a ansiedade, desabafo online auto ajuda, desabafar por chat, preciso de suporte emocional." />
        <meta content="Wilian Gulini" name="author" />
        <?php include "assets/includes/cssgeral.php"; ?>
        <link rel="stylesheet" href="assets/css/guia_style.css" />
        <link rel="stylesheet" href="assets/css/vertical-sidebar.css" />
        <link rel="stylesheet" href="assets/css/footer.css" />
        <link rel="stylesheet" href="assets/css/credito.css" />
    </head>
<?php include "assets/includes/header-heroi.php"; ?>

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid credito">
            <div class="row flex-column align-items-center">
            <p class="h4"><strong><i class='fab fa-cc-mastercard mr-1'></i> Recarga com Cartão de Crédito</strong></p>
                <div class="card two" id="card2">
                    <form method="POST" action="" id="form-cartao-credito">
                        Valor que deseja carregar: (R$)
                        <input type="number" name="valor"  step="0.01" min="0" required>

                        <input required type="tel" id="numerocartao" name="numerocartao" placeholder="Número do Cartão" />
                        <div class="input">
                            <input required type="tel" name="dataexpiracao" id="dataexpiracao" placeholder="Vencimento MM/AAAA" />
                            <input required type="tel" maxlength="7" name="codigo" placeholder="Código de segurança" />
                        </div>
                        <input required type="text" name="nome" placeholder="Nome do Titular" />
                        <input required type="tel" id="cpf" name="cpf" placeholder="CPF do Titular" />
                        <input required type="hidden" name="idheroi" value="<?php echo $_SESSION['id_heroi'];?>" />
                        <input required type="hidden" name="nomeheroi" value="<?php echo $_SESSION['nome_heroi'];?>" />
                        <input required type="hidden" name="emailheroi" value="<?php echo $_SESSION['email_heroi'];?>" />

                        <br/>
                        <picture>
                            <source type="image/webp" src="assets/images/band_card.png" />
                            <source type="image/png" src="assets/images/band_card.png" />
                            <img src="assets/images/band_card.png" />
                        </picture>
                        <br/>
                        <button type="submit" style="width:100%!important" class="btn btn-blue">Confirmar Recarga</button>
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
