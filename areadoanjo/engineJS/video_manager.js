var url_video = URL_VIDEO;
var idheroi  = IDHEROI;
var idanjo = MY_ID;
var tabela = TABELA;

var intervalo;


$("#gatilho-video").click(function() {
  Swal.fire({
    title: 'Bem vindo ao Gerenciador de Vídeo. O que deseja fazer? ',
    imageUrl: 'https://image.flaticon.com/icons/png/512/2312/2312441.png',
    imageWidth: 80,
    imageHeight: 80,
    imageAlt: 'aguarde',
    showDenyButton: true,
    showCancelButton: true,
    confirmButtonText: `Ir para sala de vídeo`,
    denyButtonText: `Enviar convite`,
    cancelButtonText: 'Cancelar',
  }).then((result) => {
    /* Read more about isConfirmed, isDenied below */
    if (result.isConfirmed) {
      //vou redirecionar para a sala de vídeo
      window.open(url_video, '_blank');
    } else if (result.isDenied) {
      //vou enviar ajax criando o convite na tabela videochamadas
      $.ajax({
          type:'post',
          data: {"idanjo": idanjo, "idheroi": idheroi,
                 "tabela": tabela},
          url: 'enginePHP/cria_convite_video.php',
          success: function(data){
            Swal.fire({
              icon: 'success',
              title: 'Show!',
              text: 'Convite de vídeo enviado ao Herói, assim que ele aceitar ou recusar avisaremos você!',
            })
          }
       });
       intervalo = setInterval(consulta_convites, 5000);
    }
  })

});


//vou fazer um sensor de resposta do convite, somente com sweetalert. :D
