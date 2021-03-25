window.setInterval(emite_status, 100);


function emite_status() {
  session.signal({
    type: 'status-online',
    data: ''
  }, function signalCallback(error) {
    if (error) {
      console.error('Error ao enviar sinal de online:', error.name, error.message);
    } else {
      console.log('sinal de online enviado!');
    }
  });
}
