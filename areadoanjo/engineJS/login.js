//gerencia login
jQuery('#formulario_login_anjo').submit(function() {
    var dados = $('#formulario_login_anjo').serialize();
    //alert(dados);
    jQuery.ajax({
        type: "POST",
        cache: false,
        url: "enginePHP/login.php",
        data: dados,
        beforeSend: function() {
          Swal.fire({
           title: 'Verificando Email e Senha',
           text: 'Você será redirecionado em instantes..',
           imageUrl: 'https://pedefacil.sodexobeneficios.com.br/PPW/img/tela-espera.gif',
           imageWidth: 80,
           imageHeight: 80,
           imageAlt: 'aguarde',
         })
        },
        success: function(data) {
             if (data == 'LOGADO') {
                setTimeout(function() {
                    window.location.href = 'index.php';
                }, 2000);
            } else {
              Swal.fire({
                icon: 'error',
                title: data,
                text: 'Tente novamente',
              })
            }
        }
    });
    return false;
});
