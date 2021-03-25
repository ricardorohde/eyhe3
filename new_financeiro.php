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
    <link rel="stylesheet" href="assets/css/new_financeiro.css" />
</head>
<?php include "assets/includes/header-heroi.php"; ?>
    <div class="main-content">
        <div class="page-content financial">
            <div class="container financial">
                <div class="row flex-column">
                    <div class="top">
                        <div class="d-flex justify-content-center">
                            <p class="h5 d-flex justify-content-center align-items-center"><strong>Adicionar Saldo</strong></p>
                            <p class="bonus"><strong>30% Bônus</strong></p>
                        </div>
                        <div class="nav">
                            <ul>
                                <li id="one">Quantia</li>
                                <li id="dois">Método</li>
                                <li id="tres">Confirmação</li>
                            </ul>
                        </div>
                    </div>
                    <form class="w-100" method="POST" action="">
                        <div class="flex-column" id="amount">
                            <div class="card quantia" >
                                <div class="d-flex flex-column">
                                    <p><strong>Digite o valor que deseja carregar:</strong></p>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">R$</span>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Valor a carregar" aria-label="Valor a carregar">
                                        </div>
                                        <input class="cpf" type="number" placeholder="Digite seu CPF" />
                                </div>
                                <div class="d-flex justify-content-between">
                                    <div class="control">
                                        <p>Total a pagar:</p>
                                        <div class="divCash">
                                            <p class="cash">R$: <strong>100,00</strong></p>
                                        </div>
                                    </div>
                                    <div class="control1">
                                        <p>Você receberá:</p>
                                        <div class="divCash1">
                                            <p class="cash">R$: <strong>130,00</strong></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center align-items-center">
                                <a class="btn btn-blue">Selecionar Pagamento</a>
                            </div>
                        </div>
                        <div class="card method" id="method">
                            <div class="d-flex justify-content-between">
                                <div class="cred">
                                    <label id="pix" class="radiocontainer minCard d-flex flex-column align-items-center justify-content-center">
                                            <input type='radio' name='cred' id='4' />
                                        <p>Pix</p>
                                        <img src="assets/images/financeiro/qr-code.webp" />
                                    </label>
                                    <div id="sobPix"></div>
                                </div>   
                                <div class="cred">
                                    <label id="credito" class="radiocontainer minCard d-flex flex-column align-items-center justify-content-center">
                                        <input type='radio' name='cred' id='3' />
                                        <p>Cartão Crédito</p>
                                        <img src="assets/images/financeiro/credit-card.webp" />
                                    </label>
                                    <div id="sobCred"></div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <div class="cred">
                                    <label id="debito" class="radiocontainer minCard d-flex flex-column align-items-center justify-content-center">
                                        <input type='radio' name='cred' id='2' />
                                        <p>Cartão Débito</p>
                                        <img src="assets/images/financeiro/debito.webp" />
                                    </label>
                                    <div id="sobDeb"></div>
                                </div>
                                <div class="cred">
                                    <label id="boleto" class="radiocontainer minCard d-flex flex-column align-items-center justify-content-center">
                                        <input type='radio' name='cred' id='1' />
                                        <p>Boleto Bancário</p>
                                        <img src="assets/images/financeiro/boleto.webp" />
                                    </label>
                                    <div id="sobBol"></div>
                                </div>    
                            </div>
                            <div class="d-flex justify-content-center align-items-center financial">
                                <a type="button"  class="btn btn-grey">Finalizar Pagamento</a>
                            </div>
                        </div>
                        <div class="cartao flex-column" id="confirmation">
                            <div class="card cart" id="credit">
                                <p>Você está pagando:</p>
                                <input class="valor" type="number" name="valor"  step="0.01" min="0" required>
                                <p><strong>Cartão de Crédito</strong></p>
                                <input required type="tel" name="numerocartao" placeholder="Número do Cartão" />
                                <div class="input d-flex justify-content-between">
                                    <input required type="number" name="dataexpiracao" placeholder="MM/AAAA" />
                                    <input required type="number" maxlength="7" name="codigo" placeholder="Código de segurança" />
                                </div>
                                <input required type="text" name="nome" placeholder="Nome do Titular" />
                                <input required type="number" id="cpf" name="cpf" placeholder="CPF do Titular" />
                                <input required type="hidden" name="idheroi" />
                                <input required type="hidden" name="nomeheroi" />
                                <input required type="hidden" name="emailheroi" />

                                <br/>
                                <img src="assets/images/band_card.webp" />
                            </div>
                            <div class="card cart" id="debit">
                                <p>Você está pagando:</p>
                                <input class="valor" type="number" name="valor"  step="0.01" min="0" required>
                                <p><strong>Cartão de Débito</strong></p>
                                <input required type="tel" name="numerocartao" placeholder="Número do Cartão" />
                                <div class="input d-flex justify-content-between">
                                    <input required type="number" name="dataexpiracao" placeholder="MM/AAAA" />
                                    <input required type="number" maxlength="7" name="codigo" placeholder="Código de segurança" />
                                </div>
                                <input required type="text" name="nome" placeholder="Nome do Titular" />
                                <input required type="number" id="cpf" name="cpf" placeholder="CPF do Titular" />
                                <input required type="hidden" name="idheroi" />
                                <input required type="hidden" name="nomeheroi" />
                                <input required type="hidden" name="emailheroi" />

                                <br/>
                                <img src="assets/images/band_card.webp" />
                            </div>
                            <div class="d-flex justify-content-center align-items-center">
                                <a class="btn btn-blue">Confirmar Pagamento</a>
                            </div>
                        </div>
                    
                    </form>
                </div>
            </div>
        </div>
    <?php include "assets/includes/footer.php"; ?>
    </div>
    <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <?php include "assets/includes/javascript-heroi.php"; ?>
    <!-- App js -->
    <script src="assets/js/app.js"></script>
    <script src="assets/js/new_financeiro.js"></script>
</body>

</html>