function envia_sms(telefone, texto){
    $.ajax({
     url : "https://www.eyhe.com.br/3.0/painel/engineZENVIA/SMS_PHP/send_sms.php",
     type : 'post',
     data : {
          telefone : telefone,
          texto : texto
     },
     beforeSend : function(){
          //alert('enviando..');
     },
     success: function(data) {
         alert(data);
     }
    });

};
