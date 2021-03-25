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
        alert('parou de digitar');
        contador = 0;
        session.signal({
          type: 'parou-de-digitar-heroi',
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
        alert('começou a digitar');
        session.signal({
          type: 'digitando-heroi',
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
    'img': 'assets/images/digitando.gif',
  },

  output_digitando_1 =   output = Mustache.render('<li class="digitando1"><div class="conversation-list"><div class="ctext-wrap"><p><img src="{{img}}" width="25"/></p></div></div></li>', mensagem_digitando);
  $('#messageBody').append(output_digitando_1);
});

session.on('signal:parou-de-digitar', function signalCallback(event) {
   $('.digitando1').hide();
});
