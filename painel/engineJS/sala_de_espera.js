jQuery('#quizform').submit(function(){
   var dados = $('#quizform').serialize();
   //alert(dados);
   jQuery.ajax({
        type: "POST",
        url: "painel/engine/salvar_resumo_conversa_completo.php",
        data: dados,
        beforeSend: function() {
          Swal.fire({
           title: 'Estamos salvando suas respostas',
           text: 'Seu Anjo terá acesso a isso.',
           imageUrl: 'https://pedefacil.sodexobeneficios.com.br/PPW/img/tela-espera.gif',
           imageWidth: 80,
           imageHeight: 80,
           imageAlt: 'aguarde',
         })
        },
        success: function(data) {
            if(data == 'Resumo salvo com sucesso! Seu anjo terá acesso a isso.') {
              Swal.fire({
                icon: 'success',
                title: 'Uhul !!',
                text: 'Salvamos! Seu Anjo deve chegar em breve.',
              })
            }else{
              Swal.fire({
                icon: 'error',
                title: 'Opsss :(',
                text: 'Tente novamente',
              })
            }
        }

    });
    return false;
})
