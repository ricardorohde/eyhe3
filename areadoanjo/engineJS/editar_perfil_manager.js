jQuery('#altera-info-basicas').submit(function() {
    var dados = $('#altera-info-basicas').serialize();
    jQuery.ajax({
        type: "POST",
        cache: false,
        url: "enginePHP/editar_infos_basicas_anjo.php",
        data: dados,
        beforeSend: function() {
          Swal.fire({
           title: 'Salvando informações',
           text: 'Aguarde um instante..',
           imageUrl: 'https://pedefacil.sodexobeneficios.com.br/PPW/img/tela-espera.gif',
           imageWidth: 80,
           imageHeight: 80,
           imageAlt: 'aguarde',
         })
        },
        success: function(data) {
              if(data == 'Informações básicas atualizadas!'){
                Swal.fire({
                  icon: 'success',
                  title: 'UHULL :)',
                  text: data,
                })
                setTimeout(function() {
                    window.location.href = 'perfil-do-anjo.php';
                }, 1500);
              }else{
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

jQuery('#altera-senha').submit(function(){
    //alert("clicou");
    //testando se as senhas são iguais!
    var senha1 = $('#senha_nova').val();
    var senha2 = $('#senha_nova_repeat').val();

    if ( senha1 != senha2) {
        Swal.fire({
          icon: 'error',
          title: 'As senhas não são iguais :(',
          text: 'Tente novamente',
        })
       $("#altera-senha").trigger("reset");
       return false;
    }
    else{
      jQuery.ajax({
          type: "POST",
          url: "enginePHP/altera_senha_anjo.php",
          data: new FormData(this),
          processData: false,
          contentType: false,
          beforeSend: function(){
            Swal.fire({
             title: 'Salvando informações',
             text: 'Aguarde um instante..',
             imageUrl: 'https://pedefacil.sodexobeneficios.com.br/PPW/img/tela-espera.gif',
             imageWidth: 80,
             imageHeight: 80,
             imageAlt: 'aguarde',
           })
          },
          success: function(data)
          {

            if(data == 'Senha atualizada!'){
              Swal.fire({
                icon: 'success',
                title: 'UHULL :)',
                text: data,
              })
              setTimeout(function() {
                  window.location.href = 'perfil-do-anjo.php';
              }, 1500);
            }else{
              Swal.fire({
                icon: 'error',
                title: data,
                text: 'Tente novamente',
              })
            }

          }
      });
    }

    return false;
});

function salva_imagem_anjo(){
  var idanjo = $('#idanjo').val();
  //alert(idanjo);

  var img_64 = $('#img').attr('src');

  jQuery.ajax({
      type: "POST",
      cache: false,
      url: "enginePHP/altera_foto_anjo.php",
      data: {
          idanjo: idanjo,
          imagem: img_64
      },
      beforeSend: function() {
        Swal.fire({
         title: 'Salvando informações',
         text: 'Aguarde um instante..',
         imageUrl: 'https://pedefacil.sodexobeneficios.com.br/PPW/img/tela-espera.gif',
         imageWidth: 80,
         imageHeight: 80,
         imageAlt: 'aguarde',
       })
      },
      success: function(data) {
            if(data == 'Foto Atualizada!'){
              Swal.fire({
                icon: 'success',
                title: 'UHULL :)',
                text: data,
              })
              setTimeout(function() {
                  window.location.href = 'perfil-do-anjo.php';
              }, 1500);
            }else{
              Swal.fire({
                icon: 'error',
                title: '',
                text: data,
              })
            }

      }
  });
}
