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
        //alert('começou a digitar');
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

session.on('signal:digitando-anjo', function signalCallback(event) {
  var mensagem_digitando = {
    'img': 'img/digitando.gif',
    'avatar': '../painel/'+avatar_ele
  },

  output_digitando_1 = Mustache.render('<div class="message digitando1"><div class="message-wrapper"><div class="message-content"><span><img width="50" src="{{img}}"/></span></div></div><div class="message-options"><div class="avatar avatar-sm"><img alt="" src="{{avatar}}"></div></div></div>', mensagem_digitando);
  $('#messageBody').append(output_digitando_1);
});

session.on('signal:parou-de-digitar-anjo', function signalCallback(event) {
   $('.digitando1').hide();
});
