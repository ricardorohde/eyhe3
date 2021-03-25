<?php include "../assets/includes/header-anjo.php"; ?>

<?php
include 'enginePHP/conecta.php';
$idanjo = $_SESSION['id_anjo'];
$consulta = $conexao->query("SELECT saldo FROM anjos where id = $idanjo limit 1");
while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
  $saldo = $linha['saldo'];
  if($saldo == ''){
    $saldo = 0.00;
  }

  $saldo = $saldo * 0.7;
}
?>

<!doctype html>
<html lang="en">
    <head>
    <?php include "../tagmanagerhead.php"; ?>
        <meta charset="utf-8" />
        <title>Financeiro | Anjo Eyhe - Conversas acolhedoras em minutos</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <?php include "../assets/includes/cssgeralanjos.php"; ?>
        <link rel="stylesheet" href="../assets/css/vertical-sidebar.css" />
        <link rel="stylesheet" href="../assets/css/guia_style.css" />
        <link rel="stylesheet" href="../assets/css/financeiro.css" />
        <link rel="stylesheet" href="../assets/css/financeiro-anjo.css" />
        <link rel="stylesheet" href="../assets/css/footer.css" />
    </head>

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-4">
                    <div class="card">
                        <div class="card-line d-flex">
                            <div class="divAnjo">
                                <picture>
                                    <source src="../image/jpg" type="../painel/<?php echo $_SESSION['avatar_anjo']; ?>">
                                    <img src="../painel/<?php echo $_SESSION['avatar_anjo']; ?>" />
                                </picture>
                                <p class="h5"><?php echo $_SESSION['nome_anjo']; ?></p>
                                <p><?php echo $_SESSION['email_anjo']; ?></p>
                                <p>Pagamentos por PIX</p>
                            </div>
                            <div class="button d-flex justify-content-end">
                                <a href="perfil-do-anjo.php" class="btn btn-white">Editar</a>
                            </div>
                        </div>
                        <hr>
                        <div class="card-line2 d-flex">
                            <div class="saldo">
                                <p>Meu Saldo:</p>
                                <p class="saldoint"><strong>R$ <?php echo $saldo; ?></strong></p>
                            </div>
                            <div class="button d-flex justify-content-end">
                                <a href="#" class="btn btn-blue">Transferir</a>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <p class="mb-4"><strong>Doações:</strong></p>

                            <div class="row">
                                <div class="col-6">
                                    <!--<div>
                                        <p class="h5">R$ 34.90</p>
                                        <p>+ 20 % que no último mês</p>
                                    </div>-->
                                    Módulo de Doações em desenvolvimento
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8">
                    <div class="card">
                        <p class="h5">Transações</p>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-centered table-nowrap mb-0">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Nome</th>
                                            <th>Valor</th>
                                            <th>Status</th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                      <?php
                                      $idanjo = $_SESSION['id_anjo'];
                                      $consulta = $conexao->query("SELECT * FROM financeiroA where idanjo = $idanjo order by id desc");
                                      while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {

                                      ?>
                                        <tr>
                                            <td class="dez7 d-flex">
                                                <div class="names d-flex justify-content-center">
                                                    <p><strong><?php echo $linha['tipo'];?></strong></p>
                                                    <p><?php echo $linha['data_t'];?></p>
                                                </div>
                                            </td>
                                            <td class="dez7">
                                                R$ <?php echo $linha['valor'];?>
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
