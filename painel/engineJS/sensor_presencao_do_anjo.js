var tabela = TABELA;
function consulta_presenca() {
  $.ajax({
    type:'post',    //Definimos o método HTTP usado
    data: {"nome_tabela": tabela},
    url: 'painel/engine/retorna_status_conversa_por_tabela.php',
    success: function(status){
      //alert(status);
      if( (status != 'Em espera') && (status != 'Perdida') ){
        Swal.fire({
          icon: 'success',
          title: 'Seu Anjo chegou !!',
          text: 'Você será redicirecionado para o chat em instantes..',
        })
        setTimeout( function() {
          window.location.replace(status);
        }, 2000 );
      }
    }
  });
}


var repetir_consulta = setInterval(consulta_presenca, 5000);
