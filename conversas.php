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
        <title>Conversas do Herói | Eyhe - Conversas acolhedoras em minutos</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Enfrente os Seus Problemas com a Ajuda dos Anjos Eyhe, Você Não Está Sozinho Nessa! Quem Já Viveu o Mesmo Desafio que Você Sabe como Superar e Vai te Contar Como. Acesse Já! Saúde frágil, relações tóxicas, pressão social, depressão, ansiedade. Você precisa de ajuda. Escolha um Anjo Eyhe agora mesmo e confie no poder de um ombro amigo. Temos Pessoas que já Passaram pelo que Você Está Passando e Podem te Ajudar. Conheça quem Já Viveu o Mesmo Desafio que Você Sabe como Superar e Vai te Contar Como. Dê uma Chance para Nós e para Você Mesmo. Tenha a Ajuda que Procura em Nosso Site e Desabafe sem Julgamentos. Faça seu Cadastro!" />
        <meta name="robots" content="index, follow" />
        <meta name="keywords" content="psicólogo online gratuito, ajuda psicológica, conversa online, conversar online, grupo de apoio, desabafo online, +desabafo +online, chat de bate papo, bate papo, bate papo online, site bate papo, quero conversar com alguém, como controlar crise de ansiedade, preciso de ajuda psicológica, como controlar a ansiedade, como acabar com a ansiedade, como dimnuir a ansiedade, como controlar a crise de ansiedade, site de desabafo, crise de ansiedade tem cura, preciso de ajuda emocional, chat ajuda emocional, +conversar +online, controlar a ansiedade, desabafo online auto ajuda, desabafar por chat, preciso de suporte emocional." />
        <meta content="Wilian Gulini" name="author" />
        <?php include "assets/includes/cssgeral.php"; ?>
        <link rel="stylesheet" href="assets/css/guia_style.css" />
        <link rel="stylesheet" href="assets/css/vertical-sidebar.css" />
        <link rel="stylesheet" href="assets/css/footer.css" />
        <link rel="stylesheet" href="assets/css/conversas.css" />
    </head>

<?php include "assets/includes/header-heroi.php"; ?>

<div class="main-content conversas">
    <div class="page-content conversas">
        <div class="container-fluid conversas">
            <h4 class="h5 conversas">Histórico de Conversas</h4>
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">

                              <?php

                                $meuid = $_SESSION['id_heroi'];
                                $eu =  'h_'.$meuid;
                                include ('painel/engine/conecta.php');

                                /* PAGINACAO */
                                $pagina = (isset($_GET['p']))? $_GET['p'] : 1;
                                $consulta = $conexao->query("SELECT count(id) as qtd FROM conversas WHERE (idheroi=$meuid) AND (offheroi IS NULL) AND (status='Em andamento')");
                                while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
                                  $total = $linha['qtd'];
                                }
                                $registros = 5;
                                $numPaginas = ceil($total/$registros);
                                $inicio = ($registros*$pagina)-$registros;
                                /* FIM DA PAGINA */


                                $consulta = $conexao->query("SELECT * FROM conversas WHERE (idheroi=$meuid) AND (offheroi IS NULL)  AND (status='Em andamento') ORDER BY ultimamsg DESC LIMIT $inicio,$registros");
                                while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {

                                $tabela = $linha['tabela'];
                                $idanjo = $linha['idanjo'];
                                $idtalk = $linha['id'];

                                $consulta2 = $conexao->query("SELECT id,nome, avatar FROM anjos WHERE id=$idanjo LIMIT 1");
                                while ($linha2 = $consulta2->fetch(PDO::FETCH_ASSOC)) {
                                  $nomeanjo = $linha2['nome'];
                                  $idanjo = $linha2['id'];
                                  $avatar = $linha2['avatar'];
                                }

                                $qtd_nao_lida = 0;
                                //agora, vou saber aqui, quantas mensagens não lidas tem!
                                $consulta3 = $conexao->query(" SELECT count(id) as quantidade FROM $tabela WHERE leitura IS NULL AND SUBSTRING(remetente, 1, 1) != 'h' ");
                                while ($linha3 = $consulta3->fetch(PDO::FETCH_ASSOC)) {
                                    $qtd_nao_lida = $linha3['quantidade'];
                                }
                                ?>

                                      <div class="l1">
                                          <picture>
                                              <source type="image/png" src="https://eyhe.com.br/painel/<?php echo $avatar;?>" />
                                              <img src="https://eyhe.com.br/painel/<?php echo $avatar;?>" />
                                          </picture>
                                          <div class="np">
                                              <p><?php echo $nomeanjo ?></p>
                                              <p><b><?php echo $qtd_nao_lida; ?></b> mensagen(s) não lida(s)</p>
                                          </div>
                                          <div class="dropdown">
                                              <a class="btn btn-primary btn-white dropdown-toggle"href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Opções  <i class="bx bx-chevron-down"></i></a>
                                              <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                  <a class="dropdown-item" href="chat.php?myid=<?php echo $meuid;?>&idanjo=<?php echo $idanjo;?>&room=<?php echo $linha['session'];?>&where=<?php echo $linha['tabela'];?>">Acessar Chat</a>
                                                  <a class="dropdown-item" href="#">Avaliar</a>
                                                  <a href="#" class="dropdown-item excluir_conversa" data-id="<?php echo $idtalk; ?>">Excluir</a>
                                              </div>
                                          </div>
                                      </div>
                                      <hr>
                            <?php  } ?>

                            <br/>

                            <nav aria-label="Page navigation example">
                                 <ul class="pagination justify-content-center">
                                     <li class="page-item <?php if($pagina == 1) echo "disabled";?> ">
                                         <a class="page-link" href="conversas.php?p=<?php echo $pagina-1;?>" tabindex="-1">Anterior</a>
                                     </li>
                                     <?PHP for($i = 1; $i < $numPaginas + 1; $i++) {
                                         if($i == $pagina){
                                              echo "<li class='page-item active'><a class='page-link active' href='conversas.php?p=$i'>".$i."</a></li> ";
                                         }else{
                                              echo "<li class='page-item'><a class='page-link' href='conversas.php?p=$i'>".$i."</a></li> ";
                                         }
                                     }?>
                                     <li class="page-item <?php if($pagina == $numPaginas) echo "disabled";?>">
                                         <a class="page-link" href="conversas.php?p=<?php echo $pagina+1;?>">Próxima</a>
                                     </li>
                                 </ul>
                             </nav>

                            </div>
                        </div>
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



        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>

        <script src="assets/js/app.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script src="painel/engineJS/conversas_lado_heroi.js"></script>

    </body>
</html>
