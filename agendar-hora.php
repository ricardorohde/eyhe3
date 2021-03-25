<?php include "painel/engine/verifica_sessao_heroi.php";

$id = (int)$_GET['idanjo'];
include ('painel/engine/conecta.php');
$consulta = $conexao->query("SELECT * FROM anjos  WHERE id = $id limit 1");
while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
      $nome = $linha['nome'];
      $telefone = $linha['telefone'];
}


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
      <title>Agende seu horário | Eyhe - Conversas acolhedoras em minutos</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Enfrente os Seus Problemas com a Ajuda dos Anjos Eyhe, Você Não Está Sozinho Nessa! Quem Já Viveu o Mesmo Desafio que Você Sabe como Superar e Vai te Contar Como. Acesse Já! Saúde frágil, relações tóxicas, pressão social, depressão, ansiedade. Você precisa de ajuda. Escolha um Anjo Eyhe agora mesmo e confie no poder de um ombro amigo. Temos Pessoas que já Passaram pelo que Você Está Passando e Podem te Ajudar. Conheça quem Já Viveu o Mesmo Desafio que Você Sabe como Superar e Vai te Contar Como. Dê uma Chance para Nós e para Você Mesmo. Tenha a Ajuda que Procura em Nosso Site e Desabafe sem Julgamentos. Faça seu Cadastro!" />
    <meta name="robots" content="index, follow" />
    <meta name="keywords" content="psicólogo online gratuito, ajuda psicológica, conversa online, conversar online, grupo de apoio, desabafo online, +desabafo +online, chat de bate papo, bate papo, bate papo online, site bate papo, quero conversar com alguém, como controlar crise de ansiedade, preciso de ajuda psicológica, como controlar a ansiedade, como acabar com a ansiedade, como dimnuir a ansiedade, como controlar a crise de ansiedade, site de desabafo, crise de ansiedade tem cura, preciso de ajuda emocional, chat ajuda emocional, +conversar +online, controlar a ansiedade, desabafo online auto ajuda, desabafar por chat, preciso de suporte emocional." />
      <meta content="Wilian Gulini" name="author" />
      <?php include "assets/includes/cssgeral.php"; ?>
      <link rel="stylesheet" href="assets/css/agendar-hora.css" />
      <link rel="stylesheet" href="assets/css/guia_style.css" />
      <link rel="stylesheet" href="assets/css/vertical-sidebar.css" />
      <link rel="stylesheet" href="assets/css/footer.css" />
  </head>
<?php include "assets/includes/header-heroi.php"; ?>


    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid agenda">
                <form id="agendar" method="post">
                <div class="card">
                    <p><strong>Agende seu atendimento com o Anjo <u><?php echo $nome; ?></u></strong></p>

                      <div class="input">
                          <p>Selecione a data</p>
                          <input type="hidden" name="idanjo" value="<?php echo $id; ?>"/>
                          <input type="hidden" name="idheroi" value="<?php echo $_SESSION['id_heroi']; ?>"/>
                          <input type="date" required name="data" placeholder="dd/mm/aaaa"/>
                          <p>Selecione a hora</p>
                          <input type="time" required name="hora" value="19:00" />
                          <p>Confirme o celular</p>
                          <input type="text" required name="celular" value="<?php echo $_SESSION['telefone_heroi'];?>"/>
                      </div>
                      <div class="btns">
                          <button style="width: 100%" type="submit" class="btn btn-blue">Confirmar Agendamento</button>
                      </div>

                </div>
              </form>
            </div>
        </div>

        <?php
            include "assets/includes/footer.php";
        ?>
    </div>
    <?php include "assets/includes/javascript-heroi.php"; ?>

    <script>
        var TELEFONE = '<?php echo $telefone;?>';
        var NOME_HEROI = '<?php echo $_SESSION['nome_heroi'];?>';
        var NOME_ANJO = '<?php echo $nome ?>';
    </script>
    <script src="painel/engineZENVIA/SMS_JS/send_sms.js"></script>
    <script src="painel/engineZENVIA/WHATS_JS/send_whats.js"></script>

    <script src="assets/js/app.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="painel/engineJS/agendamento.js"></script>

</body>

</html>
