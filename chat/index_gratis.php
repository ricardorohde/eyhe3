<?php

  include "scripts_g/PHP/verifica_sessao.php";

  $myID = $_GET['myid'];
  $myID = "h_".$myID;
  $idother = $_GET['idanjo'];
  $idanjo = "a_".$idother;
  $sessao = $_GET['room'];
  $tabela =  $_GET['where'];

  #pausa para gerar novo token para essa sessão!
  include ('../tokbox_server/gera_token.php');

  #pegando algumas informações do anjo!
  include ('../painel/engine/conecta.php');
  $consulta = $conexao->prepare("SELECT * FROM anjos WHERE id = :idother ");
  $consulta->bindParam(':idother', $idother, PDO::PARAM_INT);
  $consulta->execute();
  while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
    $nomeanjo = $linha['nome'];
    $avataranjo = $linha['avatar'];
    $biografia = $linha['biografia'];
    $telefone = $linha['telefone'];
    $vistoporultimo = $linha['ultimologin'];
    $premium = $linha['premium'];
    $valor = $linha['valor'];
    $desafio1 = $linha['desafio1'];
    $desafio2 = $linha['desafio2'];
    $desafio3 = $linha['desafio3'];
    $interesse1 = $linha['interesse1'];
    $interesse2 = $linha['interesse2'];
    $interesse3 = $linha['interesse3'];
    $status = $linha['online'];

  }

  $consulta = $conexao->prepare("SELECT nome,avatar,id FROM tab_usuario WHERE id = :idheroi LIMIT 1");
  $consulta->bindParam(':idheroi', $_GET['myid'], PDO::PARAM_INT);
  $consulta->execute();
  while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
    $avatarheroi = $linha['avatar'];
  }


    /*date_default_timezone_set('America/Sao_Paulo');
    $datanow = date('Y-m-d H:i:s');

    $data1 = new DateTime($datanow);
    $data2 = new DateTime($vistoporultimo);

    $intervalo = $data1->diff($data2);

    if (($intervalo->y == 0) && ($intervalo->m == 0) && ($intervalo->d == 0) && ($intervalo->h == 0) && ($intervalo->i >= 0) && ($intervalo->i < 10)) {
      $status = "online";
    }
    else if (($intervalo->y == 0) && ($intervalo->m == 0) && ($intervalo->d == 0) && ($intervalo->h == 0) && ($intervalo->i >= 10) && ($intervalo->i < 30)) {
      $status = "ausente";
    }else{
      $status = "offiline";
    }*/


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Em atendimento com: <?php echo $nomeanjo; ?> :: EYHE</title>

    <!-- Favicon -->
    <link rel="icon" href="./dist/media/img/favicon.png" type="image/png">

    <!-- Bundle Styles -->
    <link rel="stylesheet" href="./vendor/bundle.css">

    <link rel="stylesheet" href="./vendor/enjoyhint/enjoyhint.css">

    <!-- App styles -->
    <link rel="stylesheet" href="./dist/css/app.css">

    <!-- toadst notification -->
    <link href="core/toastr.min.css" rel="stylesheet">

    <!-- animate -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">

    <!-- tokbox lib -->
    <script src="../js/opentok.min.js"></script>

    <style>
        .btn_pagamento{
            display: none;
        }

        .alert{
            width: 94%;
            margin: 0 auto;
            margin-bottom: 15px;
        }

        .duvida{
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background-color: #2e2e2e;
            padding: 2px 5px 2px 5px;
            color: #fff!important;
            font-size: 9px;
        }
    </style>
    
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-TV5ZRLC');</script>
<!-- End Google Tag Manager -->


        <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TV5ZRLC"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <!-- End Google Tag Manager (noscript) —>


</script>
<!-- End Google Tag Manager -->


    
    <!-- Hotjar Tracking Code for https://www.eyhe.com.br -->
    <script>
        (function(h,o,t,j,a,r){
            h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
            h._hjSettings={hjid:1417750,hjsv:6};
            a=o.getElementsByTagName('head')[0];
            r=o.createElement('script');r.async=1;
            r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
            a.appendChild(r);
        })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
    </script>
    <!-- Facebook Pixel Code -->
    <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};
        if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
        n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t,s)}(window,document,'script',
        'https://connect.facebook.net/en_US/fbevents.js');
         fbq('init', '1262047540602680'); 
        fbq('track', 'PageView');
        </script>
        <noscript>
         <img height="1" width="1" 
        src="https://www.facebook.com/tr?id=1262047540602680&ev=PageView
        &noscript=1"/>
    </noscript>
    <!-- End Facebook Pixel Code -->
</head>
<body>

<!-- page loading -->
<div class="page-loading"></div>
<!-- ./ page loading -->

<!-- page tour modal -->
<div class="modal fade" id="pageTour" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-zoom" role="document">
        <div class="modal-content">
            <div class="modal-body text-center pt-5">
                <div class="row">
                    <div class="col-md-6 offset-3">
                        <figure>
                            <img src="dist/media/svg/undraw_product_tour_foyt.svg" class="img-fluid" alt="image">
                        </figure>
                        <p class="lead mt-5">Would you like to take a short page tour?</p>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-primary start-tour">Start Tour</button>
                <button type="button" class="btn" data-dismiss="modal" aria-label="Close">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- ./ page tour modal -->

<!-- disconnected modal -->
<div class="modal fade" id="disconnected" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-zoom" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row mb-5">
                    <div class="col-md-6 offset-3 col-sm-12">
                        <center><img src="https://image.freepik.com/vetores-gratis/ilustracao-de-melhoria-de-crescimento-de-negocios_33099-704.jpg" class="img-fluid" alt="image"></center>
                    </div>
                </div>
                <p class="lead text-center"><b>Obrigado por deixar sua avaliação 💙 </b></p>

                <p><center> Sua conversa é sigilosa, lembra? Por isso a avaliação é tão importante! É a maneira do Eyhe verificar e garantir um atendimento adequado. Nosso muito obrigado. </center></p>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-primary" data-dismiss="modal" aria-label="Close">Fechar</button>
            </div>
        </div>
    </div>
</div>
<!-- ./ disconnected modal -->

<!-- voice call modal -->
<div class="modal call fade" id="call" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-zoom" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="call">
                    <div>
                        <figure class="mb-4 avatar avatar-xl">
                            <img src="http://via.placeholder.com/128X128" class="rounded-circle" alt="image">
                        </figure>
                        <h4>Brietta Blogg <span class="text-success">calling...</span></h4>
                        <div class="action-button">
                            <button type="button" class="btn btn-danger btn-floating btn-lg" data-dismiss="modal">
                                <i data-feather="x"></i>
                            </button>
                            <button type="button" class="btn btn-success btn-pulse btn-floating btn-lg">
                                <i data-feather="phone"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ./ voice call modal -->

<!-- voice call modal -->
<div class="modal call fade" id="videoCall" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-zoom" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="call">
                    <div>
                        <figure class="mb-4 avatar avatar-xl">
                            <img src="http://via.placeholder.com/128X128" class="rounded-circle" alt="image">
                        </figure>
                        <h4>Brietta Blogg <span class="text-success">video calling...</span></h4>
                        <div class="action-button">
                            <button type="button" class="btn btn-danger btn-floating btn-lg" data-dismiss="modal">
                                <i data-feather="x"></i>
                            </button>
                            <button type="button" class="btn btn-success btn-pulse btn-floating btn-lg">
                                <i data-feather="video"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ./ voice call modal -->

<!-- modal  duvidas sobre codigo de segurança-->
<div class="modal fade" id="duvidas-cvv" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-zoom" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i data-feather="user-plus" class="mr-2"></i> Não sabe o que é CVV ?
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="ti-close"></i>
                </button>
            </div>
            <div class="modal-body">
              <p> CVV é o código de segurança do seu cartão, ele tem 3 dígitos e você encontra no verso do seu cartão.</p>
              <center>
                <img src="https://images-na.ssl-images-amazon.com/images/G/01/support_images/GUID-D7DC4034-736C-4A3D-9B05-5E22AABDB88F_pt-BR.jpg" /></center>
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>
<!-- ./ fim do modal -->

<!-- modal  duvidas sobre codigo de segurança-->
<div class="modal fade" id="duvidas-mm" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-zoom" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i data-feather="user-plus" class="mr-2"></i> MM/AA
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="ti-close"></i>
                </button>
            </div>
            <div class="modal-body">
              <p> É a data de vencimento do seu cartão e você encontra na parte da frente do seu cartão</p>
              <center>
                <img src="https://cartaodecredito.net.br/wp-content/uploads/2017/09/nemero-e-data-de-vencimento.png" /></center>
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>
<!-- ./ fim do modal -->

<!-- new group modal -->
<div class="modal fade" id="newGroup" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-zoom" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i data-feather="users" class="mr-2"></i> New Group
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="ti-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="group_name" class="col-form-label">Group name</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="group_name">
                            <div class="input-group-append">
                                <button class="btn btn-light" data-toggle="tooltip" title="Emoji" type="button">
                                    <i data-feather="smile"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <p class="mb-2">The group members</p>
                    <div class="form-group">
                        <div class="avatar-group">
                            <figure class="avatar" data-toggle="tooltip" title="Tobit Spraging">
                                <span class="avatar-title bg-success rounded-circle">T</span>
                            </figure>
                            <figure class="avatar" data-toggle="tooltip" title="Cloe Jeayes">
                                <img src="http://via.placeholder.com/128X128" class="rounded-circle" alt="image">
                            </figure>
                            <figure class="avatar" data-toggle="tooltip" title="Marlee Perazzo">
                                <span class="avatar-title bg-warning rounded-circle">M</span>
                            </figure>
                            <figure class="avatar" data-toggle="tooltip" title="Stafford Pioch">
                                <img src="http://via.placeholder.com/128X128" class="rounded-circle" alt="image">
                            </figure>
                            <figure class="avatar" data-toggle="tooltip" title="Bethena Langsdon">
                                <span class="avatar-title bg-info rounded-circle">B</span>
                            </figure>
                            <a href="#" title="Add friends">
                                <figure class="avatar">
                                    <span class="avatar-title bg-primary rounded-circle">
                                        <i data-feather="plus"></i>
                                    </span>
                                </figure>
                            </a>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description" class="col-form-label">Description</label>
                        <textarea class="form-control" id="description"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Create Group</button>
            </div>
        </div>
    </div>
</div>
<!-- ./ new group modal -->

<!-- setting modal -->
<div class="modal fade" id="settingModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-zoom" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i data-feather="settings" class="mr-2"></i> Settings
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="ti-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#account" role="tab" aria-controls="account"
                           aria-selected="true">Account</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#notification" role="tab"
                           aria-controls="notification" aria-selected="false">Notification</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#contact" role="tab" aria-controls="contact"
                           aria-selected="false">Security</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane show active" id="account" role="tabpanel">
                        <div class="form-item custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" checked id="customSwitch1">
                            <label class="custom-control-label" for="customSwitch1">Allow connected contacts</label>
                        </div>
                        <div class="form-item custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" checked id="customSwitch2">
                            <label class="custom-control-label" for="customSwitch2">Confirm message requests</label>
                        </div>
                        <div class="form-item custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" checked id="customSwitch3">
                            <label class="custom-control-label" for="customSwitch3">Profile privacy</label>
                        </div>
                        <div class="form-item custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="customSwitch4">
                            <label class="custom-control-label" for="customSwitch4">Developer mode options</label>
                        </div>
                        <div class="form-item custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" checked id="customSwitch5">
                            <label class="custom-control-label" for="customSwitch5">Two-step security
                                verification</label>
                        </div>
                    </div>
                    <div class="tab-pane" id="notification" role="tabpanel">
                        <div class="form-item custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" checked id="customSwitch6">
                            <label class="custom-control-label" for="customSwitch6">Allow mobile notifications</label>
                        </div>
                        <div class="form-item custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="customSwitch7">
                            <label class="custom-control-label" for="customSwitch7">Notifications from your
                                friends</label>
                        </div>
                        <div class="form-item custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="customSwitch8">
                            <label class="custom-control-label" for="customSwitch8">Send notifications by email</label>
                        </div>
                    </div>
                    <div class="tab-pane" id="contact" role="tabpanel">
                        <div class="form-item custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="customSwitch9">
                            <label class="custom-control-label" for="customSwitch9">Suggest changing passwords every
                                month.</label>
                        </div>
                        <div class="form-item custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" checked id="customSwitch10">
                            <label class="custom-control-label" for="customSwitch10">Let me know about suspicious
                                entries to your account</label>
                        </div>
                        <div class="form-item">
                            <p>
                                <a class="btn btn-light" data-toggle="collapse" href="#collapseExample" role="button"
                                   aria-expanded="false"
                                   aria-controls="collapseExample">
                                    <i data-feather="plus" class="mr-2"></i> Security Questions
                                </a>
                            </p>
                            <div class="collapse" id="collapseExample">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Question 1">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Answer 1">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Question 2">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Answer 2">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>
<!-- ./ setting modal -->

<!-- edit profile modal -->
<div class="modal fade" id="editProfileModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-zoom" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i data-feather="edit-2" class="mr-2"></i> Edit Profile
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="ti-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#personal" role="tab"
                           aria-controls="personal" aria-selected="true">Personal</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#about" role="tab" aria-controls="about"
                           aria-selected="false">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#social-links" role="tab"
                           aria-controls="social-links" aria-selected="false">Social Links</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane show active" id="personal" role="tabpanel">
                        <form>
                            <div class="form-group">
                                <label for="fullname" class="col-form-label">Fullname</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="fullname">
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i data-feather="user"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Avatar</label>
                                <div class="d-flex align-items-center">
                                    <div>
                                        <figure class="avatar mr-3 item-rtl">
                                            <img src="http://via.placeholder.com/128X128" class="rounded-circle"
                                                 alt="image">
                                        </figure>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="customFile">
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="city" class="col-form-label">City</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="city" placeholder="Ex: Columbia">
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i data-feather="target"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="phone" class="col-form-label">Phone</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="phone" placeholder="(555) 555 55 55">
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i data-feather="phone"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="website" class="col-form-label">Website</label>
                                <input type="text" class="form-control" id="website" placeholder="https://">
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane" id="about" role="tabpanel">
                        <form>
                            <div class="form-group">
                                <label for="about-text" class="col-form-label">Write a few words that describe
                                    you</label>
                                <textarea class="form-control" id="about-text"></textarea>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" checked id="customCheck1">
                                <label class="custom-control-label" for="customCheck1">View profile</label>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane" id="social-links" role="tabpanel">
                        <form>
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Username">
                                    <div class="input-group-append">
                                        <span class="input-group-text bg-facebook">
                                            <i class="ti-facebook"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Username">
                                    <div class="input-group-append">
                                        <span class="input-group-text bg-twitter">
                                            <i class="ti-twitter"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Username">
                                    <div class="input-group-append">
                                        <span class="input-group-text bg-instagram">
                                            <i class="ti-instagram"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Username">
                                    <div class="input-group-append">
                                        <span class="input-group-text bg-linkedin">
                                            <i class="ti-linkedin"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Username">
                                    <div class="input-group-append">
                                        <span class="input-group-text bg-dribbble">
                                            <i class="ti-dribbble"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Username">
                                    <div class="input-group-append">
                                        <span class="input-group-text bg-youtube">
                                            <i class="ti-youtube"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Username">
                                    <div class="input-group-append">
                                        <span class="input-group-text bg-google">
                                            <i class="ti-google"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Username">
                                    <div class="input-group-append">
                                        <span class="input-group-text bg-whatsapp">
                                            <i class="fa fa-whatsapp"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>
<!-- ./ edit profile modal -->

<!-- layout -->
<div class="layout">

    <!-- navigation -->
    <nav class="navigation">
        <div class="nav-group">
            <ul>
                <li class="logo">
                    <a href="../dashboard.php">
                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                             xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                             width="612px" height="612px" viewBox="0 0 612 612"
                             style="enable-background:new 0 0 612 612;" xml:space="preserve">
                            <g>
                                <g id="_x32__26_">
                                    <g>
                                    <path d="M401.625,325.125h-191.25c-10.557,0-19.125,8.568-19.125,19.125s8.568,19.125,19.125,19.125h191.25
                                    c10.557,0,19.125-8.568,19.125-19.125S412.182,325.125,401.625,325.125z M439.875,210.375h-267.75
                                    c-10.557,0-19.125,8.568-19.125,19.125s8.568,19.125,19.125,19.125h267.75c10.557,0,19.125-8.568,19.125-19.125
                                    S450.432,210.375,439.875,210.375z M306,0C137.012,0,0,119.875,0,267.75c0,84.514,44.848,159.751,114.75,208.826V612
                                    l134.047-81.339c18.552,3.061,37.638,4.839,57.203,4.839c169.008,0,306-119.875,306-267.75C612,119.875,475.008,0,306,0z
                                    M306,497.25c-22.338,0-43.911-2.601-64.643-7.019l-90.041,54.123l1.205-88.701C83.5,414.133,38.25,345.513,38.25,267.75
                                    c0-126.741,119.875-229.5,267.75-229.5c147.875,0,267.75,102.759,267.75,229.5S453.875,497.25,306,497.25z"/>
                                    </g>
                                </g>
                            </g>
                            <g></g>
                            <g></g>
                            <g></g>
                            <g></g>
                            <g></g>
                            <g></g>
                            <g></g>
                            <g></g>
                            <g></g>
                            <g></g>
                            <g></g>
                            <g></g>
                            <g></g>
                            <g></g>
                            <g></g>
                        </svg>
                    </a>
                </li>
                <li>
                    <a href="../ultimas_conversas.php" data-toggle="tooltip" title="Ir para últimas conversas"
                       data-placement="right">
                        <span class="badge badge-warning"></span>
                        <i data-feather="message-circle"></i>
                    </a>
                </li>
                <li>
                    <a  href="../dashboard.php" data-toggle="tooltip"
                       title="Buscar outro Anjo" data-placement="right">
                        <span class="badge badge-danger"></span>
                        <i data-feather="user"></i>
                    </a>
                </li>
                
                <li class="brackets">
                    <a  href="../blog.php" target="_blank" data-toggle="tooltip"
                       title="Visite nosso Blog" data-placement="right">
                        <i data-feather="archive"></i>
                    </a>
                </li>
                <li>
                    <a href="#" class="dark-light-switcher" data-toggle="tooltip" title="Modo Escuro"
                       data-placement="right">
                        <i data-feather="moon"></i>
                    </a>
                </li>
                <!--<li data-toggle="tooltip" title="User menu" data-placement="right">
                    <a href="./login.html" data-toggle="dropdown">
                        <figure class="avatar">
                            <img src="http://via.placeholder.com/128X128" class="rounded-circle" alt="image">
                        </figure>
                    </a>
                    <div class="dropdown-menu">
                        <a href="#" class="dropdown-item" data-toggle="modal" data-target="#editProfileModal">Edit
                            profile</a>
                        <a href="#" class="dropdown-item" data-navigation-target="contact-information">Profile</a>
                        <a href="#" class="dropdown-item" data-toggle="modal" data-target="#settingModal">Settings</a>
                        <div class="dropdown-divider"></div>
                        <a href="login.html" class="dropdown-item text-danger">Logout</a>
                    </div>
                </li>-->
            </ul>
        </div>
    </nav>
    <!-- ./ navigation -->

    <!-- content -->
    <div class="content">

        <!-- sidebar group -->
        <div class="sidebar-group">

            <!-- Chats sidebar -->
            <div id="chats" class="sidebar">
                <header>
                    <span>EYHE</span>
                    <ul class="list-inline">
                        <li class="list-inline-item" data-toggle="tooltip" title="New group">
                            <a class="btn btn-outline-light" href="#" data-toggle="modal" data-target="#newGroup">
                                <i data-feather="users"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a class="btn btn-outline-light" data-toggle="tooltip" title="New chat" href="#"
                               data-navigation-target="friends">
                                <i data-feather="plus-circle"></i>
                            </a>
                        </li>
                        <li class="list-inline-item d-xl-none d-inline">
                            <a href="#" class="btn btn-outline-light text-danger sidebar-close">
                                <i data-feather="x"></i>
                            </a>
                        </li>
                    </ul>
                </header>
                <form>
                    <input type="text" class="form-control" placeholder="Search chats">
                </form>
                <div class="sidebar-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <figure class="avatar avatar-state-success">
                                <img src="http://via.placeholder.com/128X128" class="rounded-circle" alt="image">
                            </figure>
                            <div class="users-list-body">
                                <div>
                                    <h5 class="text-primary">Townsend Seary</h5>
                                    <p>What's up, how are you?</p>
                                </div>
                                <div class="users-list-action">
                                    <div class="new-message-count">3</div>
                                    <small class="text-primary">03:41 PM</small>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <figure class="avatar avatar-state-warning">
                                <img src="http://via.placeholder.com/128X128" class="rounded-circle" alt="image">
                            </figure>
                            <div class="users-list-body">
                                <div>
                                    <h5 class="text-primary">Forest Kroch</h5>
                                    <p>
                                        <i class="fa fa-camera mr-1"></i> Photo
                                    </p>
                                </div>
                                <div class="users-list-action">
                                    <div class="new-message-count">1</div>
                                    <small class="text-primary">Yesterday</small>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item open-chat">
                            <div>
                                <figure class="avatar">
                                    <img src="http://via.placeholder.com/128X128" class="rounded-circle" alt="image">
                                </figure>
                            </div>
                            <div class="users-list-body">
                                <div>
                                    <h5>Byrom Guittet</h5>
                                    <p>I sent you all the files. Good luck with 😃</p>
                                </div>
                                <div class="users-list-action">
                                    <small class="text-muted">11:05 AM</small>
                                    <div class="action-toggle">
                                        <div class="dropdown">
                                            <a data-toggle="dropdown" href="#">
                                                <i data-feather="more-horizontal"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="#" class="dropdown-item">Open</a>
                                                <a href="#" data-navigation-target="contact-information"
                                                   class="dropdown-item">Profile</a>
                                                <a href="#" class="dropdown-item">Add to archive</a>
                                                <div class="dropdown-divider"></div>
                                                <a href="#" class="dropdown-item text-danger">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div>
                                <figure class="avatar">
                                    <img src="http://via.placeholder.com/128X128" class="rounded-circle" alt="image">
                                </figure>
                            </div>
                            <div class="users-list-body">
                                <div>
                                    <h5>Margaretta Worvell</h5>
                                    <p>I need you today. Can you come with me?</p>
                                </div>
                                <div class="users-list-action">
                                    <small class="text-muted">03:41 PM</small>
                                    <div class="action-toggle">
                                        <div class="dropdown">
                                            <a data-toggle="dropdown" href="#">
                                                <i data-feather="more-horizontal"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="#" class="dropdown-item">Open</a>
                                                <a href="#" data-navigation-target="contact-information"
                                                   class="dropdown-item">Profile</a>
                                                <a href="#" class="dropdown-item">Add to archive</a>
                                                <div class="dropdown-divider"></div>
                                                <a href="#" class="dropdown-item text-danger">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <figure class="avatar">
                                <span class="avatar-title bg-warning bg-success rounded-circle">
                                    <i class="fa fa-users"></i>
                                </span>
                            </figure>
                            <div class="users-list-body">
                                <div>
                                    <h5>😍 My Family 😍</h5>
                                    <p><strong>Maher Ruslandi: </strong>Hello!!!</p>
                                </div>
                                <div class="users-list-action">
                                    <small class="text-muted">Yesterday</small>
                                    <div class="action-toggle">
                                        <div class="dropdown">
                                            <a data-toggle="dropdown" href="#">
                                                <i data-feather="more-horizontal"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="#" class="dropdown-item">Open</a>
                                                <a href="#" data-navigation-target="contact-information"
                                                   class="dropdown-item">Profile</a>
                                                <a href="#" class="dropdown-item">Add to archive</a>
                                                <div class="dropdown-divider"></div>
                                                <a href="#" class="dropdown-item text-danger">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div>
                                <figure class="avatar avatar-state-warning">
                                    <img src="http://via.placeholder.com/128X128" class="rounded-circle" alt="image">
                                </figure>
                            </div>
                            <div class="users-list-body">
                                <div>
                                    <h5>Jennica Kindred</h5>
                                    <p>
                                        <i class="fa fa-video-camera mr-1"></i>
                                        Video
                                    </p>
                                </div>
                                <div class="users-list-action">
                                    <small class="text-muted">03:41 PM</small>
                                    <div class="action-toggle">
                                        <div class="dropdown">
                                            <a data-toggle="dropdown" href="#">
                                                <i data-feather="more-horizontal"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="#" class="dropdown-item">Open</a>
                                                <a href="#" data-navigation-target="contact-information"
                                                   class="dropdown-item">Profile</a>
                                                <a href="#" class="dropdown-item">Add to archive</a>
                                                <div class="dropdown-divider"></div>
                                                <a href="#" class="dropdown-item text-danger">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div>
                                <figure class="avatar">
                                    <span class="avatar-title bg-info rounded-circle">M</span>
                                </figure>
                            </div>
                            <div class="users-list-body">
                                <div>
                                    <h5>Marvin Rohan</h5>
                                    <p>Have you prepared the files?</p>
                                </div>
                                <div class="users-list-action">
                                    <small class="text-muted">Yesterday</small>
                                    <div class="action-toggle">
                                        <div class="dropdown">
                                            <a data-toggle="dropdown" href="#">
                                                <i data-feather="more-horizontal"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="#" class="dropdown-item">Open</a>
                                                <a href="#" data-navigation-target="contact-information"
                                                   class="dropdown-item">Profile</a>
                                                <a href="#" class="dropdown-item">Add to archive</a>
                                                <div class="dropdown-divider"></div>
                                                <a href="#" class="dropdown-item text-danger">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div>
                                <figure class="avatar">
                                    <img src="http://via.placeholder.com/128X128" class="rounded-circle" alt="image">
                                </figure>
                            </div>
                            <div class="users-list-body">
                                <div>
                                    <h5>Townsend Seary</h5>
                                    <p>Where are you?</p>
                                </div>
                                <div class="users-list-action">
                                    <small class="text-muted">03:41 PM</small>
                                    <div class="action-toggle">
                                        <div class="dropdown">
                                            <a data-toggle="dropdown" href="#">
                                                <i data-feather="more-horizontal"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="#" class="dropdown-item">Open</a>
                                                <a href="#" data-navigation-target="contact-information"
                                                   class="dropdown-item">Profile</a>
                                                <a href="#" class="dropdown-item">Add to archive</a>
                                                <div class="dropdown-divider"></div>
                                                <a href="#" class="dropdown-item text-danger">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div>
                                <figure class="avatar">
                                    <span class="avatar-title bg-secondary rounded-circle">G</span>
                                </figure>
                            </div>
                            <div class="users-list-body">
                                <div>
                                    <h5>Gibb Ivanchin</h5>
                                    <p>I want to visit them.</p>
                                </div>
                                <div class="users-list-action">
                                    <small class="text-muted">03:41 PM</small>
                                    <div class="action-toggle">
                                        <div class="dropdown">
                                            <a data-toggle="dropdown" href="#">
                                                <i data-feather="more-horizontal"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="#" class="dropdown-item">Open</a>
                                                <a href="#" data-navigation-target="contact-information"
                                                   class="dropdown-item">Profile</a>
                                                <a href="#" class="dropdown-item">Add to archive</a>
                                                <div class="dropdown-divider"></div>
                                                <a href="#" class="dropdown-item text-danger">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div>
                                <figure class="avatar">
                                    <img src="http://via.placeholder.com/128X128" class="rounded-circle" alt="image">
                                </figure>
                            </div>
                            <div class="users-list-body">
                                <div>
                                    <h5>Harald Kowalski</h5>
                                    <p>Reports are ready.</p>
                                </div>
                                <div class="users-list-action">
                                    <small class="text-muted">03:41 PM</small>
                                    <div class="action-toggle">
                                        <div class="dropdown">
                                            <a data-toggle="dropdown" href="#">
                                                <i data-feather="more-horizontal"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="#" class="dropdown-item">Open</a>
                                                <a href="#" data-navigation-target="contact-information"
                                                   class="dropdown-item">Profile</a>
                                                <a href="#" class="dropdown-item">Add to archive</a>
                                                <div class="dropdown-divider"></div>
                                                <a href="#" class="dropdown-item text-danger">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div>
                                <figure class="avatar">
                                    <span class="avatar-title bg-success rounded-circle">A</span>
                                </figure>
                            </div>
                            <div class="users-list-body">
                                <div>
                                    <h5>Afton McGilvra</h5>
                                    <p>I do not know where is it. Don't ask me, please.</p>
                                </div>
                                <div class="users-list-action">
                                    <small class="text-muted">03:41 PM</small>
                                    <div class="action-toggle">
                                        <div class="dropdown">
                                            <a data-toggle="dropdown" href="#">
                                                <i data-feather="more-horizontal"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="#" class="dropdown-item">Open</a>
                                                <a href="#" data-navigation-target="contact-information"
                                                   class="dropdown-item">Profile</a>
                                                <a href="#" class="dropdown-item">Add to archive</a>
                                                <div class="dropdown-divider"></div>
                                                <a href="#" class="dropdown-item text-danger">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div>
                                <figure class="avatar">
                                    <img src="http://via.placeholder.com/128X128" class="rounded-circle" alt="image">
                                </figure>
                            </div>
                            <div class="users-list-body">
                                <div>
                                    <h5>Alexandr Donnelly</h5>
                                    <p>Can anyone enter the meeting?</p>
                                </div>
                                <div class="users-list-action">
                                    <small class="text-muted">03:41 PM</small>
                                    <div class="action-toggle">
                                        <div class="dropdown">
                                            <a data-toggle="dropdown" href="#">
                                                <i data-feather="more-horizontal"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="#" class="dropdown-item">Open</a>
                                                <a href="#" data-navigation-target="contact-information"
                                                   class="dropdown-item">Profile</a>
                                                <a href="#" class="dropdown-item">Add to archive</a>
                                                <div class="dropdown-divider"></div>
                                                <a href="#" class="dropdown-item text-danger">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- ./ Chats sidebar -->

            <!-- Friends sidebar -->
            <div id="friends" class="sidebar">
                <header>
                    <span>Friends</span>
                    <ul class="list-inline">
                        <li class="list-inline-item" data-toggle="tooltip" title="Add friends">
                            <a class="btn btn-outline-light" href="#" data-toggle="modal" data-target="#addFriends">
                                <i data-feather="user-plus"></i>
                            </a>
                        </li>
                        <li class="list-inline-item d-xl-none d-inline">
                            <a href="#" class="btn btn-outline-light text-danger sidebar-close">
                                <i data-feather="x"></i>
                            </a>
                        </li>
                    </ul>
                </header>
                <form>
                    <input type="text" class="form-control" placeholder="Search friends">
                </form>
                <div class="sidebar-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item" data-navigation-target="chats">
                            <div>
                                <figure class="avatar">
                                    <img src="http://via.placeholder.com/128X128" class="rounded-circle" alt="image">
                                </figure>
                            </div>
                            <div class="users-list-body">
                                <div>
                                    <h5>Harrietta Souten</h5>
                                    <p>Dental Hygienist</p>
                                </div>
                                <div class="users-list-action">
                                    <div class="action-toggle">
                                        <div class="dropdown">
                                            <a data-toggle="dropdown" href="#">
                                                <i data-feather="more-horizontal"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="#" class="dropdown-item">New chat</a>
                                                <a href="#" data-navigation-target="contact-information"
                                                   class="dropdown-item">Profile</a>
                                                <div class="dropdown-divider"></div>
                                                <a href="#" class="dropdown-item text-danger">Block</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item" data-navigation-target="chats">
                            <div>
                                <figure class="avatar avatar-state-warning">
                                    <span class="avatar-title bg-success rounded-circle">A</span>
                                </figure>
                            </div>
                            <div class="users-list-body">
                                <div>
                                    <h5>Aline McShee</h5>
                                    <p>Marketing Assistant</p>
                                </div>
                                <div class="users-list-action">
                                    <div class="action-toggle">
                                        <div class="dropdown">
                                            <a data-toggle="dropdown" href="#">
                                                <i data-feather="more-horizontal"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="#" class="dropdown-item">New chat</a>
                                                <a href="#" data-navigation-target="contact-information"
                                                   class="dropdown-item">Profile</a>
                                                <div class="dropdown-divider"></div>
                                                <a href="#" class="dropdown-item text-danger">Block</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item" data-navigation-target="chats">
                            <div>
                                <figure class="avatar avatar-state-success">
                                    <img src="http://via.placeholder.com/128X128" class="rounded-circle" alt="image">
                                </figure>
                            </div>
                            <div class="users-list-body">
                                <div>
                                    <h5>Brietta Blogg</h5>
                                    <p>Actuary</p>
                                </div>
                                <div class="users-list-action">
                                    <div class="action-toggle">
                                        <div class="dropdown">
                                            <a data-toggle="dropdown" href="#">
                                                <i data-feather="more-horizontal"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="#" class="dropdown-item">New chat</a>
                                                <a href="#" data-navigation-target="contact-information"
                                                   class="dropdown-item">Profile</a>
                                                <div class="dropdown-divider"></div>
                                                <a href="#" class="dropdown-item text-danger">Block</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item" data-navigation-target="chats">
                            <div>
                                <figure class="avatar avatar-state-success">
                                    <img src="http://via.placeholder.com/128X128" class="rounded-circle" alt="image">
                                </figure>
                            </div>
                            <div class="users-list-body">
                                <div>
                                    <h5>Karl Hubane</h5>
                                    <p>Chemical Engineer</p>
                                </div>
                                <div class="users-list-action">
                                    <div class="action-toggle">
                                        <div class="dropdown">
                                            <a data-toggle="dropdown" href="#">
                                                <i data-feather="more-horizontal"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="#" class="dropdown-item">New chat</a>
                                                <a href="#" data-navigation-target="contact-information"
                                                   class="dropdown-item">Profile</a>
                                                <div class="dropdown-divider"></div>
                                                <a href="#" class="dropdown-item text-danger">Block</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item" data-navigation-target="chats">
                            <div>
                                <figure class="avatar">
                                    <img src="http://via.placeholder.com/128X128" class="rounded-circle" alt="image">
                                </figure>
                            </div>
                            <div class="users-list-body">
                                <div>
                                    <h5>Jillana Tows</h5>
                                    <p>Project Manager</p>
                                </div>
                                <div class="users-list-action">
                                    <div class="action-toggle">
                                        <div class="dropdown">
                                            <a data-toggle="dropdown" href="#">
                                                <i data-feather="more-horizontal"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="#" class="dropdown-item">New chat</a>
                                                <a href="#" data-navigation-target="contact-information"
                                                   class="dropdown-item">Profile</a>
                                                <div class="dropdown-divider"></div>
                                                <a href="#" class="dropdown-item text-danger">Block</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item" data-navigation-target="chats">
                            <div>
                                <figure class="avatar avatar-state-success">
                                    <span class="avatar-title bg-info rounded-circle">AD</span>
                                </figure>
                            </div>
                            <div class="users-list-body">
                                <div>
                                    <h5>Alina Derington</h5>
                                    <p>Nurse</p>
                                </div>
                                <div class="users-list-action">
                                    <div class="action-toggle">
                                        <div class="dropdown">
                                            <a data-toggle="dropdown" href="#">
                                                <i data-feather="more-horizontal"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="#" class="dropdown-item">New chat</a>
                                                <a href="#" data-navigation-target="contact-information"
                                                   class="dropdown-item">Profile</a>
                                                <div class="dropdown-divider"></div>
                                                <a href="#" class="dropdown-item text-danger">Block</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item" data-navigation-target="chats">
                            <div>
                                <figure class="avatar avatar-state-secondary">
                                    <span class="avatar-title bg-warning rounded-circle">S</span>
                                </figure>
                            </div>
                            <div class="users-list-body">
                                <div>
                                    <h5>Stevy Kermeen</h5>
                                    <p>Associate Professor</p>
                                </div>
                                <div class="users-list-action">
                                    <div class="action-toggle">
                                        <div class="dropdown">
                                            <a data-toggle="dropdown" href="#">
                                                <i data-feather="more-horizontal"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="#" class="dropdown-item">New chat</a>
                                                <a href="#" data-navigation-target="contact-information"
                                                   class="dropdown-item">Profile</a>
                                                <div class="dropdown-divider"></div>
                                                <a href="#" class="dropdown-item text-danger">Block</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item" data-navigation-target="chats">
                            <div>
                                <figure class="avatar">
                                    <img src="http://via.placeholder.com/128X128" class="rounded-circle" alt="image">
                                </figure>
                            </div>
                            <div class="users-list-body">
                                <div>
                                    <h5>Stevy Kermeen</h5>
                                    <p>Senior Quality Engineer</p>
                                </div>
                                <div class="users-list-action">
                                    <div class="action-toggle">
                                        <div class="dropdown">
                                            <a data-toggle="dropdown" href="#">
                                                <i data-feather="more-horizontal"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="#" class="dropdown-item">New chat</a>
                                                <a href="#" data-navigation-target="contact-information"
                                                   class="dropdown-item">Profile</a>
                                                <div class="dropdown-divider"></div>
                                                <a href="#" class="dropdown-item text-danger">Block</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item" data-navigation-target="chats">
                            <div>
                                <figure class="avatar">
                                    <img src="http://via.placeholder.com/128X128" class="rounded-circle" alt="image">
                                </figure>
                            </div>
                            <div class="users-list-body">
                                <div>
                                    <h5>Gloriane Shimmans</h5>
                                    <p>Web Designer</p>
                                </div>
                                <div class="users-list-action">
                                    <div class="action-toggle">
                                        <div class="dropdown">
                                            <a data-toggle="dropdown" href="#">
                                                <i data-feather="more-horizontal"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="#" class="dropdown-item">New chat</a>
                                                <a href="#" data-navigation-target="contact-information"
                                                   class="dropdown-item">Profile</a>
                                                <div class="dropdown-divider"></div>
                                                <a href="#" class="dropdown-item text-danger">Block</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item" data-navigation-target="chats">
                            <div>
                                <figure class="avatar avatar-state-warning">
                                    <span class="avatar-title bg-secondary rounded-circle">B</span>
                                </figure>
                            </div>
                            <div class="users-list-body">
                                <div>
                                    <h5>Bernhard Perrett</h5>
                                    <p>Software Engineer</p>
                                </div>
                                <div class="users-list-action">
                                    <div class="action-toggle">
                                        <div class="dropdown">
                                            <a data-toggle="dropdown" href="#">
                                                <i data-feather="more-horizontal"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="#" class="dropdown-item">New chat</a>
                                                <a href="#" data-navigation-target="contact-information"
                                                   class="dropdown-item">Profile</a>
                                                <div class="dropdown-divider"></div>
                                                <a href="#" class="dropdown-item text-danger">Block</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- ./ Friends sidebar -->

            <!-- Favorites sidebar -->
            <div id="favorites" class="sidebar">
                <header>
                    <span>Favorites</span>
                    <ul class="list-inline">
                        <li class="list-inline-item d-xl-none d-inline">
                            <a href="#" class="btn btn-outline-light text-danger sidebar-close">
                                <i data-feather="x"></i>
                            </a>
                        </li>
                    </ul>
                </header>
                <form>
                    <input type="text" class="form-control" placeholder="Search favorites">
                </form>
                <div class="sidebar-body">
                    <ul class="list-group list-group-flush users-list">
                        <li class="list-group-item">
                            <div class="users-list-body">
                                <div>
                                    <h5>Jennica Kindred</h5>
                                    <p>I know how important this file is to you. You can trust me ;)</p>
                                </div>
                                <div class="users-list-action">
                                    <div class="action-toggle">
                                        <div class="dropdown">
                                            <a data-toggle="dropdown" href="#">
                                                <i data-feather="more-horizontal"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="#" class="dropdown-item">Open</a>
                                                <a href="#" class="dropdown-item">Remove favorites</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="users-list-body">
                                <div>
                                    <h5>Marvin Rohan</h5>
                                    <p>Lorem ipsum dolor sitsdc sdcsdc sdcsdcs</p>
                                </div>
                                <div class="users-list-action">
                                    <div class="action-toggle">
                                        <div class="dropdown">
                                            <a data-toggle="dropdown" href="#">
                                                <i data-feather="more-horizontal"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="#" class="dropdown-item">Open</a>
                                                <a href="#" class="dropdown-item">Remove favorites</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="users-list-body">
                                <div>
                                    <h5>Frans Hanscombe</h5>
                                    <p>Lorem ipsum dolor sitsdc sdcsdc sdcsdcs</p>
                                </div>
                                <div class="users-list-action">
                                    <div class="action-toggle">
                                        <div class="dropdown">
                                            <a data-toggle="dropdown" href="#">
                                                <i data-feather="more-horizontal"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="#" class="dropdown-item">Open</a>
                                                <a href="#" class="dropdown-item">Remove favorites</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="users-list-body">
                                <div>
                                    <h5>Karl Hubane</h5>
                                    <p>Lorem ipsum dolor sitsdc sdcsdc sdcsdcs</p>
                                </div>
                                <div class="users-list-action">
                                    <div class="action-toggle">
                                        <div class="dropdown">
                                            <a data-toggle="dropdown" href="#">
                                                <i data-feather="more-horizontal"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="#" class="dropdown-item">Open</a>
                                                <a href="#" class="dropdown-item">Remove favorites</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- ./ Stars sidebar -->

            <!-- Archived sidebar -->
            <div id="archived" class="sidebar">
                <header>
                    <span>Archived</span>
                    <ul class="list-inline">
                        <li class="list-inline-item d-xl-none d-inline">
                            <a href="#" class="btn btn-outline-light text-danger sidebar-close">
                                <i data-feather="x"></i>
                            </a>
                        </li>
                    </ul>
                </header>
                <form>
                    <input type="text" class="form-control" placeholder="Search archived">
                </form>
                <div class="sidebar-body">
                    <ul class="list-group list-group-flush users-list">
                        <li class="list-group-item">
                            <figure class="avatar">
                                <span class="avatar-title bg-danger rounded-circle">M</span>
                            </figure>
                            <div class="users-list-body">
                                <div>
                                    <h5>Mercedes Pllu</h5>
                                    <p>I know how important this file is to you. You can trust me ;)</p>
                                </div>
                                <div class="users-list-action">
                                    <div class="action-toggle">
                                        <div class="dropdown">
                                            <a data-toggle="dropdown" href="#">
                                                <i data-feather="more-horizontal"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="#" class="dropdown-item">Open</a>
                                                <a href="#" class="dropdown-item">Restore</a>
                                                <div class="dropdown-divider"></div>
                                                <a href="#" class="dropdown-item text-danger">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <figure class="avatar">
                                <span class="avatar-title bg-secondary rounded-circle">R</span>
                            </figure>
                            <div class="users-list-body">
                                <div>
                                    <h5>Rochelle Golley</h5>
                                    <p>Lorem ipsum dolor sitsdc sdcsdc sdcsdcs</p>
                                </div>
                                <div class="users-list-action">
                                    <div class="action-toggle">
                                        <div class="dropdown">
                                            <a data-toggle="dropdown" href="#">
                                                <i data-feather="more-horizontal"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="#" class="dropdown-item">Open</a>
                                                <a href="#" class="dropdown-item">Restore</a>
                                                <div class="dropdown-divider"></div>
                                                <a href="#" class="dropdown-item text-danger">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- ./ Archived sidebar -->
        </div>
        <!-- ./ sidebar group -->

        <!-- chat -->
        <div class="chat">
            <div class="chat-header">
                <div class="chat-header-user">
                    <figure class="avatar">
                        <img src="../painel/<?php echo $avataranjo; ?>" class="rounded-circle" alt="image">
                    </figure>
                    <div>
                        <h5><?php echo $nomeanjo; ?></h5>
                        <?php


                            if($status == '1'){
                                echo "<small class='text-success'>
                                        <i>Disponível</i>
                                    </small>";
                            }else{
                                echo "<small class='text-danger'>
                                        <i>Indisponível</i>
                                    </small>";
                            }

                        ?>
                    </div>
                </div>
                <div class="chat-header-action">
                    <ul class="list-inline">
                        <li class="list-inline-item d-xl-none d-inline">
                            <a href="#" class="btn btn-outline-light mobile-navigation-button">
                                <i data-feather="menu"></i>
                            </a>
                        </li>

                        <!--<li class="list-inline-item" data-toggle="tooltip" title="Voice call">
                            <a href="#" class="btn btn-outline-light text-success" data-toggle="modal"
                               data-target="#call">
                                <i data-feather="phone"></i>
                            </a>
                        </li>
                        <li class="list-inline-item" data-toggle="tooltip" title="Video call">
                            <a href="#" class="btn btn-outline-light text-warning" data-toggle="modal"
                               data-target="#videoCall">
                                <i data-feather="video"></i>
                            </a>
                        </li>-->

                        <li class="list-inline-item animated infinite pulse slower btn_pagamento" data-toggle="tooltip" title="Clique aqui para retribuir ">
                            <a href="#" class="btn btn-primary " data-navigation-target="pagamento">
                                Efetue o pagamento
                            </a>
                        </li>

                        <!--<li class="list-inline-item" data-toggle="tooltip" title="Ver perfil do Anjo">
                            <a href="#" class="btn btn-outline-light " data-navigation-target="retribua">
                                R
                            </a>
                        </li>-->

                         <li class="list-inline-item" data-toggle="tooltip" title="Ver perfil do Anjo">
                            <a href="#" class="btn btn-outline-light " data-navigation-target="avalie">
                                Avaliar
                            </a>
                        </li>

                        <li class="list-inline-item" data-toggle="tooltip" title="Ver perfil do Anjo">
                            <a href="#" class="btn btn-outline-light " data-navigation-target="contact-information">
                                Ver Perfil
                            </a>
                        </li>



                    </ul>
                </div>
            </div>
            <div id="box" class="chat-body" style="overflow: auto; max-height: 1000px;"> <!-- .no-message -->
                <!--
                <div class="no-message-container">
                    <div class="row mb-5">
                        <div class="col-md-4 offset-4">
                            <img src="./dist/media/svg/undraw_empty_xct9.svg" class="img-fluid" alt="image">
                        </div>
                    </div>
                    <p class="lead">Select a chat to read messages</p>
                </div>
                -->
                <div class="messages" id="history">


                </div>

            </div>
            <div class="chat-footer">
                <form id="form-chat" method="post" action="">
                    <!--<div>
                        <button class="btn btn-light mr-3" data-toggle="tooltip" title="Emoji" type="button">
                            <i data-feather="smile"></i>
                        </button>
                    </div>-->

                    <input type="text" required id="msgTxt" name="msgTxt" autocomplete="off" class="form-control" placeholder="Digite aqui..">
                    <input id="myID" name="myID" type="hidden" value="<?php echo $myID; ?>"/>
                    <input id="tabela" name="tabela" type="hidden" value="<?php echo $tabela; ?>"/>

                    <!-- imagens -->
                    <input id="imagem_heroi" type="hidden" value="../painel/<?php echo $avatarheroi; ?>" />
                    <input id="imagem_anjo" type="hidden" value="../painel/<?php echo $avataranjo; ?>" />

                    <div class="form-buttons">
                        <!--<button class="btn btn-light" data-toggle="tooltip" title="Add files" type="button">
                            <i data-feather="paperclip"></i>
                        </button>
                        <button class="btn btn-light d-sm-none d-block" data-toggle="tooltip"
                                title="Send a voice record" type="button">
                            <i data-feather="mic"></i>
                        </button>-->
                        <button class="btn btn-primary" type="submit">
                            <i data-feather="send"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <!-- ./ chat -->

        <div class="sidebar-group">
            <div id="contact-information" class="sidebar">
                <header>
                    <span></span>
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <a href="#" class="btn btn-outline-light text-danger sidebar-close">
                                <i data-feather="x"></i>
                            </a>
                        </li>
                    </ul>
                </header>
                <div class="sidebar-body">
                    <div class="pl-4 pr-4">
                        <div class="text-center">
                            <figure class="avatar avatar-xl mb-4">
                                <img src="../painel/<?php echo $avataranjo; ?>" class="rounded-circle" alt="image">
                            </figure>
                            <h5 class="mb-1"><?php echo $nomeanjo; ?></h5>

                            <?php if($premium == 1){
                                //echo"<small class='text-muted font-italic'>Anjo Premium. Valor de retribuição por 40 minutos de atendimento: R$".$valor.",00</small>";
                                echo"<small class='text-muted font-italic'>Anjo Premium. Atendimento <u><b>grátis</b></u> no período da quarentena </small>";
                            }else{
                              "<small class='text-muted font-italic'>Anjo Voluntário. Você não paga nada pelo atendimento</small>";
                            }?>

                            <ul class="nav nav-tabs justify-content-center mt-5" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                       aria-controls="home" aria-selected="true">História</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" id="categoria-tab" data-toggle="tab" href="#categoria" role="tab"
                                       aria-controls="profile" aria-selected="false">Categorias</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                                       aria-controls="profile" aria-selected="false">Avaliações</a>
                                </li>
                            </ul>
                        </div>

                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <p class="text-muted"><?php echo $biografia; ?></p>
                            </div>

                            <div class="tab-pane fade" id="categoria" role="tabpanel" aria-labelledby="categoria-tab">
                                <center>
                                <button class="btn btn-primary"><?php echo $desafio1; ?></button><br/><br/>
                                <button class="btn btn-primary"><?php echo $desafio2; ?></button><br/><br/>
                                <button class="btn btn-primary"><?php echo $desafio3; ?></button><br/><br/>
                                </center>

                            </div>

                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                Esse anjo ainda não possui avaliações. Finalize o atendimento para avaliar.
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="pagamento" class="sidebar">
                <header>
                    <span></span>
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <a href="#" class="btn btn-outline-light text-danger sidebar-close">
                                <i data-feather="x"></i>
                            </a>
                        </li>
                    </ul>

                </header>
                <div class="sidebar-body">
                    <div class="pl-4 pr-4">
                        <center>
                        <h5>Preencha seus dados :)</h5>
                        <p>Você está pagando R$<?php echo $valor;?>,00 por 40 minutos de conversa ativa e acolhedora.</p>
                        </center>
                      <form id="payment-form" action="" method="POST">


                          <div class="form-group ">
                            <label for="inputAddress">Número do cartão</label>
                            <input type="text" class="form-control form-control-lg" id="inputAddress" name="numero-cartao" placeholder="Aceitamos cartão de crédito e débito" data-mask="0000 0000 0000 0000" required>
                          </div>

                          <div class="form-row">
                            <div class="form-group col-sm-6 col-xs-6">
                              <label for="inputEmail4">MM/AA
                                <a class="duvida" data-toggle="modal" data-target="#duvidas-mm">?</a>
                              </label>
                              <input type="text" name="expiracao" class="form-control form-control-lg" id="inputEmail4" data-mask="00/00" required >
                            </div>
                            <div class="form-group col-sm-6 col-xs-6">
                              <label for="inputPassword4">CVV
                                    <a class="duvida" data-toggle="modal" data-target="#duvidas-cvv">?</a>
                              </label>
                              <input type="number" name="codseguranca" class="form-control form-control-lg" id="inputPassword4" placeholder="" data-mask="000" required="">
                            </div>
                          </div>

                          <div class="form-group">
                            <label for="nomedotitular">Nome do títular </label>
                            <input type="text" class="form-control form-control-lg" name="nomecartao" id="nomedotitular" placeholder="Nome igual está no cartão" required>
                          </div>

                          <div class="form-group">
                            <label for="cpf">CPF</label>
                            <input type="text" name="cpf" class="form-control form-control-lg" id="cpf" placeholder="" required data-mask="000.000.000-00">
                          </div>

                          <div class="form-group">
                            <label for="cupom">Possui algum cupom de desconto? </label>
                            <input type="text" class="form-control form-control-lg" id="cupom" placeholder="">
                          </div>



                          <center>
                            <img src="https://eyhe.com.br/img/ga_EYHE_modais_mobile.png" alt="Visa, Master, Diners. Amex" style="width: 80%; margin: 0 auto; margin-bottom: 10px;"><br/>
                            <button type="submit" class="btn btn-primary btn-lg">Pagar e voltar ao atendimento</button></br><br/>

                              <div class="alert alert-primary aguarde" role="alert" style="display: none;">
                                Aguarde, estamos processando seu pagamento...
                              </div>

                              <div class="alert alert-danger saldo" style="display: none;">
                                Pagamento recusado por falta de saldo
                              </div>

                              <div class="alert alert-success confirmado" style="display: none;">
                                <b>Pagamento realizado com sucesso! Aproveite a sua conversa</b>
                              </div>

                              <div class="alert alert-warning tentenovamente" style="display: none;">
                                Houve algum erro inesperado. Tente novamente
                              </div>

                              <div class="alert alert-warning errocpf" style="display: none;">
                                Pagamento recusado por CPF incorreto.
                              </div>

                              <div class="alert alert-warning numero" style="display: none;">
                                Pagamento recusado por número de cartão incorreto
                              </div>

                              <div class="alert alert-warning informcaoes" style="display: none;">
                                Pagamento recusado por informações incorretas
                              </div>

                            <button type="button" class="btn btn-light">Desistir do atendimento </button>
                          </center>

                          <br/>
                          <center><p style="font-size: 12px;">Nossos pagamentos são processados pela <b><a href="https://www.ebanx.com/br/" target="_blank" style="display: inline;">Ebanx</a></b>. Alem disso, utilizamos certificação de segurança para garantir total confiabilidade a seu pagamento</p>           <br/><br/>


                          </center>
                        </form>
                    </div>
                </div>
            </div>

            <div id="retribua" class="sidebar">
                <header>
                    <span></span>
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <a href="#" class="btn btn-outline-light text-danger sidebar-close fechar-retribua">
                                <i data-feather="x"></i>
                            </a>
                        </li>
                    </ul>
                </header>
                <div class="sidebar-body">
                    <div class="pl-4 pr-4">
                        <div class="text-center">
                            <figure class="avatar avatar-xl mb-4">
                                <img src="../painel/<?php echo $avataranjo; ?>" class="rounded-circle" alt="image">
                            </figure>
                            <h5 class="mb-1">Hora de retribuir o Anjo <?php echo $nomeanjo; ?></h5>

                            <br/>
                            <p>Não encare isso como uma simples compra na internet. Você está prestes a realizar uma troca de valores! Você receberá acolhimento, atenção, empatia, experiências de vida e apoio emocional, sem julgamento.</p>

                            <br/>
                            <p><b>Em troca, você dará um suporte financeiro de R$<?php echo $valor;?>,00 e a gratidão que existe no seu coração.</b> </p>

                            <br/>
                            <img src="../ilustracoes/retribua.png" />

                            <br/><br/>
                            <button type="button" class="btn btn-primary btn-lg fechar-retribua" style="min-width: 100px;"  data-navigation-target="pagamento">Retribuir</button>
                        </div>

                    </div>
                </div>
            </div>

            <div id="avalie" class="sidebar">
                <header>
                    <span></span>
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <a href="#" class="btn btn-outline-light text-danger sidebar-close">
                                <i data-feather="x"></i>
                            </a>
                        </li>
                    </ul>
                </header>

                <center>
                    <figure class="avatar avatar-xl mb-4">
                        <img src="../painel/<?php echo $avataranjo; ?>" class="rounded-circle" alt="image">
                    </figure>
                    <h5 class="mb-1">Avalie o Anjo <?php echo $nomeanjo; ?></h5>

                    <br/>
                </center>

                <div class="sidebar-body">
                    <div class="pl-4 pr-4">
                        
                      <center><form id="avaliacao" action="" method="POST">


                        <input type="hidden" name="idanjo" value="<?php echo $_GET['idanjo']; ?>" />
                        <input type="hidden" name="idheroi" value="<?php echo $_GET['myid']; ?>" />
                        <input type="hidden" name="tabela" value="<?php echo $_GET['where']; ?>" />  

                        <p>Como você está se sentindo agora? </p>
                        <select class="form-control" name="sentimento" required>
                          <option>Aliviado</option>
                          <option>Mais calmo</option>
                          <option>Otimista</option>
                          <option>Normal</option>
                          <option>Ainda não me sinto bem.</option>
                        </select>

                        <br/>
                        <p>Como você define o atendimento do Anjo ?</p>
                        <select class="form-control" required name="definicao">
                          <option>Rápido e me fez muito bem</option>
                          <option>Rápido porém, não me fez bem</option>
                          <option>Demorado porém, me fez bem</option>
                          <option>Demorado e não me fez bem</option>
                        </select>

                        <br/>
                        <p>Gostaria de deixar um comentário sobre seu atendimento ?</p>
                        <textarea class="form-control" name="comentario" rows="3"></textarea>                      
                        <br/>
                        <button type="submit" class="btn btn-primary">
                            Salvar avaliação
                        </button>
                       </form></center>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <!-- ./ content -->

</div>
<!-- ./ layout -->

<!-- Bundle -->
<script src="./vendor/bundle.js"></script>

<script src="./vendor/enjoyhint/enjoyhint.min.js"></script>

<!-- App scripts -->
<script src="./dist/js/app.min.js"></script>

<!-- retorna historico -->
<script>
  function convertDate(dateString){
    var p = dateString.split(/\D/g)
    return [p[2],p[1],p[0]].join("/");
  }


  $('#history').empty(); //Limpando a div
  $.ajax({
    type:'post',    //Definimos o método HTTP usado
    dataType: 'json', //Definimos o tipo de retorno
    data: {"nome_tabela": '<?php echo $tabela; ?>',
           "meuID": '<?php echo $myID; ?>'},
    url: '../painel/engine/retorna_historico_chat.php',//Definindo o arquivo onde serão buscados os dados

    success: function(dados){

      for(var i=0;dados.length>i;i++){

        //vamos arrumar a data? podemos tambem personalizar do tipo: hoje, ontem, fora esses, deixa a data normal.
        var datahora = dados[i].datahora; var dataarray = datahora.split(" "); data = dataarray[0]; var hora = dataarray[1]; data = convertDate(data); datahora = data+' '+hora;

        //Adicionando registros retornados na div
        if(dados[i].texto != ''){
            if(dados[i].remetente == '<?php echo $myID; ?>'){
              $('#history').append('<div class="message-item outgoing-message outro"><div class="message-avatar"><figure class="avatar"><img src="../painel/<?php echo $avatarheroi; ?>"class="rounded-circle"alt="image"></figure><div><h5>Você:</h5><div class="time">'+datahora+'<i class="ti-double-checktext-info"></i></div></div></div><div class="message-content">'+dados[i].texto+'</div>');
            }else{
              $('#history').append('<div class="message-item outro"><div class="message-avatar"><figure class="avatar"><img src="../painel/<?php echo $avataranjo; ?>"class="rounded-circle"alt="image"></figure><div><h5><?php echo $nomeanjo; ?></h5><div class="time">'+datahora+'<i class="ti-double-checktext-info"></i></div></div></div><div class="message-content">'+dados[i].texto+'</div>');
            }
        }
      }

      var chatHistory = document.getElementById("box");
      chatHistory.scrollTop = chatHistory.scrollHeight;

    }
  });

</script>


<!-- envia mensagem e anexa no chat -->
<script>
var SAMPLE_SERVER_BASE_URL = ''; var API_KEY = '46211362'; var SESSION_ID = '<?php echo $sessao; ?>'; var TOKEN = '<?php echo $token; ?>';
</script>
<script>

/* global API_KEY TOKEN SESSION_ID SAMPLE_SERVER_BASE_URL OT */
/* eslint-disable no-alert */

var apiKey;
var session;
var sessionId;
var token;

$( ".fechar-retribua" ).click(function() {
  $( "#retribua" ).hide();
});


function initializeSession() {

  session = OT.initSession(apiKey, sessionId);

  session.on('sessionDisconnected', function sessionDisconnected(event) {
    console.error('You were disconnected from the session.', event.reason);
  });

  // Connect to the session
  session.connect(token, function callback(error) {
    // If the connection is successful, initialize a publisher and publish to the session
    if (!error) {
      // If the connection is successful, publish the publisher to the session
      session.publish(publisher, function publishCallback(publishErr) {
        if (publishErr) {
          console.error('There was an error publishing: ', publishErr.name, publishErr.message);
        }
      });
    } else {
      console.error('There was an error connecting to the session: ', error.name, error.message);
    }
  });

  // Receive a message and append it to the history
  var msgHistory = document.querySelector('#history');

  session.on('signal:msg', function signalCallback(event) {

    //pegando data hora de agora!
    var dNow = new Date();
    var dia =  dNow.getDate();
    var mes =  dNow.getMonth();
    var ano =  dNow.getFullYear();
    var horas = dNow.getHours();
    var minutos = dNow.getMinutes();
    var seg = dNow.getSeconds();

    if(mes < 10){
        mes = '0'+mes;
    }
    if(minutos < 10){
        minutos = '0'+minutos;
    }
    if(seg < 10){
        seg = '0'+minutos;
    }

    var datahora = dia+'/'+mes+'/'+ano+' '+horas+':'+minutos+':'+seg;

    //formando a coisa

    // essa div vai a mensagem
    var container = document.createElement('div');
    container.classList.add('message-content');
    container.textContent = event.data;

    //essa é a div geral
    var msg = document.createElement('div');
    if(event.from.connectionId == session.connection.connectionId) msg.classList.add('message-item','outgoing-message','outro');
    else msg.classList.add('message-item','outro');

    //elemento img
    var img = document.createElement('img');
    img.classList.add('rounded-circle');
    if(event.from.connectionId == session.connection.connectionId) img.setAttribute("src", "../painel/<?php echo $avatarheroi; ?>");
    else img.setAttribute("src", "../painel/<?php echo $avataranjo; ?>");

    //elemento figure
    var figure = document.createElement('figure');
    figure.classList.add('avatar');

    //<div class="message-avatar">
    var avatar = document.createElement('div');
    avatar.classList.add('message-avatar');

    var info = document.createElement('div');
    avatar.classList.add('infos');

    var h5 = document.createElement('h5');
    if(event.from.connectionId == session.connection.connectionId) h5.textContent = 'Você:';
    else h5.textContent = '<?php echo $nomeanjo; ?>';

    var tempo = document.createElement('div');
    tempo.classList.add('time');
    tempo.textContent = datahora;



    //colocando a img dentro do figure
    figure.appendChild(img);
    //colocando o figure dentro do avatar
    avatar.appendChild(figure);
    //colocando o h5 dentro das infos
    info.appendChild(h5);
    //colocando o tempo dentro das infos
    info.appendChild(tempo);
    //colocando as infos dentro do avatar
    avatar.appendChild(info);
    //colocando o avatar dentro da div geral
    msg.appendChild(avatar);
    //colocando a mensagem dentro da div geral
    msg.appendChild(container);

    //console.log(msg);
    var tamanho = event.data.length;
    //alert(tamanho);
   
    if(tamanho >= 1){
        msgHistory.appendChild(msg);
        msg.scrollIntoView();
    }
    


  });
}

function salvar_mensagem(){
   var dados = jQuery('#form-chat').serialize();
   $.ajax({
      type: "POST",
      url: "../painel/engine/recebe_dados_chat.php",
      data: dados,
      success: function(data) {
        $("#form-chat").trigger("reset");
      },
      error: function (xhr, ajaxOptions, thrownError) {
        alert(xhr.status);
        alert(thrownError);
      }
  });
}

// Text chat
var botao  = document.querySelector('enviar');
var form = document.querySelector('#form-chat');
var msgTxt = document.querySelector('#msgTxt');
var remetente = document.querySelector('#myID');
var imagem_anjo = document.querySelector('#imagem_anjo').value;
var imagem_heroi = document.querySelector('#imagem_heroi').value;

// Send a signal once the user enters data in the form
form.addEventListener('submit', function submit(event) {
  event.preventDefault();
  session.signal({
    type: 'msg',
    data: msgTxt.value
  }, function signalCallback(error) {
    if (error) {
      console.error('Error sending signal:', error.name, error.message);
    } else {
        salvar_mensagem();
        msgTxt.value = '';       
    }
  });
});

// See the config.js file.
if (API_KEY && TOKEN && SESSION_ID) {
  apiKey = API_KEY;
  sessionId = SESSION_ID;
  token = TOKEN;
  initializeSession();
} else if (SAMPLE_SERVER_BASE_URL) {
  // Make an Ajax request to get the OpenTok API key, session ID, and token from the server
  fetch(SAMPLE_SERVER_BASE_URL + '/session').then(function fetch(res) {
    return res.json();
  }).then(function fetchJson(json) {
    apiKey = json.apiKey;
    sessionId = json.sessionId;
    token = json.token;

    initializeSession();
  }).catch(function catchErr(error) {
    console.error('There was an error fetching the session information', error.name, error.message);
    alert('Failed to get opentok sessionId and token. Make sure you have updated the config.js file.');
  });
}

</script>


<!-- toadst notifications -->
<script src="core/toastr.min.js"></script>
<script>
toastr.options = {
  "closeButton": true,
  "debug": false,
  "newestOnTop": false,
  "progressBar": true,
  "positionClass": "toast-top-right",
  "preventDuplicates": false,
  "showDuration": "10000",
  "hideDuration": "10000",
  "timeOut": "10000",
  "extendedTimeOut": "5000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}


//toastr["info"]("Seus 10 mininutos grátis começam agora! Aproveite, aqui você está seguro.");
//toastr["info"]("Você ainda tem 3 minutos. Se estiver confortável pra continuar, tenha seu cartão por perto, logo vai precisar.");
//toastr["info"]("Em 1 minuto a tela de pagamento vai aparecer pra você. Pra garantir sua conversa nos próximos 40 minutos, complete a troca de valores entre você e seu Anjo.");

</script>


  <!-- mascaras -->
  <script type="text/javascript" src="../js/mask/jquery.mask.js"></script>
  <script type="text/javascript" src="../js/mask/jquery.mask.test.js"></script>


 <!-- temporizadores! -->

 <!--
    objetivo: detectar uma conversa ativa (funcao que fica em looping a cada x segundos para verificar)
    objetivo: se a conversa está ativa (eu paro de detectar), eu salvo uma data-hora base.
    objetivo: com essa data-hora base eu consigo ir fazendo as contas de tempo, 1mim, 7min, 10min  e 50min.
    objetivo: disparar notificações + disparar pagamento + disparar fim da conversa.
 -->


<script>

    var idpagamento;
    function dispara_inicio_do_atendimento(datahora){

        clearInterval(repetir);
        toastr["info"]("Seus 10 minutos grátis começam agora! Aproveite, aqui você está seguro.");

        //vou disparar um toastds com 7 min.
        setTimeout( function() {
          toastr["info"]("Você ainda tem 3 minutos. Se estiver confortável pra continuar, tenha seu cartão por perto, logo vai precisar.");
        }, 420000 ); //420000

        //vou disparar um toastds com 9 min.
        setTimeout( function() {
          toastr["info"]("Em 1 minuto a tela de pagamento vai aparecer pra você. Pra garantir sua conversa nos próximos 40 minutos, complete a troca de valores entre você e seu Anjo.");
        }, 540000 ); //540000

        //vou disparar o pagamento
         setTimeout( function() {

            //cria as tabelas referente ao pagamento
            $.ajax({
                type:'post',
                data: {"idanjo": '<?php echo $idother; ?>', "idheroi": '<?php echo $_GET['myid']; ?>', "valor": '<?php echo $valor; ?>',
                       "tabela": '<?php echo $tabela; ?>'},
                url: '../painel/engine/recebe_solicitacao_pagamento.php',
                success: function(data){
                    idpagamento = data;
                    //alert("SOLICITAÇÃO DE PAGAMENTO Nº:"+idpagamento);
                }
             });

            //mostra a tela de retribuir
            $("#retribua").toggle();
            //mostra botão 'efetuar pagamento'
            $('.btn_pagamento').css("display", "inline");
        }, 600000 ); //600000
    }

    function detector_de_conversa_ativa(){

      $.ajax({
        type:'post',    //Definimos o método HTTP usado
        //dataType: 'json', //Definimos o tipo de retorno
        data: {"nome_tabela": '<?php echo $tabela; ?>',
               "idheroi": '<?php echo $myID; ?>'},
        url: '../painel/engine/retorna_status_conversa.php',
        success: function(data){
            //alert(data);
            if(data != 'inativa'){
               dispara_inicio_do_atendimento(data);
            }
        }
      });
    }
    //var repetir = setInterval(detector_de_conversa_ativa, 5000);

    // gerencia formulario de pagamento
    jQuery(document).ready(function(){
       jQuery('#payment-form').submit(function(){

         var idheroi = <?php echo $_GET['myid']; ?>

          jQuery.ajax({
               type: "POST",
               url: "../painel/engine/EBANX/recebe_pagamento_cartao.php",
               data: $('#payment-form').serialize() + '&idpagamento=' + idpagamento + '&idheroi=' + idheroi,
               beforeSend: function(){

                $('.confirmado').hide();
                $('.numero').hide();
                $('.informcaoes').hide();
                $('.errocpf').hide();
                $('.tentenovamente').hide();
                $('.saldo').hide();
                $('.aguarde').show();

               },
               success: function(data)
               {

                 if(data == 3){
                     var status = 'Pagamento confirmado';
                     $('.aguarde').hide();
                     $('.confirmado').show();

                  }
                  else if(data == 4){
                       //agora vamos alterar o status desse pagamento para RECUSADO
                       var status = 'Pagamento recusado por falta de saldo';
                       $('.aguarde').hide();
                       $('.saldo').show();

                  }
                  else if(data == 5){
                       //agora vamos alterar o status desse pagamento para RECUSADO
                       var status = 'Pagamento recusado por número de cartão incorreto';
                       $('.aguarde').hide();
                       $('.numero').show();

                  }
                  else if (data == 2){
                       //agora vamos alterar o status desse pagamento para RECUSADO
                       var status = 'Pagamento recusado por informações incorretas';
                       $('.aguarde').hide();
                       $('.informcaoes').show();
                  }
                  else if (data == 6){
                       //agora vamos alterar o status desse pagamento para RECUSADO
                       var status = 'Pagamento recusado por CPF incorreto';
                       $('.aguarde').hide();
                       $('.errocpf').show();
                   }
                  else{
                    var status = 'aguardando';
                    $('.aguarde').hide();
                    $('.tentenovamente').show();

                  }

                  jQuery.ajax({
                         type: "POST",
                         url: "painel/engine/atualiza_status_pagamento.php",
                         data: {"idpagamento": idpagamento, "status": status},
                          success: function(data)
                          {
                            //alert(data);
                          }
                  });                  

               }
           });

           return false;
       });
    });

</script>


<script>
    
    // gerencia formulario de pagamento
    jQuery(document).ready(function(){
       jQuery('#avaliacao').submit(function(){
          jQuery.ajax({
               type: "POST",
               url: "../painel/engine/recebe_nova_avaliacao.php",
               data: $('#avaliacao').serialize(),
               beforeSend: function(){              
               },
               success: function(data)
               {
                if(data == 'salvo')
                    $('#disconnected').modal('show');
               }
           });

          return false;

       });
    });

</script>

</body>
</html>
