<?php
    include "painel/engine/verifica_sessao_heroi.php";
?>
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
        <title>Agendamentos do Herói | Eyhe - Conversas acolhedoras em minutos</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Enfrente os Seus Problemas com a Ajuda dos Anjos Eyhe, Você Não Está Sozinho Nessa! Quem Já Viveu o Mesmo Desafio que Você Sabe como Superar e Vai te Contar Como. Acesse Já! Saúde frágil, relações tóxicas, pressão social, depressão, ansiedade. Você precisa de ajuda. Escolha um Anjo Eyhe agora mesmo e confie no poder de um ombro amigo. Temos Pessoas que já Passaram pelo que Você Está Passando e Podem te Ajudar. Conheça quem Já Viveu o Mesmo Desafio que Você Sabe como Superar e Vai te Contar Como. Dê uma Chance para Nós e para Você Mesmo. Tenha a Ajuda que Procura em Nosso Site e Desabafe sem Julgamentos. Faça seu Cadastro!" />
        <meta name="robots" content="index, follow" />
        <meta name="keywords" content="psicólogo online gratuito, ajuda psicológica, conversa online, conversar online, grupo de apoio, desabafo online, +desabafo +online, chat de bate papo, bate papo, bate papo online, site bate papo, quero conversar com alguém, como controlar crise de ansiedade, preciso de ajuda psicológica, como controlar a ansiedade, como acabar com a ansiedade, como dimnuir a ansiedade, como controlar a crise de ansiedade, site de desabafo, crise de ansiedade tem cura, preciso de ajuda emocional, chat ajuda emocional, +conversar +online, controlar a ansiedade, desabafo online auto ajuda, desabafar por chat, preciso de suporte emocional." />
        <meta content="Wilian Gulini" name="author" />
        <?php include "assets/includes/cssgeral.php"; ?>
        <link rel="stylesheet" href="assets/css/guia_style.css" />
        <link rel="stylesheet" href="assets/css/vertical-sidebar.css" />
        <link rel="stylesheet" href="assets/css/agendamento.css" />
        <link rel="stylesheet" href="assets/css/footer.css" />
    </head>
    <?php include "assets/includes/header-heroi.php"; ?>

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <p class="h5">Agendamentos</p>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-centered table-nowrap mb-0">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Data da conversa</th>
                                            <th>Nome do Anjo</th>

                                            <th>Detalhes</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                      <?php
                                          include 'painel/engine/conecta.php';
                                          $idheroi = $_SESSION['id_heroi'];
                                          $consulta = $conexao->query("SELECT * FROM agendamentos where idheroi = $idheroi order by id desc");
                                          while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {

                                      ?>


                                        <tr>
                                            <td>
                                              <?php echo date('d/m/Y ', strtotime($linha['dataagendamento']));?>
                                            </td>
                                            <td><?php echo $linha['nomeanjo']; ?></td>
                                            <td>
                                                <span class="badge badge-pill badge-soft-success font-size-12">Confirmado</span>
                                            </td>

                                        </tr>

                                      <?php } ?>


                                    </tbody>
                                </table>
                            </div>
                            <!-- end table-responsive -->
                        </div>
                    </div>
                    <div class="seta">
                        <i class="fas fa-arrow-right"></i>
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
