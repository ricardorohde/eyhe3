<?PHP session_start(); ?>
<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <title>Painel de Gerenciamento - EYHE</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1">
  <!-- build:css({.tmp,app}) styles/app.min.css -->
  <link rel="stylesheet" href="styles/webfont.css">
  <link rel="stylesheet" href="styles/climacons-font.css">
  <link rel="stylesheet" href="vendor/bootstrap/dist/css/bootstrap.css">
  <link rel="stylesheet" href="styles/font-awesome.css">
  <link rel="stylesheet" href="styles/card.css">
  <link rel="stylesheet" href="styles/sli.css">
  <link rel="stylesheet" href="styles/animate.css">
  <link rel="stylesheet" href="styles/app.css">
  <link rel="stylesheet" href="styles/app.skins.css">

  <link rel="stylesheet" href="styles/reactor2.css">
  <!-- endbuild -->
</head>
<style>
body{
  background-image: url("images/background.jpg");
  background-size: 100%, 100%;
}

</style>
<body  class="page-loading">
  <!-- page loading spinner -->
  <div class="pageload">
    <div class="pageload-inner">
      <div class="sk-rotating-plane"></div>
    </div>
  </div>
  <!-- /page loading spinner -->
  <div class="app signin usersession">
    <div class="session-wrapper">
      <div class="page-height-o row-equal align-middle">
        <div class="column">
          <div class="card bg-white no-border">
            <div class="card-block">
              <form role="form" id="form-login" class="form-layout" action="" method="post">
                <div class="text-center m-b">
                  <h4 class="text-uppercase">EYHE :: SUPORTE EMOCIONAL</h4>
                  <center><p>Painel de Gerenciamento</p></center>
                </div>
                <div class="form-inputs">
                  <label>Nome do Usuário</label>
                  <input type="text" name="user" class="form-control input-lg" required>
                  <label >Senha</label>
                  <input type="password" class="form-control input-lg" name="pass" required>
                </div>
                <button class="btn btn-primary btn-block btn-lg m-b" name="btn-logar" type="submit">Entrar</button>

                <?php
                    if(isset($_POST['btn-logar'])) {

                        //pega os dados do form
                        $user = $_POST['user'];
                        $pass = $_POST['pass'];

                        include("PHP/conecta.php");

                        //verifica se existe algum registro no BD
                        $pass = md5($pass); //criptografia

                            $cont = 0;

                            $consulta = $conexao->query("SELECT * FROM admin WHERE email ='$user' AND senha = '$pass'");
                            while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
                                $cont++;
                                $nome = $linha['username'];
                            }



                            if($cont == 0){
                              echo "<br/><center><p style='color: #f70d24;'><b>Erro ao fazer login, tente novamente.</b></p></center>";
                            }
                            else{
                              //login efetuado
                              
                              $_SESSION["logado"] = 1; //1->verdade
                              $_SESSION["nome"] = $nome; //1->verdade                            
                              $_SESSION["nome-da-sessao"] =  md5('seg'.$_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT']);

                              //print_r($_SESSION);

                              $yourURL="painel.php";
                              echo ("<script>location.href='$yourURL'</script>");
                              
                            }
                    }
                ?>
                
              </form>
            </div>
            
          </div>
        </div>
      </div>
    </div>
    <!-- bottom footer -->
    <footer class="session-footer">
      
    </footer>
    <!-- /bottom footer -->
    
  </div>
  <!-- build:js({.tmp,app}) scripts/app.min.js -->
  <script src="scripts/helpers/modernizr.js"></script>
  <script src="vendor/jquery/dist/jquery.js"></script>
  <script src="vendor/bootstrap/dist/js/bootstrap.js"></script>
  <script src="vendor/fastclick/lib/fastclick.js"></script>
  <script src="vendor/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
  <script src="scripts/helpers/smartresize.js"></script>
  <script src="scripts/constants.js"></script>
  <script src="scripts/main.js"></script>
  <!-- endbuild -->
</body>

</html>