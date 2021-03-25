<!doctype html>
<html class="html" lang="pt-BR">

    <head>

        <meta charset="utf-8" />
        <title>Redefinir Senha | Eyhe - Conversas acolhedoras em minutos</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Enfrente os Seus Problemas com a Ajuda dos Anjos Eyhe, Você Não Está Sozinho Nessa! Quem Já Viveu o Mesmo Desafio que Você Sabe como Superar e Vai te Contar Como. Acesse Já! Saúde frágil, relações tóxicas, pressão social, depressão, ansiedade. Você precisa de ajuda. Escolha um Anjo Eyhe agora mesmo e confie no poder de um ombro amigo. Temos Pessoas que já Passaram pelo que Você Está Passando e Podem te Ajudar. Conheça quem Já Viveu o Mesmo Desafio que Você Sabe como Superar e Vai te Contar Como. Dê uma Chance para Nós e para Você Mesmo. Tenha a Ajuda que Procura em Nosso Site e Desabafe sem Julgamentos. Faça seu Cadastro!" />
        <meta name="robots" content="index, follow" />
        <meta name="keywords" content="psicólogo online gratuito, ajuda psicológica, conversa online, conversar online, grupo de apoio, desabafo online, +desabafo +online, chat de bate papo, bate papo, bate papo online, site bate papo, quero conversar com alguém, como controlar crise de ansiedade, preciso de ajuda psicológica, como controlar a ansiedade, como acabar com a ansiedade, como dimnuir a ansiedade, como controlar a crise de ansiedade, site de desabafo, crise de ansiedade tem cura, preciso de ajuda emocional, chat ajuda emocional, +conversar +online, controlar a ansiedade, desabafo online auto ajuda, desabafar por chat, preciso de suporte emocional." />
        <meta content="Wilian Gulini" name="author" />

        <?php include "assets/includes/cssgeral.php"; ?>

        <link rel="stylesheet" href="assets/css/recuperar-senha.css" />

    </head>

    <body class="body">
        <div class="home-btn d-none d-sm-block">
            <a href="index.html" class="text-dark"><i class="fas fa-home h2"></i></a>
        </div>
        <div class="account-pages my-5 pt-sm-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card overflow-hidden">
                            <div class="bg-soft-primary">
                                <div class="row">
                                    <div class="col-12 blue">
                                        <div class="text-primary p-4">
                                            <h5 class="text-primary">Redefinir senha</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0">


                                <div class="p-2">
                                    <div class="alert alert-success text-center mb-4" role="alert">
                                        Escolha sua nova senha, digite abaixo para redifinir!
                                    </div>
                                    <form class="form-horizontal" id="nova-senha">

                                        <div class="form-group">
                                            <input type="hidden" name="email" value="<?php echo $_GET['email']; ?>" />
                                            <input type="password" name="senha" class="form-control" placeholder="Nova Senha">
                                        </div>


                                        <div class="form-group row mb-0">
                                            <div class="col-12 text-right">
                                                <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Redefinir senha</button>
                                            </div>
                                        </div>

                                    </form>
                                </div>

                            </div>
                        </div>
                        <div class="mt-5 text-center">
                            <p>© Eyhe 2021 Todos os direitos reservados</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <?php include "assets/includes/javascript-heroi.php"; ?>

        <!-- App js -->
        <script src="assets/js/app.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

        <script>
        jQuery('#nova-senha').submit(function() {
            var dados = $('#nova-senha').serialize();
            jQuery.ajax({
                type: "POST",
                cache: false,
                url: "painel/engine/define_nova_senha_anjo.php",
                data: dados,
                beforeSend: function() {
                  Swal.fire({
                   title: 'Aguarde um instante..',
                   text: 'Estamos configurando sua nova senha',
                   imageUrl: 'https://pedefacil.sodexobeneficios.com.br/PPW/img/tela-espera.gif',
                   imageWidth: 80,
                   imageHeight: 80,
                   imageAlt: 'aguarde',
                 })
                },
                success: function(data) {
                     if (data == 'Senha atualizada com sucesso!') {
                         Swal.fire({
                           icon: 'success',
                           title: data,
                           text: 'Você será redicionado para o login..',
                         })
                        setTimeout(function() {
                            window.location.href = 'https://eyhe.com.br/areadoanjo';
                        }, 2000);
                    } else {
                      Swal.fire({
                        icon: 'error',
                        title: data,
                        text: 'Tente novamente..',
                      })
                    }
                }
            });
            return false;
        });

        </script>
    </body>
</html>
