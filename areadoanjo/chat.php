<?php include "enginePHP/verifica_sessao_anjo.php"; ?>
<?php

$myID = $_GET['myid'];
$myID = "a_".$myID;
$idother = $_GET['idother'];
$idheroi = "a_".$idother;
$sessao = $_GET['room'];
$tabela =  $_GET['where'];

#pegando algumas informações do heroi!
include ('enginePHP/conecta.php');

//pegando id da conversa
$consulta = $conexao->prepare("SELECT id FROM conversas WHERE tabela = :tabela LIMIT 1");
$consulta->bindParam(':tabela', $tabela, PDO::PARAM_STR);
$consulta->execute();
while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
  $idconversa = $linha['id'];
}


//pegando resumo da conversa
$consulta = $conexao->prepare("SELECT resumo FROM conversas WHERE id = :idconversa LIMIT 1");
$consulta->bindParam(':idconversa', $idconversa, PDO::PARAM_INT);
$consulta->execute();
while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
  $resumo = $linha['resumo'];
}


#pausa para gerar novo token para essa sessão!
include ('../tokbox_server/gera_token.php');

$consulta = $conexao->prepare("SELECT * FROM tab_usuario WHERE id = :idother LIMIT 1");
$consulta->bindParam(':idother', $_GET['idother'], PDO::PARAM_INT);
$consulta->execute();
while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
  $nomeheroi = $linha['nome'];
  $avatarheroi = $linha['avatar'];
  $emailheroi = $linha['email'];
  $telefoneheroi = $linha['telefone'];
}

?>

<!doctype html>
<html lang="pt-BR">
    <head>
    <?php include "../tagmanagerhead.php"; ?>
        <meta charset="utf-8" />
        <title>Conversando com <?php echo $nomeheroi; ?> | Eyhe - Conversas acolhedoras em minutos</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />

        <?php include "../assets/includes/cssgeralanjos.php"; ?>

        <link rel="stylesheet" href="../assets/css/guia_style.css" />
        <link rel="stylesheet" href="../assets/css/footer.css" />
        <link rel="stylesheet" href="../assets/css/chat.css" />
        <link rel="stylesheet" href="../assets/css/vertical-sidebar.css"/>
        <link href="../assets/css/toastr.min.css" rel="stylesheet">


        <!-- CHAT BY TOKBOX  -->
        <script src='../assets/js/opentok.min.js'></script>
        <script src="https://cdn.jsdelivr.net/npm/promise-polyfill@7/dist/polyfill.min.js" charset="utf-8"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fetch/2.0.3/fetch.min.js" charset="utf-8"></script>

        <style>
          .right{
            background-color: #2F90FF !important;
            color: #FFF;
          }
          .chat-conversation .conversation-list {
            max-width: 90%;
          }
          .barra-status-sucesso{
            padding: 6px;
            color: #fff;
            background-color: #8ac128;
            display: none;
          }

          .barra-status-aguardando{
            padding: 6px;
            color: #fff;
            background-color: #f1c40f;
            display: none;
          }

          .barra-status-10minutos{
            padding: 6px;
            color: #fff;
            background-color: #32c2fb;
            display: none;
          }

          .barra-status-problemas{
            padding: 6px;
            color: #fff;
            background-color: #ed323e;
            display: none;
          }

          .chat-input{
            border-radius: 30px;
            background-color: $light !important;
            border-color:  $light !important;

          }

          .chat-conversation .right .conversation-list .ctext-wrap {
            margin-bottom: 10px;
          }

        </style>

    </head>

        <body class="chatt" data-sidebar="dark">

            <!-- Begin page -->
            <div id="layout-wrapper">

                <header id="page-topbar">
                    <div class="navbar-header">
                        <div class="d-flex">
                            <!-- LOGO -->
                            <div class="navbar-brand-box">
                                <a href="../areadoanjo/index.php" class="logo logo-light">
                                    <span class="logo-sm">
                                        <picture>
                                            <source type="image/webp" src="../assets/images/logotipo_branca.webp" />
                                            <source type="image/png" src="../assets/images/logotipo_branca.png" />
                                            <img src="../assets/images/logotipo_branca.png"  />
                                        </picture>
                                    </span>
                                    <span class="logo-lg">
                                        <picture>
                                            <source type="image/webp" src="../assets/images/logotipo_branca.webp" />
                                            <source type="image/png" src="../assets/images/logotipo_branca.png" />
                                            <img src="../assets/images/logotipo_branca.png" width="85px" alt="logo do Eyhe" />
                                        </picture>
                                    </span>
                                </a>
                            </div>

                            <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect" id="vertical-menu-btn">
                                <i class="fa fa-fw fa-bars"></i>
                            </button>

                            <!-- App Search-->


                            <div class="dropdown dropdown-mega d-none d-lg-block ml-2">
                                <a type="button" class="btn btn-white" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">
                                    Veja nossos conteúdos
                                    <i class="mdi mdi-chevron-down"></i>
                                </a>
                                <div class="dropdown-menu dropdown-megamenu">
                                    <h5 class="font-size-14 mt-0">Últimos Conteúdos</h5>

                                </div>
                            </div>
                        </div>

                        <div class="d-flex">
                            <form class="app-search d-none d-lg-block">
                                <div class="position-relative">
                                    <input type="text" class="form-control" placeholder="Procurar...">
                                    <span class="bx bx-search-alt"></span>
                                </div>
                            </form>
                            <div class="dropdown d-inline-block d-lg-none ml-2">
                                <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="mdi mdi-magnify"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0"
                                    aria-labelledby="page-header-search-dropdown">

                                    <form class="p-3">
                                        <div class="form-group m-0">
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                                                <div class="input-group-append">
                                                    <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="dropdown d-none d-lg-inline-block ml-1">
                                <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                                    <i class="bx bx-fullscreen"></i>
                                </button>
                            </div>

                            <div class="dropdown d-inline-block">
                                <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-notifications-dropdown"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="bx bx-bell bx-tada"></i>
                                    <span class="badge badge-danger badge-pill">0</span>
                                </button>
                                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0 notification"
                                    aria-labelledby="page-header-notifications-dropdown">
                                    <div class="p-3">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <h6 class="m-0"> Notificações </h6>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="p-2 border-top">
                                        <a class="btn btn-blue">Ver mais <i class="mdi mdi-arrow-right ml-1"></i></a>
                                    </div>
                                </div>
                            </div>

                            <div class="dropdown d-inline-block">
                                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img class="rounded-circle header-profile-user" src="https://eyhe.com.br/painel/<?php echo $_SESSION['avatar_anjo']; ?>"
                                        alt="Header Avatar">
                                    <span class="d-none d-xl-inline-block ml-1"><?php echo $_SESSION['nome_anjo']; ?></span>
                                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right status">
                                    <!-- item-->
                                    <a class="online d-flex">
                                        <p id="on" >Status: Online</p>
                                        <ul>
                                            <li id="verde" class="verde"></li>
                                            <li id="vermelho" class="vermelho"></li>
                                        </ul>
                                    </a>
                                    <hr>
                                    <a class="dropdown-item" href="perfil-do-anjo.php"><i class="bx bx-user font-size-16 align-middle mr-1"></i> Perfil</a>
                                    <a class="dropdown-item" href="financeiro-anjo.php"><i class="bx bx-wallet font-size-16 align-middle mr-1"></i>Financeiro</a>
                                    <a class="dropdown-item d-block" href="conversas-anjo.php"><i class="bx bx-chat"></i> Conversas</a>
                                    <a class="dropdown-item" href="agendamentos.php"><i class="far fa-calendar-check"></i>Agendamentos</a>
                                    <a class="dropdown-item" href="avaliacao.php"><i class="far fa-star"></i>Avaliações</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item text-danger" href="logout.php"><i class="bx bx-power-off font-size-16 align-middle mr-1 text-danger"></i> Sair</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </header> <!-- ========== Left Sidebar Start ========== -->
    <div class="vertical-menu">

        <div data-simplebar class="h-100">

            <!--- Sidemenu -->
            <div id="sidebar-menu" style="height: 100%;">
                <!-- Left Menu Start -->
                <ul class="metismenu list-unstyled" id="side-menu">
                    <li class="menu-title">Menu</li>
                    <li>
                        <a href="index.php" class="waves-effect">
                            <i class="fas fa-home"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript: void(0);" class="waves-effect">
                            <i class="fas fa-info-circle"></i>
                            <span>Quem Somos</span>
                        </a>
                    </li>

                    <li>
                        <a href="https://blog.eyhe.com.br/" class="waves-effect">
                            <i class="mdi mdi-cursor-default-click-outline"></i>
                            <span>Blog</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript: void(0);" class="waves-effect">
                            <i class="bx bx-cog "></i>
                            <span>Configurações</span>
                        </a>
                    </li>
                    <li class="menu-title">Meu Perfil</li>

                    <li>
                        <a href="perfil-do-anjo.php">
                            <i class="bx bx-user"></i>
                            <span>Perfil</span>
                        </a>
                    </li>

                    <li>
                        <a href="financeiro-anjo.php" class=" waves-effect">
                            <i class="bx bx-wallet"></i>
                            <span>Financeiro</span>
                        </a>
                    </li>

                    <li>
                        <a href="conversas-anjo.php">
                            <i class="bx bx-chat"></i>
                            <span>Conversas</span>
                        </a>
                    </li>

                    <li>
                        <a href="agendamento-anjo.php">
                            <i class="far fa-calendar-check"></i>
                            <span>Agendamentos</span>
                        </a>
                    </li>

                    <li>
                        <a href="avaliacao.php">
                            <i class="far fa-star"></i>
                            <span>Avaliações</span>
                        </a>
                    </li>

                    <li>
                        <a href="javascript: void(0);">
                            <i class="mdi mdi-exit-run"></i>
                            <span>Sair</span>
                        </a>
                    </li>
            </div>
            <!-- Sidebar -->
        </div>
    </div>
    <!-- Left Sidebar End -->


  <!-- Left Sidebar End -->

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid chat">

            <div class="card perfil" id="cardPerfil">
                <div id="close"><i class="fas fa-times"></i></div>
                <picture class="d-flex justify-content-center">
                    <source type="image/jpg" src="https://eyhe.com.br/painel/<?php echo $avatarheroi; ?>" />
                    <img src="https://eyhe.com.br/painel/<?php echo $avatarheroi; ?>" />
                </picture>
                <div class="text">
                    <p class="h2"><?php echo $nomeheroi; ?></p>
                    <p><?php echo $emailheroi; ?></p>
                    <p><?php echo $telefone; ?></p>
                    <p class="h5">Resumo sobre o desafio que o Herói está passando no momento: </p>
                    <p style="font-size: 11px;"><u>Isso foi preenchido por ele(a) na sala de espera e pode estar em branco</u></h6>
                    <p>
                      <i><?php echo $resumo; ?></i>
                    </p>
                </div>

            </div>
            <div id="cardMain" class="card main">
                <div id="cardPag" class="card pag">
                    <div id="close2"><i class="fas fa-times"></i></div>

                    <form id="payment-form" method="POST" action="#">


                        <input required type="tel" id="numerocartao" name="numero-cartao" placeholder="Número do Cartão" />
                        <div class="input">
                            <input required type="tel" name="expiracao" id="expiracao" placeholder="MM/AAAA" />
                            <input required type="tel" maxlength="7" name="codseguranca" placeholder="Cód. de segurança" />
                        </div>
                        <input required type="text" name="nomecartao" placeholder="Nome do Titular" />
                        <input trequired type="tel" id="cpf" name="cpf" placeholder="CPF do Titular"/>
                        <input required type="hidden" name="idheroi" value="<?php echo $_SESSION['id_heroi'];?>" />
                        <input required type="hidden" name="nomeheroi" value="<?php echo $_SESSION['nome_heroi'];?>" />
                        <input required type="hidden" name="emailheroi" value="<?php echo $_SESSION['email_heroi'];?>" />
                        <picture>
                            <source type="image/webp" src="assets/images/band_card.png" />
                            <source type="image/png" src="assets/images/band_card.png" />
                            <img src="assets/images/band_card.png" width="100%"/>
                        </picture>
                        <br/>
                        <button type="submit" class="btn btn-blue" style="width: 100%">Confirmar Pagamento</button>
                    </form>

                </div>
            </div>
            <div id="cardSituation" class="card situation">
                <div id="close3"><i class="fas fa-times"></i></div>
                <div class="title">
                    <p class="h6"><strong>Algumas situações podem ser difíceis de lidar e podem apresentar risco, e você como anjo deveficar atento ao que fazer e como se portar diante de problemas delicados.</strong></p>
                    <p>Como devemos nos portar e comunicar?</p>
                </div>
                <div class="cont">
                    <ul>
                        <li>Reservar o tempo que for necessário para compreender o contexto do caso do Herói.</li>
                        <li>Ouvir o Herói de forma empática e sem recriminações seja qual for a situação.</li>
                        <li>Utilize uma abordagem calma ao expressar sua fala.</li>
                        <li> Expresse respeito pelos valores e opiniões que o Herói traz no atendimento.</li>
                        <li>Mostrar que está preocupado e que você está disposto a acolher e cuidar desta pessoa duranteaquele momento.</li>
                        <li>Não fuja do assunto! Focalize no sentimento deste Herói.</li>
                        <li>Atenção e calma durante o atendimento, em situações difíceis  pode haver momentos de silênciotanto para Herói ou anjo para uma compreensão maior interna.</li>
                    </ul>
                </div>
                <div class="cont2">
                    <p>O que NÂO devemos demonstrar!</p>
                    <ul>
                        <li> Interromper com frequência a fala do Herói</li>
                        <li> Demonstrar que está muito chocado com a situação.</li>
                        <li> Formas de julgamento ou opiniões que coloquem o Herói como uma pessoa inferior.</li>
                        <li> Dizer simplesmente que tudo irá ficar bem.</li>
                        <li> Taxar de certo ou errado as coisas que levaram o Herói ao problema.</li>
                        <li> Emitir falas de doutrina religiosa.</li>
                    </ul>
                </div>
                <div class="problem">
                    <p><strong>Aqui em baixo estão alguns problemas que apresentam situação de risco, caso queira entendermais sobre oque é e como está relacionado a pessoa.</strong></p>
                    <div class="button d-flex justify-content-between">
                        <a class="btn btn-blue" id="suicidio" >SUICÍDIO</a>
                        <a class="btn btn-blue" id="depressao" >DEPRESSÃO</a>
                    </div>
                    <div class="button2 d-flex justify-content-center">
                        <a class="btn btn-blue" id="violencia" >VIOLÊNCIA DOMESTICA/FAMILIAR</a>
                    </div>
                </div>
                <div class="emergencia">
                    <p class="h6"><strong>Caso o Herói esteja em situação de emergência, use estes recursos que podem lhefornecer ajuda imediata!</strong></p>
                    <p>Telefones para Prevenção</p>
                    <ul>
                        <li>Rede de apoio ao Suicídio número de valorização da vida - (CVV - 141)</li>
                        <li>Disque-Denúncia criado pela Secretária de Políticas para Mulheres - (DISQUE 180)</li>
                    </ul>
                    <p>Telefones de Emergência</p>
                    <ul>
                        <li>Corpo de Bombeiros - 193</li>
                        <li>Polícia Militar - 190</li>
                        <li>Polícia Rodoviária Federal - 191</li>
                        <li>Polícia Rodoviária Estadual - 198</li>
                        <li>Defesa Civil - 199</li>
                    </ul>
                </div>
            </div>
            <div class="card depressao" id="cardDepressao">
                <div id="close4"><i class="fas fa-times"></i></div>
                <p class="h6">
                    A Depressão é uma Perturbação do Humor caracterizada por uma tristeza desadaptada, intensa,prolongada e perturbadora, ausência de prazer e interesse, pessimismo, isolamento, ruminação,falta de energia, insônia ou irritabilidade que podem escalar até doenças psicossomáticas, sintomaspsicóticos e impulsos suicidas podendo ter a duração de semanas, meses ou anos
                </p>
                <p class="d-flex justify-content-start"><strong>Tipos:</strong></p>
                <p class="title0">Depressão Major</p>
                <p>
                    Estado de humor depressivo ou perda de interesse ou prazer, durante o mínimo de duas semanas,acompanhado por 5 ou mais dos seguintes sintomas:
                </p>
                <ul>
                    <li>Humor depressivo na maior parte do dia, quase todos os dias, observado pelopróprio (ex.: sentir-se triste, vazio ou sem esperança) ou pelos outros (ex.: nota-lochoroso).</li>
                    <li>Diminuição do interesse ou prazer na maior parte das atividades, na maior partesdos dias.</li>
                    <li>Diminuição ou aumento de peso ou apetite, sem estar em dieta alimentar.</li>
                    <li>Insônia ou hipersonia quase todos os dias dificuldade em adormecer e/ou acordarcom frequência.</li>
                    <li>Agitação ou lentificação dos movimentos, quase todos os dias.</li>
                    <li>Fadiga ou perda de energia.</li>
                    <li>Sentimentos de inutilidade ou de culpa excessiva ou inapropriada.</li>
                    <li>Dificuldade de concentração.</li>
                    <li>Pensamentos recorrentes sobre a morte, ideação suicida recorrente sem um planoespecífico ou tentativa de suicídio ou um plano específico para cometer suicídio.</li>
                </ul>
                <p class="title1">Distimia</p>
                <p>
                    Estado de humor depressivo (com menos sintomas que a Depressão Major) na maior parte do dia,que persiste pelo menos dois anos, acompanhado de 2 ou mais dos seguintes sintomas:
                    <ul>
                        <li>Diminuição ou aumento do apetite.</li>
                        <li>Insônia ou hipersonia.</li>
                        <li>Baixa energia ou fadiga.</li>
                        <li>Baixa autoestima.</li>
                        <li>Dificuldade de concentração ou em tomar decisões.</li>
                        <li>Sentimentos de desesperança.</li>
                    </ul>
                </p>
                <p>
                    Fatores Biológicos
                    <br>
                    <ul>
                        <li>Neuroquímica: baixa Dopamina e Serotonina e desregulação na adrenalina enoradrenalina.</li>
                        <li>Hormonal: alterações ao nível  da serotonina, Testosterona (líbido, vitalidade físicae psicológica).</li>
                        <li>Doenças físicas.</li>
                        <li>Genética: mais comum em familiares em primeiro.</li>
                    </ul>
                </p>
                <p>
                    Fatores Ambientais
                    <br>
                    <ul>
                        <li>Trauma.</li>
                        <li>Abuso físico ou psicológico..</li>
                        <li>Perdas de vários tipos (relacionais, profissionais, etc.).</li>
                        <li>Mudanças repentinas no contexto de vida.</li>
                        <li>Consumo de substâncias.</li>
                        <li>Isolamento social.</li>
                        <li>Contextos familiares disfuncionais.</li>
                    </ul>
                </p>
            </div>
            <div class="card suicidio" id="cardSuicidio">
                <div id="close5"><i class="fas fa-times"></i></div>
                <p class="h6">Devemos ficar atento a frases que levem a esses sentimentos: DEPRESSÃO, DESESPERANÇA, DESAMPARO, DESESPERO pois são um alerta para um risco de suicídio.</p>
                <p>Alguns fatores que podem se caracterizar  a um risco sobre suicídio pessoas que tem ou estão passando por:</p>
                <ul>
                    <li>TRANSTORNOS MENTAIS: depressão, transtorna de personalidade, Esquizofrenia, Transtornos deansiedade.</li>
                    <li>SOCIODEMOGRÁFICOS: Estratos econômicos extremos, desempregados, aposentados, imigrantes.</li>
                    <li>PSICOLÓGICOS: Perdas recentes, falta de figuras de pai ou mãe, dinâmica familiar conturbada,datas importantes, personalidades com traços de impulsividade, agressividade e humor que variamuito.</li>
                    <li>CONDIÇÕES CLÍNICAS INCAPACITANTES: Doenças, dor crônica, lesões desfigurantes, traumas.</li>
                </ul>
                <p>AS PERGUNTAS DEVEM SER FEITAS COM CAUTELA, DEMONSTRANDO COMPAIXÃO E EMPATIA.</p>
                <p>DEVE-SE TENTAR ESTABELECER UM VÍNCULO QUE TENHA CONFIANÇA E COLABORAÇÃO.</p>
                <p>RESPEITANDO A CONDIÇÃO EMOCIONAL QUE LEVOU A PESSOA A PENSAR EM SUICÍDIO.</p>
                <p>NÚMERO DE VALORIZAÇÃO DA VIDA (CVV - 141) COMO UMA REDE DE APOIO AO SUICÍDIO.</p>
            </div>
            <div class="card violencia" id="cardViolencia">
                <div id="close6"><i class="fas fa-times"></i></div>
                <p class="h6">Causas sofrimento das vítimas e imputação de seus atos de liberdade, e podem gerar váriossintomas na ​saúde mental​ e​ física​ destas pessoas, prejudica diretamente a liberdade e o direito dedesenvolvimento dos membros da família ou da pessoa em questão.</p>
                <p>Tipos de Violência que você deve prestar atenção e poderá identificar nas conversas:</p>
                <ul>
                    <li>
                    Negligencia: é a omissão de responsabilidade de um ou mais membros da família em relação ao outro,sobretudo com aqueles que precisam de ajuda por alguma necessidade como questões de: idadeou dependência financeira, dependência emocional, abandono ,falta de cuidado ou atenção.
                    </li>
                    <li>
                    Violência física: é toda ação ou omissão que traz o dano para a identidade, auto-estima, e aspectos que regem aindividualidade da pessoa com grande relação ao desenvolvimento da pessoa.Exemplos como: Ameaças, humilhações, agressões, chantagem, cobranças de comportamento,descriminação, exploração, críticas abusivas pelo desempenho em diferentes situações, impedir apessoa ir em lugares, utilizar roupas entre várias outras ações que impeçam a maneira de viver do outro.
                    </li>
                    <li>
                    Violência Psicologica: ocorre quando alguém causa ou tenta causar por meio de força física ou algum tipo de arma ouinstrumento que possa causar lesões no outro. Essa violências podem causar consequências desdemarcas ou mutilações no corpo onde a pessoa em certas situações busca esconder por fortecoerção psicológica do agressor.Podemos ver esses casos é uma grande maioria contra mulheres e idosos, onde podemosdenunciar pelo ​Disque 180.
                    </li>
                    <li>
                        Violência Sexual: toda ação qual uma pessoa, obriga o outro a realizar práticas sexuais de forma forçada onde há umpoder sobre o outro agindo por meio de forças físicas, influência psicológicas ou uso de drogas,sedativos ou ameaça com armas...Atenção a falas que trazem detalhes sobre:​ Toques na partes do corpo, carícias não consentidas,olhar fixos e coercitivos, Exposição de imagens pornográficas, Falas que remetem a conotaçãosexual, E todas as ações que trazem desconforto neste sentido.
                    </li>
                </ul>
                <p>(DISQUE 180 ) ​O Disque-Denúncia foi criado pela Secretaria de Políticas para Mulheres . Adenúncia é anônima e gratuita, disponível 24 horas, em todo o país.</p>
            </div>

            <div autocomplete="off" id="cardChat" class="card chat">
                <div class="p-4 border-bottom ">
                    <div class="row">
                        <div class="col-md-4 col-9">
                            <picture>
                                <source type="image/webp" src="https://eyhe.com.br/painel/<?php echo $avatarheroi; ?>" />
                                <img src="https://eyhe.com.br/painel/<?php echo $avatarheroi; ?>" />
                            </picture>
                            <div class="txt">
                                <h5 class="font-size-15 mb-1"><?php echo $nomeheroi; ?></h5>
                                <p class="text-muted mb-0" id="status_heroi">Offiline</p>
                            </div>
                        </div>
                        <div class="col-md-8 col-3">
                            <ul class="list-inline user-chat-nav text-right mb-0">
                                <a id="gatilho-video" href="#">
                                  <li class="list-inline-item d-sm-inline-block">
                                      <i class="fas fa-video"></i>
                                  </li>
                                </a>
                                <a class="btn dropdown-toggle" id="dropdownMenuLinkChat" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                                  <!--<a id="reenviar" class="dropdown-item" href="#">
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
                                  </a>-->
                                  <a class="dropdown-item" id="sitDif" href="#">
                                      <picture>
                                          <source type="image/webp" src="../assets/images/lamp.webp" />
                                          <source type="image/png" src="../assets/images/lamp.png" />
                                          <img src="../assets/images/lamp.png" />
                                      </picture>
                                      Situações Difíceis
                                  </a>
                                  <hr>
                                  <a class="dropdown-item red" id="denunciar">
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
                <div class="chat-conversation-h">
                    <div class="chat-conversation p-3">
                        <ul class="list-unstyled" id="messageBody" data-simplebar style=" max-height: 470px; overflow-y: auto;">
                        </ul>
                    </div>

                    <!-- BARRAS DE STATUS -->
                    <div class="barra-status-sucesso" >
                      <center> Pagamento Confirmado. Dedique seus próximos 40 minutos para esse Herói :) </center>
                    </div>
                    <div class="barra-status-aguardando">
                      <center> Pagamento em aguardo. Só continue o atendimento quando a barra estiver verde.</center>
                    </div>
                    <div class="barra-status-problemas">
                      <center> Pagamento com problemas. Ajude o Herói caso ele precise.</center>
                    </div>
                    <div class="barra-status-10minutos">
                      <center> Herói está utilizando os 10 minutos gratuitos. Seja prestativo e incentive ele a continuar</center>
                    </div>

                    <form autocomplete="off" id="input-chat" action="">
                    <div class="p-3 chat-input-section">
                        <div class="row">
                              <div class="col">
                                  <div class="position-relative">
                                      <input id="messageInput"  type="text" class="form-control chat-input" placeholder="Enviar Mensagem...">
                                      <input id="myID" name="myID" type="hidden" value="<?php echo $myID; ?>"/>
                                      <input id="tabela" name="tabela" type="hidden" value="<?php echo $tabela; ?>"/>
                                  </div>
                              </div>
                              <div class="col-auto d-flex justify-content-center align-items-center">
                                  <!--<i class="fas fa-microphone"></i>-->
                                  <button style="border: none; background-color: white" type="submit" id="btn_submit">
                                    <i class="fab fa-telegram-plane"></i>
                                  </button>
                              </div>
                        </div>
                    </div>
                    </form>



                </div>
            </div>
        </div>
    </div>


</div>
<!-- end main content-->
</div>
<!-- END layout-wrapper -->
    <?php include "../assets/includes/javascript.php"; ?>
    <script src="../assets/js/app.js"></script>
    <script src="../assets/js/dashanjo.js"></script>

    <script src="../assets/js/chat.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/mustache.js/4.0.1/mustache.min.js"></script>

    <script>
    var SESSION_ID = '<?php echo $sessao; ?>'; var TOKEN = '<?php echo $token; ?>'; var AVATAR_EU = '<?php echo $avatarheroi; ?>'; var AVATAR_ELE = '<?php echo $avatarheroi; ?>';
    var MY_ID = '<?php echo $_GET['myid']; ?>'; var TABELA = '<?php echo $_GET['where']; ?>'; var IDHEROI = '<?php echo $_GET['idother']; ?>';
    var APIKEY = 46211362;
    var NOMEHEROI = '<?php echo $nomeheroi;?>';
    var NOMEANJO = '<?php echo $_SESSION['nome_anjo'];?>';
    var URL_VIDEO = 'https://eyhe.com.br/video/index.php?apiKey='+APIKEY+'&sessionId='+SESSION_ID+'&token='+TOKEN;
    </script>

    <script src="chat-engine/script.js"></script>
    <script src="chat-engine/historico.js"></script>
    <script src="chat-engine/digitando.js"></script>
    <script src="chat-engine/sensor_status.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="../assets/js/toastr.min.js"></script>
    <script src="engineJS/sentindo_a_conversa.js"></script>
    <script src="engineJS/sensor_chamada_de_video.js"></script>
    <script src="engineJS/video_manager.js"></script>


    <script src="../painel/engineZENVIA/SMS_JS/send_sms.js"></script>
    <script src="../painel/engineZENVIA/WHATS_JS/send_whats.js"></script>
    <script src="engineJS/denunciar.js"></script>


</body>
</html>
