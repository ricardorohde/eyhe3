<?php
    include "../assets/includes/header-anjo.php";
    include 'enginePHP/conecta.php';
    $idanjo = $_SESSION['id_anjo'];
    $consulta = $conexao->query("SELECT online, biografia, nome, email, telefone, avatar FROM anjos  WHERE id = $idanjo limit 1");
      while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
        $status = $linha['online'];
        $historia = $linha['biografia'];
        $nome = $linha['nome'];
        $email = $linha['email'];
        $telefone = $linha['telefone'];
        $avatar = $linha['avatar'];
      }

      session_start();
      $_SESSION['avatar_anjo'] = $avatar;
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Seu Perfil | Anjo Eyhe - Conversas acolhedoras em minutos</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <?php include "../assets/includes/cssgeralanjos.php"; ?>
        <link rel="stylesheet" href="../assets/css/guia_style.css" />
        <link rel="stylesheet" href="../assets/css/vertical-sidebar.css" />
        <link rel="stylesheet" href="../assets/css/perfil-do-anjo.css" />
        <link rel="stylesheet" href="../assets/css/footer.css" />
    </head>

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid editar-perfil angel">
            <p class="h5">Meu Perfil</p>
            <div class="row">
                <div class="card">


                    <div class="foto">
                      <form method="POST" action="" id="alterafoto" enctype="multipart/form-data">
                        <input type="hidden" value="<?php echo $_SESSION['id_anjo'];?>" name="id" id="idanjo" />
          				    	<center><img id="img" src="../painel/<?php echo $_SESSION['avatar_anjo']; ?>" />
                        <input type="file" name="imagem" id="upload"  accept="image/jpeg" value=""/>
                        <p>Clique em cima da foto para alterá-la </p></center>
                      </form>
                    </div>

                    <div class="status d-flex">
                        <p id="online">Status: Online</p>
                        <ul class="d-flex">
                            <li id="green"></li>
                            <li id="red"></li>
                        </ul>
                    </div>

                    <form method="POST" action="" id="altera-info-basicas">
                        <input type="hidden" value="<?php echo $_SESSION['id_anjo'];?>" name="id"/>
                        <input type="text" value="<?php echo $nome;?>" name="nome" placeholder="Nome" />
                        <input type="email" value="<?php echo $email;?>"  name="email" placeholder="E-mail" />
                        <input type="tel" value="<?php echo $telefone;?>" name="telefone" placeholder="Telefone" />
                        <div class="history">
                            <p class="h6"><strong>Minha História</strong></p>
                            <p class="p2">Agora, para ficarmos ainda mais próximos, conte-nos um pouco sobre você!</p>
                            <textarea name="biografia"><?php echo $historia; ?></textarea>
                        </div>
                          <button class="btn btn-blue" type="submit">Salvar Informações</button> <br/><br/>
                    </form>

                    <form method="POST" action="" id="altera-senha">
                      <div class="password">
                          <p class="h6"><strong>Alterar Senha:</strong></p>
                          <p class="p2">Mantenha seus dados sempre atualizados e protegidos por uma senha segura. Sugerimos a utilização de letras minúsculas, maiúsculas e números.</p>
                          <input type="hidden" value="<?php echo $_SESSION['id_anjo'];?>" name="id"/>
                          <input type="password" required name="senha_antiga" placeholder="Senha atual" />
                          <input type="password" required name="senha_nova" id="senha_nova" placeholder="Nova senha" />
                          <input type="password" required name="senha_nova_repeat" id="senha_nova_repeat" placeholder="Confirmar nova senha" />
                      </div>
                          <button class="btn btn-blue" type="submit">Alterar senha</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <?php
        include "../assets/includes/footer.php";
    ?>

</div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->
        <?php include "../assets/includes/javascript.php"; ?>
        <?php include "../assets/includes/appjs.php"; ?>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script src="engineJS/editar_perfil_manager.js"></script>
        <script src="../assets/js/main.js"></script>
        <script>

          var status = '<?php echo $status;?>';

          if(status == '1'){
            $("#vermelho").css("opacity","0");
            $("#verde").css("opacity","1");
            $("#on").html("Status: Online");
          }else{
            $("#green").css("opacity","0");
            $("#red").css("opacity","1");
            $("#online").html("Status: Offline");
          }

          $("#green").on('click', function() {
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
                      window.location.href = 'perfil-do-anjo.php';
                  }, 1000);
                }
              });

          });

          $("#red").on('click', function() {
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
                      window.location.href = 'perfil-do-anjo.php';
                  }, 1000);
                }
              });

          });


        </script>

    </body>
</html>
