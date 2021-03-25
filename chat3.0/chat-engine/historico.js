var myid = 'h_'+MY_ID;
var tabela = TABELA;


function convertDate(dateString){
  var p = dateString.split(/\D/g)
  return [p[2],p[1],p[0]].join("/");
}

$('#messageBody').empty(); //Limpando a div
$.ajax({
  type:'post',    //Definimos o método HTTP usado
  dataType: 'json', //Definimos o tipo de retorno
  data: {"nome_tabela": tabela,
         "meuID": myid},
  url: '../painel/engine/retorna_historico_chat.php',//Definindo o arquivo onde serão buscados os dados

  success: function(dados){

    for(var i=0;dados.length>i;i++){
    
      //vamos arrumar a data? podemos tambem personalizar do tipo: hoje, ontem, fora esses, deixa a data normal.
      var datahora = dados[i].datahora; var dataarray = datahora.split(" "); data = dataarray[0]; var hora = dataarray[1]; data = convertDate(data); datahora = data+' '+hora;

      //Adicionando registros retornados na div
      if(dados[i].texto != ''){

          if(dados[i].remetente == myid){
            var mensagem = {
              'texto':  dados[i].texto,
              'datahora': datahora,
              'avatar': '../painel/'+avatar_eu
            },
            output = Mustache.render('<div class="message self"><div class="message-wrapper"><div class="message-content"><span>{{texto}}</span></div></div><div class="message-options"><div class="avatar avatar-sm"><img alt="" src="{{avatar}}"></div><span class="message-date">{{datahora}}</span></div></div>', mensagem);
          }else{
            var mensagem = {
              'texto':  dados[i].texto,
              'datahora': datahora,
              'avatar': '../painel/'+avatar_ele
            },
            output = Mustache.render('<div class="message"><div class="message-wrapper"><div class="message-content"><span>{{texto}}</span></div></div><div class="message-options"><div class="avatar avatar-sm"><img alt="" src="{{avatar}}"></div><span class="message-date">{{datahora}}</span></div></div>', mensagem);
          }

          $('#messageBody').append(output);
      }
    }

    var chatHistory = document.getElementById("messageBody");
    chatHistory.scrollTop = chatHistory.scrollHeight;

  }
});
