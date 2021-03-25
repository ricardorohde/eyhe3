var tabela = TABELA;
var idanjo = IDANJO;
var idheroi = MY_ID;
var avatar = 'painel/'+AVATAR_ELE;
var url_video = URL_VIDEO;

function consulta_convites() {
  $.ajax({
    type:'post',    //Definimos o método HTTP usado
    data: {"nome_tabela": tabela,
          "idheroi": idheroi,
          "idanjo": idanjo},
    url: 'painel/engine/retorna_id_ultimo_convite_video.php',
    success: function(status){

      if(status != 'nenhum'){
        var idvideo = status;

        Swal.fire({
          title: 'Você está recebendo um convite para vídeo-chamada',
          imageUrl: avatar,
          imageWidth: 80,
          imageHeight: 80,
          imageAlt: 'aguarde',
          showDenyButton: true,
          showCancelButton: false,
          confirmButtonText: `Aceitar convite`,
          denyButtonText: `Recusar convite`,
        }).then((result) => {

          if (result.isConfirmed) {
            var status_resposta = 'Aceitou';

            $.ajax({
              type:'post',    //Definimos o método HTTP usado
              data: {"status_resposta": status_resposta,
                    "idchamada": idvideo},
              url: 'painel/engine/atualiza_status_video.php',
              success: function(status){
              }
            });


            Swal.fire({
              icon: 'success',
              title: 'Uhul!!',
              text: 'Você será redicirecionado para a sala de vídeo! Aguarde seu Anjo :D',
            })
            setTimeout( function() {
              window.open(url_video, '_blank');
            }, 2000 );

          } else if (result.isDenied) {
            var status_resposta = 'Recusou';

            $.ajax({
              type:'post',    //Definimos o método HTTP usado
              data: {"status_resposta": status_resposta,
                    "idchamada": idvideo},
              url: 'painel/engine/atualiza_status_video.php',
              success: function(status){
              }
            });

            Swal.fire({
              icon: 'success',
              title: 'Recusado!',
              text: 'Você recusou a chamada de vídeo e seu Anjo será avisado',
            })


          }
        })

      }
    }
  });
}


var intervalo = setInterval(consulta_convites, 5000);
