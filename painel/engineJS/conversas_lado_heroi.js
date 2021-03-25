//gerencia excluir conversa
$(".excluir_conversa").click(function() {
    var id_conversa = jQuery(this).attr("data-id");
    Swal.fire({
      title: 'Você tem certeza?',
      text: "Essa ação é definitiva",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Sim, pode excluir',
      cancelButtonText: 'Cancelar'
    }).then((result) => {
      if (result.isConfirmed) {

        jQuery.ajax({
            type: "POST",
            cache: false,
            url: "painel/engine/excluir_conversa_heroi.php",
            data: {
                identificador: id_conversa
            },
            beforeSend: function() {},
            success: function(data) {
                if (data == 'Conversa excluida com sucesso!') {
                    Swal.fire({
                      icon: 'success',
                      title: 'Feito!',
                      text: 'Conversa excluida.',
                    })
                    setTimeout(function() {
                      location.reload();
                    }, 2000);
                } else {
                  Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Algo deu errado! Tente novamente.',
                  })
                }
            }
        });
      }
    })
    return false;
});
