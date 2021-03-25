<?php include "painel/engine/verifica_sessao_heroi.php"; ?>

<?php
  //pegando telefone do anjo;
  include ('painel/engine/conecta.php');
  $idanjo = $_GET['idanjo'];

  $consulta = $conexao->query("SELECT telefone, nome FROM anjos  WHERE id = $idanjo limit 1");
    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
        $telefone = $linha['telefone'];
        $nome = $linha['nome'];
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
        <title>Sala de Espera | EYHE - Conversa acolhedoras em minutos</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Enfrente os Seus Problemas com a Ajuda dos Anjos Eyhe, Você Não Está Sozinho Nessa! Quem Já Viveu o Mesmo Desafio que Você Sabe como Superar e Vai te Contar Como. Acesse Já! Saúde frágil, relações tóxicas, pressão social, depressão, ansiedade. Você precisa de ajuda. Escolha um Anjo Eyhe agora mesmo e confie no poder de um ombro amigo. Temos Pessoas que já Passaram pelo que Você Está Passando e Podem te Ajudar. Conheça quem Já Viveu o Mesmo Desafio que Você Sabe como Superar e Vai te Contar Como. Dê uma Chance para Nós e para Você Mesmo. Tenha a Ajuda que Procura em Nosso Site e Desabafe sem Julgamentos. Faça seu Cadastro!" />
        <meta name="robots" content="index, follow" />
        <meta name="keywords" content="psicólogo online gratuito, ajuda psicológica, conversa online, conversar online, grupo de apoio, desabafo online, +desabafo +online, chat de bate papo, bate papo, bate papo online, site bate papo, quero conversar com alguém, como controlar crise de ansiedade, preciso de ajuda psicológica, como controlar a ansiedade, como acabar com a ansiedade, como dimnuir a ansiedade, como controlar a crise de ansiedade, site de desabafo, crise de ansiedade tem cura, preciso de ajuda emocional, chat ajuda emocional, +conversar +online, controlar a ansiedade, desabafo online auto ajuda, desabafar por chat, preciso de suporte emocional." />
        <meta content="Wilian Gulini" name="author" />
        <?php include "assets/includes/cssgeral.php"; ?>
        <link rel="stylesheet" href="assets/css/guia_style.css" />
        <link rel="stylesheet" href="assets/css/vertical-sidebar.css" />
        <link rel="stylesheet" href="assets/css/footer.css" />
        <link rel="stylesheet" href="assets/css/nova-espera-style.css" />
        <link rel="stylesheet" href="assets/css/intlTelInput.min.css" />
    </head>
    <?php include "assets/includes/header-heroi.php"; ?>


<div class="main-content">

<div class="page-content">
    <div class="container-fluid sala-espera">
        <div class="row">
            <form role="form" id="quizform" name="quizform" action='' method='post'>
                <div class="progress" id="progress" style="width: 100%; margin-bottom: 10px;">
                    <div class="progress-bar progress-bar-striped bg-success" role="progressbar" id="progressBar" style="width: 100%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <span id="time" style="margin-bottom: 10px;">05:00</span>
                <div class="card zero" id="zero">
                    <div class="cardInt">
                        <p class="h5">Como você está se sentindo neste momento?</p>
                        <p>Escolha uma opção por enquanto. Você pode explorar outras depois.</p>
                    </div>
                        <div style="position:relative;width:100%;">
                            <div id="altcontainer" class="notranslate">
                                <label class='radiocontainer' id='label2'> Confuso
                                  <input type='checkbox' name='sentimento' id='2' onclick='clickRadio(this)' value='Confuso' /><span class='checkmark'></span></label>
                                <label class='radiocontainer' id='label3'> Com medo
                                  <input type='checkbox' name='sentimento' id='3' onclick='clickRadio(this)' value='Com medo' /><span class='checkmark'></span></label>
                                <label class='radiocontainer' id='label1'> Ansioso
                                  <input type='checkbox' name='sentimento' id='1' onclick='clickRadio(this)' value='Ansioso' /><span class='checkmark'></span></label>
                                <label class='radiocontainer' id='label0'> Tranquilo
                                  <input type='checkbox' name='sentimento' id='0' onclick='clickRadio(this)' value='Tranquilo' /><span class='checkmark'></span></label>
                            </div>
                        </div>
                    <a href="#" class="btn btn-blue" id="go1">Vamos lá <i class="fas fa-arrow-right"></i></a>
                </div>
                <div class="card une" id="one">
                    <div class="cardInt">
                        <p class="h5"><strong><?php echo $_SESSION['nome_heroi'];?>, falta pouco para iniciar o seu atendimento!</strong></p>
                        <p>Mas antes, separamos algumas dicas super importantes para te ajudar.</p>
                    </div>
                    <picture>
                        <source type="image/webp" src="assets/images/sala/01.webp" />
                        <source type="image/png" src="assets/images/sala/01.png" />
                        <img src="assets/images/sala/01.png" />
                    </picture>
                    <a href="#" class="btn btn-blue" id="go">Vamos lá <i class="fas fa-arrow-right"></i></a>
                </div>
                <div class="card do" id="two">
                    <div class="cardInt">
                        <p class="h5"><strong>Você será notificado assim que seu Anjo chegar!</strong></p>
                        <p>Selecione por onde deseja ser notificado. Você pode alterar quando quiser.</p>
                    </div>
                    <div class="not d-flex flex-column">
                        <div class="email d-flex justify-content-around">
                            <p>Email</p>
                            <label id="switch">
                                <input type="checkbox" name='notificacao_email' />
                                <span id="slider_round"></span>
                            </label>
                        </div>
                        <div class="sms d-flex justify-content-around">
                            <p>SMS</p>
                            <label id="switch">
                                <input type="checkbox" name='notificacao_sms' />
                                <span id="slider_round"></span>
                            </label>
                        </div>
                        <div class="whats d-flex justify-content-around">
                            <p>WhatsApp</p>
                            <label id="switch">
                                <input type="checkbox" name='notificacao_whats'/>
                                <span id="slider_round"></span>
                            </label>
                        </div>
                    </div>
                    <div class="txt2">
                        <p><strong>Confirme seu telefone:</strong></p>
                        <input id="telefone" type="tel" name="tel" value="<?php echo $_SESSION['telefone_heroi']; ?>"/>
                    </div>
                    <a href="#" class="btn btn-blue" id="go2">Confirmar <i class="fas fa-arrow-right"></i></a>
                </div><div class="card dois5" id="dois5">
                    <div class="cardInt">
                        <p class="h5">O que você espera da conversa com o Anjo?</p>
                        <p>Escolha uma opção por enquanto. Você pode explorar outras depois.</p>
                    </div>
                        <div style="position:relative;width:100%;">
                            <div id="altcontainer2" class="notranslate">
                                <label class='radiocontainer' id='label6'> Quero desabafar
                                  <input type='checkbox' name='expectativa' id='6' onclick='clickRadio(this)' value='Quero desabafar' /><span class='checkmark'></span></label>
                                <label class='radiocontainer' id='label7'> Quero ser ouvido
                                  <input type='checkbox' name='expectativa' id='7' onclick='clickRadio(this)' value='Quero ser ouvido' /><span class='checkmark'></span></label>
                                <label class='radiocontainer' id='label8'> Preciso de ajuda
                                  <input type='checkbox' name='expectativa' id='8' onclick='clickRadio(this)' value='Preciso de ajuda' /><span class='checkmark'></span></label>
                            </div>
                        </div>
                    <a href="#" class="btn btn-blue" id="go25">Vamos lá <i class="fas fa-arrow-right"></i></a>
                </div>
                <div class="card tre" id="three">
                    <div class="cardInt">
                        <p class="h5"><strong>O tempo média para você ser atendido é de 3 á 5 min.</strong></p>
                        <p>O Anjo já foi notificado e está a caminho, logo ele estará aqui.</p>
                    </div>
                    <picture>
                        <source type="image/webp" src="assets/images/sala/02.webp" />
                        <source type="image/png" src="assets/images/sala/02.png" />
                        <img src="assets/images/sala/02.png" />
                    </picture>
                    <a href="#" class="btn btn-blue" id="go3">Próximo <i class="fas fa-arrow-right"></i></a>
                    <a href="#" class="link" data-toggle="modal" data-target="#ModalLongoExemplo">Por que preciso esperar?</a>

                    <!-- Modal -->
                    <div class="modal fade" id="ModalLongoExemplo" tabindex="-1" role="dialog" aria-labelledby="TituloModalLongoExemplo" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="TituloModalLongoExemplo">Por que preciso esperar?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>
                            Criamos a sala de espera para que você possa expressar o que está sentindo
                            enquanto espera seu Anjo. Pois assim, quando o Anjo chegar, ele entenderá ainda
                            mais sobre a sua história! <BR/><BR/>
                            O tempo de espera é curto, pode ficar tranquilo que seu Anjo está chegando
                            para te acolher!

                            <br/><br/>
                            <b>Aproveite cada segundo com o seu ombro amigo!</b>
                            </p>

                        </div>
                        <div class="modal-footer d-flex justify-content-center">
                            <button type="button" class="btn btn-blue" data-dismiss="modal">Voltar <i class="fas fa-arrow-right"></i></button>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="card four" id="four">
                    <div class="cardInt">
                        <p class="h5">Você tem <strong style="color: red;">10 minutos</strong> grátis!</p>
                        <p>Após o fim dos 10min, você não precisa pagar nada! caso deseje continuar a conversa, você receberá uma solicitação de pagamento para prosseguir.</p>
                    </div>
                    <picture>
                        <source type="image/webp" src="assets/images/sala/03.webp" />
                        <source type="image/png" src="assets/images/sala/03.png" />
                        <img src="assets/images/sala/03.png" />
                    </picture>
                    <a href="#" class="btn btn-blue" id="go4">Próximo <i class="fas fa-arrow-right"></i></a>
                    <a href="#" class=" link" data-toggle="modal" data-target="#ModalLongoExemplo2">Como utilizar os 10 min grátis?</a>

                    <!-- Modal -->
                    <div class="modal fade" id="ModalLongoExemplo2" tabindex="-1" role="dialog" aria-labelledby="TituloModalLongoExemplo" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="TituloModalLongoExemplo">Como utilizar os 10 min grátis?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>
                            Aproveite pois você tem 10 minutos GRÁTIS para experimentar o atendimento e conhecer um
                            pouco mais sobre o seu anjo escolhido, sinta-se à vontade para desabafar aqui você pode ficar
                            confortável pois está totalmente SEGURO em nosso chat! Conte o que você está passando e como
                            você está neste momento.

                            <br/><br/>

                            Após o término destes minutos iniciais você pode seguir adiante por mais 40 minutos de
                            atendimento por (R$24,90) onde poderá ter a escolha do chat por vídeo e caso não te ajude você pode
                            pedir REEMBOLSO!   <br/><br/>

                        </div>
                        <div class="modal-footer d-flex justify-content-center">
                            <button type="button" class="btn btn-blue" data-dismiss="modal">Voltar <i class="fas fa-arrow-right"></i></button>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="card four_meio" id="four_meio">
                    <div class="cardInt">
                        <p class="h5">De uma nota para sua autoestima de hoje!</p>
                        <p>Escolha uma opção por enquanto. Você pode explorar outras depois.</p>
                    </div>
                    <picture id="bad">
                        <source type="image/webp" src="assets/images/sala/karlsson-fatal-error.webp" />
                        <source type="image/png" src="assets/images/sala/karlsson-fatal-error.png" />
                        <img src="assets/images/sala/karlsson-fatal-error.png" />
                    </picture>
                    <picture id="normal">
                        <source type="image/webp" src="assets/images/sala/delivery.webp" />
                        <source type="image/png" src="assets/images/sala/delivery.png" />
                        <img src="assets/images/sala/delivery.png" />
                    </picture>
                    <picture id="happy">
                        <source type="image/webp" src="assets/images/sala/success.webp" />
                        <source type="image/png" src="assets/images/sala/success.png" />
                        <img src="assets/images/sala/success.png" />
                    </picture>
                    <div class="d-flex flex-column align-items-center">
                            <label id="autoEstima">Razoável</label>
                            <input type="range" min="0" max="100" value="50" class="estilo" id="valor" name="valor_auto_estima">
                    </div>
                    <a href="#" class="btn btn-blue" id="go45">Próximo <i class="fas fa-arrow-right"></i></a>
                </div>
                <div class="card five" id="five">
                    <div class="cardInt">
                        <p class="h5"><strong>Ajude nosso Anjo a saber pelo que você está passando:</strong></p>
                        <p>Resuma um pouco sobre o desafio que você está enfrentando no momento.</p>
                    </div>
                        <textarea required name="resumo" id="textarea"></textarea>
                        <input type="hidden" name="tabela" value="<?php echo $_GET['tabela']; ?>"></textarea>
                        <button type="submit" id="go5" class="btn btn-blue">Enviar</a>

                </div>
                <div class="card seis" id="seis">
                    <div class="cardInt">
                        <p class="h5"><strong>Aguarde mais um pouquinho, nós nunca deixamos de atender</strong></p>
                        <p>Você pode acessar <a href="https://blog.eyhe.com.br" target="_blank">nossos conteúdos</a> enquanto espera. Fique tranquilo, nós vamos te avisar quando ele chegar.</p>
                    </div>
                    <picture>
                        <source type="image/webp" src="assets/images/sala/Grupo2651.webp" />
                        <source type="image/png" src="assets/images/sala/Grupo2651.png" />
                        <img src="assets/images/sala/Grupo2651.png" />
                    </picture>

                </div>
                <div class="card last" id="last">
                    <div class="title">
                        <p class="h5">o Anjo não conseguiu te atender no momento :(</p>
                        <p>Ocorreu algum imprevisto com seu Anjo. Você pode escolher outro Anjo online ou agendar com este para outra data:</p>
                    </div>
                    <div class="btn">
                        <a href="agendar-hora.php?idanjo=<?php echo $_GET['idanjo'];?>" class="btn btn-blue one">Agendar</a>
                        <a href="nossos-anjos.php" class="btn btn-blue two">Escolher outro Anjo</a>
                        <a class="btn btn-success whats" id="ativa-eyhex" data-id="<?php echo $_SESSION['id_heroi'];?>">
                            <picture>
                                <source type="image/jpg" src="assets/images/users/avatar-1.jpg" />
                                <img src="assets/images/users/avatar-1.jpg" />
                            </picture>
                            <p class="aint">Procurar Anjos de Plantão</p>
                        </a>
                        <br/>
                        <h6>Ao clicar em <b>Procurar Anjos de Plantão</b>
                            o Eyhe estará enviando uma notificação para todos os Anjos Online.
                            O primeiro que lhe atender será mostrado na próxima página.
                            Essa opção é uma boa escolha em casos de emergência e/ou urgência.</h6>
                    </div>
                </div>

                <!---<div class="anjoLento" id="low">
                    <picture>
                        <source type="image/jpg" src="assets/images/users/avatar-1.jpg" />
                        <img src="assets/images/users/avatar-1.jpg" />
                    </picture>
                    <div class="txt">
                        <p>Seu Anjo está demorando?</p>
                        <a href="#" class="btn btn-green">Procurar por Anjos de Plantão</a>
                    </div>
                    <div class="icon">
                        <i class="fas fa-times" id="close"></i>
                    </div>
                </div>-->

            </form>
        </div>
        <!-- end row -->

    </div> <!-- container-fluid -->
</div>
<!-- End Page-content -->
<?php
    include "assets/includes/footer.php";
?>
</div>
<!-- end main content-->

        </div>
        <!-- END layout-wrapper -->
        <?php include "assets/includes/javascript-heroi.php"; ?>
        <script src="assets/js/app.js"></script>
        <script src="assets/js/script-form.js"></script>
        <script src="assets/js/timer.js"></script>
        <script src="assets/js/novo-card.js"></script>
        <script src="assets/js/config.js"></script>
        <script src="assets/js/color.js"></script>
        <script src="assets/js/intlTelInput-jquery.min.js"></script>
        <script>
            $("#telefone").intlTelInput({
                nationalMode: false,
                initialCountry: "br",
                preferredCountries: ["us","br"]
            });
        </script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script>var TABELA = '<?PHP echo $_GET['tabela'];?>';</script>
        <script src="painel/engineJS/sensor_presencao_do_anjo.js"></script>


        <script src="painel/engineZENVIA/SMS_JS/send_sms.js"></script>
        <script src="painel/engineZENVIA/WHATS_JS/send_whats.js"></script>

        <script>
            var TELEFONE = '<?php echo $telefone;?>';
            var NOME_HEROI = '<?php echo $_SESSION['nome_heroi'];?>';
            var NOME_ANJO = '<?php echo $nome ?>';
        </script>

        <script>
          var frase = NOME_HEROI+' acabou de entrar na sala de espera com o anjo '+NOME_ANJO;
          //envia_whats_novo_atendimento(TELEFONE, NOME_HEROI);
          envia_sms('554699177534', frase);
          envia_sms('554699247368', frase);
          envia_sms('554688011011', frase);
        </script>-->
        <script src="painel/engineJS/sala_de_espera.js"></script>
        <script src="painel/engineJS/eyhex.js"></script>

    </body>
</html>
