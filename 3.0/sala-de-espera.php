<?php include "assets/includes/header-heroi.php"; ?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Projects Overview | Skote - Responsive Bootstrap 4 Admin Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <?php include "assets/includes/cssgeral.php"; ?>
        <link rel="stylesheet" href="assets/css/guia_style.css" />
        <link rel="stylesheet" href="assets/css/vertical-sidebar.css" />
        <link rel="stylesheet" href="assets/css/footer.css" />
        <link rel="stylesheet" href="assets/css/espera-style.css" />
    </head>
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
                                    <p class="h5"><strong>Olá, Bruno. Falta pouco para iniciar o seu atendimento!</strong></p>
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
                                    <p class="p2">Quando o Anjo responder, nós vamos notificar você através de <strong>SMS/EMAIL/Whatsapp</strong></p>
                                </div>
                                <picture>
                                    <source type="image/webp" src="assets/images/form/imagem2.webp" />
                                    <source type="image/png" src="assets/images/form/imagem2.png" />
                                    <img src="assets/images/form/imagem2.png" />
                                </picture>
                                <div class="txt2">
                                    <p><strong>Confirme seu telefone:</strong></p>
                                    <input type="tel" name="tel" />
                                </div>
                                <a href="#" class="btn btn-blue" id="go2">Confirmar <i class="fas fa-arrow-right"></i></a>
                            </div>
                            <div class="card tre" id="three">
                                <div class="cardInt">
                                    <p class="h5"><strong>O tempo média para você ser atendido é de 3 á 5 min.</strong></p>
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
                                        <h5 class="modal-title" id="TituloModalLongoExemplo">Texto explicativo sobre como funciona a sala de espera.</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>
                                            It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
                                        </p>
                                        <video controls width="375px"></video>
                                        <p class="h5">Aguarde mais um pouquinho, seu Anjo já está chegando!</p>
                                        <p>
                                            It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
                                        </p>
                                        <picture>
                                            <source type="image/webp" src="assets/images/form/imagem4.webp" />
                                            <source type="image/png" src="assets/images/form/imagem4.png" />
                                            <img src="assets/images/form/imagem4.png" />
                                        </picture>
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
                                        <h5 class="modal-title" id="TituloModalLongoExemplo">Texto explicativo sobre como funciona a sala de espera 2.</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>
                                            It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
                                        </p>
                                        <video controls width="375px"></video>
                                        <p class="h5">Aguarde mais um pouquinho, seu Anjo já está chegando!</p>
                                        <p>
                                            It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
                                        </p>
                                        <picture>
                                            <source type="image/webp" src="assets/images/form/imagem5.webp" />
                                            <source type="image/png" src="assets/images/form/imagem5.png" />
                                            <img src="assets/images/form/imagem5.png" />
                                        </picture>
                                    </div>
                                    <div class="modal-footer d-flex justify-content-center">
                                        <button type="button" class="btn btn-blue" data-dismiss="modal">Voltar <i class="fas fa-arrow-right"></i></button>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="card five" id="five">
                                <div class="cardInt">
                                    <p class="h5"><strong>Aguarde mais um pouquinho, nós nunca deixamos de atender</strong></p>
                                    <p>Você pode acessar <a href="">nossos conteúdos</a> enquanto espera. Fique tranquilo, nós vamos te avisar quando ele chegar</p>
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
                                <form id="form" method="POST" action="">
                                    <textarea id="textarea"></textarea>
                                    <a type="submit" class="btn btn-blue" onclick="enviar()" >Enviar</a>
                                </form>
                                <div class="conteudos">
                                    <p class="h5">Últimos Conteúdos</p>
                                    <div class="ctn d-flex">
                                        <div class="col-md-6">
                                            <picture class="last">
                                                <source type="image/png" src="Untitled.png" />
                                                <img src="Untitled.png" />
                                            </picture>
                                            <p>Saiba como aliviar a ansiedade em meio ao isolamento social.</p>
                                        </div>
                                        <div class="col-md-6">
                                            <picture class="last">
                                                <source type="image/png" src="Untitled2.png" />
                                                <img src="Untitled2.png" />
                                            </picture>
                                            <p>Saiba como aliviar a ansiedade em meio ao isolamento social.</p>
                                        </div>
                                    </div>
                                    <a href="#" class="btn btn-blue">Ver tudo <i class="fas fa-arrow-right"></i></a>
                                </div>
                            </div>
                            <div class="card last" id="last">
                                <div class="title">
                                    <p class="h5">o Anjo não conseguiu te atender no momento :(</p>
                                    <p>Ocorreu algum imprevisto com seu Anjo. Você pode escolher outro online ou agendar para outra data:</p>
                                </div>
                                <div class="btn">
                                    <a href="agendar-hora.php" class="btn btn-blue one">Agendar</a>
                                    <a href="nossos-anjos.php" class="btn btn-blue two">Escolher outro Anjo</a>
                                    <a href="sala-de-espera2.php" class="btn btn-success whats">
                                        <picture>
                                            <source type="image/jpg" src="assets/images/users/avatar-1.jpg" />
                                            <img src="assets/images/users/avatar-1.jpg" />
                                        </picture>
                                        <p class="aint">Procurar Anjos de Plantão</p>
                                    </a>
                                </div>
                            </div>
                            <div class="anjoLento" id="low">
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
                            </div>
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
    </body>
</html>
