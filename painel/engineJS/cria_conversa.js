/*
 se anjo == online -> classe do botao QUERO CONVERSAR AGORA = iniciar-atendimento
 se anjo == offiline -> classe do botao QUERO CONVERSAR AGORA = anjo-indisponivel
*/

$(".iniciar-atendimento").click(function() {

    var ids = jQuery(this).attr("data-id");
    //alert(ids);
    Swal.fire({
      title: 'Você tem certeza disso?',
      text: "O Anjo será notificado e tem no máximo 5 minutos para lhe atender. Durante esse tempo não será possivel iniciar novos atendimentos.",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Sim, quero chamar esse Anjo',
      cancelButtonText: 'Cancelar'
    }).then((result) => {
      if (result.isConfirmed) {

        jQuery.ajax({
            type: "POST",
            url: "painel/engine/cria_conversa_paga.php",
            data: {
                identificador: ids
            },
            beforeSend: function() {
              Swal.fire({
               title: 'Aguarde um pouquinho..',
               text: 'Estamos notificando seu Anjo. Você será redirecionado em breve',
               imageUrl: 'https://pedefacil.sodexobeneficios.com.br/PPW/img/tela-espera.gif',
               imageWidth: 80,
               imageHeight: 80,
               imageAlt: 'aguarde',
             })
            },
            success: function(data) {
                //alert(data);
                data = JSON.parse(data);
                //alert(data[0].idanjo);
                if (data[0].idanjo != '') {
                    window.location.href = 'nova-sala-de-espera.php?idheroi=' + data[0].idheroi + '&idanjo=' + data[0].idanjo + '&tabela=' + data[0].tabela + '&sessao=' + data[0].sessao + '&idconversa=' + data[0].idconversa;
                }
            }
        });

      }
    })

});

$(".anjo-indisponivel").click(function() {
  Swal.fire({
   title: 'Anjo Offline ',
   text: 'Escolha outro Anjo ou se preferir, agende um atendimento com esse.',
   imageUrl: 'https://image.flaticon.com/icons/png/512/1653/1653713.png',
   imageWidth: 80,
   imageHeight: 80,
   imageAlt: 'aguarde',
 })
});
