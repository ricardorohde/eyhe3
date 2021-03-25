/* DIGITANDO... */
    var typingTimer;
    var doneTypingInterval = 600;
    var contador = 0;
    var avatar_ele = AVATAR_ELE;



    $("#messageInput").on("input", function () {
        contador++;
        if(contador == 1) digitando();
        window.clearTimeout(typingTimer);
        typingTimer = window.setTimeout(parou_de_digitar, doneTypingInterval);
    });

    function parou_de_digitar () {
        //alert('parou de digitar');
        contador = 0;
        session.signal({
          type: 'parou-de-digitar-anjo',
          data: ''
        }, function signalCallback(error) {
          if (error) {
            console.error('Error ao enviar sinal de parou-de-digitar:', error.name, error.message);
          } else {
            console.log('sinal de parou-de-digitar enviado!');
          }
        });
    }

    function digitando () {
        //alert('começou a digitar');
        session.signal({
          type: 'digitando-anjo',
          data: ''
        }, function signalCallback(error) {
          if (error) {
            console.error('Error ao enviar sinal de digitando:', error.name, error.message);
          } else {
            console.log('sinal de digitando enviado!');
          }
        });
    }
/* fim do DIGITANDO.. */





/* OUVINDO ... */

session.on('signal:digitando-heroi', function signalCallback(event) {
  var mensagem_digitando = {
    'img': '../assets/images/digitando.gif',
  },

  output_digitando_1 =   output = Mustache.render('<img style="margin-left:10px" class="digitando1" src="{{img}}" width="50"/>', mensagem_digitando);
  $('#messageBody').append(output_digitando_1);
  var chatHistory = document.getElementById("messageBody");
  chatHistory.scrollTop = chatHistory.scrollHeight;
});

session.on('signal:parou-de-digitar-heroi', function signalCallback(event) {
   $('.digitando1').hide();
   var chatHistory = document.getElementById("messageBody");
   chatHistory.scrollTop = chatHistory.scrollHeight;
});
