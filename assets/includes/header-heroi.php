<!-- End Google Tag Manager -->
    <body id="body" data-sidebar="dark">
      <noscript>
        <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MRZVDDW" height="0" width="0" style="display:none;visibility:hidden"></iframe>
      </noscript>
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
                                        <source type="image/webp" src="assets/images/logotipo_branca.webp" />
                                        <source type="image/png" src="assets/images/logotipo_branca.png" />
                                        <img src="assets/images/logotipo_branca.png"  />
                                    </picture>
                                </span>
                                <span class="logo-lg">
                                    <picture>
                                        <source type="image/webp" src="assets/images/logotipo_branca.webp" />
                                        <source type="image/png" src="assets/images/logotipo_branca.png" />
                                        <img src="assets/images/logotipo_branca.png" width="85px" alt="logo do Eyhe" />
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
                        <form class="app-search d-none d-lg-block" method="get" action="nossos-anjos.php">
                            <div class="position-relative">
                                <input type="text" name="c" class="form-control" placeholder="Procure o Anjo pelo nome">
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
                            <button type="button" class="btn header-item noti-icon waves-effect notification" id="page-header-notifications-dropdown"
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

                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="rounded-circle header-profile-user" src="https://eyhe.com.br/painel/<?php echo $_SESSION['avatar_heroi']; ?>"
                                    alt="Header Avatar">
                                <span class="d-none d-xl-inline-block ml-1"><?php echo $_SESSION['nome_heroi']; ?></span>
                                <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <!-- item-->
                                <a class="dropdown-item" href="editar-perfil.php"><i class="bx bx-user font-size-16 align-middle mr-1"></i> Perfil</a>
                                <a class="dropdown-item" href="financeiro.php"><i class="bx bx-wallet font-size-16 align-middle mr-1"></i>Financeiro</a>
                                <a class="dropdown-item d-block" href="conversas.php"><i class="bx bx-chat font-size-16 align-middle mr-1"></i> Conversas</a>
                                <a class="dropdown-item" href="agendamentos.php"><i class="far fa-calendar-check font-size-16 align-middle mr-1"></i>Agendamentos</a>
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
                  <a class="nossosAnjos" href="nossos-anjos.php" class="waves-effect">
                      <picture>
                          <!--<source type="image/webp" src="assets/images/angel.webp" />-->
                          <source type="image/png" src="assets/images/angel.png" />
                          <img src="assets/images/angel.png" alt="imagem-de-anjo" width="25px"/>
                      </picture>
                      <span>Nossos Anjos</span>
                  </a>
              </li>
              <li>
                  <a target="_blank"href="https://blog.eyhe.com.br/" class="waves-effect">
                      <i class="mdi mdi-cursor-default-click-outline"></i>
                      <span>Blog</span>
                  </a>
              </li>
              <li class="menu-title">Meu Perfil</li>

              <li class="perfil">
                  <a href="editar-perfil.php">
                      <i class="bx bx-user"></i>
                      <span>Perfil</span>
                  </a>
              </li>

              <li>
                  <a class="financeiro" href="financeiro.php" class=" waves-effect">
                      <i class="bx bx-wallet"></i>
                      <span>Financeiro</span>
                  </a>
              </li>

              <li>
                  <a class="conversas" href="conversas.php">
                      <i class="bx bx-chat"></i>
                      <span>Conversas</span>
                  </a>
              </li>

              <li class="agendamentos">
                  <a href="agendamentos.php">
                      <i class="far fa-calendar-check"></i>
                      <span>Agendamentos</span>
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
