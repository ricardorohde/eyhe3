
<?php include 'PHP/seguranca.php' ; ?>

<html>
    <head>
        <title>EYHE</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/uikit.min.css" />
        <link rel="shortcut icon" href="favicon/pp_EYHE_favicon_180px.png" />
        <link rel="stylesheet" href="css/style_teste.css" />
        <script src="js/uikit.min.js"></script>
        <script src="js/uikit-icons.min.js"></script>
        <script src="js/jquery.min.js"></script>
    </head>
    <body>


      <!-- MENU -->

    <?php
      if(isset($_SESSION['logado']) &&  $_SESSION['logado'] == 'SIM'){
        include ('repeat/menu_dash.php');
      }else{
        include ('repeat/menu.php');
      }
    ?>

        <!-- CONTEUDO -->


        <div class="uk-section uk-animation-fade uk-text-center" style="padding: 3% 3% 6% 3%;">
            <h1>Bem-vindo ao nosso blog!</h1>
            <form method="get" action="blog_p.php">
                <div class="uk-inline pesquisa_geral">
                    <span class="uk-form-icon" uk-icon="icon: search"></span>
                    <input name="keyword" class="uk-input procurar_anjo" type="text" placeholder="Pesquise o assunto de seu interesse">
                </div>
            </form>
        </div>
        <div class="uk-section uk-animation-fade uk-text-center" style="padding: 3% 3% 0 3%;">

            <div id="artigos1" class="engloba_artigos_recentes">

              <?php
                  include ('painel/engine/conecta.php');
                  $consulta = $conexao->query("SELECT * FROM blog WHERE rascunho = 'nao' ORDER BY data_liberacao desc ");
                  while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
              ?>
                <!-- repeat-->
                <a href="blog_i.php?r=<?php echo $linha['url'];?>&q=<?php echo $linha['id'];?>" class="cada_artigo">
                    <div class="img_artigo uk-cover-container">
                      <img src="painel/painel/<?php echo $linha['imagem_destaque']; ?>"/>
                    </div>

                    <div class="texto_artigo">
                        <span style="color:#a239ff; font-size: 14px; padding-bottom: 4px;">
                          <b> Por <?php echo $linha['autor'];  ?> | <?php echo date('d/m/Y', strtotime($linha['data_criacao'])); ?>
                          | <u> <?php echo $linha['categoria']; ?> </u> </b>
                        </span>
                        <div class="titulo_artigo"><?php echo $linha['titulo']; ?></div> <br/>
                        <div class="resumo_artigo line-clamp"><?php echo strip_tags($linha['conteudo']); ?></div>
                    </div>
              </a>
                <!--- rereat -->
              <?php } ?>


            </div>

            <!--<div class="carregar_mais" onclick="showArtigoEscondido();">
                <div class="bolinha"></div>
                <div class="bolinha"></div>
                <div class="bolinha"></div>
                <div class="texto_carregar_mais">carregar mais</div>
            </div>-->

        </div>

        <!-- RODAPE -->
        <?php
          if(isset($_SESSION['logado']) &&  $_SESSION['logado'] == 'SIM'){
            include 'repeat/footer_logado.php';
          }else{
            include 'repeat/footer_deslogado.php';
          }
        ?>
    </body>
</html>
