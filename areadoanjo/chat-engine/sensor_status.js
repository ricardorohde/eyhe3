session.on('signal:status-online', function signalCallback(event) {
  $("#status_heroi").html("Online");
  //alert('heroi online');
});

window.setInterval(muda_pra_off, 10000);


function muda_pra_off() {
    $("#status_heroi").html("Offiline");
}
