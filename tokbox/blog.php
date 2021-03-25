<?php
session_start(); ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Blog Eyhe</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.3/css/uikit.min.css" />
    <link href="https://fonts.googleapis.com/css?family=Muli&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=PT+Serif:400,700&display=swap" rel="stylesheet">
    <link href="css/style_teste.css" rel="stylesheet">
    <link href="css/style_blog.css" rel="stylesheet">
</head>


<style>
    .link-titulo:hover{
        text-decoration: none;
    }
</style>

<body class="blog_master" style="margin-bottom: 0px; padding: 0px;">
  <!-- MENU -->

  <?php
    if(isset($_SESSION['logado']) &&  $_SESSION['logado'] == 'SIM'){
      include ('repeat/menu_dash.php');
    }else{
      include ('repeat/menu.php');
    }
  ?>


    <!-- Seção Cabeçalho -->
    <section id="cabecalho" class="uk-animation-fade uk-text-center cabecalho" style="margin: 0 10% 0 10%;">

        <h1><br/>Bem-vindo ao nosso blog!</h1>
        <form method="get" action="blog_p.php" class="uk-search uk-search-default uk-width-large">
            <span uk-search-icon></span>
            <input class="uk-search-input uk-text-center blog_input" type="search" name="keyword"
                placeholder="Pesquise o assunto de seu interesse">
        </form>
        <br/><br/>
    </section>


    <!-- Seção Posts -->

    <?php

        $pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1;
        if($pagina == 1){
            $t = '';
        }else{
            $t = 'style="display:none;"';
        }

    ?>

    <section id="posts" uk-slider class="posts" <?php echo $t; ?>>
        <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1">
            <ul class="uk-slider-items uk-child-width-1-1 uk-child-width-1-2@s uk-child-width-1-2@m">
                <!--
                    Esta seção suporta N itens de posts seguindo o template abaixo,
                    tratando os mesmos de forma responsiva e dinâmica.
                -->

              <?php
                  include ('painel/engine/conecta.php');
                  $consulta = $conexao->query("SELECT * FROM blog WHERE rascunho = 'nao' ORDER BY data_liberacao desc LIMIT 4");
                  while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
              ?>
                <div class="uk-panel post-slider">
                    <div class="post-imagem">
                        <img  style="max-width: 773px; max-height: 538px;" src="painel/painel/<?php echo $linha['imagem_destaque']; ?>" alt="Post">
                    </div>
                    <div class="post-info">
                        <span class="post-escritor-categoria">
                            <p><?php echo $linha['autor'];  ?> / <u><?php echo $linha['categoria']; ?></u></p>
                        </span>
                        <span>
                            <a href="blog_i.php?r=<?php echo $linha['url'];?>&q=<?php echo $linha['id'];?>" class="cada_artigo">
                                <p class="post-titulo"><?php echo $linha['titulo']; ?></p>
                            </a>
                        </span>
                        <span class="post-data">
                            <p><?php echo date('d/m/Y', strtotime($linha['data_criacao'])); ?></p>
                        </span>
                    </div>
                </div>
                
             <?php } ?>


            </ul>
            <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
                    <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next"></a>
        </div>

    </section>

    <!-- Seção Conteudo -->
    <section id="conteudo" class="conteudo">
        <div class="uk-grid-divider" uk-grid>
            <!-- Post recentes (Componente web) -->
            <div class="uk-width-1-1@s uk-width-1-1@m uk-width-3-4@l uk-width-3-4@xl recentes uk-visible@l">
                <a href="cadastro_pt1.php" target='_blank'>
                    <img data-src="img/banner_vermelho.jpg" width="100%" height="auto" alt="" uk-img>
                </a>

                <h1>Mais recentes</h1>


                <?php
                    //verifica a página atual caso seja informada na URL, senão atribui como 1ª página
                    $pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1;

                    $consulta = $conexao->query("SELECT id FROM blog ");
                    $consulta->execute();

                    //conta o total de itens
                    $total = $consulta->rowCount();

                    //seta a quantidade de itens por página, neste caso, 2 itens

                    $registros = 6;


                    //calcula o número de páginas arredondando o resultado para cima
                    $numPaginas = ceil($total/$registros);

                    //variavel para calcular o início da visualização com base na página atual

                    $inicio =  ($registros*$pagina) - $registros + 4;

                    //$consulta = $conexao->query("SELECT titulo, conteudo, imagem, categoria, datacriacao, id FROM postagens ORDER BY id DESC LIMIT $inicio,$registros");


                    $consulta = $conexao->query("SELECT * FROM blog WHERE rascunho = 'nao' ORDER BY data_liberacao desc LIMIT $inicio,$registros");


                    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {

                ?>



                    <!-- Seção dinâmica de posts, utilizar do template abaixo -->
                    <div class="post-recente">
                        <div class="imagem quebra-uk">
                            <a class="inline_block" href="blog_i.php?r=<?php echo $linha['url'];?>&q=<?php echo $linha['id'];?>">
                                <img class="lazy" data-original="painel/painel/<?php echo $linha['imagem_destaque']; ?>" alt="">
                            </a>
                        </div>
                        <div class="uk-width-1-1@s uk-width-2-5@m uk-width-2-5@l uk-width-2-5@xl text_inline">
                            <p class="escritor">Por: <?php echo $linha['autor'];  ?></p>
                            <p class="categoria"><?php echo $linha['categoria']; ?></p>
                            <a href="blog_i.php?r=<?php echo $linha['url'];?>&q=<?php echo $linha['id'];?>" class="link-titulo">
                                <h2><?php echo $linha['titulo']; ?></h2>
                            </a>
                            <p class="descricao"><?php echo substr(strip_tags($linha['conteudo']),0,200); ?>...</p>
                            <p class="data"><?php echo date('d/m/Y', strtotime($linha['data_criacao'])); ?></p>
                        </div>
                    </div>


                <?php } ?>



                <!-- Paginação -->
                <div class="centro">
                <ul class="uk-pagination uk-flex-center paginator">

                    <?php
                        if($pagina == 1){
                            $i = 1;
                        }else{
                            $i = $pagina - 1;
                        }
                        echo "<li><a href='blog.php?pagina=$i'><span uk-pagination-previous></span></a></li>";
                    ?>

                    <?php
                        //exibe a paginação
                          for($i = 1; $i < $numPaginas + 1; $i++) {
                            if($i == $pagina){
                              echo "<li><a class='paginador-destacado' href='blog.php?pagina=$i'>".$i."</a></li>";
                            }else{
                              echo"<li><a href='blog.php?pagina=$i'>".$i."</a></li>";
                            }
                          }
                    ?>

                    <?php
                        if($pagina == $numPaginas){
                            $i = $pagina;
                        }else{
                            $i = $pagina + 1;
                        }
                        echo "<li><a href='blog.php?pagina=$i'><span uk-pagination-next></span></a></li>";
                    ?>

                </ul>
                </div>
            </div>

            <div class="uk-width-1-1@s uk-width-1-1@m uk-width-1-4@l uk-width-1-4@xl barra-lateral padding-0">
                <div class="filtros">
                    <h1>Filtrar por:</h1>

                    <!-- Filtros -->
                    <table valign="center">
                        <tbody>
                            <tr>
                                <td class="coluna-icone"><img data-src="img/icones/relacionamento.png"
                                        alt="Relacionamento" uk-img></td>
                                <td class="coluna-texto">
                                    <a href="blog_f.php?filtro=relacionamento" class="link-titulo" style="color: #4d4d4d;">
                                        <span>Relacionamento</span>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="coluna-icone"><img data-src="img/icones/saude.png" alt="Saúde" uk-img></td>

                                 <td class="coluna-texto">
                                    <a href="blog_f.php?filtro=saude" class="link-titulo" style="color: #4d4d4d;">
                                        <span>Saúde / Bem-estar</span>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="coluna-icone"><img data-src="img/icones/espiritualidade.png"
                                        alt="Espiritualidade" uk-img>
                                </td>
                                <td class="coluna-texto">
                                    <a href="blog_f.php?filtro=espiritualidade" class="link-titulo" style="color: #4d4d4d;">
                                        <span>Espiritualidade</span>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="coluna-icone"><img data-src="img/icones/financeiro.png" alt="Financeiro"
                                        uk-img></td>
                                <td class="coluna-texto">
                                    <a href="blog_f.php?filtro=financeiro" class="link-titulo" style="color: #4d4d4d;">
                                        <span>Financeiro</span>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <hr class="uk-hidden@l">

                <!-- Post recentes (Componente mobile) -->
                <div class="uk-width-1-1@s uk-width-1-1@m recentes uk-hidden@l">
                    <h1>Mais recentes</h1>


                <?php
                    //verifica a página atual caso seja informada na URL, senão atribui como 1ª página
                    $pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1;

                    $consulta = $conexao->query("SELECT id FROM blog ");
                    $consulta->execute();

                    //conta o total de itens
                    $total = $consulta->rowCount();

                    //seta a quantidade de itens por página, neste caso, 2 itens
                    $registros = 4;

                    //calcula o número de páginas arredondando o resultado para cima
                    $numPaginas = ceil($total/$registros);

                    //variavel para calcular o início da visualização com base na página atual
                    $inicio = ($registros*$pagina)-$registros;

                    //$consulta = $conexao->query("SELECT titulo, conteudo, imagem, categoria, datacriacao, id FROM postagens ORDER BY id DESC LIMIT $inicio,$registros");

                    if($pagina == 1){
                        $inicio = $inicio+3;
                        $consulta = $conexao->query("SELECT * FROM blog WHERE rascunho = 'nao' ORDER BY data_liberacao desc LIMIT $inicio,$registros");
                    }
                    else{
                        $consulta = $conexao->query("SELECT * FROM blog WHERE rascunho = 'nao' ORDER BY data_liberacao desc LIMIT $inicio,$registros");
                    }
                    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {

                ?>

                   <!-- Seção dinâmica de posts, utilizar do template abaixo -->
                    <div class="post-recente">
                        <div class="uk-width-1-1@s uk-width-3-5@m uk-width-3-5@l uk-width-3-5@xl imagem">
                            <a href="blog_i.php?r=<?php echo $linha['url'];?>&q=<?php echo $linha['id'];?>">
                                <img src="painel/painel/<?php echo $linha['imagem_destaque']; ?>" alt="">
                            </a>
                        </div>
                        <div class="uk-width-1-1@s uk-width-2-5@m uk-width-2-5@l uk-width-2-5@xl">
                            <p class="escritor">Por: <?php echo $linha['autor'];  ?></p>
                            <p class="categoria"><?php echo $linha['categoria']; ?></p>
                            <a href="blog_i.php?r=<?php echo $linha['url'];?>&q=<?php echo $linha['id'];?>" class="link-titulo">
                                <h2><?php echo $linha['titulo']; ?></h2>
                            </a>
                            <p class="descricao"><?php echo substr(strip_tags($linha['conteudo']),0,150); ?>...</p>
                            <p class="data"><?php echo date('d/m/Y', strtotime($linha['data_criacao'])); ?></p>
                        </div>
                    </div>



                <?php } ?>



                <!-- Paginação -->
                <ul class="uk-pagination uk-flex-center">

                    <?php
                        if($pagina == 1){
                            $i = 1;
                        }else{
                            $i = $pagina - 1;
                        }
                        echo "<li><a href='blog.php?pagina=$i'><span uk-pagination-previous></span></a></li>";
                    ?>

                    <?php
                        //exibe a paginação
                          for($i = 1; $i < $numPaginas + 1; $i++) {
                            if($i == $pagina){
                              echo "<li><a class='paginador-destacado' href='blog.php?pagina=$i'>".$i."</a></li>";
                            }else{
                              echo"<li><a href='blog.php?pagina=$i'>".$i."</a></li>";
                            }
                          }
                    ?>

                    <?php
                        if($pagina == $numPaginas){
                            $i = $pagina;
                        }else{
                            $i = $pagina + 1;
                        }
                        echo "<li><a href='blog.php?pagina=$i'><span uk-pagination-next></span></a></li>";
                    ?>

                </ul>
                </div>

                <hr>

                <div class="popular">
                    <h1>Popular no Eyhe</h1>

                    <?php
                        $consulta = $conexao->query("SELECT * FROM blog WHERE rascunho = 'nao' ORDER BY acessos desc LIMIT 3");
                        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
                    ?>

                    <!-- Seção de posts populares, utilizar do template abaixo -->
                    <div class="post-popular">
                        <p><?php echo $linha['autor'];  ?> / <?php echo $linha['categoria'];  ?></p>
                        <a href="blog_i.php?r=<?php echo $linha['url'];?>&q=<?php echo $linha['id'];?>" class="link-titulo">
                            <h2><?php echo $linha['titulo'];  ?></h2>
                        </a>
                        <p><?php echo date('d/m/Y', strtotime($linha['data_criacao'])); ?></p>
                    </div>

                    <?php } ?>


                </div>

                <hr>

                <div class="parceiros">
                    <h1>Parceiros:</h1>

                    <!-- Seção de parceiros, utilizar do template abaixo -->
                    <div>
                      <center>
                        <a href="https://guiadaalma.com.br/" target="_blank">
                          <img src="img/guiadaalma.png" alt="">
                        </a>
                      </center>
                    </div>
                </div>
            </div>
        </div>
    </section>



        <!-- RODAPE -->
        <?php
          if(isset($_SESSION['logado']) &&  $_SESSION['logado'] == 'SIM'){
            include 'repeat/footer_logado.php';
          }else{
            include 'repeat/footer_deslogado.php';
          }
        ?>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.3/js/uikit.min.js"
        integrity="sha256-AINUlF7RFhEIU37MsMWXfqC9AlpDnmW8xp1NUfEa8io=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.3/js/uikit-icons.min.js"
        integrity="sha256-T3+0YjpPZWQR6G5L8KOHWj/T6gGfMj1CPHDYDp0z3eE=" crossorigin="anonymous"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazyload/1.9.1/jquery.lazyload.js" type="text/javascript"></script>

<script type="text/javascript">

    $(function() {
        $(".lazy").lazyload({
            threshold : 100,
            effect: "fadeIn"
        });

    });

</script>

</body>



</html>
