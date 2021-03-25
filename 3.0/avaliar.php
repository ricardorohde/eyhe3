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
        <link rel="stylesheet" href="assets/css/avaliar.css" />
        <link rel="stylesheet" href="assets/css/footer.css" />
    </head>

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid avaliar">
            <div class="row">
                <p class="h5 title_avaliar">Avaliar</p>
                <div class="card">
                    <div class="ava1 d-flex justify-content-end align-items-center">
                        <i class="fas fa-chevron-left"></i>
                        <div class="ava1-1 d-flex justify-content-start">
                            <picture class="d-flex justify-content-end">
                                <source type="image/jpg" src="assets/images/users/avatar-1.jpg" />
                                <img src="assets/images/users/avatar-1.jpg" />
                            </picture>
                            <div class="ava_text d-flex flex-column align-items-center justify-content-center">
                                <p>Silvio Moreira</p>
                                <p>06/10/2020</p>
                            </div>
                        </div>
                    </div>
                    <div class="ava2">
                        <div class="div d-flex justify-content-around align-items-center">
                            <p class="h5">Como você está se sentindo agora? </p>
                        </div>
                        <form method="POST" action="">
                            <select>
                                <option selected>Selecione sua resposta</option>
                                <option>Estou pior do que quando cheguei</option>
                                <option>Não me ajudou em nada.</option>
                                <option>Estou um pouco aliviado.</option>
                                <option>Me sentindo bem.</option>
                                <option>Me ajudou muito e estou melhor que anteriormente.</option>
                            </select>
                        </form>
                    </div>
                </div>
                <div class="card avalia">
                    <div class="ava2">
                        <div class="div d-flex justify-content-around align-items-center">
                            <p class="h5">Como você define o atendimento do Anjo? </p>
                        </div>
                        <form method="POST" action="">
                            <select>
                                <option selected>Selecione sua resposta</option>
                                <option>Demorou e não me ajudou.</option>
                                <option>Rápido porém não me ajudou.</option>
                                <option>Demorou pra me fazer sentir melhor.</option>
                                <option>Esperei pouco mas fui atendido e ajudado.</option>
                                <option>Me atendeu rapidamente e me ajudou muito.</option>
                            </select>
                        </form>
                    </div>
                </div>
                <div class="card avalia">
                    <div class="ava2">
                        <div class="div d-flex justify-content-around align-items-center">
                            <p class="h5">Você sentiu que este anjo estava preparado para conversar sobre seu problema? </p>
                        </div>
                        <form method="POST" action="">
                            <select>
                                <option selected>Selecione sua resposta</option>
                                <option>Foi apático e insensível.</option>
                                <option>Foi empático mas nada preparado.</option>
                                <option>Teve empatia e representou um pouco de preparo.</option>
                                <option>Muito empático e sensível.</option>
                                <option>Incrível me auxiliou muito sobre o problema em questão.</option>
                            </select>
                        </form>
                    </div>
                </div>
                <div class="card avalia">
                    <div class="ava2">
                        <div class="div d-flex justify-content-around align-items-center">
                            <p class="h5">Você indicaria este anjo para outra pessoa? </p>
                        </div>
                        <form method="POST" action="">
                            <select>
                                <option selected>Selecione sua resposta</option>
                                <option>Nunca.</option>
                                <option>No momento não.</option>
                                <option>Sim mas não para qualquer problema.</option>
                                <option>Sim foi um bom atendimento.</option>
                                <option>Claro este anjo me ajudou em meu problema.</option>
                            </select>
                        </form>
                    </div>
                </div>
                <div class="card avalia">
                    <div class="ava2">
                        <div class="div d-flex justify-content-around align-items-center">
                            <p class="h5">Gostaria de deixar um comentário sobre seu atendimento? </p>
                        </div>
                        <form method="POST" action="">
                           <textarea></textarea>
                        </form>
                    </div>
                </div>
                <div class="card avalia">
                    <div class="ava2">
                        <div class="div d-flex justify-content-around align-items-center">
                            <p class="h5">A plataforma deixou a desejar, ou ocorreu problemas de funcionamento? </p>
                        </div>
                        <form method="POST" action="">
                            <select>
                                <option selected>Selecione sua resposta</option>
                                <option>Muito ruim não consegui usar a plataforma.</option>
                                <option>Não consegui me desabafar.</option>
                                <option>Teve alguns erros mas consegui usar.</option>
                                <option>Tudo funcionou perfeitamente e me sinto melhor.</option>
                            </select>
                        </form>
                    </div>
                </div>
                <div class="card avalia">
                    <div class="ava2">
                        <div class="div d-flex justify-content-around align-items-center">
                            <p class="h5">Escreva aqui um comentário sobre sua experiência em nossa plataforma: </p>
                        </div>
                        <form method="POST" action="">
                           <textarea></textarea>
                        </form>
                    </div>
                    <div class="button"><a href="#" class="btn btn-blue">Confirmar avaliação</a></div>
                </div>
            </div>
        </div>
    </div>

<?php include "assets/includes/footer.php"; ?>
</div>
<!-- end main content-->

</div>
<!-- END layout-wrapper -->
    <?php include "assets/includes/javascript-heroi.php"; ?>
    <script src="assets/js/app.js"></script>
</body>

</html>
