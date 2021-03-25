<?php include "../assets/includes/header-anjo.php"; ?>


<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Agendamentos | Anjo Eyhe - Conversas acolhedoras em minutos</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />

        <?php include "../assets/includes/cssgeralanjos.php"; ?>

        <link rel="stylesheet" href="../assets/css/agendamento-anjo.css" />
        <link rel="stylesheet" href="../assets/css/guia_style.css" />
        <link rel="stylesheet" href="../assets/css/vertical-sidebar.css"/>
        <link rel="stylesheet" href="../assets/css/footer.css" />



    </head>



<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="card-title mb-4">Agendamentos</h4>
                    <div class="card pad">

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-centered table-nowrap mb-0">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Nome / Data</th>
                                            <th>Status do Agendamento</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                      <?php
                                      $meuid = $_SESSION['id_anjo'];
                                      $consulta = $conexao->query("SELECT * FROM agendamentos WHERE (idanjo=$meuid) ORDER BY id DESC LIMIT 2");
                                      while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {

                                        $idheroi = $linha['idheroi'];

                                        $consulta2 = $conexao->query("SELECT id,nome, avatar FROM tab_usuario WHERE id=$idheroi LIMIT 1");
                                        while ($linha2 = $consulta2->fetch(PDO::FETCH_ASSOC)) {
                                          $nomeheroi = $linha2['nome'];
                                          $idheroi = $linha2['id'];
                                          $avatar = $linha2['avatar'];
                                        }

                                      ?>

                                        <tr>
                                            <td class="dez7 d-flex">
                                                <picture>
                                                  <source type="image/png" src="../painel/<?php echo $avatar;?>" />
                                                  <img src="../painel/<?php echo $avatar;?>" />
                                                </picture>
                                                <div class="names d-flex justify-content-center">
                                                  <p><?php echo $nomeheroi;?></p>
                                                  <p><?php echo date('d/m/Y ', strtotime($linha['dataagendamento']));?></p>
                                                </div>
                                            </td>
                                            <td class="dez7">
                                                <span class="badge badge-pill badge-soft-success font-size-12">Confirmado</span>
                                            </td>
                                        </tr>
                                      <?php } ?>

                                    </tbody>
                                </table>
                            </div>
                            <!-- end table-responsive -->
                        </div>
                    </div>
                    <i class="fas fa-arrow-right"></i>
                </div>
            </div>
        </div>
    </div>

    <?php include "../assets/includes/footer.php"; ?>

</div>
            <!-- end main content-->

</div>
    <!-- END layout-wrapper -->

    <?php include "../assets/includes/javascript.php"; ?>
    <?php include "../assets/includes/appjs.php"; ?>

</body>

</html>
