function carrega_historico(){
  $('#history').empty(); //Limpando a div
  $.ajax({
    type:'post',    //Definimos o método HTTP usado
    dataType: 'json', //Definimos o tipo de retorno
    data: {"nome_tabela": '<?php echo $tabela; ?>',
           "meuID": '<?php echo $myID; ?>'},
    url: '../painel/engine/retorna_historico_chat.php',//Definindo o arquivo onde serão buscados os dados

    success: function(dados){

      for(var i=0;dados.length>i;i++){
        //Adicionando registros retornados na div
        if(dados[i].remetente == '<?php echo $myID; ?>'){
          $('#history').append('<div class="message-item eu">
                              <div class="message-avatar">
                                  <figure class="avatar">
                                      <img src="http://via.placeholder.com/128X128" class="rounded-circle" alt="image">
                                  </figure>
                                  <div>
                                      <h5>Byrom Guittet</h5>
                                      <div class="time">01:35 PM</div>
                                  </div>
                              </div>
                              <div class="message-content">
                                  '+dados[i].texto+'
                              </div>
                          </div>');
        }else{
          $('#history').append('<div class="message-item outgoing-message outro">
                                  <div class="message-avatar">
                                      <figure class="avatar">
                                          <img src="../painel/<?php echo $avataranjo; ?>" class="rounded-circle" alt="image">
                                      </figure>
                                      <div>
                                          <h5>Mirabelle Tow</h5>
                                          <div class="time">01:20 PM <i class="ti-double-check text-info"></i></div>
                                      </div>
                                  </div>
                                  <div class="message-content">
                                      '+dados[i].texto+'
                                  </div>
                              </div>');
        }
      }
      var chatHistory = document.getElementById("janela");
      chatHistory.scrollTop = chatHistory.scrollHeight;
    }

  });
}
