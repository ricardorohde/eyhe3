<?php include "enginePHP/verifica_sessao_anjo.php"; ?>
<?php
include 'enginePHP/conecta.php';
$idanjo = $_SESSION['id_anjo'];
$consulta = $conexao->query("SELECT online FROM anjos  WHERE id = $idanjo limit 1");
  while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
    $status = $linha['online'];
  }

  if($status == 1){
    $classe_verde = 'opacity: 1!important';
    $classe_vermelho = 'opacity: 0!important';
    $text = 'Online';
  }else{
    $classe_verde = 'opacity: 0!important';
    $classe_vermelho = 'opacity: 1!important';
    $text = 'Offiline';
  }
?>
    <body data-sidebar="dark" id="body">

    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MRZVDDW"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

        <!-- Begin page -->
        <div id="layout-wrapper">

            <header id="page-topbar">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box">
                            <a href="index.php" class="logo logo-light">
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
                            <a type="button" class="btn btn-white" href="https://blog.eyhe.com.br/" target="_blank">
                                Veja nossos conteúdos
                                <!--<i class="mdi mdi-chevron-down"></i>-->
                            </a>
                            <!--<div class="dropdown-menu dropdown-megamenu">
                                <h5 class="font-size-14 mt-0">Últimos Conteúdos</h5>
                            </div>-->
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
                                <!--<span class="badge badge-danger badge-pill">3</span>-->
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

                        <div class="dropdown d-inline-block" id="drop">
                            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="rounded-circle header-profile-user" src="https://eyhe.com.br/painel/<?php echo $_SESSION['avatar_anjo']; ?>"
                                    alt="Header Avatar">
                                <span class="d-none d-xl-inline-block ml-1"><?php echo $_SESSION['nome_anjo']; ?></span>
                                <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" id="drop2">
                                <!-- item-->
                                <a class="online d-flex status">
                                    <p id="on" >Status: <?php echo $text; ?></p>
                                    <ul>
                                        <li id="verde" class="verde" style="<?php echo $classe_verde;?>"></li>
                                        <li id="vermelho" class="vermelho" style="<?php echo $classe_vermelho;?>"></li>
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
                    <a href="quem-somos.php" class="waves-effect">
                        <i class="fas fa-info-circle"></i>
                        <span>Quem Somos</span>
                    </a>
                </li>

                <li>
                    <a href="https://blog.eyhe.com.br/" target="_blank"class="waves-effect">
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

                <li class="avaliar">
                    <a href="avaliacao.php">
                        <i class="far fa-star"></i>
                        <span>Avaliações</span>
                    </a>
                </li>

                <li>
                    <a href="logout.php">
                        <i class="mdi mdi-exit-run"></i>
                        <span>Sair</span>
                    </a>
                </li>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>
<script>
var status = '<?php echo $status;?>';

$("#verde").on('click', function() {
    if(status == '1'){
      status_new = '0';
    }else{
      status_new = '1';
    }
    $.ajax({
      type:'post',    //Definimos o método HTTP usado
      data: {"status": status_new,
            "idanjo": <?php echo $idanjo;?>,
            },
      url: 'enginePHP/altera_status_anjo.php',
      success: function(data){
        Swal.fire({
          icon: 'success',
          title: 'Status alterado',
          text: '',
        })
        setTimeout(function() {
            location.reload();
        }, 1000);
      }
    });

});

$("#vermelho").on('click', function() {
    if(status == '1'){
      status_new = '0';
    }else{
      status_new = '1';
    }
    $.ajax({
      type:'post',    //Definimos o método HTTP usado
      data: {"status": status_new,
            "idanjo": <?php echo $idanjo;?>,
            },
      url: 'enginePHP/altera_status_anjo.php',
      success: function(data){
        Swal.fire({
          icon: 'success',
          title: 'Status alterado',
          text: '',
        })
        setTimeout(function() {
            location.reload();
        }, 1000);
      }
    });
});
</script>
