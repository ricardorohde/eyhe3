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
<html lang="en">
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
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <?php include "assets/includes/cssgeral.php"; ?>
        <link rel="stylesheet" href="assets/css/guia_style.css" />
        <link rel="stylesheet" href="assets/css/vertical-sidebar.css" />
        <link rel="stylesheet" href="assets/css/footer.css" />
        <link rel="stylesheet" href="assets/css/espera-style.css" />
        <link rel="stylesheet" href="assets/css/intlTelInput.min.css" />
    </head>
    <?php include "assets/includes/header-heroi.php"; ?>

            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid sala-espera">
                        <div class="row">

                            <div class="progress" id="progress" style="width: 100%; margin-bottom: 10px;">
                                <div class="progress-bar progress-bar-striped bg-success" role="progressbar" id="progressBar" style="width: 100%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <span id="time" style="margin-bottom: 10px;">05:00</span>

                            <div class="card une" id="one">
                                <div class="cardInt">
                                    <p class="h5"><strong>Olá, <?php echo $_SESSION['nome_heroi'];?>. Falta pouco para iniciar o seu atendimento!</strong></p>
                                    <p>Mas antes, separamos algumas dicas super importantes para te ajudar.</p>
                                </div>
                                <picture>
                                    <source type="image/webp" src="assets/images/form/imagem3.webp" />
                                    <source type="image/png" src="assets/images/form/imagem3.png" />
                                    <img src="assets/images/form/imagem3.png" />
                                </picture>
                                <a href="#" class="btn btn-blue" id="go">Vamos lá <i class="fas fa-arrow-right"></i></a>
                            </div>
                            <div class="card do" id="two">
                                <div class="cardInt">
                                    <p class="h5">Você será <strong>notificado</strong> assim que seu Anjo chegar!</p>
                                    <p class="p2">Quando o Anjo responder, nós vamos notificar você através de <strong>EMAIL e WhatsApp</strong></p>
                                </div>
                                <picture>
                                    <source type="image/webp" src="assets/images/form/imagem2.webp" />
                                    <source type="image/png" src="assets/images/form/imagem2.png" />
                                    <img src="assets/images/form/imagem2.png" />
                                </picture>
                                <div class="txt2">
                                    <p><strong>Confirme seu telefone:</strong></p>
                                    <input id="telefone" type="tel" name="tel" value="<?php echo $_SESSION['telefone_heroi']; ?>"/>
                                </div>
                                <a href="#" class="btn btn-blue" id="go2">Confirmar <i class="fas fa-arrow-right"></i></a>
                            </div>
                            <div class="card tre" id="three">
                                <div class="cardInt">
                                    <p class="h5"><strong>O tempo média para você ser atendido é de 3 a 5 min.</strong></p>
                                    <p>O Anjo já foi notificado e está a caminho, logo ele estará aqui.</p>
                                </div>
                                <picture>
                                    <source type="image/webp" src="assets/images/form/imagem4.webp" />
                                    <source type="image/png" src="assets/images/form/imagem4.png" />
                                    <img src="assets/images/form/imagem4.png" />
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
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="card four" id="four">
                                <div class="cardInt">
                                    <p class="h5">Você tem <strong style="color: red;">10 minutos</strong> grátis!</p>
                                    <p>Aproveite esse tempo para tirar dúvidas e conhecer melhor o Anjo</p>
                                </div>
                                <picture>
                                    <source type="image/webp" src="assets/images/form/imagem5.webp" />
                                    <source type="image/png" src="assets/images/form/imagem5.png" />
                                    <img src="assets/images/form/imagem5.png" />
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
                                            Aproveite os 10 minutos GRÁTIS para experimentar o atendimento e conhecer um pouco mais sobre o Anjo escolhido! Sinta-se à vontade para desabafar, pois em nosso chat, você estará seguro!  Conte o que você está passando e como você está neste momento.

                                          <br/><br/>
                                            Após o término destes minutos iniciais, você pode seguir adiante por mais 40 minutos 
                                            de atendimento (R$24,90), onde poderá ter a escolha do chat por vídeo. 
                                            Caso você não se sinta satisfeito com o atendimento, você pode pedir reembolso!  <br/><br/>

                                    </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="card five" id="five">
                                <div class="cardInt">
                                    <p class="h5"><strong>Nós nunca deixamos de atender, aguarde mais um pouco!</strong></p>
                                    <p>Neste tempo, aproveite para visitar o <a target="_blank" href="https://blog.eyhe.com.br/">Blog Eyhe!</a> Mas, fique tranquilo, nós te avisaremos quando seu Anjo chegar.</p>
                                </div>
                                <picture>
                                    <source type="image/webp" src="assets/images/form/imagem6.webp" />
                                    <source type="image/png" src="assets/images/form/imagem6.png" />
                                    <img src="assets/images/form/imagem6.png" />
                                </picture>
                                <div class="cardInt2">
                                    <p class="h5">Ajude nosso Anjo a saber pelo que você está passando:</p>
                                    <p>Resuma um pouco sobre o desafio que você está passando no momento.</p>
                                </div>
                                <form method="POST" action="" id="form-resumo">
                                    <textarea required name="resumo" id="textarea"></textarea>
                                    <input type="hidden" name="tabela" value="<?php echo $_GET['tabela']; ?>"></textarea>
                                    <button type="submit" class="btn btn-blue">Enviar</button>
                                </form>

                            </div>
                            <div class="card last" id="last">
                                <div class="title">
                                    <p class="h5">o Anjo não conseguiu te atender no momento :(</p>
                                    <p>Ocorreu algum imprevisto com seu Anjo. Você pode escolher outro online ou agendar para outra data:</p>
                                </div>
                                <div class="btn">
                                    <!--<a href="agendar-hora.php" class="btn btn-blue one">Agendar</a>-->
                                    <a href="nossos-anjos.php" class="btn btn-blue two">Escolher outro Anjo</a>
                                    <!--<a href="sala-de-espera2.php" class="btn btn-success whats">
                                        <picture>
                                            <source type="image/jpg" src="assets/images/users/avatar-1.jpg" />
                                            <img src="assets/images/users/avatar-1.jpg" />
                                        </picture>
                                        <p class="aint">Procurar Anjos de Plantão</p>
                                    </a>-->
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
        <script src="assets/js/card.js"></script>

        <script src="painel/engineZENVIA/SMS_JS/send_sms.js"></script>
        <script src="painel/engineZENVIA/WHATS_JS/send_whats.js"></script>

        <!--<script src="painel/engineJS/salva_resumo_de_conversa.js"></script>-->

        <script>
            var TELEFONE = '<?php echo $telefone;?>';
            var NOME_HEROI = '*<?php echo $_SESSION['nome_heroi'];?>*';
            var NOME_ANJO = '<?php echo $nome ?>';
            var TABELA = '<?PHP echo $_GET['tabela'];?>';
        </script>

        <script>
          var frase = NOME_HEROI+' acabou de entrar na sala de espera com o anjo '+NOME_ANJO;
          envia_whats_novo_atendimento(TELEFONE, NOME_HEROI);
          envia_sms('554699177534', frase);
          envia_sms('554699247368', frase);
          envia_sms('554688011011', frase);
        </script>

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script src="painel/engineJS/sensor_presencao_do_anjo.js"></script>
        <script src="assets/js/intlTelInput-jquery.min.js"></script>
        <script src="assets/js/flag.js"></script>

        <script>
        jQuery('#form-resumo').submit(function(){
           jQuery.ajax({
                type: "POST",
                url: "painel/engine/salvar_resumo_conversa.php",
                data: $('#form-resumo').serialize(),
                /*beforeSend: function() {
                  Swal.fire({
                   title: 'Estamos Salvando..',
                   text: 'Seu Anjo terá acesso a isso.',
                   imageUrl: 'https://pedefacil.sodexobeneficios.com.br/PPW/img/tela-espera.gif',
                   imageWidth: 80,
                   imageHeight: 80,
                   imageAlt: 'aguarde',
                 })
                },*/
                success: function(data) {
                    if(data == 'Resumo salvo com sucesso! Seu anjo terá acesso a isso.') {
                      Swal.fire({
                        icon: 'success',
                        title: 'Obrigada por compartilhar o que está sentindo.',
                        text: 'Seu Anjo já está chegando!',
                      })
                    }else{
                      Swal.fire({
                        icon: 'error',
                        title: 'Opsss :(',
                        text: 'Tente novamente',
                      })
                    }
                }

            });
            return false;
        })
        </script>

    </body>
</html>
