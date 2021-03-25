<?php include 'PHP/seguranca.php' ; ?>



<html class="no-js" lang="">



<head>

  <meta charset="utf-8">

  <title>EYHE - Gerenciamento</title>

  <meta name="description" content="">

  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1">

  <!-- build:css({.tmp,app}) styles/app.min.css -->

  <link rel="stylesheet" href="styles/webfont.css">

  <link rel="stylesheet" href="styles/climacons-font.css">

  <link rel="stylesheet" href="vendor/bootstrap/dist/css/bootstrap.css">

  <link rel="stylesheet" href="styles/font-awesome.css">

  <link rel="stylesheet" href="styles/card.css">

  <link rel="stylesheet" href="styles/sli.css">

  <link rel="stylesheet" href="styles/animate.css">

  <link rel="stylesheet" href="styles/app.css">

  <link rel="stylesheet" href="styles/app.skins.css">

  <!-- endbuild -->

  <!-- page stylesheets -->

 <link rel="stylesheet" href="vendor/sweetalert/dist/sweetalert.css">



 <style>



  .alert-black{

    background:#000;

    color: #fff;

  }



  .alert-laranja{

    background:#f58634;

    color: #fff;

  }

 </style>



</head>



<body class="page-loading">

  <!-- page loading spinner -->

  <div class="pageload">

    <div class="pageload-inner">

      <div class="sk-rotating-plane"></div>

    </div>

  </div>

  <!-- /page loading spinner -->

  <div class="app layout-fixed-header">

    <!-- sidebar panel -->

    <div class="sidebar-panel offscreen-left">

      <div class="brand">

        <!-- toggle small sidebar menu -->

        <a href="javascript:;" class="toggle-apps hidden-xs" data-toggle="quick-launch">

          <i class="icon-grid"></i>

        </a>

        <!-- /toggle small sidebar menu -->

        <!-- toggle offscreen menu -->

        <div class="toggle-offscreen">

          <a href="javascript:;" class="visible-xs hamburger-icon" data-toggle="offscreen" data-move="ltr">

            <span></span>

            <span></span>

            <span></span>

          </a>

        </div>

        <!-- /toggle offscreen menu -->

        <!-- logo -->

        <a class="brand-logo">

          <span>EYHE</span>

        </a>

        <a href="#" class="small-menu-visible brand-logo">E</a>

        <!-- /logo -->

      </div>

        <?php include('repeat/menu_square.php'); ?>

      <!-- main navigation -->

        <?php include('repeat/nav.php'); ?>

      <!-- /main navigation -->

    </div>

    <!-- /sidebar panel -->

    <!-- content panel -->

    <div class="main-panel">

      <!-- top header -->

        <?php include('repeat/top-header.php'); ?>

      <!-- /top header -->



      <!-- main area -->

      <div class="main-content">

        <div class="page-title">

          <div class="title"><i class="icon-umbrella"></i> CONEXÕES PREMIUM</div>

          <!--<div class="sub-title">Visualize aqui quais as conexões criadas entre heróis e anjos.</div>-->

        </div>

        <div class="card bg-white">

          <div class="card-header">



          <H6><B>Mostrando apenas as 100 últimas conexões premium entre heróis e anjos.</B></H6>

          </div>

          <div class="card-block">

            <div class="row m-a-0">

              <div class="col-lg-12">



                <?php



                  $qtd_atraso = 0;

                  $qtd_nao_atendidas = 0;

                  $qtd_heroi_sumiu = 0;

                  $qtd_chat_10min = 0;

                  $qtd_chat_pagamento = 0;



                  include ('engine/conecta.php');



                  $consulta = $conexao->query("SELECT * FROM conversas WHERE (premium = 1) ORDER BY datainicio DESC LIMIT 1000");

                    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {



                        $idanjo = $linha['idanjo'];

                        $idheroi = $linha['idheroi'];

                        $tabela = $linha['tabela'];

                        $inicio = $linha['datainicio'];

                        $ultimamsg = $linha['ultimamsg'];



                        //  QUANTAS MENSAGENS TEM DENTRO DE CADA TABELA DESSA ?



                        $query = 'SELECT count(id) as qtd FROM '.$tabela;

                        $consultaqtd = $conexao->query($query);

                        while ($linhaqtd = $consultaqtd->fetch(PDO::FETCH_ASSOC)) {

                          $quantidade = $linhaqtd['qtd'];

                        }



                        $consulta2 = $conexao->query("SELECT nome FROM anjos WHERE id = $idanjo limit 1");

                        while ($linha2 = $consulta2->fetch(PDO::FETCH_ASSOC)) {

                          $nomeanjo = $linha2['nome'];

                        }



                        $consulta3 = $conexao->query("SELECT nome FROM tab_usuario WHERE id = $idheroi limit 1");

                        while ($linha3 = $consulta3->fetch(PDO::FETCH_ASSOC)) {

                          $nomeheroi = $linha3['nome'];

                        }







                        if($quantidade > 0) {



                          $qtd_msg_anjo = 0;

                          $qtd_msg_heroi = 0;



                          $consulta4 = $conexao->query('SELECT datahora,remetente FROM '.$tabela.'');

                          while ($linha4 = $consulta4->fetch(PDO::FETCH_ASSOC)) {

                            if(substr($linha4['remetente'],0,1) == 'a'){

                              $qtd_msg_anjo++;

                              if($qtd_msg_anjo == 1){

                                $primeira_msg_anjo = $linha4['datahora'];

                              }

                            }else{

                              $qtd_msg_heroi++;

                            }

                          }



                          if($qtd_msg_anjo >= 1 && $qtd_msg_heroi == 0){

                            //ANJO RESPONDEU, MAS HEROI SUMIU!



                            //nesse caso aqui, preciso saber se teve atraso na resposta do anjo.

                            //se a diferença entre inicio  e primeira for maior que 5min -> anjo atrasado!!

                            $inicio_ft  = new DateTime($inicio);

                            $diff = $inicio_ft->diff(new DateTime($primeira_msg_anjo));



                            if( ($diff->y == 0) &&  ($diff->m == 0) && ($diff->d == 0) && ($diff->h == 0) && ($diff->i < 5) ){

                            $qtd_heroi_sumiu++;

                            $div =  '<div class="alert alert-info" style="font-size: 15px;">

                                      <i class="icon-ghost"></i> O Anjo <b>'.$nomeanjo.'</b> atendeu, porém sem resposta do Herói <b>'.$nomeheroi.'</b><br/>

                                      Chamada feita em: <u>'.date('d/m/Y H:i:s', strtotime($linha['datainicio'])).'</u><br/>

                                      Primeira mensagem do anjo: <u>'.date('d/m/Y H:i:s', strtotime($primeira_msg_anjo)).'</u><br/>

                                      Quantidade de mensagens dentro do chat: ('.$quantidade.') <br/>

                                      Tabela para leitura do chat: <i>'.$tabela.'</i>

                                    </div>';

                            }else{

                              $qtd_atraso++;

                              $div =  '<div class="alert alert-danger" style="font-size: 15px;">

                                        <i class="icon-clock"></i> O Anjo <b>'.$nomeanjo.'</b> atendeu <u>com atraso</u> o Herói <b>'.$nomeheroi.'</b><br/>

                                        Chamada feita em: <u>'.date('d/m/Y H:i:s', strtotime($linha['datainicio'])).'</u><br/>

                                        Primeira mensagem do anjo: <u>'.date('d/m/Y H:i:s', strtotime($primeira_msg_anjo)).'</u><br/>

                                        Quantidade de mensagens dentro do chat: ('.$quantidade.') <br/>

                                        Tabela para leitura do chat: <i>'.$tabela.'</i>

                                      </div>';

                            }

                          }



                          elseif($qtd_msg_anjo == 0 && $qtd_msg_heroi >= 1){

                            //HEROI DEIXOU MENSAGEM, MAS ANJO NUNCA respondeu..

                            $qtd_nao_atendidas++;

                            $div =  '<div class="alert alert-black" style="font-size: 15px;">

                                      <i class="icon-eye"></i> O Anjo <b>'.$nomeanjo.'</b> não respondeu as mensagens do Herói <b>'.$nomeheroi.'</b><br/>

                                      Chamada feita em: <u>'.date('d/m/Y H:i:s', strtotime($linha['datainicio'])).'</u><br/>

                                      Quantidade de mensagens dentro do chat: ('.$quantidade.') <br/>

                                      Tabela para leitura do chat: <i>'.$tabela.'</i>

                                    </div>';

                          }



                          else{

                            //bom, se entrou aqui é porque temos chat.

                            $status = '';

                            $consulta5 = $conexao->query("SELECT status FROM pagamentos WHERE tabela = '$tabela' ORDER BY id DESC LIMIT 1");

                            while ($linha5 = $consulta5->fetch(PDO::FETCH_ASSOC)) {

                              $status = $linha5['status'];

                            }

                              if($status == ''){

                                $qtd_chat_10min++;

                                $div =  '<div class="alert alert-success" style="font-size: 15px;">

                                          <i class="icon-bubbles"></i> O Anjo <b>'.$nomeanjo.'</b> atendeu o herói <b>'.$nomeheroi.'</b><br/>

                                          Status do pagamento: <b>Herói desistiu ou não utilizou os 10 minutos por completo.</b><br/>

                                          Chamada feita em: <u>'.date('d/m/Y H:i:s', strtotime($linha['datainicio'])).'</u><br/>

                                          Quantidade de mensagens dentro do chat: ('.$quantidade.') <br/>

                                          Tabela para leitura do chat: <i>'.$tabela.'</i>

                                        </div>';

                              }else{

                                $qtd_chat_pagamento++;

                                $div =  '<div class="alert alert-success" style="font-size: 15px;">

                                          <i class="icon-bubbles"></i> O Anjo <b>'.$nomeanjo.'</b> atendeu o herói <b>'.$nomeheroi.'</b><br/>

                                          Status do pagamento: <b>'.$status.'</b><br/>

                                          Chamada feita em: <u>'.date('d/m/Y H:i:s', strtotime($linha['datainicio'])).'</u><br/>

                                          Quantidade de mensagens dentro do chat: ('.$quantidade.') <br/>

                                          Tabela para leitura do chat: <i>'.$tabela.'</i>

                                        </div>';

                              }

                          }

                        }

                        else{



                          //chat vazio -> atendimento não aconteceu

                          $qtd_nao_atendidas++;

                          $div =  '<div class="alert alert-black" style="font-size: 15px;">

                                    <i class="icon-dislike"></i> O Anjo <b>'.$nomeanjo.'</b> não atendeu o herói <b>'.$nomeheroi.'</b><br/>

                                    Chamada feita em: <u>'.date('d/m/Y H:i:s', strtotime($linha['datainicio'])).'</u><br/>

                                    Quantidade de mensagens dentro do chat: ('.$quantidade.') <br/>

                                    Tabela para leitura do chat: <i>'.$tabela.'</i>

                                  </div>';

                        }



                        echo $div;



                }

                ?>



                <div class="alert alert-laranja" style="font-size: 15px;">

                  <b>RESUMO DOS ÚLTIMOS 1000 ATENDIMENTOS</b><br/><br/>

                  Quantidade de chats não atendidos: <b><?php echo $qtd_nao_atendidas; ?></b><br/>

                  Quantidade de chats em atraso: <b><?php echo $qtd_atraso; ?></b><br/>

                  Quantidade de chats em que o herói sumiu: <b><?php echo $qtd_heroi_sumiu; ?></b><br/>

                  Quantidade de chats que parou nos 10minutos grátis: <b><?php echo $qtd_chat_10min; ?></b><br/>

                  Quantidade de chats em que chegou ao pagamento (independe se finalizar ou não): <b><?php echo $qtd_chat_pagamento; ?></b><br/>

                </div>





              </div>

            </div>

          </div>

        </div>







      </div>

      <!-- /main area -->



    </div>

    <!-- /content panel -->

    <!-- bottom footer -->

      <?php include('repeat/footer.php'); ?>

    <!-- /bottom footer -->

    <!-- chat -->

      <?php include('repeat/chat.php'); ?>

    <!-- /chat -->

  </div>

  <!-- build:js({.tmp,app}) scripts/app.min.js -->

  <script src="scripts/helpers/modernizr.js"></script>

  <script src="vendor/jquery/dist/jquery.js"></script>

  <script src="vendor/bootstrap/dist/js/bootstrap.js"></script>

  <script src="vendor/fastclick/lib/fastclick.js"></script>

  <script src="vendor/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>

  <script src="scripts/helpers/smartresize.js"></script>

  <script src="scripts/constants.js"></script>

  <script src="scripts/main.js"></script>

  <!-- endbuild -->



  <!-- page scripts -->

  <script src="vendor/sweetalert/dist/sweetalert.min.js"></script>







</body>



</html>
