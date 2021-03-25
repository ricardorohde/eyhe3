<?php

  include "scripts_g/PHP/verifica_sessao.php";

  $myID = $_GET['myid'];
  $myID = "h_".$myID;
  $idother = $_GET['idanjo'];
  $idanjo = "a_".$idother;
  $sessao = $_GET['room'];
  $tabela =  $_GET['where'];

  #pausa para gerar novo token para essa sessão!
  include ('tokbox_server/gera_token.php');


  #pegando algumas informações do anjo!
  include ('painel/engine/conecta.php');
  $consulta = $conexao->prepare("SELECT * FROM anjos WHERE id = :idother ");
  $consulta->bindParam(':idother', $idother, PDO::PARAM_INT);
	$consulta->execute();
  while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
    $nomeanjo = $linha['nome'];
    $avatar = $linha['avatar'];
    $telefone = $linha['telefone'];
  }

?>

<html>
    <head>
        <title>EYHE :: Conversando com: <?php echo $nomeanjo; ?></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/uikit.min.css" />
        <link rel="shortcut icon" href="favicon/pp_EYHE_favicon_180px.png" />

        <link rel="stylesheet" href="css/style_teste.css" />
        <script src="js/uikit.min.js"></script>
        <script src="js/uikit-icons.min.js"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous"/>

        <!-- tokbox lib -->
        <script src="js/opentok.min.js"></script>
        <!-- Polyfill for fetch API so that we can fetch the sessionId and token in IE11 -->
        <script src="https://cdn.jsdelivr.net/npm/promise-polyfill@7/dist/polyfill.min.js" charset="utf-8"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fetch/2.0.3/fetch.min.js" charset="utf-8"></script>

        <link rel="manifest" href="manifest.json" />



        <style>
        #history .mine {

          background-color: #dddddd;
          color: #606060;
          width: 55%;
          margin-left: 45%;
          padding: 10px;
          border-radius: 10px;
        }
        #history .theirs {


          background-color: #f8f8f8;
          color: #606060;
          width: 55%;
          padding: 10px;
          border-radius: 10px;
        }
          .datahora{
            font-size: 12px;
          }

        </style>


    </head>
    <body>


        <!-- CHAT -->

        <div class="uk-modal-page" style="margin-top: 20px;">
                    <div class="uk-modal-header">
            	<h2 class="voltar_dashboard"><a uk-icon="icon:arrow-left" class="icone_chat" href="dashboard.php"></a><a href="dashboard.php">Voltar</a></h2>
                <img src="painel/<?php echo $avatar; ?>" alt="woman_1" style="float: left; margin-left: 3%;">
                <div class="engloba_nome_anjo">
	                <h2 class="voltar_dashboard"><?php echo $nomeanjo; ?></h2>
	                <a href="perfil_anjo.php?q=<?php echo $idother; ?>">Ver perfil</a>
	            </div>
	            <div class="engloba_camera">
		            <a class="video" uk-icon="icon:video-camera;ratio: 1.5" class="icone_chat" href="#"></a>
		            <a class="video">Vídeo</a>
		        </div>
            </div>

            <div class="uk-modal-body body_chat" uk-overflow-auto id="janela">
            	<div class="texto_chat" id="history">
	            </div>

            </div>

            <div class="uk-modal-footer">
            	<div class="escrever_chat">
                <form id="form-chat" autocomplete="off">
	                <input type="text" id="msgTxt" name="msgTxt" autocomplete="off" class="uk-input input_chat" placeholder="Escreve sua mensagem..." required/>
                  <input id="myID" name="myID" type="hidden" value="<?php echo $myID; ?>"/>
                  <input id="tabela" name="tabela" type="hidden" value="<?php echo $tabela; ?>"/>
                  <input id="idanjo" name="idanjo" type="hidden" value="<?php echo $idanjo; ?>"/>
                  <input id="telefone" name="telefone" type="hidden" value="<?php echo $telefone; ?>"/>

	                <!--<a uk-icon="icon:happy" class="icone_chat"></a>
	                <div uk-form-custom>
	                    <input type="file">
	                    <a uk-icon="icon:image" class="icone_chat"></a>
	                </div>-->

                  <button class="fas fa-paper-plane fa-lg botao_aviao uk-hidden@s" type="submit"></button>
                  <button class="uk-button uk-button-primary botao uk-visible@s" type="submit" id="enviou">Enviar</button>
                </form>
	            </div>
            </div>
        </div>

        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>

        <!-- antes de carregar o chat do tokbox vou carregar as conversas antigas.. -->
        <script>
        $(document).ready(function(){

          $('#history').empty(); //Limpando a div
          //$('#history').append('<p class="theirs"><a target="_blank" ref="https://www.eyhe.com.br/blog.php">www.eyhe.com.br/blog</a></p>');
          $.ajax({
            type:'post',		//Definimos o método HTTP usado
            dataType: 'json',	//Definimos o tipo de retorno
            data: {"nome_tabela": '<?php echo $tabela; ?>',
                   "meuID": '<?php echo $myID; ?>'},
            url: 'painel/engine/retorna_historico_chat.php',//Definindo o arquivo onde serão buscados os dados
            success: function(dados){
              for(var i=0;dados.length>i;i++){
                //Adicionando registros retornados na div
                if(dados[i].remetente == '<?php echo $myID; ?>'){
                  $('#history').append('<p class="mine">'+dados[i].texto+'</p>');
                }else{
                    $('#history').append('<p class="theirs">'+dados[i].texto+'</p>');
                }
              }
              var chatHistory = document.getElementById("janela");
   			      chatHistory.scrollTop = chatHistory.scrollHeight;
            }
          });
        });
        </script>


        <script>

        var SAMPLE_SERVER_BASE_URL = '';
        var API_KEY = '46211362';
        var SESSION_ID = '<?php echo $sessao; ?>';
        var TOKEN = '<?php echo $token; ?>';

        //alert(SESSION_ID);
        //alert(TOKEN);

        </script>
        <script type="text/javascript" src="tokbox/js/app.js"></script>


        <!-- one signal lib -->
        <script>
          function salva_push_id(id){
            //vou fazer um post no banco de dados com o id do heroi + id da notificação!
            if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
              //alert('Dispositivo Movel');
              var disp = 'movel';
            }else{
              //alert('Não é dispositivo movel');
              var disp = 'desktop';
            }
            //alert(id);
            $.ajax({
              type:'post',		//Definimos o método HTTP usado
              dataType: 'html',	//Definimos o tipo de retorno
              data: {"idHeroi": '<?php echo $_GET['myid']; ?>',
                     "idOneSignal": id,
                     "Dispositivo": disp},
              url: 'painel/engine/salva_push_user_id.php', //Definindo o arquivo onde serão buscados os dados
              success: function(retorno){
                //alert(retorno);
              }
            });
          }
        </script>
        <link rel="manifest" href="manifest.json" />
        <script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
        <script src="js/onesignal.js"></script>


        <script>
        $( ".video" ).click(function() {
          alert("Olá, estamos trabalhando para logo disponibilizar conversas por vídeo! ");
          $.ajax({
            type:'post',		//Definimos o método HTTP usado
            dataType: 'html',	//Definimos o tipo de retorno
            data: {},
            url: 'painel/engine/conta_click_video.php', //Definindo o arquivo onde serão buscados os dados
            success: function(retorno){
              //alert(retorno);
            }
          });
        });
        </script>




    </body>
</html>
