//gerencia login
jQuery('#formulario_login').submit(function() {
    var dados = $('#formulario_login').serialize();
    //alert(dados);
    jQuery.ajax({
        type: "POST",
        cache: false,
        url: "painel/engine/login.php",
        data: dados,
        beforeSend: function() {},
        success: function(data) {
             if (data == 'LOGADO') {
                setTimeout(function() {
                    window.location.href = 'index.php';
                }, 2000);
            } else {
                Swal.fire({ title: data, text: "Tente novamente", type: "error", showCancelButton: 0, confirmButtonColor: "#2f90ff"});
            }
        }
    });
    return false;
});
