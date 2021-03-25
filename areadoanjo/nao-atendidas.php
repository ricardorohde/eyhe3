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
        <link rel="stylesheet" href="../assets/css/guia_style.css" />
        <link rel="stylesheet" href="../assets/css/nao-atendidas.css" />
        <link rel="stylesheet" href="../assets/css/vertical-sidebar.css" />
    </head>
<?php 
include "../assets/includes/header-anjo.php"
?>
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid dont">
            <div class="row justify-content-center">  
                <div class="py-4 border-bottom nao-atendidas" id="py4">
                    <div class="media d-flex justify-content-center align-items-center">
                        <p class="h5">Não Atendidas</p><i class="fas fa-chevron-down"></i>
                    </div>
                </div>
                
                <?php include "../assets/includes/latest-talk.php"; ?>

                <form method="POST" action="#">
                   <div class="input-group">
                       <input type="text" name="search" class="form-control" placeholder="Pesquise pelo nome:" />
                   </div>
                   <div class="input-group-append">
                       <span class="input-group-text"><i class="fas fa-search"></i></span>
                    </div>
                </form>
                <div class="card missed">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="l1">
                                    <picture>
                                        <source type="image/png" src="../assets/images/users/avatar-1.jpg" />
                                        <img src="../assets/images/users/avatar-1.jpg" />
                                    </picture>
                                    <div class="np">
                                        <p>Silvia Moreira</p>
                                        <p>06/10/2020</p>
                                    </div>
                                    <div class="dropdown">
                                        <a class="btn btn-primary btn-red-white dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <p>Resgatar</p>  <i class="bx bx-chevron-down"></i></a>
                                        <div class="dropdown-menu" id="my_drop" aria-labelledby="dropdownMenuLink">
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="l1">
                                    <picture>
                                        <source type="image/png" src="../assets/images/users/avatar-1.jpg" />
                                        <img src="../assets/images/users/avatar-1.jpg" />
                                    </picture>
                                    <div class="np">
                                        <p>Silvia Moreira</p>
                                        <p>06/10/2020</p>
                                    </div>
                                    <div class="dropdown">
                                        <a class="btn btn-primary btn-red-white dropdown-toggle"href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <p>Resgatar</p>  <i class="bx bx-chevron-down"></i></a>
                                        <div class="dropdown-menu" id="my_drop1" aria-labelledby="dropdownMenuLink">
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="l1">
                                    <picture>
                                        <source type="image/png" src="../assets/images/users/avatar-1.jpg" />
                                        <img src="../assets/images/users/avatar-1.jpg" />
                                    </picture>
                                    <div class="np">
                                        <p>Silvia Moreira</p>
                                        <p>06/10/2020</p>
                                    </div>
                                    <div class="dropdown">
                                        <a class="btn btn-primary btn-red-white dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <p>Resgatar</p>  <i class="bx bx-chevron-down"></i></a>
                                        <div class="dropdown-menu" id="my_drop2" aria-labelledby="dropdownMenuLink">
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="l1">
                                    <picture>
                                        <source type="image/png" src="../assets/images/users/avatar-1.jpg" />
                                        <img src="../assets/images/users/avatar-1.jpg" />
                                    </picture>
                                    <div class="np">
                                        <p>Silvia Moreira</p>
                                        <p>06/10/2020</p>
                                    </div>
                                    <div class="dropdown">
                                        <a class="btn btn-primary btn-red-white dropdown-toggle"href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <p>Resgatar</p>  <i class="bx bx-chevron-down"></i></a>
                                        <div class="dropdown-menu" id="my_drop3" aria-labelledby="dropdownMenuLink">
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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