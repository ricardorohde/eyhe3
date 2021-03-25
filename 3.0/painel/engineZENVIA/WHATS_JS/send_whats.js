function envia_whats_novo_atendimento(telefone, nome_heroi){
  $.post( "https://www.eyhe.com.br/3.0/painel/engineZENVIA/WHATS_PHP/envia_whats_novo_atendimento.php", { telefone: telefone, nome_heroi: nome_heroi} );
};
