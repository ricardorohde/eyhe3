<!DOCTYPE html>
<html>

<head>
    <title>SALA DE VÍDEO EYHE</title>
    <link href="css/app.css" rel="stylesheet" type="text/css">

    <script src="https://static.opentok.com/v2/js/opentok.min.js"></script>

    <!-- Polyfill for fetch API so that we can fetch the sessionId and token in IE11 -->
    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill@7/dist/polyfill.min.js" charset="utf-8"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fetch/2.0.3/fetch.min.js" charset="utf-8"></script>

    <style>
        @media screen and (max-width: 500px) {
          .logo{
            width: 100px;
            height: 70px;
            margin-left: -20px;
            margin-top: 10px;
          }
          .img_anjos{
            display: none;
          }
          h3{
            font-size: 14px;
          }
        }
    </style>



</head>

<body>

    <div id="videos">
        <div id="subscriber">
            <center>

                <h3>
                  <b>SALA DE VÍDEO EYHE</b>
                  <br/><br/>
                      Você está sozinho na sala de vídeo. Por favor, aguarde mais um pouco!
                  <br/>
                  Caso demore, converse no chat para relembrar da chamada de vídeo. 
                </h3>
            </center>
        </div>
        <div id="publisher"></div>
    </div>

    <script>
        var apiKey = '<?php echo $_GET['apiKey']; ?>';
        var sessionId = '<?php echo $_GET['sessionId']; ?>';
        var token = '<?php echo $_GET['token']; ?>';
    </script>

    <script type="text/javascript" src="js/app.js"></script>
</body>

</html>
