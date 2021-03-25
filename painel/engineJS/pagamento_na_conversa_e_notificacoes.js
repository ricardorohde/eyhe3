var tabela = TABELA;
var idheroi = MY_ID;
var idanjo = IDANJO;
var valor = 24.90;
var saldo = SALDO;
var session_confirmacao = SESSION;

var url_confirmacao = "chat.php?pagamento=confirmado&myid="+idheroi+"&idanjo="+idanjo+"&room="+session_confirmacao+"&where="+tabela;
//alert(url_confirmacao);
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


function mostra_cobranca(){
  if(screen.width < 768) {
    $("#cardChat").css("display","none");
    $("#cardPerfil").css("display","none");
    $("#cardSituation").css("display","none");
    $("#cardCartao").css("display","block");
    $("#cardMain").toggle();
  }else{
    $("#cardPerfil").css("display","none");
    $("#cardSituation").css("display","none");
    $("#cardCartao").css("display","block");
    $("#cardMain").toggle();
  }
  $('.barra-status-aguardando').show();
}

var idpagamento;
function dispara_inicio_do_atendimento(){

   toastr["info"]("Parabéns por chegar até aqui! Você pode começar a conversa se apresentando para nos conhecermos melhor.");

    //vou disparar um toastds com 3 min.
    setTimeout( function() {
      toastr["info"]("Diga oque te trouxe até aqui. Explique para seu Anjo o que você está passando e lembre-se que você está um chat seguro");
    }, 180000 );

    //vou disparar um toastds com 6 min.
    setTimeout( function() {
      toastr["info"]("Fale como isso afetou seus dias. Exemplos: Você sente isso todos os dias? Aconteceu agora? Qual momento do dia ?");
    }, 360000 );

    //vou disparar um toastds com 9 min.
    setTimeout( function() {
      toastr["info"]("Estamos encerrando nossos 10 minutos grátis! Se estiver confortável a realizar nosso atendimento completo de 40 minutos, prossiga com o pagamento totalmente seguro, caso o atendimento não te ajude você tem 100% de seu dinheiro de volta.");
    }, 540000 );

    //vou disparar o pagamento
     setTimeout( function() {

        //cria as tabelas referente ao pagamento
        $.ajax({
            type:'post',
            data: {"idanjo": idanjo, "idheroi": idheroi, "valor": valor,
                   "tabela": tabela},
            url: '../painel/engine/recebe_solicitacao_pagamento.php',
            success: function(data){
                idpagamento = data;
                //alert("SOLICITAÇÃO DE PAGAMENTO Nº:"+idpagamento);
            }
         });

         mostra_cobranca();
    }, 600000 ); //600000
}

function dispara_pagamento(){
    //cria as tabelas referente ao pagamento
    $.ajax({
        type:'post',
        data: {"idanjo": idanjo, "idheroi": idheroi, "valor": valor,
               "tabela": tabela},
        url: 'painel/engine/recebe_solicitacao_pagamento.php',
        success: function(data){
            idpagamento = data;
            //alert("SOLICITAÇÃO DE PAGAMENTO Nº:"+idpagamento);
        }
     });

     mostra_cobranca();

}

function dispara_re_atendimento(){

    toastr["info"]("Chegamos aos 40 minutos e seu atendimento encerrou. Aproveite esses últimos minutos para se despedir, agradecer e avaliar o atendimento do Anjo. ");

    //vou disparar um toastds com 7 min.
    setTimeout( function() {
      toastr["info"]("Caso deseje renovar o atendimento, clique no botão 'Efetuar Pagamento' que surgira em sua tela nos próximos instantes.");
    }, 5000 );

    //vou disparar o pagamento
     setTimeout( function() {

        //cria as tabelas referente ao pagamento
        $.ajax({
            type:'post',
            data: {"idanjo": idanjo, "idheroi": idheroi, "valor": valor,
                   "tabela": tabela},
            url: 'painel/engine/recebe_solicitacao_pagamento.php',
            success: function(data){
                idpagamento = data;
                //alert("SOLICITAÇÃO DE PAGAMENTO Nº:"+idpagamento);
            }
         });

          mostra_cobranca();

    }, 1000 );
}

var estado = 'nenhum';
function detector_de_conversa_ativa(){

  $.ajax({
    type:'post',    //Definimos o método HTTP usado
    //dataType: 'json', //Definimos o tipo de retorno
    data: {"nome_tabela": tabela,
           "idheroi": idheroi,
           "idanjo": idanjo},
    url: 'painel/engine/sensor_do_atendimento.php',
    success: function(data){

        //alert(data);
        if(estado != data){

            //primeiro vou sumir com todas as faixas do topo.
            $('.barra-status-10minutos').hide();
            $('.barra-status-aguardando').hide();
            $('.barra-status-sucesso').hide();
            $('.barra-status-problemas').hide();

            estado = data;
            if(data == 'obriga-inicio'){
              //usuario já utilizou mais do que os 10min, independe se saiu ou entrou do chat..
              dispara_pagamento();
            }
            else if(data == 'mostrao-botao-mais-mensagens'){
               //primeiro atendimento, vou dar start as mensagens
               //temporizadas e registro do novo pagamento
               dispara_inicio_do_atendimento();
               $('.barra-status-10minutos').show();
            }else if (data == 'mostra-re-atendimento'){
              // o usuario ja fez um atendimento pago e o tempo chegou ao fim, vou disparar um novo atendimento
               $('.btn_pagamento_efetuado').css("display", "none");
               dispara_re_atendimento();
            }else if (data == 'mostra-nada'){
              $('.btn_pagamento').css("display", "none");
              return false;
            }else if (data == 'atendimento-pago-rolando'){
              $('.btn_pagamento').css("display", "none");
              //$('.btn_pagamento_efetuado').css("display", "inline");
              $('.barra-status-sucesso').show();
            }else{
              //já existem registros de tentativa de pagamento, vou resgatar o id do pagamento
              //e disparar o pagamento, mas somente o botão, nao criando outra tabela..
              //mostra a tela de retribuir
              var resultado = data.split("-");
              idpagamento = resultado[2];
              //alert("ID DE PAGAMENTO: "+idpagamento);
              toastr["info"]("Você já utilizou os 10 minutos gratuitos! Está na hora de retribuir seu Anjo.");

               mostra_cobranca();

            }

         }
    }
  });
}

var repetir = setInterval(detector_de_conversa_ativa, 3000);

// gerencia formulario de pagamento
jQuery(document).ready(function(){
   jQuery('#payment-form').submit(function(){

      jQuery.ajax({
           type: "POST",
           url: "painel/engine/EBANX/recebe_pagamento_cartao.php",
           data: $('#payment-form').serialize() + '&idpagamento=' + idpagamento + '&idheroi=' + idheroi + '&valor=' + valor,
           beforeSend: function(){
             Swal.fire({
              title: 'Aguarde um instante..',
              text: 'Estamos processando seu pagamento por cartão de crédito',
              imageUrl: 'https://pedefacil.sodexobeneficios.com.br/PPW/img/tela-espera.gif',
              imageWidth: 80,
              imageHeight: 80,
              imageAlt: 'aguarde',
            })
           },
           success: function(data)
           {
             //alert(data);
             if(data == 3){
                 var status = 'Pagamento confirmado';
                 Swal.fire({
                   icon: 'success',
                   title: 'Pagamento confirmado! ',
                   text: 'Aproveite seu atendimento de 40 minutos!',
                 })


              }
              else if(data == 4){
                   //agora vamos alterar o status desse pagamento para RECUSADO
                   var status = 'Pagamento recusado por falta de saldo';


              }
              else if(data == 5){
                   //agora vamos alterar o status desse pagamento para RECUSADO
                   var status = 'Pagamento recusado por número de cartão incorreto';
                   Swal.fire({
                     icon: 'error',
                     title: 'Tivemos um problema :(',
                     text: status,
                   })


              }
              else if (data == 2){
                   //agora vamos alterar o status desse pagamento para RECUSADO
                   var status = 'Pagamento recusado por informações incorretas';
                   Swal.fire({
                     icon: 'error',
                     title: 'Tivemos um problema :(',
                     text: status,
                   })

              }
              else if (data == 6){
                   //agora vamos alterar o status desse pagamento para RECUSADO
                   var status = 'Pagamento recusado por CPF incorreto';
                   Swal.fire({
                     icon: 'error',
                     title: 'Tivemos um problema :(',
                     text: status,
                   })

               }
              else{
                var status = 'aguardando';
                Swal.fire({
                  icon: 'error',
                  title: 'Tivemos um problema :(',
                  text: 'Tente novamente',
                })

              }


              jQuery.ajax({
                     type: "POST",
                     url: "painel/engine/atualiza_status_pagamento.php",
                     data: {"idpagamento": idpagamento, "status": status},
                      success: function(data)
                      {
                        if(status == 'Pagamento confirmado'){
                          setTimeout( function() {
                            window.location.href = url_confirmacao;
                          }, 1000 );
                        }
                      }
              });

           }
       });

       return false;
   });
});


$( "#pagar-com-saldo" ).click(function() {
  if(saldo < 24.90){
    Swal.fire({
      icon: 'error',
      title: 'Saldo insulficiente :(',
      text: 'Por gentileza acesse o menu <financeiro> e recarregue seu saldo. Ou se preferir, pague com cartão de crédito na opção abaixo.',
    })
  }else{

    //antes disso, eu preciso diminuir o saldo do banco e registrar no financeiro do heroi isso
    jQuery.ajax({
           type: "POST",
           url: "painel/engine/desconta_saldo.php",
           data: {"idheroi": idheroi,
                  "idanjo": idanjo,
                  "valor": valor},
            success: function(data)
            {
              //alert(data);
            }
    });

    var status = 'Pagamento confirmado';
    jQuery.ajax({
           type: "POST",
           url: "painel/engine/atualiza_status_pagamento.php",
           data: {"idpagamento": idpagamento, "status": status},
            success: function(data)
            {
              Swal.fire({
                icon: 'success',
                title: 'PAGAMENTO CONFIRMADO! ',
                text: 'Aproveite seus próximos 40 minutos de atendimento ',
              })

              setTimeout( function() {
                window.location.href = url_confirmacao;
              }, 1000 );
            }
    });


  }
});
