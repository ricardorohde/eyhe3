<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Cadastro de Anjos</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="assets/images/favicon.ico">
        <?php include "../assets/includes/cssgeralanjos.php"; ?>
        <link rel="stylesheet" href="../assets/css/cadastro_anjo.css" />
        <link rel="stylesheet" href="../assets/css/guia_style.css" />
        <link rel="stylesheet" href="../assets/css/intlTelInput.min.css" />
    </head>
    <body>
        <header>
            <div class="container cadastro">
                <picture>
                    <source type="image/webp" src="../assets/images/logotipo_branca.webp" />
                    <source type="image/png" src="../assets/images/logotipo_branca.png" />
                    <img src="../assets/images/logotipo_branca.png" />
                </picture>
                <nav>
                    <ul>
                        <a href="https://www.eyhe.com.br/captacao-anjo/cadastro-anjo.php"><li>Início</li></a>
                        <a href="https://blog.eyhe.com.br/"><li>Blog</li></a>
                        <a href="https://eyhe.com.br/areadoanjo/anjo-login.php"><li>Área do Anjo</li></a>
                        <a href="#info"><li>Quero ser Anjo</li></a>
                    </ul>
                </nav>
            </div>

            <?php include "../assets/includes/menu-mobile.php"; ?>

        </header>
        <section class="margin">
            <div class="container cAnjo">
                <div class="row">
                    <div class="col-sm-6 col-md-6 d-flex justify-content-center flex-column">
                       <h1><strong>Torne-se um <p>Anjo Eyhe!</strong></p></h1>
                       <p>Um anjo Eyhe necessita ter uma grande atenção e responsabilidades ao acolhimento de nossos heróis para que tudo ocorra da forma certa. Para isso nos conte mais um pouco sobre suas informações e sobre quem é você, para que logo possamos entrar nesta jornada para ajudar o próximo :)</p>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <picture class="d-flex justify-content-center align-items-center">
                            <source type="image/webp" src="../assets/images/meditacao.webp" />
                            <source type="image/png" src="../assets/images/meditacao.png" />
                            <img src="../assets/images/meditacao.png" />
                        </picture>
                    </div>
                </div>
            </div>
            <div class="arrowDown d-flex justify-content-center">
                <i class="fas fa-chevron-down"></i>
            </div>
        </section>
        <section id="info" class="infoCadastro">
            <div class="container">
                <div class="row justify-content-center align-items-center flex-column">
                    <div class="formulario">
                        <form method="POST" id="cadastro-anjo">
                            <div class="col-sm-8 col-md-8 classBlock" id="part1" >
                                <div class="ctext d-flex justify-content-center flex-column align-items-center">
                                    <p class="h3"> <strong>Inicie seu cadastro</strong></p>
                                    <p class="noH">Preencha seu dados corretamente para entramos em contato com você. Responda tranquilamente, todos os dados são confidenciais.</p>
                                </div>

                                    <input type="text" name="name" placeholder="Nome completo:" />
                                    <div class="together d-flex justify-content-between">
                                        <input class="quinze" type="number" name="day" placeholder="Dia" />
                                        <input class="quinze" type="number" name="month" placeholder="Mês" />
                                        <input class="quinze" type="number" name="year" placeholder="Ano" />
                                        <div class="d-flex flex-column">
                                            <input class="meio" type="tel" id="phone" name="phone" placeholder="Número de celular:" pattern="[0-9]{2}[0-9]{2}[0-9]{5}[0-9]{4}"/>
                                            <small>formato aceito: 5511988013535</small>
                                        </div>
                                    </div>
                                    <input type="email" name="email" placeholder="Email:" />
                                    <input type="text" name="nasc" placeholder="Onde você Nasceu?" />

                            </div>
                            <div class="col-sm-8 col-md-8 part2 classNone" id="part2">
                                <div class="ctext d-flex justify-content-center flex-column align-items-center">
                                    <p class="h3"> <strong>Fale brevemente como você vive hoje</strong></p>
                                    <p class="noH">Com quem e onde você mora, com o que trabalha, solteiro(a) / casado(a) / Viúvo(a), filhos, animais de estimação.</p>
                                </div>
                                    <textarea name="pergunta1"></textarea>
                            </div>
                            <div class="col-sm-8 col-md-8 part3 classNone" id="part3">
                                <div class="ctext d-flex justify-content-center flex-column align-items-center">
                                    <p class="h3"> <strong>Qual o maior e mais difícil desafio você teve que enfrentar e como superou isso?</strong></p>
                                </div>
                                    <textarea name="pergunta2"></textarea>
                            </div>
                            <div class="col-sm-8 col-md-8 part4 classNone" id="part4">
                                <div class="ctext d-flex justify-content-center flex-column align-items-center">
                                    <p class="h3"> <strong>Cite os momentos que mais te deixam feliz no dia a dia:</strong></p>
                                </div>
                                    <textarea name="pergunta3"></textarea>
                            </div>
                            <div class="col-sm-8 col-md-8 part5 classNone" id="part5">
                                <div class="ctext d-flex justify-content-center flex-column align-items-center">
                                    <p class="h3"> <strong>Qual o papel que a fé desempenha em sua vida?</strong></p>
                                </div>
                                    <textarea name="pergunta4"></textarea>
                            </div>
                            <div class="col-sm-8 col-md-8 part6 classNone" id="part6">
                                <div class="ctext d-flex justify-content-center flex-column align-items-center">
                                    <p class="h3"> <strong>Qual é o valor/princípio pessoal mais importante para você?</strong></p>
                                </div>
                                    <textarea name="pergunta5"></textarea>
                            </div>
                            <div class="col-sm-8 col-md-8 part7 classNone" id="part7">
                                <div class="ctext d-flex justify-content-center flex-column align-items-center">
                                    <p class="h3"> <strong>Porque você gostaria de ser um anjo Eyhe?</strong></p>
                                </div>
                                    <textarea name="pergunta6"></textarea>
                            </div>
                            <div class="col-sm-8 col-md-8 d-flex flex-column align-items-center">
                                <div class="number">
                                    <div class="n1 mark" id="numberOne">1</div>
                                    <div class="n1 normal" id="numberTwo">2</div>
                                    <div class="n1 normal" id="numberThree">3</div>
                                    <div class="n1 normal" id="numberFour">4</div>
                                    <div class="n1 normal" id="numberFive">5</div>
                                    <div class="n1 normal" id="numberSix">6</div>
                                    <div class="n1 normal" id="numberSeven">7</div>
                                </div>
                                <div class="number_button d-flex justify-content-center">
                                    <a id="cont" class="btn btn-blue">Continuar</a>
                                    <button id="enviar" class="btn btn-blue" type="submit">Enviar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <?php include "../assets/includes/javascript.php"; ?>
        <script src="../assets/js/app.js"></script>
        <script src="../assets/js/cadastro_anjo.js"></script>
        <script src="../assets/js/intlTelInput-jquery.min.js"></script>
        <?php include "../tagmanagerhead.php"; ?>

        <script>
            $("#phone").intlTelInput({
                nationalMode: false,
                initialCountry: "br",
                preferredCountries: ["br"],
                autoHideDialCode: false
            });
        </script>

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script src="../painel/engineZENVIA/SMS_JS/send_sms.js"></script>

        <script>
        jQuery(document).ready(function(){
            jQuery('#cadastro-anjo').submit(function(){

                var dados = jQuery(this).serialize();
                jQuery.ajax({
                    type: "POST",
                    url: "../painel/engine/novo_candidato_anjo.php",
                    data: dados,
                    beforeSend: function() {
                      Swal.fire({
                       title: 'Aguarde um instante..',
                       text: 'Estamos salvando seu cadastro',
                       imageUrl: 'https://pedefacil.sodexobeneficios.com.br/PPW/img/tela-espera.gif',
                       imageWidth: 80,
                       imageHeight: 80,
                       imageAlt: 'aguarde',
                     })
                    },
                    success: function(data)
                    {
                        if(data == 'Cadastrado'){
                          var frase = 'Ei, Temos um novo Anjo cadastrado! Favor verificar o painel';
                          envia_sms('554699177534', frase);
                          envia_sms('554699247368', frase);

                          Swal.fire({
                            icon: 'success',
                            title: 'Cadastrado realizado! ',
                            text: 'Aguarde o contato da Equipe Eyhe'
                          })

                          setTimeout( function() {
                            window.location.href = 'cadastro-anjo.php?cadastrado=efetuado';
                          }, 2000 );


                        }else{
                          Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: data,
                          })
                        }
                    },

                });
                $("#cadastro-anjo").trigger("reset");
                return false;


            });
        });

        </script>
    </body>
</html>
