<?php include "../assets/includes/header-anjo.php"; ?>

<!doctype html>
<html>

<head>
    <?php include "../tagmanagerhead.php"; ?>
    <meta charset="utf-8" />
    <title>Avaliações |  Anjo Eyhe - Conversas acolhedoras em minutos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="#######" name="description" />
    <meta content="Themesbrand" name="author" />
    <?php include "../assets/includes/cssgeralanjos.php"; ?>
    <link rel="stylesheet" href="../assets/css/vertical-sidebar.css" />
    <link rel="stylesheet" href="../assets/css/footer.css" />
    <link rel="stylesheet" href="../assets/css/avaliacao.css" />
    <link rel="stylesheet" href="../assets/css/guia_style.css" />

</head>
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-xl-8">
                    <h3> Suas Avaliações: </h3>
                    <?php
                      include 'enginePHP/conecta.php';
                      $meuid = $_SESSION['id_anjo'];
                      $consulta = $conexao->query("SELECT * FROM avaliacoes_new WHERE (idanjo=$meuid)");
                      while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
                          $idheroi = $linha['idheroi'];

                          //pegando algumas infos do heroi
                          $consulta2 = $conexao->query("SELECT * FROM tab_usuario WHERE (id=$idheroi)");
                          while ($linha2 = $consulta2->fetch(PDO::FETCH_ASSOC)) {
                            $nomeheroi = $linha2['nome'];
                            $avatar = $linha2['avatar'];
                          }


                    ?>

                    <div class="card">
                        <picture class="d-flex justify-content-center">
                            <source type="image/jpg" src="https://eyhe.com.br/painel/<?php echo $avatar;?>" />
                            <img src="https://eyhe.com.br/painel/<?php echo $avatar;?>" />
                        </picture>
                        <div class="ava">
                            <p class="h3"><?php echo $nomeheroi; ?></p>
                            <center>
                            <p>
                                <?php echo $linha['comentario']; ?>
                            </p>
                            <u><?php echo $linha['dataavaliacao']; ?></u>
                            </center>
                        </div>
                    </div>
                    <?php  } ?>


                </div>
            </div>
        </div>
    </div>

    <?php include "../assets/includes/footer-anjo.php"; ?>

</div>
<?php include "../assets/includes/javascript.php"; ?>
<!-- App js -->
<script src="../assets/js/app.js"></script>
</body>
</html>
