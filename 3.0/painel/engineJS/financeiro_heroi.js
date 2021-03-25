// preciso pegar as infos do heroi, mais o id dele, mais o valor do boleto e enviar para a api de pagamento por boleto
//la iremos criar o boleto além de criar um registro na tabela financeiro_herois

$(document).ready(function(){
    $('#dataexpiracao').mask('00/0000');
    $("#cpf").mask("999.999.999-99");
    $('#numerocartao').mask('0000 0000 0000 0000');
});




jQuery(document).ready(function(){
   jQuery('#form-boleto').submit(function(){

      jQuery.ajax({
           type: "POST",
           url: "../painel/engine/EBANX/carrega_saldo_por_boleto.php",
           data: $('#form-boleto').serialize(),
           beforeSend: function(){
             Swal.fire({
              title: 'Aguarde',
              text: 'Estamos recebendo sua solicitação de recarga por boleto',
              imageUrl: 'https://pedefacil.sodexobeneficios.com.br/PPW/img/tela-espera.gif',
              imageWidth: 80,
              imageHeight: 80,
              imageAlt: 'aguarde',
            })
           },
           success: function(data)
           {
             if(data == 'Falha ao gerar boleto, tente novamente.'){
               Swal.fire({
                 icon: 'error',
                 title: 'Oops...',
                 text: 'Falha ao emitir boleto! Preencha o campo CPF corretamente',
               })
             }else{
               //data == link de acesso ao boletão!
               Swal.fire({
                  title: '<strong> BOLETO GERADO! </strong>',
                  icon: 'success',
                  html:
                    '<a target="_blank" href="'+data+'">Clique aqui e acesse seu boleto</a> ',
                  showCloseButton: false,
                  showCancelButton: false,
                })
             }
           }
       });

      return false;

   });
});

// ---------------------------------------------------------------------------------------- //

//RECARGA POR CARTAO DE CREDITO!
//#form-cartao-credito
jQuery(document).ready(function(){
   jQuery('#form-cartao-credito').submit(function(){
      jQuery.ajax({
           type: "POST",
           url: "../painel/engine/EBANX/carrega_saldo_por_cartao_de_credito.php",
           data: $('#form-cartao-credito').serialize(),
           beforeSend: function(){
             Swal.fire({
              title: 'Aguarde',
              text: 'Estamos recebendo sua solicitação de recarga por cartão de crédito',
              imageUrl: 'https://pedefacil.sodexobeneficios.com.br/PPW/img/tela-espera.gif',
              imageWidth: 80,
              imageHeight: 80,
              imageAlt: 'aguarde',
            })
           },
           success: function(data)
           {
             if(data == 'Recarga realizada com sucesso'){
               Swal.fire({
                 icon: 'success',
                 title: 'UHULL! ',
                 text: data,
               })
               setTimeout(function() {
                   window.location.href = 'financeiro.php';
               }, 2000);
             }else{
               Swal.fire({
                 icon: 'error',
                 title: 'Opss..',
                 text: data,
               })
             }
           }
       });
      return false;

   });
});
