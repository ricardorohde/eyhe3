$(".atender-sala-de-espera").click(function() {
    var id_conversa = jQuery(this).attr("data-id");
    var status = 'Em andamento';
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
            url: "enginePHP/muda_status_da_conversa.php",
            data: {
                identificador: id_conversa,
                status: status
            },
            beforeSend: function() {},
            success: function(data) {
              window.location.href = data;
              //alert(data);
            }
        });
      }
    })
    return false;
});
