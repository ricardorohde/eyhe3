var saldo = SALDO;

$( "#pagar-com-saldo" ).click(function() {
  if(saldo < 24.90){
    Swal.fire({
      icon: 'error',
      title: 'Saldo insulficiente :(',
      text: 'Por gentileza acesse o menu <financeiro> e recarregue seu saldo. Ou se preferir, pague com cartão de crédito na opção abaixo.',
    })
  }else{

    //antes disso, eu preciso diminuir o saldo do banco e registrar no financeiro do heroi isso 

    var status = 'Pagamento confirmado';
    jQuery.ajax({
           type: "POST",
           url: "painel/engine/atualiza_status_pagamento.php",
           data: {"idpagamento": idpagamento, "status": status},
            success: function(data)
            {
              //alert(data);
            }
    });




  }
});
