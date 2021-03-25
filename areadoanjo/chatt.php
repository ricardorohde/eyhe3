<!doctype html>
<html lang="en">
    <head>
    <?php include "../tagmanagerhead.php"; ?>
        <meta charset="utf-8" />
        <title>header anjo</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />

        <?php include "../assets/includes/cssgeralanjos.php"; ?>

        <link rel="stylesheet" href="../assets/css/guia_style.css" />
        <link rel="stylesheet" href="../assets/css/footer.css" />
        <link rel="stylesheet" href="../assets/css/chat.css" />
        <link rel="stylesheet" href="../assets/css/vertical-sidebar.css"/>

    </head>
<?php include "../assets/includes/header-anjo.php"; ?>

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid chat">
        <div class="card perfil" id="cardPerfil">
            <div id="close"><i class="fas fa-times"></i></div>
            <picture class="d-flex justify-content-center">
                <source type="image/jpg" src="../assets/images/users/avatar-1.jpg" />
                <img src="../assets/images/users/avatar-1.jpg" />
            </picture>
            <div class="text">
                <p class="h2">Daniela Alves</p>
                <p>
                    De Fato não podemos controlar as ações das pessoas a nossa volta! Nem se quer cobrarmos algo que deve ser entregue voluntarimente. Em um relacionamento de 07 anos, lutei contra a dependencia quimica da pessoa que escolhi para caminhar!
                </p>
            </div>
            <div class="avaliar d-flex align-items-center justify-content-center">
                <p>(11 avaliações)</p>
                <picture>
                    <source type="image/png" src="../assets/images/star.png" />
                    <img src="../assets/images/star.png" />
                </picture>
            </div>
            <p class="help">Esse Anjo ja ajudou 42 pessoas</p>
            <div class="theme">
                <p><strong>Este Anjo conversa sobre:</strong></p>
                <div class="theme_one d-flex justify-content-center">
                    <p class="p1">Ansiedade</p>
                    <p>Autoconhecimento</p>
                </div>
                <div class="theme_one d-flex justify-content-center">
                    <p class="p1">Relacionamentos</p>
                    <p>Meditação</p>
                </div>
            </div>
            <a href="#" class="btn btn-blue">Button</a>
        </div>
        <div id="cardMain" class="card main">
            <div id="cardCartao" class="card cartao">
            <div id="close1"><i class="fas fa-times"></i></div>
                <div class="saldo">
                    <p><strong>Saldo</strong></p>
                    <p>R$50,00</p>
                </div>
                <div class="button">
                    <a href="" class="btn btn-blue">Recarregar Saldo</a>
                    <a href="" class="btn btn-blue">Pagar com Saldo</a>
                    <a href="" class="btn btn-blue">Pagar com PIX</a>
                    <a id="pagCred" class="btn btn-blue">Pagar com Cartão de Crédito</a>
                </div>
            </div>
            <div id="cardPag" class="card pag">
            <div id="close2"><i class="fas fa-times"></i></div>
                <form method="POST" action="#">
                    <label>Valor a Pagar:</label>
                    <input type="text" id="money" />
                    <input type="tel" name="number-card" placeholder="Número do Cartão" />
                    <div class="input">
                        <input type="tel" name="validity" placeholder="MM/WW" />
                        <input type="tel" name="CVV" placeholder="CVV" />
                    </div>
                    <input type="text" name="nome" placeholder="Nome do Titular" />
                    <input type="tel" name="cpf" placeholder="CPF do Titular" />
                </form>
                <picture>
                    <source type="image/webp" src="../assets/images/band_card.png" />
                    <source type="image/png" src="../assets/images/band_card.png" />
                    <img src="../assets/images/band_card.png" />
                </picture>
                <a class="btn btn-blue">Confirmar Pagamento</a>
            </div>
        </div>
            <div id="cardChat" class="card chat">
                <div class="p-4 border-bottom ">
                    <div class="row">
                        <div class="col-md-4 col-9">
                            <picture>
                                <source type="image/webp" src="../assets/images/users/avatar-1.jpg" />
                                <img src="../assets/images/users/avatar-1.jpg" />
                            </picture>
                            <div class="txt">
                                <h5 class="font-size-15 mb-1">Nome do Herói</h5>
                                <p class="text-muted mb-0">Online</p>
                            </div>
                        </div>
                        <div class="col-md-8 col-3">
                            <ul class="list-inline user-chat-nav text-right mb-0">
                                <li class="list-inline-item d-sm-inline-block">
                                    <i class="fas fa-video"></i>
                                </li>
                                <a href="#" class="btn dropdown-toggle" id="dropdownMenuLinkChat" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <li class="list-inline-item">
                                        <i class="bx bx-plus-medical"></i>
                                    </li>
                                </a>
                                <div class="dropdown-menu" id="chatdrop" aria-labelledby="dropdownMenuLinkChat">
                                    <a id="verPerfil" class="dropdown-item" href="#">
                                        <picture>
                                            <source type="image/webp" src="../assets/images/user.webp" />
                                            <source type="image/png" src="../assets/images/user.png" />
                                            <img src="../assets/images/user.png" />
                                        </picture>
                                        Ver Perfil
                                    </a>
                                    <a id="reenviar" class="dropdown-item" href="#">
                                        <picture>
                                            <source type="image/webp" src="../assets/images/money.webp" />
                                            <source type="image/png" src="../assets/images/money.png" />
                                            <img src="../assets/images/money.png" />
                                        </picture>
                                        Reenviar pagamento
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <picture>
                                            <source type="image/webp" src="../assets/images/voucher.webp" />
                                            <source type="image/png" src="../assets/images/voucher.png" />
                                            <img src="../assets/images/voucher.png" />
                                        </picture>
                                        Enviar Cupom
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <picture>
                                            <source type="image/webp" src="../assets/images/lamp.webp" />
                                            <source type="image/png" src="../assets/images/lamp.png" />
                                            <img src="../assets/images/lamp.png" />
                                        </picture>
                                        Situações Difíceis
                                    </a>
                                    <hr>
                                    <a class="dropdown-item red" href="#">
                                        <picture>
                                            <source type="image/webp" src="../assets/images/denunciar.webp" />
                                            <source type="image/png" src="../assets/images/denunciar.png" />
                                            <img src="../assets/images/denunciar.png" />
                                        </picture>
                                        Denunciar
                                    </a>
                                </div>
                            </ul>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="chat-conversation p-3">
                        <ul class="list-unstyled" data-simplebar style="max-height: 470px;">
                            <li>
                                <div class="chat-day-title">
                                    <span class="title">Hoje</span>
                                </div>
                            </li>
                            <li>
                                <div class="conversation-list">
                                    <div class="ctext-wrap">
                                        <p>
                                          Primis dictum eleifend ac ultricies porta non erat eros, etiam cubilia facilisis phasellus vehicula massa consectetur, non scelerisque quisque habitasse nulla massa amet. porta curabitur vitae et habitasse augue conubia vitae porttitor vel, ut iaculis curae ullamcorper convallis eros feugiat primis cubilia, arcu ultrices potenti justo platea dictum litora suscipit. fusce imperdiet quisque elit gravida accumsan lectus aenean, dictumst massa purus nullam rhoncus proin vivamus, vestibulum aenean suspendisse felis sociosqu mi. amet fusce euismod suscipit himenaeos suscipit nulla nostra magna fames hac nec, vel laoreet himenaeos convallis phasellus habitasse cras consectetur pharetra.

                                        </p>
                                        <p class="chat-time mb-0">13:57</p>
                                    </div>
                                </div>
                            </li>

                            <li>
                                <div class="conversation-list">
                                    <div class="ctext-wrap">
                                        <p>
                                          Primis dictum eleifend ac ultricies porta non erat eros, etiam cubilia facilisis phasellus vehicula massa consectetur, non scelerisque quisque habitasse nulla massa amet. porta curabitur vitae et habitasse augue conubia vitae porttitor vel, ut iaculis curae ullamcorper convallis eros feugiat primis cubilia, arcu ultrices potenti justo platea dictum litora suscipit. fusce imperdiet quisque elit gravida accumsan lectus aenean, dictumst massa purus nullam rhoncus proin vivamus, vestibulum aenean suspendisse felis sociosqu mi. amet fusce euismod suscipit himenaeos suscipit nulla nostra magna fames hac nec, vel laoreet himenaeos convallis phasellus habitasse cras consectetur pharetra.

                                        </p>
                                        <p class="chat-time mb-0">13:57</p>
                                    </div>
                                </div>
                            </li>

                            <li>
                                <div class="conversation-list">
                                    <div class="ctext-wrap">
                                        <p>
                                          Primis dictum eleifend ac ultricies porta non erat eros, etiam cubilia facilisis phasellus vehicula massa consectetur, non scelerisque quisque habitasse nulla massa amet. porta curabitur vitae et habitasse augue conubia vitae porttitor vel, ut iaculis curae ullamcorper convallis eros feugiat primis cubilia, arcu ultrices potenti justo platea dictum litora suscipit. fusce imperdiet quisque elit gravida accumsan lectus aenean, dictumst massa purus nullam rhoncus proin vivamus, vestibulum aenean suspendisse felis sociosqu mi. amet fusce euismod suscipit himenaeos suscipit nulla nostra magna fames hac nec, vel laoreet himenaeos convallis phasellus habitasse cras consectetur pharetra.

                                        </p>
                                        <p class="chat-time mb-0">13:57</p>
                                    </div>
                                </div>
                            </li>

                            <li>
                                <div class="conversation-list">
                                    <div class="ctext-wrap">
                                        <p>
                                          Primis dictum eleifend ac ultricies porta non erat eros, etiam cubilia facilisis phasellus vehicula massa consectetur, non scelerisque quisque habitasse nulla massa amet. porta curabitur vitae et habitasse augue conubia vitae porttitor vel, ut iaculis curae ullamcorper convallis eros feugiat primis cubilia, arcu ultrices potenti justo platea dictum litora suscipit. fusce imperdiet quisque elit gravida accumsan lectus aenean, dictumst massa purus nullam rhoncus proin vivamus, vestibulum aenean suspendisse felis sociosqu mi. amet fusce euismod suscipit himenaeos suscipit nulla nostra magna fames hac nec, vel laoreet himenaeos convallis phasellus habitasse cras consectetur pharetra.

                                        </p>
                                        <p class="chat-time mb-0">13:57</p>
                                    </div>
                                </div>
                            </li>

                            <li>
                                <div class="conversation-list">
                                    <div class="ctext-wrap">
                                        <p>
                                          Primis dictum eleifend ac ultricies porta non erat eros, etiam cubilia facilisis phasellus vehicula massa consectetur, non scelerisque quisque habitasse nulla massa amet. porta curabitur vitae et habitasse augue conubia vitae porttitor vel, ut iaculis curae ullamcorper convallis eros feugiat primis cubilia, arcu ultrices potenti justo platea dictum litora suscipit. fusce imperdiet quisque elit gravida accumsan lectus aenean, dictumst massa purus nullam rhoncus proin vivamus, vestibulum aenean suspendisse felis sociosqu mi. amet fusce euismod suscipit himenaeos suscipit nulla nostra magna fames hac nec, vel laoreet himenaeos convallis phasellus habitasse cras consectetur pharetra.

                                        </p>
                                        <p class="chat-time mb-0">13:57</p>
                                    </div>
                                </div>
                            </li>

                            <li>
                                <div class="conversation-list">
                                    <div class="ctext-wrap">
                                        <p>
                                          Primis dictum eleifend ac ultricies porta non erat eros, etiam cubilia facilisis phasellus vehicula massa consectetur, non scelerisque quisque habitasse nulla massa amet. porta curabitur vitae et habitasse augue conubia vitae porttitor vel, ut iaculis curae ullamcorper convallis eros feugiat primis cubilia, arcu ultrices potenti justo platea dictum litora suscipit. fusce imperdiet quisque elit gravida accumsan lectus aenean, dictumst massa purus nullam rhoncus proin vivamus, vestibulum aenean suspendisse felis sociosqu mi. amet fusce euismod suscipit himenaeos suscipit nulla nostra magna fames hac nec, vel laoreet himenaeos convallis phasellus habitasse cras consectetur pharetra.

                                        </p>
                                        <p class="chat-time mb-0">13:57</p>
                                    </div>
                                </div>
                            </li>
                            
                            <li>
                                <div class="conversation-list">
                                    <div class="ctext-wrap">
                                        <p>Estou aqui para te ouvir e ajudar a superar seus desafios. Espero que consiga te ajudar.</p>
                                        <p class="chat-time mb-0">13:57</p>
                                    </div>
                                </div>
                            </li>
                            <li class="right">
                                <div class="conversation-list">
                                    <div class="ctext-wrap right">
                                        <p>
                                           Olá, Anjo eu estou passando pr alguns problemas com meu relacionamento atual.
                                        </p>

                                        <p class="chat-time mb-0"> 13:57</p>
                                    </div>
                                </div>
                            </li>
                            <li id="verde">
                                <p>O Herói confirmou o pagamento para conversar + 40 mim com você!</p>
                            </li>
                        </ul>
                    </div>
                    <div class="p-3 chat-input-section">
                        <div class="row">
                            <div class="col">
                                <div class="position-relative">
                                    <input type="text" class="form-control chat-input" placeholder="Enviar Mensagem...">
                                </div>
                            </div>
                            <div class="col-auto d-flex justify-content-center align-items-center">
                                <i class="fas fa-microphone"></i>
                                <i class="fab fa-telegram-plane"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="dica">
            <picture>
                <source type="image/webp" src="../assets/images/lampada.webp" />
                <source type="image/png" src="../assets/images/lampada.png" />
                <img src="../assets/images/lampada.png" style="width: 40px;" />
            </picture>
            <p>
                Vamos enviar algumas mensagens de dicas para o Anjo conversar, caso não saiba o que dizer.
            </p>
            <i id="timeClose" class="fas fa-times"></i>
    </div>
    <?php include "../assets/includes/footer-anjo.php"; ?>
</div>
<!-- end main content-->
</div>
<!-- END layout-wrapper -->
    <?php include "../assets/includes/javascript.php"; ?>
    <?php include "../assets/includes/appjs.php"; ?>

    <script src="../assets/libs/inputmask/min/jquery.inputmask.bundle.min.js"></script>
    <script src="../assets/js/mask.js"></script>
    <script src="../assets/js/chat.js"></script>

</body>
</html>
