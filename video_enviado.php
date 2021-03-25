<?php include "painel/engine/verifica_sessao_heroi.php"; ?>

<!doctype html>
<html lang="pt-BR">

<head>
<meta charset="utf-8" />
    <title>Sala de Vídeo |  Eyhe - Conversas acolhedoras em minutos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Enfrente os Seus Problemas com a Ajuda dos Anjos Eyhe, Você Não Está Sozinho Nessa! Quem Já Viveu o Mesmo Desafio que Você Sabe como Superar e Vai te Contar Como. Acesse Já! Saúde frágil, relações tóxicas, pressão social, depressão, ansiedade. Você precisa de ajuda. Escolha um Anjo Eyhe agora mesmo e confie no poder de um ombro amigo. Temos Pessoas que já Passaram pelo que Você Está Passando e Podem te Ajudar. Conheça quem Já Viveu o Mesmo Desafio que Você Sabe como Superar e Vai te Contar Como. Dê uma Chance para Nós e para Você Mesmo. Tenha a Ajuda que Procura em Nosso Site e Desabafe sem Julgamentos. Faça seu Cadastro!" />
    <meta name="robots" content="index, follow" />
    <meta name="keywords" content="psicólogo online gratuito, ajuda psicológica, conversa online, conversar online, grupo de apoio, desabafo online, +desabafo +online, chat de bate papo, bate papo, bate papo online, site bate papo, quero conversar com alguém, como controlar crise de ansiedade, preciso de ajuda psicológica, como controlar a ansiedade, como acabar com a ansiedade, como dimnuir a ansiedade, como controlar a crise de ansiedade, site de desabafo, crise de ansiedade tem cura, preciso de ajuda emocional, chat ajuda emocional, +conversar +online, controlar a ansiedade, desabafo online auto ajuda, desabafar por chat, preciso de suporte emocional." />
    <meta content="Wilian Gulini" name="author" />
    <?php include "assets/includes/cssgeral.php"; ?>
    <link rel="stylesheet" href="assets/css/vertical-sidebar.css" />
    <link rel="stylesheet" href="assets/css/footer.css" />
    <link rel="stylesheet" href="assets/css/guia_style.css" />
    <link rel="stylesheet" href="assets/css/video.css" />
</head>
<?php include "assets/includes/header-heroi.php"; ?>

    <div class="main-content video">
        <div class="page-content">
            <div class="container-fluid video">
                <div class="row">
                    <div class="top d-flex justify-content-between">
                        <div class="photo_hero"></div>
                        <div class="msg d-flex">
                            <a href="chat_link">
                                <picture>
                                    <source type="image/webp" src="assets/images/icon_video/chats.webp" />
                                    <source type="image/svg" src="assets/images/icon_video/chats.svg" />
                                    <img src="assets/images/icon_video/chats.svg" />
                                </picture>
                            </a>
                            <div class="dropdown">
                                <picture class="dropdown-toggle" type="button" id="dropDown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <source type="image/webp" src="assets/images/icon_video/points.webp" />
                                    <source type="image/svg" src="assets/images/icon_video/points.svg" />
                                    <img src="assets/images/icon_video/points.svg" />
                                </picture>
                                <div class="dropdown-menu" aria-labelledby="dropDown">
                                    <a class="dropdown-item rel" href="#"><img src="assets/images/icon_video/triangulo.webp" /> Relatar Problema</a>
                                    <a class="dropdown-item den" href="#"><img src="assets/images/icon_video/circulo.webp" />Denunciar Abuso</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mid">
                        <p class="h5"><strong>Convite enviado.</strong></p>
                        <p class="texto">Ele já está a caminho, aguarde um pouquinho até ele chegar.</p>
                        <a class="btn btn-green">
                            <picture>
                                <source type="image/webp" src="assets/images/icon_video/ok.webp" />
                                <source type="image/svg" src="assets/images/icon_video/ok.svg" />
                                <img src="assets/images/icon_video/ok.svg" />
                            </picture>
                            Convite Enviado
                        </a>
                    </div>
                    <div class="bottom">
                        <picture class="d-flex phoneRed" type="button" data-toggle="modal" data-target="#ExemploModalCentralizado">
                            <source type="image/webp" src="assets/images/icon_video/phoneRed.webp" />
                            <source type="image/svg" src="assets/images/icon_video/phoneRed.svg" />
                            <img src="assets/images/icon_video/phoneRed.svg" />
                        </picture>
                        <!-- Modal -->
                        <div class="modal fade" id="ExemploModalCentralizado" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content" id="black">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p class="h5"><strong>Encerrar chamada?</strong></p>
                                    <p>Vocês serão direcionados para o chat automaticamente</p>
                                </div>
                                <div class="modal-footer d-flex flex-column align-items-center">
                                    <a type="button" class="btn btn-green" data-toggle="modal" data-target="#modalCenter">Confirmar</a>
                                    <a type="button" class="btn btn-red" data-dismiss="modal">Cancelar</a>
                                </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="modalCenter" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content" id="black1">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p class="h5"><strong>Avaliação da chamada</strong></p>
                                    <div style="position:relative;width:100%;">
                                        <div id="altcontainer" class="notranslate">
                                            <form class="d-flex justify-content-around w-100" method="post" action="">
                                                <label class='radiocontainer' id='label4'> <i class="fas fa-star"></i>
                                                <input type='checkbox' name='sentimento' id='4' value='Com medo' /><span class='checkmark'></span></label>

                                                <label class='radiocontainer' id='label3'> <i class="fas fa-star"></i>
                                                <input type='checkbox' name='sentimento' id='3' value='Com medo' /><span class='checkmark'></span></label>

                                                <label class='radiocontainer' id='label2'> <i class="fas fa-star"></i>
                                                <input type='checkbox' name='sentimento' id='2' value='Confuso' /><span class='checkmark'></span></label>

                                                <label class='radiocontainer' id='label1'> <i class="fas fa-star"></i>
                                                <input type='checkbox' name='sentimento' id='1'  value='Ansioso' /><span class='checkmark'></span></label>

                                                <label class='radiocontainer' id='label0'> <i class="fas fa-star"></i>
                                                <input type='checkbox' name='sentimento' id='0'  value='Tranquilo' /><span class='checkmark'></span></label>
                                            </form>

                                        </div>
                                    </div>

                                </div>
                                <div class="modal-footer d-flex justify-content-center">
                                    <a href="link_para_o_chat" type="button" class="btn btn-green">Avaliar</a>
                                    <a type="button" class="btn btn-red" data-dismiss="modal">Fechar</a>
                                </div>
                                </div>
                            </div>
                        </div>
                        <picture class="d-flex" >
                            <source type="image/webp" src="assets/images/icon_video/video.webp" />
                            <source type="image/svg" src="assets/images/icon_video/video.svg" />
                            <img id="imgVideo" class="video" src="assets/images/icon_video/video.svg" />
                        </picture>
                        <picture class="d-flex" >
                            <source type="image/webp" src="assets/images/icon_video/videoZ.webp" />
                            <source type="image/svg" src="assets/images/icon_video/videoZ.svg" />
                            <img id="imgVideoZ" class="video" src="assets/images/icon_video/videoZ.svg" />
                        </picture>
                        <picture class="d-flex" >
                            <source type="image/webp" src="assets/images/icon_video/microfone.webp" />
                            <source type="image/svg" src="assets/images/icon_video/microfone.svg" />
                            <img id="micro" class="microfone" src="assets/images/icon_video/microfone.svg" />
                        </picture>
                        <picture class="d-flex" >
                            <source type="image/webp" src="assets/images/icon_video/microfoneZ.webp" />
                            <source type="image/svg" src="assets/images/icon_video/microfoneZ.svg" />
                            <img id="microZ" class="microfone" src="assets/images/icon_video/microfoneZ.svg" />
                        </picture>
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
    <!-- App js -->
    <script src="assets/js/app.js"></script>
    <script src="assets/js/video.js"></script>
</body>

</html>