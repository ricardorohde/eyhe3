
jQuery(document).ready(function(){
   jQuery('#form-resumo').submit(function(){
      jQuery.ajax({
           type: "POST",
           url: "painel/engine/salvar_resumo_conversa.php",
           data: $('#form-resumo').serialize(),
           beforeSend: function(){
             Swal.fire({
              title: 'Aguarde',
              text: 'Salvando seu resumo..',
              imageUrl: 'https://pedefacil.sodexobeneficios.com.br/PPW/img/tela-espera.gif',
              imageWidth: 80,
              imageHeight: 80,
              imageAlt: 'aguarde',
            })
           },
           success: function(data)
           {

              alert(data);

           }
       });


   });
});
