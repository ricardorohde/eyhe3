var status_pagamento = 'nenhum';
var tabela_analisada = TABELA;
var idanjo = MY_ID;
var idheroi = IDHEROI;


toastr.options = {
  "closeButton": true,
  "debug": false,
  "newestOnTop": false,
  "progressBar": true,
  "positionClass": "toast-top-right",
  "preventDuplicates": false,
  "showDuration": "10000",
  "hideDuration": "10000",
  "timeOut": "10000",
  "extendedTimeOut": "5000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}

function notificacoes(){
  toastr["info"]("Você pode começar a conversa se apresentando como anjo do Eyhe e buscar mais informações de quem é nosso herói !");

   //vou disparar um toastds com 3 min.
   setTimeout( function() {
     toastr["info"]("Pergunte o que trouxe o herói até aqui");
   }, 180000 );

   //vou disparar um toastds com 6 min.
   setTimeout( function() {
     toastr["info"]("Podemos questionar como o herói vive com seu problema.");
   }, 360000 );

   //vou disparar um toastds com 9 min.
   setTimeout( function() {
     toastr["info"]("Estamos encerrando nossos 10 minutos grátis, Após esse primeiro dialogo de acolhimento convide o herói caso ele estiver confortável a realizar nosso atendimento completo de +40 minutos!");
   }, 540000 );
}


function retorna_status_pagamento() {
  $.ajax({
    type:'post',    //Definimos o método HTTP usado
    data: {"nome_tabela": tabela_analisada,
          "idheroi": idheroi,
          "idanjo": idanjo},
    url: 'enginePHP/sensor_atendimento_anjo.php',
    success: function(status){

      if(status_pagamento != status){
        status_pagamento = status;
        console.log(tabela_analisada);
        console.log(status_pagamento);

        //primeiro vou sumir com todas as faixas do topo.
        $('.barra-status-10minutos').hide();
        $('.barra-status-aguardando').hide();
        $('.barra-status-sucesso').hide();
        $('.barra-status-problemas').hide();

        //e mostrar a nova faixa.
        if(status == '10minutos'){
          $('.barra-status-10minutos').show();
          notificacoes();
        }else if(status == 'aguardando'){
            $('.barra-status-aguardando').show();
        }else if(status == 'inativa'){
          
        }
        else if(status == 'Pagamento confirmado'){
          $('.barra-status-sucesso').show();
          Swal.fire({
            icon: 'success',
            title: 'O Herói realizou o pagamento!',
            text: 'Empatia e acolhimento são as palavras chaves! Você será avisado quando o atendimento acabar',
          })
        }
        else{
          $('.barra-status-problemas').show();
        }

      }

    }
  });
}


var intervalo_consulta_status_pagamento = setInterval(retorna_status_pagamento, 1000);
