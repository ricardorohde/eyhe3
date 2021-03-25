$(".atender-plantao").click(function() {
    var ids = jQuery(this).attr("data-id");
    //alert(ids);
    Swal.fire({
      title: 'Você tem certeza?',
      text: "Você irá dedicar os próximos 50 minutos para esse Herói",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Sim, vou atender',
      cancelButtonText: 'Cancelar'
    }).then((result) => {
      if (result.isConfirmed) {

        jQuery.ajax({
            type: "POST",
            cache: false,
            url: "enginePHP/atende_heroi_plantao.php",
            data: {
                ids: ids,
            },
            beforeSend: function() {
              Swal.fire({
               title: 'UHUL! Parabéns pela atitude!',
               text: 'Aguarde um instante..',
               imageUrl: 'https://pedefacil.sodexobeneficios.com.br/PPW/img/tela-espera.gif',
               imageWidth: 80,
               imageHeight: 80,
               imageAlt: 'aguarde',
             })
            },
            success: function(data) {
              if(data == 'erro'){
                Swal.fire({
                  icon: 'error',
                  title: 'Herói já foi atendido',
                  text: 'Agradecemos a sua prestatividade! Porém, outro Anjo chegou antes e acolheu.',
                })
              }else{
                window.location.href = data;
                //alert(data);
              }
            }
        });
      }
    })
    return false;
});
