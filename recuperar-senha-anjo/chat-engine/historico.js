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
  url: 'painel/engine/retorna_historico_chat.php',//Definindo o arquivo onde serão buscados os dados

  success: function(dados){

    for(var i=0;dados.length>i;i++){

      //vamos arrumar a data? podemos tambem personalizar do tipo: hoje, ontem, fora esses, deixa a data normal.
      var datahora = dados[i].datahora; var dataarray = datahora.split(" "); data = dataarray[0]; var hora = dataarray[1]; data = convertDate(data); datahora = data+' '+hora;

      //Adicionando registros retornados na div
      if(dados[i].texto != ''){
          //alert(dados[i].texto);
          if(dados[i].remetente == myid){
            var mensagem = {
              'texto':  dados[i].texto,
              'datahora': datahora,
              'avatar': '../painel/'+avatar_eu
            },
            output = Mustache.render('<li class="right"><div class="conversation-list"><div class="ctext-wrap right"><p>{{texto}}</p><p class="chat-time mb-0">{{datahora}}</p></div></div></li>', mensagem);
          }else{
            var mensagem = {
              'texto':  dados[i].texto,
              'datahora': datahora,
              'avatar': '../painel/'+avatar_ele
            },
            output = Mustache.render('<li><div class="conversation-list"><div class="ctext-wrap"><p>{{texto}}</p><p class="chat-time mb-0">{{datahora}}</p></div></div></li>', mensagem);
          }

          $('#messageBody').append(output);
      }
    }

    //var chatHistory = document.getElementById("messageBody");
    //chatHistory.scrollTop = chatHistory.scrollHeight;

  }
});
