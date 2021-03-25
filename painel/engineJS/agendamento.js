jQuery('#agendar').submit(function(){
   jQuery.ajax({
        type: "POST",
        url: "painel/engine/recebe_agendamento.php",
        data: $('#agendar').serialize(),
        beforeSend: function(){
          Swal.fire({
           title: 'Aguarde',
           text: 'Estamos salvando seu agendamento..',
           imageUrl: 'https://pedefacil.sodexobeneficios.com.br/PPW/img/tela-espera.gif',
           imageWidth: 80,
           imageHeight: 80,
           imageAlt: 'aguarde',
         })
        },
        success: function(data)
        {

           if(data == 'sucesso'){
             Swal.fire({
               icon: 'success',
               title: 'Agendamento marcado!',
               text: 'Fique de olho no seu WhatsApp, a Equipe Eyhe entrará em contato. Lembre-se de que para realizar a conversa você precisará de saldo ou de um cartão de crédito em mãos.',
             })
             var frase = NOME_HEROI+' acabou de fazer um AGENDAMENTO com o anjo '+NOME_ANJO;
             envia_sms('554699177534', frase);
             envia_sms('554699247368', frase);
             envia_sms('554688011011', frase);
           }else{
             Swal.fire({
               icon: 'error',
               title: 'Opsss',
               text: 'Houve algum erro. Tente novamente',
             })
           }

        }

    });
    return false;

});
