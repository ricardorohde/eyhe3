/* global API_KEY TOKEN SESSION_ID SAMPLE_SERVER_BASE_URL OT */
/* eslint-disable no-alert */

var apiKey;
var session;
var sessionId;
var token;

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
  var msgHistory = document.querySelector('#history');
  session.on('signal:msg', function signalCallback(event) {
    var msg = document.createElement('div');
    msg.textContent = event.data;
    msg.className = event.from.connectionId === session.connection.connectionId ? 'message send' : 'message received';
    msgHistory.appendChild(msg);
    msg.scrollIntoView();
  });
}

function salvar_mensagem(){
   var dados = jQuery('#form-chat').serialize();
   $.ajax({
      type: "POST",
      url: "painel/engine/recebe_dados_chat.php",
      data: dados,
      success: function(data) {
        //console.log(data);
        $("#form-chat").trigger("reset");
      },
      error: function (xhr, ajaxOptions, thrownError) {
        alert(xhr.status);
        alert(thrownError);
      }
  });
}

// Text chat
var botao  = document.querySelector('enviar');
var form = document.querySelector('form');
var msgTxt = document.querySelector('#msgTxt');
var remetente = document.querySelector('#myID');
// Send a signal once the user enters data in the form
form.addEventListener('submit', function submit(event) {
  event.preventDefault();

  session.signal({
    type: 'msg',
    data: msgTxt.value
  }, function signalCallback(error) {
    if (error) {
      console.error('Error sending signal:', error.name, error.message);
    } else {
      //salva a mensagem no banco!
      salvar_mensagem();
      msgTxt.value = '';    


    }
  });
});

// See the config.js file.
if (API_KEY && TOKEN && SESSION_ID) {
  apiKey = API_KEY;
  sessionId = SESSION_ID;
  token = TOKEN;
  initializeSession();
} else if (SAMPLE_SERVER_BASE_URL) {
  // Make an Ajax request to get the OpenTok API key, session ID, and token from the server
  fetch(SAMPLE_SERVER_BASE_URL + '/session').then(function fetch(res) {
    return res.json();
  }).then(function fetchJson(json) {
    apiKey = json.apiKey;
    sessionId = json.sessionId;
    token = json.token;

    initializeSession();
  }).catch(function catchErr(error) {
    console.error('There was an error fetching the session information', error.name, error.message);
    alert('Failed to get opentok sessionId and token. Make sure you have updated the config.js file.');
  });
}
