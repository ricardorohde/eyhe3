// https://tokbox.com/developer/tutorials/web/text-chat/
// https://github.com/opentok/opentok-web-samples/tree/master/Signaling


var beep = new Audio();
beep.src = 'chat-engine/sounds/beep.wav';
beep.volume = 0.2;
//beep.play();

var apiKey =  46211362;
var session;
var sessionId = SESSION_ID;
var token = TOKEN;

var avatar_eu = AVATAR_EU;
var avatar_ele = AVATAR_ELE;

function initializeSession() {
  session = OT.initSession(apiKey, sessionId);

  session.on('sessionDisconnected', function sessionDisconnected(event) {
    console.error('You were disconnected from the session.', event.reason);
    document.location.reload(true);
  });

  // Connect to the session
  session.connect(token, function callback(error) {
    // If the connection is successful, initialize a publisher and publish to the session
    if (!error) {
      // If the connection is successful, publish the publisher to the session
      session.publish(publisher, function publishCallback(publishErr) {
        if (publishErr) {
          console.error('There was an error publishing: ', publishErr.name, publishErr.message);
        }
      });
    } else {
      console.error('There was an error connecting to the session: ', error.name, error.message);
      document.location.reload(true);
    }
  });

  // Receive a message and append it to the history
  var msgHistory = document.querySelector('#messageBody');
  session.on('signal:msg', function signalCallback(event) {
    //alert('Mensagem recebida: '+event.data);

    var tamanho = event.data.length;

    //pegando data hora de agora!
    var dNow = new Date(); var dia =  dNow.getDate(); var mes =  dNow.getMonth(); var ano =  dNow.getFullYear();
    var horas = dNow.getHours(); var minutos = dNow.getMinutes();

    if(mes < 10){ mes = '0'+mes;}
    if(minutos < 10){ minutos = '0'+minutos; }


    var datahora = dia+'/'+mes+'/'+ano+' '+horas+':'+minutos;

    if(event.from.connectionId == session.connection.connectionId) {
      var mensagem = {
        'texto':  event.data,
        'datahora': datahora,
        'avatar': '../painel/'+avatar_eu
      },
      output = Mustache.render('<li class="right"><div class="conversation-list"><div class="ctext-wrap right"><p>{{texto}}</p><p class="chat-time mb-0">{{datahora}}</p></div></div></li>', mensagem);
      //beep.play();
    }else{
      var mensagem = {
        'texto':  event.data,
        'datahora': datahora,
        'avatar': '../painel/'+avatar_ele
      },
      output = Mustache.render('<li><div class="conversation-list"><div class="ctext-wrap"><p>{{texto}}</p><p class="chat-time mb-0">{{datahora}}</p></div></div></li>', mensagem);
      beep.play();
    }


    if(tamanho >= 1 && event.data != ' '){
        $('#messageBody').append(output);
        //msg.scrollIntoView();

    }

  });
}

// Text chat
/*var botao_disparo_msg = document.querySelector('#btn_submit');
var msgTxt = document.querySelector('#messageInput');

// Send a signal once the user enters data in the form
botao_disparo_msg.addEventListener('click', function submit(event) {
  event.preventDefault();
  //alert('Mensagem digitada: '+msgTxt.value);
  session.signal({
    type: 'msg',
    data: msgTxt.value
  }, function signalCallback(error) {
    if (error) {
      console.error('Error sending signal:', error.name, error.message);
      document.location.reload(true);
    } else {
      msgTxt.value = '';
    }
  });
});*/



function salvar_mensagem(msg){   
   var dados = jQuery('#input-chat').serialize();
   jQuery.ajax({
      type: "POST",
      url: "painel/engine/recebe_dados_chat.php",
      data: dados+"&msgTxt="+msg,
      success: function(data) {
        $("#input-chat").trigger("reset");

      },
      error: function (xhr, ajaxOptions, thrownError) {
        alert(xhr.status);
        alert(thrownError);
      }
  });
}


var form = document.querySelector('#input-chat');
var msgTxt = document.querySelector('#messageInput');

form.addEventListener('submit', function submit(event) {
  event.preventDefault();
  session.signal({
    type: 'msg',
    data: msgTxt.value
  }, function signalCallback(error) {
    if (error) {
      console.error('Error sending signal:', error.name, error.message);
    } else {
        salvar_mensagem(msgTxt.value);
        msgTxt.value = '';
    }
  });
});

initializeSession();
