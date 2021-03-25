// https://tokbox.com/developer/tutorials/web/text-chat/
// https://github.com/opentok/opentok-web-samples/tree/master/Signaling

//repeat:
/* <div class="message-item outgoing-message">
    <div class="message-content">
        Hello how are you?
    </div>
</div>

<div class="message-item">
    <div class="message-content">
        I'm fine, how are you 😃
    </div>
</div> */

//div onde o chat acontece class="messages"

var apiKey =  46211362;
var session;
var sessionId = '2_MX40NjIxMTM2Mn5-MTU0NzQ4MTY0MzM0MX5GZkU1WUhyZDlXdURzWGNVOWp5Q0xmWnB-QX4'; //esse dado vem da conversa, pois é o id da sala de bate papo
var token = 'T1==cGFydG5lcl9pZD00NjIxMTM2MiZzaWc9Mjg5MGI1ZGYwOTA2YTU5MmEzMzk0NjMzN2RiYmQ2NmFiYzlmODZlYjpzZXNzaW9uX2lkPTJfTVg0ME5qSXhNVE0yTW41LU1UVTBOelE0TVRZME16TTBNWDVHWmtVMVdVaHlaRGxYZFVSeldHTlZPV3A1UTB4bVduQi1RWDQmY3JlYXRlX3RpbWU9MTYwNDA4NzUxNyZyb2xlPXB1Ymxpc2hlciZub25jZT0xNjA0MDg3NTE3LjgwNzcxNTY4NDY3NjY5JmluaXRpYWxfbGF5b3V0X2NsYXNzX2xpc3Q9';

function initializeSession() {
  session = OT.initSession(apiKey, sessionId);

  session.on('sessionDisconnected', function sessionDisconnected(event) {
    console.error('You were disconnected from the session.', event.reason);
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
    }
  });

  // Receive a message and append it to the history
  var msgHistory = document.querySelector('#messageBody');
  session.on('signal:msg', function signalCallback(event) {
    //alert('Mensagem recebida: '+event.data);
    var msg = document.createElement('p');
    msg.textContent = event.data;
    msg.className = event.from.connectionId === session.connection.connectionId ? 'eufalo' : 'elefala';



    //console.log(msg);
    var tamanho = event.data.length;
    //alert(tamanho);

    if(tamanho >= 1){
        msgHistory.appendChild(msg);
        msg.scrollIntoView();
    }

  });
}

// Text chat
var botao_disparo_msg = document.querySelector('#btn_submit');
var msgTxt = document.querySelector('#messageInput');

// Send a signal once the user enters data in the form
botao_disparo_msg.addEventListener('click', function submit(event) {
  event.preventDefault();
  alert('Mensagem digitada: '+msgTxt.value);
  session.signal({
    type: 'msg',
    data: msgTxt.value
  }, function signalCallback(error) {
    if (error) {
      console.error('Error sending signal:', error.name, error.message);
    } else {
      msgTxt.value = '';
    }
  });
});

initializeSession();
