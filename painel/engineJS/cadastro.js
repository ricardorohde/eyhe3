jQuery(document).ready(function(){
    jQuery('#form-cadastro').submit(function(){
        //alert("form de cadastro enviado");
        var dados = jQuery( this ).serialize();
        //alert(dados);
        jQuery.ajax({
            type: "POST",
            url: "../painel/engine/cadastro_social.php",
            data: dados,
            beforeSend: function() {
              Swal.fire({
               title: 'Aguarde um instante',
               text: 'O seu primeiro passo dentro do Eyhe está sendo concluído!',
               imageUrl: 'https://pedefacil.sodexobeneficios.com.br/PPW/img/tela-espera.gif',
               imageWidth: 80,
               imageHeight: 80,
               imageAlt: 'aguarde',
             })
            },
            success: function(data)
            {
                if(data == 'Cadastro realizado com sucesso!'){

                  Swal.fire({
                    icon: 'success',
                    title: 'Pronto! ',
                    text: 'O seu cadastro está concluído.'
                  })



                    setTimeout(function(){
                    jQuery.ajax({
                        type: "POST",
                        url: "../painel/engine/login.php",
                        data: dados,
                        beforeSend: function() {

                        },
                        success: function(data)
                        {
                        if(data == 'LOGADO'){
                            window.location.href = "https://www.eyhe.com.br/index.php";
                        }else{
                            alert(data);

                        }
                        },

                    });
                    }, 1500);
                }else{
                  Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: data,
                  })



                }
                //alert(data);
            },

        });
        $("#form-cadastro").trigger("reset");
        return false;
        });
});
