<!DOCTYPE html>
<html>
    <head>
    <?php include "../tagmanagerhead.php"; ?>
        <meta charset="utf-8" />
        <title>Cadastro de Anjos</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="assets/images/favicon.ico">
        <?php include "../assets/includes/cssgeralanjos.php"; ?>
        <link rel="stylesheet" href="../assets/css/cadastro_anjo.css" />
        <link rel="stylesheet" href="../assets/css/guia_style.css" />
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
                        <a href="#"><li>Início</li></a>
                        <a href="#"><li>Blog</li></a>
                        <a href="#"><li>Área do Anjo</li></a>
                        <a href="#"><li>Quero ser Anjo</li></a>
                    </ul>
                </nav>
                <div class="button d-flex justify-content-center">
                    <a class="btn btn-white">Entrar</a>
                </div>
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
        <section class="infoCadastro">
            <div class="container">
                <div class="row justify-content-center align-items-center flex-column">
                    <div class="formulario">
                        <div class="col-sm-8 col-md-8 classBlock" id="part1" >
                            <div class="ctext d-flex justify-content-center flex-column align-items-center">
                                <p class="h3"> <strong>Inicie seu cadastro</strong></p>
                                <p class="noH">Preencha seu dados corretamente para entramos em contato com você. Responda tranquilamente, todos os dados são confidenciais.</p>
                            </div>
                            <form method="POST" action="#">
                                <input type="text" name="name" placeholder="Nome completo:" />
                                <div class="together d-flex justify-content-between">
                                    <input class="quinze" type="tel" name="day" placeholder="Dia" />
                                    <input class="quinze" type="tel" name="month" placeholder="Mês" />
                                    <input class="quinze" type="tel" name="year" placeholder="Ano" />
                                    <input class="meio" type="tel" name="phone" placeholder="Número de celular:" />
                                </div>
                                <input type="email" name="email" placeholder="Email:" />
                                <input type="text" name="nasc" placeholder="Onde você Nasceu?" />
                            </form>
                        </div>
                        <div class="col-sm-8 col-md-8 part2 classNone" id="part2">
                            <div class="ctext d-flex justify-content-center flex-column align-items-center">
                                <p class="h3"> <strong>Fale brevemente como você vive hoje</strong></p>
                                <p class="noH">Com quem e onde você mora, com o que trabalha, solteiro(a) / casado(a) / Viúvo(a), filhos, animais de estimação.</p>
                            </div>
                            <form metthod="POST" action="#">
                                <textarea></textarea>
                            </form>
                        </div>
                        <div class="col-sm-8 col-md-8 part3 classNone" id="part3">
                            <div class="ctext d-flex justify-content-center flex-column align-items-center">
                                <p class="h3"> <strong>Qual o maior e mais difícil desafio você teve que enfrentar e como superou isso?</strong></p>
                            </div>
                            <form metthod="POST" action="#">
                                <textarea></textarea>
                            </form>
                        </div>
                        <div class="col-sm-8 col-md-8 part4 classNone" id="part4">
                            <div class="ctext d-flex justify-content-center flex-column align-items-center">
                                <p class="h3"> <strong>Cite os momentos que mais te deixam feliz no dia a dia:</strong></p>
                            </div>
                            <form metthod="POST" action="#">
                                <textarea></textarea>
                            </form>
                        </div>
                        <div class="col-sm-8 col-md-8 part5 classNone" id="part5">
                            <div class="ctext d-flex justify-content-center flex-column align-items-center">
                                <p class="h3"> <strong>Qual o papel que a fé desempenha em sua vida?</strong></p>
                            </div>
                            <form metthod="POST" action="#">
                                <textarea></textarea>
                            </form>
                        </div>
                        <div class="col-sm-8 col-md-8 part6 classNone" id="part6">
                            <div class="ctext d-flex justify-content-center flex-column align-items-center">
                                <p class="h3"> <strong>Qual é o valor/princípio pessoal mais importante para você?</strong></p>
                            </div>
                            <form metthod="POST" action="#">
                                <textarea></textarea>
                            </form>
                        </div>
                        <div class="col-sm-8 col-md-8 part7 classNone" id="part7">
                            <div class="ctext d-flex justify-content-center flex-column align-items-center">
                                <p class="h3"> <strong>Porque você gostaria de ser um anjo Eyhe?</strong></p>
                            </div>
                            <form metthod="POST" action="#">
                                <textarea></textarea>
                            </form>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <?php include "../assets/includes/javascript.php"; ?>
        <script src="../assets/js/app.js"></script>
        <script src="../assets/js/cadastro_anjo.js"></script>
    </body>
</html>