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
        <link rel="stylesheet" href="../assets/css/footer.css" />
        <link rel="stylesheet" href="../assets/css/vertical-sidebar.css" />
        <link rel="stylesheet" href="../assets/css/ultimas-conversas.css" />
        <link rel="stylesheet" href="../assets/css/guia_style.css" />
    </head>
<?php include "../assets/includes/header-anjo.php"; ?>

<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">
            <div class="d-lg-flex">
                <div class="chat-leftsidebar mr-lg-4">
                    <div class="d-flex flex-column align-items-center">
                        <div class="py-4 border-bottom" id="py4">
                            <div class="media d-flex justify-content-center align-items-center">
                                <p class="h5">Últimas Conversas</p>
                                <i class="fas fa-chevron-down"></i>
                            </div>
                        </div>

                        <?php include "../assets/includes/latest-talk.php"; ?>

                        <div class="search-box chat-search-box py-4">
                            <div class="position-relative">
                                <form class="d-flex" method="POST" action="#">
                                    <div class="input-group">
                                        <input type="text" name="search" class="form-control" placeholder="Pesquise pelo nome:" />
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fas fa-search"></i></span>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="chat-leftsidebar-nav">
                            
                            <div class="tab-content py-4">
                                <div class="tab-pane show active" id="chat">
                                    <div>
                                        <ul class="list-unstyled chat-list" data-simplebar style="max-height: 410px;">
                                            <li class="active">
                                                <a href="#">
                                                    <div class="media">
                                                        <div class="align-self-center mr-3">
                                                            <img src="../assets/images/users/avatar-2.jpg" class="rounded-circle avatar-xs" alt="">
                                                        </div>
                                                        
                                                        <div class="media-body overflow-hidden">
                                                            <h5 class="text-truncate font-size-14 mb-1">Silvia Moreira dos Santos</h5>
                                                            <p class="text-truncate mb-0">Estou passando por mui...</p>
                                                        </div>
                                                        <div class="font-size-11">
                                                            <p class="hours">14:20</p>
                                                            <p class="msg">3</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="#">
                                                    <div class="media">
                                                        <div class="align-self-center mr-3">
                                                            <img src="../assets/images/users/avatar-3.jpg" class="rounded-circle avatar-xs" alt="">
                                                        </div>
                                                        <div class="media-body overflow-hidden">
                                                            <h5 class="text-truncate font-size-14 mb-1">Luiz Gonçalves</h5>
                                                            <p class="text-truncate mb-0">Ja tentei conversar com...</p>
                                                        </div>
                                                        <div class="font-size-11">
                                                            <p class="hours">17:10</p>
                                                            <p class="msg">7</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="#">
                                                    <div class="media">
                                                        <div class="avatar-xs align-self-center mr-3">
                                                            <span class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                                R
                                                            </span>
                                                        </div>
                                                        <div class="media-body overflow-hidden">
                                                            <h5 class="text-truncate font-size-14 mb-1">Renato Rodrigues</h5>
                                                            <p class="text-truncate mb-0">Muito obrigado por tud...</p>
                                                        </div>
                                                       
                                                        <div class="font-size-11">
                                                            <p class="hours">19:35</p>
                                                            <p class="msg">5</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="#">
                                                    <div class="media">
                                                        <div class="align-self-center mr-3">
                                                            <img src="../assets/images/users/avatar-4.jpg" class="rounded-circle avatar-xs" alt="">
                                                        </div>
                                                        <div class="media-body overflow-hidden">
                                                            <h5 class="text-truncate font-size-14 mb-1">Silvia Oliveira</h5>
                                                            <p class="text-truncate mb-0">Antes de conversar ele...</p>
                                                        </div>
                                                       
                                                        <div class="font-size-11">
                                                            <p class="hours">09:20</p>
                                                            <p class="msg">1</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <div class="media">

                                                        <div class="avatar-xs align-self-center mr-3">
                                                            <span class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                                M
                                                            </span>
                                                        </div>
                                                        <div class="media-body overflow-hidden">
                                                            <h5 class="text-truncate font-size-14 mb-1">Mitchel Gilberto</h5>
                                                            <p class="text-truncate mb-0">Adorei te conhecer salvou a...</p>
                                                        </div>
                                                       
                                                        <div class="font-size-11">
                                                            <p class="hours">19:20</p>
                                                            <p class="msg">2</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="#">
                                                    <div class="media">
                                                        <div class="align-self-center mr-3">
                                                            <img src="../assets/images/users/avatar-6.jpg" class="rounded-circle avatar-xs" alt="">
                                                        </div>
                                                        <div class="media-body overflow-hidden">
                                                            <h5 class="text-truncate font-size-14 mb-1">Stephen Hadley</h5>
                                                            <p class="text-truncate mb-0">Finalmente um local seguro para...</p>
                                                        </div>
                                                       
                                                        <div class="font-size-11">
                                                            <p class="hours">07:45</p>
                                                            <p class="msg">9</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- end row -->
            
        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

    
    <?php 
        include "../assets/includes/footer-anjo.php";
    ?>
</div>
            <!-- end main content-->

</div>
    <!-- END layout-wrapper -->
    <?php include "../assets/includes/javascript.php"; ?>
    <?php include "../assets/includes/appjs.php"; ?>
</body>

</html>