$("#ativa-eyhex").click(function() {

    var id_heroi = $("#ativa-eyhex").attr("data-id");
    //alert(id_heroi);
    Swal.fire({
      title: 'Você tem certeza disso?',
      text: "Ao confirmar o Eyhe enviará uma notificação a todos os Anjos Online. O primeiro que lhe atender será mostrado.",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Sim, quero ativar Anjos de Plantão',
      cancelButtonText: 'Cancelar'
    }).then((result) => {
      if (result.isConfirmed) {

        jQuery.ajax({
            type: "POST",
            url: "painel/engineEYHEX/altera_heroi_para_eyhex.php",
            data: {
                identificador: id_heroi
            },
            beforeSend: function() {
              Swal.fire({
               title: 'Aguarde um pouquinho..',
               text: 'Estamos notificando nossos Anjos. Você será redirecionado em breve',
               imageUrl: 'https://pedefacil.sodexobeneficios.com.br/PPW/img/tela-espera.gif',
               imageWidth: 80,
               imageHeight: 80,
               imageAlt: 'aguarde',
             })
            },
            success: function(data) {
                window.location.href = 'nova-sala-de-espera2.php?id_requisicao='+id_heroi;
                //alert(data);
            }
        });

      }
    })

});

function ouvir_resposta(){
  //alert("Ouvindo respostas dos anjos para o pedido: "+ID_HEROI);
  $.ajax({
      type: "POST",
      url: "painel/engineEYHEX/retorna_infos_atendimento_plantao.php",
      data: {id_solicitacao: ID_HEROI},
      success: function(retorno)
      {
        //alert(retorno);
        //console.log(retorno);
        retorno = JSON.parse(retorno);
        if(retorno[0].talking != 0){
          clearInterval(repetir);


          var v_biografia = retorno[0].biografiaanjo;
          var v_textovitrini = retorno[0].textovitrini;
          var v_desafio1 = retorno[0].desafio1;
          var v_desafio2 = retorno[0].desafio2;
          var v_desafio3 = retorno[0].desafio3;
          var v_nome = retorno[0].nomeanjo;
          var v_avatar = '../painel/'+retorno[0].avataranjo;
          var idanjo = retorno[0].talking;
          var sessao = retorno[0].sessao;
          var tabela = retorno[0].tabela;
          var qtd = retorno[0].qtdatendimentos;
          var avaliacao1 = retorno[0].avaliacao1;
          var avaliacao2 = retorno[0].avaliacao2;
          var v_permalink = 'https://www.eyhe.com.br/chat.php?myid='+ID_HEROI+'&idanjo='+idanjo+'&room='+sessao+'&where='+tabela;
          //avisa_heroi_que_anjo_chegou(idUBER, v_permalink);


          var mensagem = {
            'v_textovitrini': v_textovitrini,
            'v_nome': retorno[0].nomeanjo,
            'v_avatar': '../painel/'+retorno[0].avataranjo,
            'idanjo': retorno[0].talking,
            'sessao': retorno[0].sessao,
            'tabela': retorno[0].tabela,
            'qtd': qtd,
            'v_permalink': 'https://www.eyhe.com.br/chat.php?myid='+ID_HEROI+'&idanjo='+idanjo+'&room='+sessao+'&where='+tabela
          },

          output = Mustache.render('<div class="card d-flex"><div class="info"><picture><source type="image/jpg" src="{{v_avatar}}" /><img class="avatar" src="{{v_avatar}}" /></picture><p class="t1"><strong>{{v_nome}}</strong></p><small><picture><source type="image/png" src="assets/images/star.png" /><img src="assets/images/star.png" /></picture>{{avaliacao1}}</small><p>Esse Anjo já ajudou {{qtd}} pessoas</p></div><div class="texto"><p>{{v_textovitrini}}</p></div><div class="buttons"><a href="{{v_permalink}}" class="btn btn-success">Conversar</a><a target="_blank" href="perfil-anjo.php?q={{idanjo}}" class="btn btn-blue">Ver Perfil</a></div></div>', mensagem);

          $('#md4').append(output);
          $('#esp2').hide();
          $('#md4').show();

        }
      }
  });
}
repetir = setInterval('ouvir_resposta()', 3000);
