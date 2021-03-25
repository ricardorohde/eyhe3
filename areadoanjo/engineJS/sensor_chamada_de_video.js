var tabela = TABELA;
var idanjo = MY_ID;
var idheroi = IDHEROI;
var url_video = URL_VIDEO;

function consulta_convites() {
  $.ajax({
    type:'post',    //Definimos o método HTTP usado
    data: {"nome_tabela": tabela,
          "idheroi": idheroi,
          "idanjo": idanjo},
    url: 'enginePHP/retorna_status_ultimo_convite_video.php',
    success: function(status){

      if(status == 'Recusou'){
        Swal.fire({
          icon: 'error',
          title: 'Recusado!',
          text: 'O herói recusou sua chamada de vídeo',
        })
        clearInterval(intervalo);
      }

      if(status == 'Aceitou'){
        Swal.fire({
          icon: 'success',
          title: 'Chamada de vídeo aceita!',
          text: 'Entre na sala de vídeo para encontrar seu herói',
        })
        clearInterval(intervalo);
      }

    }
  });
}
