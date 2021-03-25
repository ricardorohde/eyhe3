var idanjo = MEUID;
var ultima;


var beep = new Audio();
beep.src = 'sounds/beep.mp3';
beep.volume = 0.6;


function retorna_ultima(){
  $.ajax({
    type:'post',    //Definimos o método HTTP usado
    data: {"idanjo": idanjo},
    url: 'enginePHP/retorna_ultima_conversa_anjo.php',//Definindo o arquivo onde serão buscados os dados

    success: function(data){
      ultima  = data;
    }
  });
}

function escuta_novas_chamadas() {

        $.ajax({
          type:'post',    //Definimos o método HTTP usado
          data: {"idanjo": idanjo},

          url: 'enginePHP/retorna_ultima_conversa_anjo.php',//Definindo o arquivo onde serão buscados os dados

          success: function(data){


                if(ultima != data){
                  ultima = data;
                  Swal.fire({
                    icon: 'success',
                    title: 'Você tem uma novo Herói lhe esperando',
                    text: 'Sua página será atualizada..',
                  })
                  beep.play();
                  setTimeout(function() {
                      window.location.href = 'index.php';
                  }, 4000);
                }
                else{
                  //alert('mesma conversa');
                }

              }
        });
    }

retorna_ultima();
var refreshIntervalId = setInterval(escuta_novas_chamadas, 3000);
